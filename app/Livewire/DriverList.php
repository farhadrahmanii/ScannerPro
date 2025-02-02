<?php

namespace App\Livewire;

use App\Models\Driver;
use Livewire\Component;
use Livewire\WithPagination;

class DriverList extends Component
{
    use WithPagination;

    public function render()
    {
        $drivers = Driver::paginate(10); // Fetch 10 drivers per page

        return view('livewire.drivers.driver-list', compact('drivers'));
    }
}
