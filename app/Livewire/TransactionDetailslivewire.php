<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Component;

class TransactionDetailslivewire extends Component
{
    public $transactionId;
    public function placeholder(){
        return view("livewire.placeholder-driver-details");
    }

    public function render()
    {
        $transaction = Transaction::where('id', $this->transactionId)->first();
        return view('livewire.transaction-detailslivewire', compact('transaction'));
    }
}
