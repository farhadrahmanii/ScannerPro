<?php

namespace App\Livewire;

use App\Models\Provinces;
use Livewire\Component;

class ProvinceLivewire extends Component
{
    public $provinces = []; // Declare property to hold province data

    public function mount()
    {
        // Fetch provinces during component initialization
        $this->provinces = Provinces::all();
    }
    public function placeholder()
    {
        return view('livewire.loading');
    }
    public function deleteProvince($id)
    {
        // Find and delete the province
        $province = Provinces::findOrFail($id);
        $province->delete();

        // Flash message (Livewire)
        session()->flash('message', 'The Province is Deleted Successfully');
    }

    public function render()
    {
        $provinces = Provinces::all();
        // Return the view with the fetched data
        return view('livewire.province-livewire', compact('provinces'));
    }
}
