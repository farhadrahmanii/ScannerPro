<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
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
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'province_id' => $this->province_id,
            'role' => $this->role,
            'photo' => isset($filePath) ? $filePath : null,
        ]);
        $notification = array(
            'alert-type' => 'success',
            'message' => 'User Registerd Successfully! ',
        );
        return redirect()->route('users.list')->with($notification);
    }
    public function render()
    {
        return view('livewire.create-user');
    }
}
