<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    /** @use HasFactory<\Database\Factories\VehicleFactory> */
    use HasFactory;

    protected $guarded = [];


    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
