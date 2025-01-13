<?php

namespace App\Livewire\ConsigneeCompany;

use App\Models\ConsigneeCompany;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;


class Table extends DataTableComponent
{
    protected $model = ConsigneeCompany::class;
    public function placeholder()
    {
        return view('livewire.loading');
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }


    public function columns(): array
    {
        return [
            Column::make('Sl', 'id')
                ->sortable(),
            Column::make('Consignee Company Name', 'consignee_company_name')
                ->sortable()
                ->searchable(),
            Column::make('Consignee Company TIN', 'consignee_company_tin')
                ->sortable()
                ->searchable(),
            Column::make('Actions', 'consignee_company_name')
                ->format(function ($value, $row) {
                    return view('livewire.partials.consignee-company-actions', ['consignee_company' => $row]);
                })->unclickable() // Exclude 'action, // Optional: exclude from export if needed
        ];
    }
}
