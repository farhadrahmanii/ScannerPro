<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportCompany extends Model
{
    /** @use HasFactory<\Database\Factories\TransportCompanyFactory> */
    use HasFactory;

    protected $fillable = [
        'transport_company_name',
        'transport_company_tin',
    ];
}
