<?php

namespace App\Livewire\Provinces;

use App\Models\Provinces;
use App\Models\Site;
use Livewire\Component;

class AddSite extends Component
{

    public $provinces;
    public $site_name;
    public $p_id;

    public function mount()
    {
        $this->provinces = Provinces::get();
    }
    protected $messages = [
        'p_id.required' => 'Please Select Province first!',
        'site_name.required' => 'Enter Site Name!',
    ];
    public function save()
    {
        $validatedData = $this->validate([
            'p_id' => 'required|numeric',
            'site_name' => 'required|string|max:255',
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
