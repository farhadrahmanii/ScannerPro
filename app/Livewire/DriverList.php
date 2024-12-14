<?php

namespace App\Livewire;

use App\Models\Driver;
use Livewire\Component;

class DriverList extends Component
{
    public function placeholder()
    {
        return view('livewire.loading');
    }
    public function render()
    {
        $drivers = Driver::all();

        return view('livewire.driver-list', compact('drivers'));
    }
}
