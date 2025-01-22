<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    /** @use HasFactory<\Database\Factories\DriverFactory> */
    use HasFactory;

    protected $guarded = [];
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
    public function TransportCompany()
    {
        return $this->belongsTo(TransportCompany::class);
    }
    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
