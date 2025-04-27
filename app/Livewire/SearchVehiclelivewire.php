<?php
namespace App\Livewire;

use App\Models\Vehicle;
use Livewire\Component;
use Livewire\WithPagination;

class SearchVehiclelivewire extends Component
{
    use WithPagination;

    public $search = '';

    // Reset pagination when search changes
    public function updatingSearch()
    {
        $this->resetPage(); // Reset pagination
        // Emit search event
        $this->emit('vehicleSearchUpdated', $this->search);
    }

    public function render()
    {
        $vehicles = Vehicle::with('driver')
            ->where(function ($query) {
                $query->whereHas('driver', function ($subQuery) {
                    $subQuery->where('name', 'like', '%' . $this->search . '%');
                })
                    ->orWhere('vehicle_make', 'like', '%' . $this->search . '%')
                    ->orWhere('vehicle_model', 'like', '%' . $this->search . '%')
                    ->orWhere('plate_number', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);

        return view('livewire.vehicles.search-vehiclelivewire', compact('vehicles'));
    }
}