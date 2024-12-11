<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
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
    }
}
