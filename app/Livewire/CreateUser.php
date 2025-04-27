<?php

namespace App\Livewire;

use App\Models\Site;
use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateUser extends Component
{
    use WithFileUploads;
    public $allSites;
    public $name = "";
    public $email = "";
    public $phone = "";
    public $password = "";
    public $site_id;
    public $role = "";
    #[Validate('image|max:1024')]
    public $photo = "";
    public $roles = [];
    public $permissions = [];
    public $selectedPermissions = [];

    public function save()
    {

        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/|max:255|unique:users,email|',
            'password' => 'required|String|max:255',
            'site_id' => 'required',
            'role' => 'string|max:50',
            'phone' => 'required|numeric|digits:10',
            'photo' => 'image|mimes:jpg,jpeg,png|max:2048', // Max size in kilobytes
            'selectedPermissions' => 'array',
            'selectedPermissions.*' => 'string|exists:permissions,name',
        ]);
        if ($this->photo) {
            $userEmail = $this->email ?? 'default';
            $directory = public_path("uploads/images/{$userEmail}");

            // Create directory if it doesn't exist
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }

            // Store the uploaded image
            $fileName = uniqid() . '.' . $this->photo->getClientOriginalExtension();
            $this->photo->storeAs("uploads/images/{$userEmail}", $fileName, 'public');

            $filePath = "uploads/images/{$userEmail}/{$fileName}";
        }
        // dd($filePath);
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'site_id' => $this->site_id,
            'photo' => $filePath ?? null,
            'role' => 'admin',
            'phone' => $this->phone,
        ]);
        if ($this->role) {
            $findedRole = Role::find($this->role);
            if ($findedRole) {
                $user->assignRole($findedRole);
            }
        }
        if (!empty($this->selectedPermissions)) {
            $user->syncPermissions($this->selectedPermissions);
        }

        flash()->success('Account for Miss/Mr.' . $this->name . ' Created successfully');
        $this->reset();
        return $this->redirect('/all/users');
    }
    public function mount()
    {
        $this->roles = Role::all();
        $this->allSites = Site::all();
        $this->permissions = Permission::all();
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
