<?php

namespace App\Livewire\Cash;

use Livewire\Component;
use App\Models\Cash;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Driver;

class CreateCash extends Component
{
    public $transaction_id;
    public $driver_id;
    public $amount = 1000.00;
    public $approved = false;
    public $date;
    public $description;
    public $casher_id;
    public $receiver_id;
    public $approved_by;

    protected $rules = [
        'transaction_id' => 'required|exists:transactions,id',
        'driver_id' => 'required|exists:drivers,id',
        'amount' => 'required|numeric',
        'date' => 'required|date',
        'description' => 'nullable|string',
        'casher_id' => 'required|exists:users,id',
        'receiver_id' => 'required|exists:users,id',
        'approved_by' => 'nullable|exists:users,id',
    ];

    public function submit()
    {
        $this->validate();

        Cash::create([
            'transaction_id' => $this->transaction_id,
            'driver_id' => $this->driver_id,
            'amount' => $this->amount,
            'approved' => $this->approved,
            'date' => $this->date,
            'description' => $this->description,
            'casher_id' => $this->casher_id,
            'receiver_id' => $this->receiver_id,
            'approved_by' => $this->approved_by,
        ]);

        session()->flash('message', 'Cash transaction created successfully.');

        return redirect()->route('all.cash');
    }

    public function render()
    {
        return view('livewire.cash.create-cash', [
            'transactions' => Transaction::all(),
            'drivers' => Driver::all(),
            'users' => User::all(),
        ]);
    }
}
