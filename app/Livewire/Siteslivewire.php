<?php

namespace App\Livewire;

use App\Models\Site;
use Livewire\Component;

class Siteslivewire extends Component
{

    public function placeholder()
    {
        return view("livewire.loading");
    }
    public function render()
    {
        $sites = Site::all();
        return view('livewire.provinces.siteslivewire', compact('sites'));
    }
}
