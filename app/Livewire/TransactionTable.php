<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class TransactionTable extends DataTableComponent
{
    protected $model = Transaction::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setDefaultSort('id', 'desc')
            ->setTableRowUrl(function ($row) {
                return route('transaction.details', $row);
            }); // Use '_self' to open in the same tab
    }

    public function columns(): array
    {
        return [
            Column::make('Sl', 'id')
                ->sortable(),

            Column::make('Transaction ID', 'transaction_id')
                ->sortable()
                ->searchable(),

            Column::make('User', 'user.name')
                ->sortable()
                ->searchable(),

            Column::make('Vehicle', 'vehicle.plate_number')
                ->sortable()
                ->searchable(),

            Column::make('Item Name', 'item_name')
                ->sortable()
                ->searchable(),

            Column::make('Total Tonnage', 'total_tonnage')
                ->sortable(),

            Column::make('Number of Items', 'number_of_items')
                ->sortable(),

            Column::make('Scan Status', 'scan_status')
                ->sortable()
                ->format(fn($value) => $value ? '✅ Scanned' : '❌ Not Scanned'),

            Column::make('Actions', 'transaction_id') // Prevent row click behavior on this column
                ->format(function ($value, $row) {
                    return view('livewire.partials.transaction-actions', ['transaction' => $row]);
                })
                ->html()
                ->unclickable(), // Ensure raw HTML is rendered if using Blade partials
        ];
    }

}
