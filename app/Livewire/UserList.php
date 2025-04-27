<?php

namespace App\Livewire;

use App\Models\Provinces;
use App\Models\User;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class UserList extends Component
{
    public $status;

    public function toggleStatus($userId)
    {
        $user = User::find($userId);

        if ($user) {
            $user->status = !$user->status; // Toggle between 0 and 1
            $user->save();
        }
        flash()->success('User Status was Successfully Updated.');
        // Toaster::success('User created!'); // 👈
    }
    public function placeholder()
    {
        return view('livewire.loading');
    }
    public function render()
    {
        $users = User::with('province')->get();
        $provinces = Provinces::with('user')->get();
        return view('livewire.user.user-list', compact("users", 'provinces'));
    }
}
