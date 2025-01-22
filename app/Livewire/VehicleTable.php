<?php

namespace App\Livewire;

use App\Exports\VehicleExport;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Maatwebsite\Excel\Facades\Excel;
class VehicleTable extends DataTableComponent
{
    protected $model = Vehicle::class;
    public function bulkActions(): array
    {
        return [
            'export' => 'Export Drivers',
        ];
    }
    public function export()
    {
        $vehicleId = $this->getSelected();
        $userSiteId = auth()->user()->site_id;

        $this->clearSelected();

        return Excel::download(new VehicleExport($vehicleId, $userSiteId), 'vehicles.xlsx');
    }
    // END Exporting Data Processs start here
    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setDefaultSort('id', 'desc')
            ->setTableRowUrl(function ($row) {
                return route('vehicle.details', $row);
            });
    }

    public function columns(): array
    {
        return [
            Column::make('Sl', 'id')
                ->sortable(),
            Column::make('Site Name', 'Site.site_name')
                ->sortable(),
            Column::make('Driver Name', 'driver.name')
                ->sortable()
                ->searchable(),
            Column::make('Vehicle Make', 'vehicle_make')
                ->sortable(),
            Column::make('Model', 'vehicle_model')
                ->sortable()
                ->searchable(),
            Column::make('Year', 'year')
                ->sortable()
                ->searchable(),
            Column::make('Capacity (Ton)', 'capacity')
                ->sortable(),
            Column::make('Vehicle Type', 'type')
                ->sortable(),
            Column::make('System Code', 'system_code')
                ->searchable()
                ->sortable(),
            Column::make('Plate #', 'plate_number')
                ->sortable(),
            Column::make('Actions', 'driver.name')
                ->format(function ($value, $row) {
                    return view('livewire.partials.vehicle-actions', ['vehicle' => $row]);
                })->unclickable() // Exclude 'action, // Optional: exclude from export if needed
        ];
    }
    public function builder(): Builder
    {
        return Vehicle::query()->where('vehicles.site_id', auth()->user()->site_id);
    }
}
