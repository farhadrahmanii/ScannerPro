<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionFactory> */
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
    // The Scan_time is DateTime it's defined
    protected $casts = [
        'scan_time' => 'datetime',
    ];
}
