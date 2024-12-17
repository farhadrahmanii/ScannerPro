<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Role;

class CreateUser extends Component
{
    use WithFileUploads;
    public $name = "";
    public $user_name = "";
    public $email = "";
    public $password = "";
    public $province_id;
    public $role = "";
    #[Validate('image|max:1024')]
    public $photo = "";
    public $roles = [];

    public function save()
    {

        $this->validate([
            'name' => 'required|string|max:255',
            'user_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|String|max:255',
            'province_id' => 'required',
            'role' => 'required|string|max:50',
            'photo' => 'image|mimes:jpg,jpeg,png|max:2048', // Max size in kilobytes
        ]);
        if ($this->photo) {
            $filePath = $this->photo->store('uploads/photos', 'public');
        }
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'province_id' => $this->province_id,
            'role' => $this->role,
            'photo' => isset($filePath) ? $filePath : null,
        ]);
        if ($this->role) {
            $findedRole = Role::find($this->role);
            if ($findedRole) {
                $user->assignRole($findedRole);
            }
        }

        $notification = array(
            'alert-type' => 'success',
            'message' => 'User Registerd Successfully! ',
        );
        return redirect()->route('users.list')->with($notification);
    }
    public function mount()
    {
        $this->roles = Role::all();
    }
    public function placeholder()
    {
        return view('livewire.form-loading');
    }
    public function render()
    {
        return view('livewire.create-user');
    }
}
