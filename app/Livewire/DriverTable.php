<?php

namespace App\Livewire;

use App\Exports\DriverExport;
use App\Models\Driver;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Maatwebsite\Excel\Facades\Excel;

class DriverTable extends DataTableComponent
{
    protected $model = Driver::class;

    // Exporting Data Processs start here
    public function bulkActions(): array
    {
        return [
            'export' => __('driver_table.export_drivers'),
        ];
    }

    public function export()
    {
        $driverId = $this->getSelected();
        $userSiteId = auth()->user()->site_id;

        $this->clearSelected();

        return Excel::download(new DriverExport($driverId, $userSiteId), 'drivers.xlsx');
    }
    // END Exporting Data Processs start here

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setDefaultSort('id', 'desc')
            ->setTableRowUrl(function ($row) {
                return route('driver.details', $row);
            });
    }

    public function columns(): array
    {
        return [
            Column::make(__('driver_table.sl'), 'id')
                ->sortable(),
            Column::make(__('driver_table.site'), 'Site.site_name')
                ->sortable(),
            Column::make(__('driver_table.name'), 'name')
                ->sortable()
                ->searchable(),
            Column::make(__('driver_table.father_name'), 'father_name')
                ->sortable()
                ->searchable(),
            Column::make(__('driver_table.national_id'), 'national_id')
                ->sortable()
                ->searchable(),
            Column::make(__('driver_table.transport_company'), 'transportCompany.transport_company_name')
                ->sortable(),
            Column::make(__('driver_table.actions'), 'name')
                ->format(function ($value, $row) {
                    return view('livewire.partials.driver-actions', ['drive' => $row]);
                })->unclickable(),
        ];
    }

    public function builder(): Builder
    {
        return Driver::query()->where('drivers.site_id', auth()->user()->site_id);
    }
    public function placeholder()
    {
        return view('livewire.loading');
    }
}
