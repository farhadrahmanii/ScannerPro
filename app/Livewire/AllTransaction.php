<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Component;

class AllTransaction extends Component
{
    public function placeholder()
    {
        return view("livewire.loading");
    }
    public function render()
    {
        $transactions = Transaction::all();
        return view('livewire.all-transaction', compact('transactions'));
    }
}
