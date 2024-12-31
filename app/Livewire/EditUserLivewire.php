<?php

namespace App\Livewire;

use App\Models\Site;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;
class EditUserLivewire extends Component
{

    use WithFileUploads;

    public $user;
    public $name;
    public $user_name;
    public $email;
    public $password;
    public $site_id;
    public $role; // Ensure this property is declared
    public $roles = []; // Ensure this property is declared
    public $photo;
    public $photoPreview;
    public $allSites;

    public function mount($user)
    {
        $user = User::findOrFail($user);

        // Initialize properties
        $this->user = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->site_id = $user->site_id;
        $this->role = $user->roles->first()?->id;
        $this->photoPreview = $user->photo; // Existing photo for preview
        $this->roles = Role::all(); // Load roles
        $this->allSites = Site::all(); // Load sites
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
            'role' => 'exists:roles,id',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = User::findOrFail($this->user);
        $filePath = $user->photo; // Default to the existing photo if no new photo is uploaded

        if ($this->photo) {
            $userEmail = $this->email ?? 'default';
            $directory = public_path("uploads/images/{$userEmail}");

            // Create directory if it doesn't exist
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }

            $fileName = uniqid() . '.' . $this->photo->getClientOriginalExtension();
            $filePath = "uploads/images/{$userEmail}/{$fileName}";

            // Delete previous image if it exists
            if ($user->photo && file_exists(public_path($user->photo))) {
                unlink(public_path($user->photo));
            }

            // Store the new image
            $this->photo->storeAs("uploads/images/{$userEmail}", $fileName, 'public');
        }


        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'site_id' => $this->site_id,
            'role' => $this->role,
            'photo' => $filePath,
            'password' => $this->password ? Hash::make($this->password) : $user->password,
        ]);

        // Update Role if it's provided
        $findedRole = Role::find($this->role);
        if ($findedRole) {
            $user->syncRoles([$findedRole->name]);
        }

        session()->flash('success', 'User updated successfully!');
        return redirect()->route('users.list');
    }

    public function render()
    {
        return view('livewire.edit-user-livewire');
    }
}
