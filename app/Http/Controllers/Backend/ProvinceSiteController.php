<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Provinces;
use Illuminate\Http\Request;

class ProvinceSiteController extends Controller
{
    public function AllProvinceSites()
    {
        $provinces = Provinces::all();
        return view("admin.backend.provinces_site.allProvince_site", compact("provinces"));
    }
}
