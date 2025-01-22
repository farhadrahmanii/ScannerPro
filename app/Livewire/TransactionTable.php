<?php

namespace App\Livewire;

use App\Exports\TransactionExport;
use App\Models\Transaction;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Facades\Excel;
class TransactionTable extends DataTableComponent
{
    protected $model = Transaction::class;
    // Exporting Data Processs start here
    public function bulkActions(): array
    {
        return [
            'export' => 'Export Transactions',
        ];
    }
    public function export()
    {
        $transactionIds = $this->getSelected();
        $userSiteId = auth()->user()->site_id;

        $this->clearSelected();

        return Excel::download(new TransactionExport($transactionIds, $userSiteId), 'transactions.xlsx');
    }
    // END Exporting Data Processs start here


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
            Column::make('Site', 'Site.site_name')
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
            Column::make('Payment Status', 'fees_payment')
                ->sortable()
                ->format(fn($value) => $value ? '✅ Paid' : '❌ Not Paid'),
            Column::make('Fees', 'fees_amount')
                ->sortable(),

            Column::make('Actions', 'transaction_id') // Prevent row click behavior on this column
                ->format(function ($value, $row) {
                    return view('livewire.partials.transaction-actions', ['transaction' => $row])->render();
                })
                ->html()
                ->unclickable(), // Ensure raw HTML is rendered if using Blade partials
        ];
    }

    // --------------------------------------------------------- Show Data based on Site Name --------------
    public function builder(): Builder
    {
        return Transaction::query()->where('transactions.site_id', auth()->user()->site_id);
    }
    // --------------------------------------------------------- Mark As Paid --------------------------------
    public function markAsPaid($transactionId)
    {
        $transaction = Transaction::find($transactionId);
        $transaction->fees_payment = true;
        $transaction->save();
    }

}
