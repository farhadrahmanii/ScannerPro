<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

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
}
