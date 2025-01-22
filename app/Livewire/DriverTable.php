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
            'export' => 'Export Drivers',
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
            Column::make('Sl', 'id')
                ->sortable(),
            Column::make('Site Name', 'Site.site_name')
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
            Column::make('Transport Company', 'transportCompany.transport_company_name')
                ->sortable(),
            Column::make('Actions', 'name')
                ->format(function ($value, $row) {
                    return view('livewire.partials.driver-actions', ['drive' => $row]);
                })->unclickable(),
        ];
    }
    public function builder(): Builder
    {
        return Driver::query()->where('drivers.site_id', auth()->user()->site_id);
    }
}
