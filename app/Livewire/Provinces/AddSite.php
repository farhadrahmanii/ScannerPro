<?php

namespace App\Livewire\Provinces;

use App\Models\Provinces;
use App\Models\Site;
use App\Models\User;
use Livewire\Component;

class AddSite extends Component
{

    public $provinces;
    public $user;
    public $site_name;
    public $provinces_id;
    public $site_manager;

    public function mount()
    {
        $this->provinces = Provinces::get();
        $this->user = User::get();

    }
    protected $messages = [
        'provinces_id.required' => 'Please Select Province first!',
        'site_name.required' => 'Enter Site Name!',
        'site_manager' => 'Site Manager is required',

    ];
    public function save()
    {
        $validatedData = $this->validate([
            'provinces_id' => 'required|numeric',
            'site_name' => 'required|max:255',
            'site_manager' => 'required|exists:users,id',
        ]);

        Site::create($validatedData);

        flash()->addSuccess($this->site_name . ' Site added successfully');
        return $this->redirect('/all/site');
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
