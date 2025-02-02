<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Component;
use Livewire\WithPagination;

class AllTransaction extends Component
{
    use WithPagination; // Include pagination trait
    public $transaction;

    public function updateTransaction($transactionId)
    {
        // Logic to update the specific transaction
        $transaction = Transaction::find($transactionId);
        // Perform the update (e.g., change status, etc.)
        
        // Optionally, you can return the updated transaction data
        $this->transaction = $transaction; // Update the local state
    }

    public function render()
    {
        $transactions = Transaction::paginate(10); // Load 10 transactions per page
        return view('livewire.transactions.all-transaction', compact('transactions'));
    }
}
