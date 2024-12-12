<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;

class EditUser extends Component
{
    use WithFileUploads;

    public $userId;
    public $name;
    public $user_name;
    public $email;
    public $password;
    public $province_id;
    public $role;
    public $photo;

    public function mount($id)
    {
        $user = User::findOrFail($id);

        // Initialize properties
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->user_name = $user->user_name;
        $this->email = $user->email;
        $this->province_id = $user->province_id;
        $this->role = $user->role;
    }

    public function updateUser()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'user_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'province_id' => 'required|numeric',
            'role' => 'required|string|max:50',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = User::findOrFail($this->userId);

        $user->update([
            'name' => $this->name,
            'user_name' => $this->user_name,
            'email' => $this->email,
            'province_id' => $this->province_id,
            'role' => $this->role,
            'password' => $this->password ? Hash::make($this->password) : $user->password,
        ]);

        if ($this->photo) {
            $path = $this->photo->store('public/photos');
            $user->update(['photo' => $path]);
        }

        session()->flash('success', 'User updated successfully!');
        return redirect()->route('admin.users'); // Adjust the route to your actual list page
    }

    public function render()
    {
        return view('livewire.edit-user');
    }
}
