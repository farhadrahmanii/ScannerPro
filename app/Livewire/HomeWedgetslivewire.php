<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Vehicle;
use App\Models\Driver;
use App\Models\Transaction;
use App\Models\User;

class HomeWedgetslivewire extends Component
{
    public $totalVehicles;
    public $totalDrivers;
    public $totalTransactions;
    public $totalUsers;

    public $chartData;

    public function mount()
    {
        $this->loadStatistics();
        $this->loadChartData();
    }

    private function loadStatistics()
    {
        $this->totalVehicles = Vehicle::count();
        $this->totalDrivers = Driver::count();
        $this->totalTransactions = Transaction::count();
        $this->totalUsers = User::count();
    }

    private function loadChartData()
    {
        $this->chartData = [
            'labels' => ['Vehicles', 'Drivers', 'Transactions', 'Users'],
            'data' => [
                $this->totalVehicles,
                $this->totalDrivers,
                $this->totalTransactions,
                $this->totalUsers,
            ],
            'colors' => ['#17a2b8', '#dc3545', '#28a745', '#ffc107'],
        ];
    }
    public function placeholder()
    {
        return view('livewire.loading');
    }

    public function render()
    {
        return view('livewire.home-wedgetslivewire');
    }
}
