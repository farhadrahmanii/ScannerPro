<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class driverController extends Controller
{
    public function AllDrivers()
    {
        return view('admin.backend.drivers.allDrivers');
    }
}
