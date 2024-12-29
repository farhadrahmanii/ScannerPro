<?php

namespace App\Livewire\Provinces;

use App\Models\Provinces;
use App\Models\Site;
use Livewire\Component;

class AddSite extends Component
{

    public $provinces;
    public $site_name;
    public $provinces_id;
    public $site_manager;
    public $site_manager_contact_details;

    public function mount()
    {
        $this->provinces = Provinces::get();
    }
    protected $messages = [
        'provinces_id.required' => 'Please Select Province first!',
        'site_name.required' => 'Enter Site Name!',
        'site_manager' => 'Site Manager is required',
        'site_manager_contact_details' => 'Site Contact Details is required',

    ];
    public function save()
    {
        $validatedData = $this->validate([
            'provinces_id' => 'required|numeric',
            'site_name' => 'required|string|max:255',
            'site_manager' => 'required|string|max:255',
            'site_manager_contact_details' => 'required',
        ]);

        Site::create($validatedData);

        flash()->addSuccess($this->site_name . ' Site added successfully');
        return $this->redirect('/all/site', navigate: true);
    }
    public function placeholder()
    {
        return view('livewire.form-loading');
    }
    public function render()
    {
        return view('livewire.provinces.add-site');
    }
}
