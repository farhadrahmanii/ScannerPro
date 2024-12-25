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

    // Vehicle System code generator is here Random Code generator for System Code Column in vehicle
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($vehicle) {
            do {
                $vehicle->system_code = str_pad(mt_rand(10000000, 9999999999), 12, '0', STR_PAD_LEFT);
            } while (\App\Models\Vehicle::where('system_code', $vehicle->system_code)->exists());
        });
    }


}
