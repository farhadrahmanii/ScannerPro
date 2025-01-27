<?php 
use Livewire\Component;

class HomeWedgetsLivewire extends Component
{
    protected $listeners = ['fetchChartData' => 'updateChartData'];

    public function updateChartData()
    {
        $chartData = [
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            'data' => [240, 160, 671, 414, 555, 257, 901, 613, 727, 414, 555, 257],
            'name' => 'Statistics',
            'colors' => ['#17a00e', '#f41127', '#0d6efd', '#ffb207']
        ];

        $this->emit('updateChartData', $chartData);
    }
}
