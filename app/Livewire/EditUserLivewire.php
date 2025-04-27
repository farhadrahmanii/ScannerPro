<?php

namespace App\Livewire;

use App\Models\Site;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class EditUserLivewire extends Component
{
    use WithFileUploads;

    public $user;
    public $name;
    public $user_name;
    public $email;
    public $password;
    public $site_id;
    public $role;
    public $roles = [];
    public $photo;
    public $photoPreview;
    public $allSites;
    public $permissions = [];
    public $selectedPermissions = [];

    public function mount($user)
    {
        $user = User::findOrFail($user);

        $this->user = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->site_id = $user->site_id;
        $this->role = $user->roles->first()?->id;
        $this->photoPreview = $user->photo;
        $this->selectedPermissions = $user->permissions->pluck('name')->toArray();
        $this->roles = Role::all();
        $this->allSites = Site::all();
        $this->permissions = Permission::all();
    }

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $this->user,
            'site_id' => 'numeric',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'selectedPermissions' => 'array',
            'selectedPermissions.*' => 'string|exists:permissions,name',
        ]);

        $user = User::findOrFail($this->user);
        $filePath = $user->photo;

        if ($this->photo) {
            $userEmail = $this->email ?? 'default';
            $directory = public_path("uploads/images/{$userEmail}");

            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }

            $fileName = uniqid() . '.' . $this->photo->getClientOriginalExtension();
            $filePath = "uploads/images/{$userEmail}/{$fileName}";

            if ($user->photo && file_exists(public_path($user->photo))) {
                unlink(public_path($user->photo));
            }

            $this->photo->storeAs("uploads/images/{$userEmail}", $fileName, 'public');
        }

        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'site_id' => $this->site_id,
            'password' => $this->password ? Hash::make($this->password) : $user->password,
            'photo' => $filePath,
        ]);

        if (!empty($this->selectedPermissions)) {
            $user->syncPermissions($this->selectedPermissions);
        }

        session()->flash('success', 'User updated successfully!');
        return redirect()->route('users.list');
    }

    public function render()
    {
        return view('livewire.edit-user-livewire');
    }
}
