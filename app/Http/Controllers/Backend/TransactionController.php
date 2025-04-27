<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Driver;
use Illuminate\Http\Request;
use PDF;

class TransactionController extends Controller
{
    public function AllTransactions()
    {
        return view('admin.backend.transaction.allTransactions');
    }

    public function AddTransactions()
    {
        return view('admin.backend.transaction.addTransaction');
    } // End Of method

    public function TransactionsDetails($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        return view('admin.backend.transaction.TransactionDetails', compact('transaction'));
    } // End Of method

    public function EditTransaction($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        return view('admin.backend.transaction.EditTransactions', compact('transaction'));
    } // End Of method

    public function DeleteTransaction($id)
    {
        $transaction = Transaction::where('id', $id)->first();

        $transaction->delete();
        flash()->success('Transaction is deleted successfully!');
        return redirect()->route('all.transactions');
    } // End Of method

    public function printSlip($id)
    {
        $transaction = Transaction::with(['driver'])->findOrFail($id);
        return view('admin.backend.cash.print-slip', compact('transaction'));
    } // End Of method

}
