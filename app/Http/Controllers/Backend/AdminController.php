<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Provinces;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{


    public function AllUsers()
    {
        $users = User::with('province')->get();
        $provinces = Provinces::with('user')->get();
        return view("admin.backend.users.allUsers", compact("users", 'provinces'));
    } // End of Method

    public function AddAdminUsers()
    {
        return view("admin.backend.users.addUser");
    } // End of Method
}
