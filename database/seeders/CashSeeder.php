<?php

namespace Database\Seeders;

use App\Models\Cash;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;

class CashSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transactions = Transaction::all();
        $users = User::all();

        foreach ($transactions as $transaction) {
            Cash::create([
                'transaction_id' => $transaction->id,
                'driver_id' => $transaction->vehicle->driver_id,
                'amount' => 1000.00,
                'approved' => false,
                'date' => now(),
                'description' => 'Sample cash transaction',
                'casher_id' => $users->random()->id,
                'receiver_id' => $users->random()->id,
                'approved_by' => null,
            ]);
        }
    }
}
