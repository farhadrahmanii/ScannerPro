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
        $userId = auth()->user()->id;
        $userSiteId = auth()->user()->site_id;
        $this->totalVehicles = Vehicle::where('site_id', $userSiteId)->count();
        $this->totalDrivers = Driver::where('site_id', $userSiteId)->count();
        $this->totalTransactions = Transaction::where('site_id', $userSiteId)->count();
        $this->totalUsers = User::where('site_id', $userSiteId)->count();
    }

    private function loadChartData()
    {
        $this->chartData = [
            'labels' => [
                __('home_wedgetslivewire.vehicles'),
                __('home_wedgetslivewire.drivers'),
                __('home_wedgetslivewire.transactions'),
                __('home_wedgetslivewire.users'),
            ],
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
