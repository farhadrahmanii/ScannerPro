<div class="page-content">
    <h1>{{ __('home_wedgetslivewire.welcome') }} {{auth()->user()->site['site_name']}}</h1><br>
    <p class="alert alert-warning" wire:offline>
        {{ __('home_wedgetslivewire.offline_warning') }}
    </p>
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
        <div class="col">
            <div class="border-0 border-4 card radius-10 border-start border-info">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">{{ __('home_wedgetslivewire.total_transactions') }}</p>
                            <h4 class="my-1 text-info">{{ $totalTransactions }}</h4>
                            <p class="mb-0 font-13">{{ __('home_wedgetslivewire.today_increase', ['count' => 2]) }}</p>
                        </div>
                        <div class="text-white widgets-icons-2 rounded-circle ms-auto">
                            <img src="{{asset('images/icons/truckScanning.png')}}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="border-0 border-4 card radius-10 border-start border-danger">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">{{ __('home_wedgetslivewire.total_drivers') }}</p>
                            <h4 class="my-1 text-danger">{{ number_format($totalDrivers, 2) }}</h4>
                            <p class="mb-0 font-13">
                                {{ __('home_wedgetslivewire.today_increase_percentage', ['percentage' => 5.4]) }}
                            </p>
                        </div>
                        <div class="text-white widgets-icons-2 rounded-circle ms-auto bg-gradient-burning">
                            <img src="{{asset('images/icons/driver.png')}}" height="30px" width="30px" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="border-0 border-4 card radius-10 border-start border-success">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">{{ __('home_wedgetslivewire.today_total_vehicles') }}</p>
                            <h4 class="my-1 text-success">{{ number_format($totalVehicles, 2) }}</h4>
                            <p class="mb-0 font-13">
                                {{ __('home_wedgetslivewire.today_increase_percentage', ['percentage' => 3.2]) }}
                            </p>
                        </div>
                        <div class="text-white widgets-icons-2 rounded-circle bg-gradient-ohhappiness ms-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-truck text-white">
                                <rect x="1" y="3" width="15" height="13"></rect>
                                <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                                <circle cx="5.5" cy="18.5" r="2.5"></circle>
                                <circle cx="18.5" cy="18.5" r="2.5"></circle>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="border-0 border-4 card radius-10 border-start border-warning">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">{{ __('home_wedgetslivewire.all_users') }}</p>
                            <h4 class="my-1 text-warning">{{ $totalUsers }}</h4>
                            <p class="mb-0 font-13">
                                {{ __('home_wedgetslivewire.today_increase_percentage', ['percentage' => 8.4]) }}
                            </p>
                        </div>
                        <div class="text-white widgets-icons-2 rounded-circle bg-gradient-orange ms-auto"><i
                                class='bx bxs-group'></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
        </div><!--end row-->
    </div>



    <!-- Bar Chart -->
    <div class="row mt-4">
        <div class="col-8">
            <div class="card radius-10">
                <div class="card-header">
                    <h6 class="mb-0">{{ __('home_wedgetslivewire.statistics_overview') }}</h6>
                </div>
                <div class="card-body">
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card radius-10">
                <div class="card-header">
                    <h6 class="mb-0">{{ __('home_wedgetslivewire.polar_area_chart') }}</h6>
                </div>
                <div class="card-body">
                    <canvas id="polarChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Polar Area Chart -->
    <div class="card radius-10 ">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div>
                    <p class="mb-0">{{ __('home_wedgetslivewire.registration_rate') }}</p>
                    <h5 class="mb-0"></h5>
                </div>
            </div>
            <div class="" id="w-chart3"></div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0">{{ __('home_wedgetslivewire.transaction_entry_rate') }}</p>
                        <h5 class="mb-0"></h5>
                    </div>
                </div>
                <div class="" id="w-chart4"></div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Bar Chart
        const barCtx = document.getElementById('barChart').getContext('2d');
        const barChart = new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: @json($chartData['labels']),
                datasets: [{
                    label: 'Statistics',
                    data: @json($chartData['data']),
                    backgroundColor: @json($chartData['colors']),
                    borderColor: @json($chartData['colors']),
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Polar Area Chart
        const polarCtx = document.getElementById('polarChart').getContext('2d');
        const polarChart = new Chart(polarCtx, {
            type: 'polarArea',
            data: {
                labels: @json($chartData['labels']),
                datasets: [{
                    data: @json($chartData['data']),
                    backgroundColor: @json($chartData['colors'])
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true
                    },
                    tooltip: {
                        enabled: true
                    }
                }
            }
        });

        // Livewire event listeners to update charts
        Livewire.on('updateChartData', chartData => {
            barChart.data.labels = chartData.labels;
            barChart.data.datasets[0].data = chartData.data;
            barChart.data.datasets[0].backgroundColor = chartData.colors;
            barChart.data.datasets[0].borderColor = chartData.colors;
            barChart.update();

            polarChart.data.labels = chartData.labels;
            polarChart.data.datasets[0].data = chartData.data;
            polarChart.data.datasets[0].backgroundColor = chartData.colors;
            polarChart.update();
        });

        // Fetch updated data from Livewire
        Livewire.emit('fetchChartData');
    });
</script>