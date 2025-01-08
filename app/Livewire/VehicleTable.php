<?php

namespace App\Livewire;

use App\Models\Vehicle;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class VehicleTable extends DataTableComponent
{
    protected $model = Vehicle::class;

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
}
