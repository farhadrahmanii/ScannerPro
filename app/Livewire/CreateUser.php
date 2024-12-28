<?php

namespace App\Livewire;

use App\Models\Site;
use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Role;

class CreateUser extends Component
{
    use WithFileUploads;
    public $allSites;
    public $name = "";
    public $user_name = "";
    public $email = "";
    public $password = "";
    public $site_id;
    public $role = "";
    #[Validate('image|max:1024')]
    public $photo = "";
    public $roles = [];

    public function save()
    {

        $this->validate([
            'name' => 'required|string|max:255',
            'user_name' => 'required|string|max:255',
            'email' => 'required|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/|max:255',
            'password' => 'required|String|max:255',
            'site_id' => 'required',
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
            'site_id' => $this->site_id,
            'role' => $this->role,
            'photo' => isset($filePath) ? $filePath : null,
        ]);
        if ($this->role) {
            $findedRole = Role::find($this->role);
            if ($findedRole) {
                $user->assignRole($findedRole);
            }
        }

        flash()->success('Account for Miss/Mr.' . $this->name . ' Created successfully');
        $this->reset();
        return $this->redirect('/all/users', navigate: true);
    }
    public function mount()
    {
        $this->roles = Role::all();
        $this->allSites = Site::all();
    }
    public function placeholder()
    {
        return view('livewire.form-loading');
    }
    public function render()
    {
        return view('livewire.user.create-user');
    }
}
