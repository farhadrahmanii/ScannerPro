<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    /** @use HasFactory<\Database\Factories\SiteFactory> */
    use HasFactory;


    protected $guarded = [];

    public function province()
    {
        return $this->belongsTo(Provinces::class, 'p_id', 'id');
    }
}
