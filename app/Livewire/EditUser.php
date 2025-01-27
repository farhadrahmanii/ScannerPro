<?php

namespace App\Livewire;

use App\Models\Site;
use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class EditUser extends Component
{
    public $roles = [];
    public $permissions = [];
    public $selectedPermissions = [];
    public $photoPreview = "";

    public function mount($userId)
    {
        $this->userId = $userId;
        $user = User::findOrFail($userId);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->site_id = $user->site_id;
        $this->role = $user->roles->first()->id ?? '';
        $this->selectedPermissions = $user->permissions->pluck('name')->toArray();
        $this->photoPreview = $user->photo;

        $this->roles = Role::all();
        $this->allSites = Site::all();
        $this->permissions = Permission::all();
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/|max:255|unique:users,email,' . $this->userId,
            'password' => 'nullable|string|max:255',
            'site_id' => 'required',
            'role' => 'string|max:50',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Max size in kilobytes
            'selectedPermissions' => 'array',
            'selectedPermissions.*' => 'string|exists:permissions,name',
        ]);

        $user = User::findOrFail($this->userId);

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
            $user->photo = $filePath;
        }

        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password ? bcrypt($this->password) : $user->password,
            'site_id' => $this->site_id,
        ]);

        if ($this->role) {
            $findedRole = Role::find($this->role);
            if ($findedRole) {
                $user->syncRoles([$findedRole]);
            }
        }

        if (!empty($this->selectedPermissions)) {
            $user->syncPermissions($this->selectedPermissions);
        }

        flash()->success('Account for Miss/Mr.' . $this->name . ' Updated successfully');
        return $this->redirect('/all/users', navigate: true);
    }

    public function render()
    {
        return view('livewire.user.edit-user');
    }
}
