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
            // Delete the previous profile image and its directory if they exist
            if ($this->photo && file_exists(storage_path('app/public') . $this->photo)) {
                $previousDirectory = dirname(storage_path('app/public') . $this->photo);
                unlink(storage_path('app/public') . $this->photo);

                // Remove the directory if it's empty
                if (is_dir($previousDirectory) && count(scandir($previousDirectory)) == 2) {
                    rmdir($previousDirectory);
                }
            }

            $imageName = time() . '.' . $this->photo->getClientOriginalExtension();
            $uploadPath = storage_path('app/public/uploads/images/' . rand(1000000000, 9999999999));

            // Create directory if it doesn't exist
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            // Ensure directory path uses correct directory separator for the OS
            $uploadPath = str_replace('/', DIRECTORY_SEPARATOR, $uploadPath);

            // Generate unique filename with timestamp
            $filename = \Carbon\Carbon::now()->format('Y-m-d-H-i-s') . '-' . $imageName;

            // Store file using Laravel's storage system
            $filePath = $this->photo->storeAs(
                'uploads/images/' . rand(1000000000, 9999999999),
                $filename,
                'public'
            );
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
