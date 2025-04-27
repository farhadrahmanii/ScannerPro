<?php

namespace App\Livewire;

use App\Exports\TransactionExport;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class TransactionTable extends DataTableComponent
{
    protected $model = Transaction::class;

    public function placeholder()
    {
        return view('livewire.loading');
    }

    // Exporting Data Processs start here
    public function bulkActions(): array
    {
        return [
            'export' => __('transaction_table.export_transactions'),
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
            Column::make(__('transaction_table.sl'), 'id')
                ->sortable()
            ,
            Column::make(__('transaction_table.site'), 'site.site_name')
                ->sortable()
            ,
            Column::make(__('transaction_table.transaction_id'), 'transaction_id')
                ->sortable()
                ->searchable(),
            Column::make(__('transaction_table.user'), 'user.name')
                ->sortable()
                ->searchable(),
            Column::make(__('transaction_table.vehicle'), 'vehicle.plate_number')
                ->sortable()
                ->searchable(),
            Column::make(__('transaction_table.item_name'), 'item_name')
                ->sortable()
                ->searchable(),
            Column::make(__('transaction_table.total_tonnage'), 'total_tonnage')
                ->sortable(),
            Column::make(__('transaction_table.number_of_items'), 'number_of_items')
                ->sortable(),
            Column::make(__('transaction_table.scan_status'), 'scan_status')
                ->sortable()
                ->format(fn($value) => $value ? __('transaction_table.scanned') : __('transaction_table.not_scanned')),
            Column::make(__('transaction_table.payment_status'), 'fees_payment')
                ->sortable()
                ->format(function ($value, $row) {
                    if (Auth::user()->can('get.cash')) {
                        $tooltip = $row->payment_time ? Carbon::parse($row->payment_time)->format('Y-m-d H:i:s') : __('transaction_table.no_payment_time');
                        return "<span title=\"" . e($tooltip) . "\">" . view('livewire.partials.payment-status', ['transaction' => $row])->render() . "</span>";
                    }
                })
                ->unclickable()
                ->html(),
            Column::make(__('transaction_table.payment_time'), 'payment_time')
                ->sortable()
                ->format(fn($value) => $value ? Carbon::parse($value)->format('Y-m-d H:i:s') : __('transaction_table.no_payment_time')),
            Column::make(__('transaction_table.fees'), 'fees_amount')
                ->sortable(),
            Column::make(__('transaction_table.actions'), 'transaction_id') // Prevent row click behavior on this column
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
        return Transaction::with(['site', 'user', 'vehicle']) // Eager load relationships
            ->where('transactions.site_id', auth()->user()->site_id);
    }
    // --------------------------------------------------------- Mark As Paid --------------------------------
    public function markAsPaid($transactionId)
    {
        $transaction = Transaction::find($transactionId);
        $transaction->fees_payment = true;
        $transaction->payment_time = now();
        $transaction->fees_amount = 1000;
        $transaction->save();
        session()->flash('success', __('transaction_table.marked_as_paid'));
    }

    public function markAsNotPaid($transactionId)
    {
        $transaction = Transaction::find($transactionId);
        $transaction->fees_payment = false;
        $transaction->payment_time = now();
        $transaction->fees_amount = 0;
        $transaction->save();
        session()->flash('error', __('transaction_table.marked_as_unpaid'));
    }
}
