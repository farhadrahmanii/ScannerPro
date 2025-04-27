<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{
    /** @use HasFactory<\Database\Factories\ProvincesFactory> */
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function site()
    {
        return $this->hasMany(Site::class);
    }
}
