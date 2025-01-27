<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cash extends Model
{
    /** @use HasFactory<\Database\Factories\CashFactory> */
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'driver_id',
        'amount',
        'approved',
        'date',
        'description',
        'casher_id',
        'receiver_id',
        'approved_by',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function casher()
    {
        return $this->belongsTo(User::class, 'casher_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approver_id');
    }

}
