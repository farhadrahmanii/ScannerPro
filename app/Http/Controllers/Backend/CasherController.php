<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CasherController extends Controller
{
    public function AllCash()
    {
        return view('admin.backend.cash.allCash');
    }
    public function CreateCash()
    {
        return view('admin.backend.cash.createCash');
    }
}
