<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Provinces;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
    public function EditAdminUser($id)
    {
        $user = User::findOrFail($id);
        return view("admin.backend.users.editUser", compact("user"));
    } // End of Method
    public function UpdateAdminUser(Request $request)
    {
        $user = User::findOrFail($request->id);
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
            'province_id' => ['required'],
            'role' => ['required', 'string'],
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'province_id' => $request->province_id,
            'role' => $request->role,
        ]);
        $notification = array(
            'message' => $request->name . ' User Profile Updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('users.list')->with($notification);

    } // End of Method
}
