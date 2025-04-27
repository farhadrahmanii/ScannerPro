<?php

namespace App\Livewire;

use App\Models\Provinces;
use Livewire\Component;

class ProvinceLivewire extends Component
{
    public $provinces = []; // Declare property to hold province data
    protected $listeners = ['deleteProvince' => 'deleteProvince'];
    public function mount()
    {
        // Fetch provinces during component initialization
        $this->provinces = Provinces::all();
    }
    public function placeholder()
    {
        return view('livewire.loading');
    }
    public function deleteProvince($siteId)
    {
        $site = Provinces::find($siteId);
        if ($site) {
            $site->delete();
            flash()->success('Province deleted successfully!');
        }
        return $this->redirect('/all/province');
    }

    public function render()
    {
        $provinces = Provinces::all();
        // Return the view with the fetched data
        return view('livewire.provinces.province-livewire', compact('provinces'));
    }
}
