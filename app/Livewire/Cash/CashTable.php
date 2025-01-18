<?php

namespace App\Livewire\Cash;

use Livewire\Component;
use App\Models\Cash;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class CashTable extends DataTableComponent
{
    protected $model = Cash::class;
    public function placeholder()
    {
        return view('livewire.loading');
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setDefaultSort('id', 'desc');
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->sortable(),
            Column::make('Transaction ID', 'transaction.transaction_id')
                ->sortable()
                ->searchable(),
            Column::make('Driver ID', 'driver.name')
                ->sortable()
                ->searchable(),
            Column::make('Amount', 'amount')
                ->sortable()
                ->searchable(),
            Column::make('Approved', 'approved')
                ->sortable()
                ->searchable(),
            Column::make('Date', 'date')
                ->sortable()
                ->searchable(),
            Column::make('Description', 'description')
                ->sortable()
                ->searchable(),
            Column::make('Casher ID', 'casher.name')
                ->sortable()
                ->searchable(),
            Column::make('Receiver ID', 'receiver.name')
                ->sortable()
                ->searchable(),
            Column::make('Approved By', 'approver.name')
                ->sortable()
                ->searchable(),
            Column::make('Created At', 'created_at')
                ->sortable()
                ->searchable(),
            Column::make('Updated At', 'updated_at')
                ->sortable()
                ->searchable(),
        ];
    }
}