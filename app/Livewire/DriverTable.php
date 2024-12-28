<?php

namespace App\Livewire;

use App\Models\Driver;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
class DriverTable extends DataTableComponent
{
    protected $model = Driver::class;
    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }
    public function columns(): array
    {
        return [
            Column::make('Sl', 'id')
                ->sortable(),
            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),
            Column::make('Father Name', 'father_name')
                ->sortable()
                ->searchable(),
            Column::make('National ID', 'national_id')
                ->sortable()
                ->searchable(),
            Column::make('Transport Company', 'transport_company')
                ->sortable(),
            Column::make('Actions', 'name')
                ->format(function ($value, $row) {
                    return view('livewire.partials.driver-actions', ['drive' => $row]);
                }),
        ];
    }
}
