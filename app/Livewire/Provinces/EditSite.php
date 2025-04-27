<?php

namespace App\Livewire\Provinces;

use App\Models\Provinces;
use App\Models\Site;
use App\Models\User;
use Livewire\Component;

class EditSite extends Component
{
    public $provinces;
    public $users;
    public $site_name;
    public $provinces_id;
    public $site_manager;
    public $siteId;  // Property to hold the site ID

    // Mount method to load existing site data for editing
    public function mount($siteId)
    {
        // Load provinces and users for the form
        $this->provinces = Provinces::get();
        $this->users = User::get();

        // Fetch the site data using the provided site ID
        $site = Site::findOrFail($siteId);

        // Assign site data to component properties for binding
        $this->siteId = $site->id;
        $this->site_name = $site->site_name;
        $this->provinces_id = $site->provinces_id;
        $this->site_manager = $site->site_manager;  // Assuming site_manager is the user ID
    }

    protected $messages = [
        'provinces_id.required' => 'Please select a province!',
        'site_name.required' => 'Please enter the site name!',
        'site_manager.required' => 'Please select a site manager!',
        'site_manager.exists' => 'The selected site manager does not exist.',
    ];

    public function save()
    {
        // Validate form data
        $validatedData = $this->validate([
            'provinces_id' => 'required|numeric',
            'site_name' => 'required|max:255',
            'site_manager' => 'required|exists:users,id',  // Validate that the manager exists
        ]);

        // Update the existing site using the validated data
        $site = Site::findOrFail($this->siteId);
        $site->update($validatedData);  // Update the site data

        // Show success flash message
        flash()->addSuccess($this->site_name . ' Site updated successfully!');

        // Redirect to the site list page
        return $this->redirect('/all/site');  // Adjust to your actual route
    }

    public function render()
    {
        return view('livewire.provinces.edit-site');
    }
}
