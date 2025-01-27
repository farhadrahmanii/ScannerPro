<?php

namespace App\Livewire;

use App\Exports\VehicleExport;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\App;

class VehicleTable extends DataTableComponent
{
    protected $model = Vehicle::class;

    public function bulkActions(): array
    {
        return [
            'export' => __('Export Drivers'),
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
            Column::make(__('vehicletable.Sl'), 'id')
                ->sortable(),
            Column::make(__('vehicletable.Site Name'), 'Site.site_name')
                ->sortable(),
            Column::make(__('vehicletable.Driver Name'), 'driver.name')
                ->sortable()
                ->searchable(),
            Column::make(__('vehicletable.Vehicle Make'), 'vehicle_make')
                ->sortable(),
            Column::make(__('vehicletable.Model'), 'vehicle_model')
                ->sortable()
                ->searchable(),
            Column::make(__('vehicletable.Year'), 'year')
                ->sortable()
                ->searchable(),
            Column::make(__('vehicletable.Capacity (Ton)'), 'capacity')
                ->sortable(),
            Column::make(__('vehicletable.Vehicle Type'), 'type')
                ->sortable(),
            Column::make(__('vehicletable.System Code'), 'system_code')
                ->searchable()
                ->sortable(),
            Column::make(__('vehicletable.Plate #'), 'plate_number')
                ->sortable(),
            Column::make(__('vehicletable.Actions'), 'driver.name')
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
