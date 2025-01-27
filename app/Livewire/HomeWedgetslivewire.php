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
    public $transactionRate;
    public $vehicleRate;
    public $driverRate;
    public $totalMoneyCollectedToday;

    public $dailyTransactionRate; // New property for daily transaction rate
    public $dailyVehicleRate; // New property for daily vehicle rate
    public $dailyDriverRate; // New property for daily driver rate
    public $chartData;

    public function mount()
    {
        $this->loadStatistics();
        $this->loadChartData();
    }

    private function loadStatistics()
    {
        $userSiteId = auth()->user()->site_id;

        $this->totalVehicles = Vehicle::where('site_id', $userSiteId)->count();
        $this->totalDrivers = Driver::where('site_id', $userSiteId)->count();
        $this->totalTransactions = Transaction::where('site_id', $userSiteId)->count();
        $this->totalUsers = User::where('site_id', $userSiteId)->count();

        // Calculate total money collected today
        $this->totalMoneyCollectedToday = Transaction::where('site_id', $userSiteId)
            ->whereDate('payment_time', today())
            ->sum('fees_amount');

        // Calculate daily registration rates
        $this->dailyTransactionRate = Transaction::where('site_id', $userSiteId)
            ->whereDate('created_at', today())
            ->count();
        $this->dailyVehicleRate = Vehicle::where('site_id', $userSiteId)
            ->whereDate('created_at', today())
            ->count();
        $this->dailyDriverRate = Driver::where('site_id', $userSiteId)
            ->whereDate('created_at', today())
            ->count();
    }

    private function loadChartData()
    {
        $this->chartData = [
            'labels' => [
                __('home_wedgetslivewire.vehicles'),
                __('home_wedgetslivewire.drivers'),
                __('home_wedgetslivewire.transactions'),
                __('home_wedgetslivewire.users'),
                __('home_wedgetslivewire.daily_transaction_rate'), // New label
                __('home_wedgetslivewire.daily_vehicle_rate'), // New label
                __('home_wedgetslivewire.daily_driver_rate'), // New label
            ],
            'data' => [
                $this->totalVehicles,
                $this->totalDrivers,
                $this->totalTransactions,
                $this->totalUsers,
                $this->dailyTransactionRate, // New data
                $this->dailyVehicleRate, // New data
                $this->dailyDriverRate, // New data
            ],
            'colors' => ['#17a2b8', '#dc3545', '#28a745', '#ffc107', '#007bff', '#6610f2', '#fd7e14'], // New colors
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
