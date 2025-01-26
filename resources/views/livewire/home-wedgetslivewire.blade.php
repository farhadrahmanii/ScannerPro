<div class="page-content">
    <h1>{{ __('home_wedgetslivewire.welcome') }}</h1><br>
    @php
        //   $countries = App\Models\Country::all();
        //   foreach ($countries as $country) {
        //echo $country->translated_name; // Displays the name based on app locale
        //    }
    @endphp
    <!-- Stat Cards -->
    <p class="alert alert-warning" wire:offline>
        Whoops, your device has lost connection. The web page you are viewing is offline.
    </p>
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
        <div class="col">
            <div class="border-0 border-4 card radius-10 border-start border-info">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">{{ __('home_wedgetslivewire.total_transactions') }}</p>
                            <h4 class="my-1 text-info">{{ $totalTransactions }}</h4>
                            <p class="mb-0 font-13">+2 Today</p>
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
                            <p class="mb-0 font-13">+5.4% Today</p>
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
                            <p class="mb-0 font-13">+3.2% Today</p>
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
                            <p class="mb-0 font-13">+8.4% Today</p>
                        </div>
                        <div class="text-white widgets-icons-2 rounded-circle bg-gradient-orange ms-auto"><i
                                class='bx bxs-group'></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 ">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0">registeration Rate</p>
                            <h5 class="mb-0"></h5>
                        </div>
                        <div class="dropdown ms-auto">
                            <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                data-bs-toggle="dropdown"> <i class='bx bx-dots-horizontal-rounded font-22'></i>
                            </div>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:;">Action</a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="" id="w-chart8"></div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0">Transaction Entry Rate</p>
                            <h5 class="mb-0">51.46%</h5>
                        </div>
                        <div class="dropdown ms-auto">
                            <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                data-bs-toggle="dropdown"> <i class='bx bx-dots-horizontal-rounded font-22'></i>
                            </div>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:;">Action</a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="" id="w-chart4"></div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0">Vehicle Entry Rate</p>
                            <h5 class="mb-0">60.45%</h5>
                        </div>
                        <div class="dropdown ms-auto">
                            <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                data-bs-toggle="dropdown"> <i class='bx bx-dots-horizontal-rounded font-22'></i>
                            </div>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:;">Action</a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="" id="w-chart7"></div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0">Drivers Entry Rate</p>
                            <h5 class="mb-0">21.74%</h5>
                        </div>
                        <div class="dropdown ms-auto">
                            <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                data-bs-toggle="dropdown"> <i class='bx bx-dots-horizontal-rounded font-22'></i>
                            </div>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:;">Action</a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="" id="w-chart2"></div>
                </div>
            </div>
        </div>
    </div><!--end row-->

    <!-- Bar Chart -->
    <div class="row mt-4">

        <div class="col-6">
            <div class="card radius-10">
                <div class="card-header">
                    <h6 class="mb-0">Statistics Overview</h6>
                </div>
                <div class="card-body">
                    <canvas id="chart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card radius-10">
                <div class="card-header">
                    <h6 class="mb-0">Polar Area Chart</h6>
                </div>
                <div class="card-body">
                    <canvas id="polarChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Polar Area Chart -->
    <div class="row mt-4">

    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Bar Chart
        const barCtx = document.getElementById('chart').getContext('2d');
        new Chart(barCtx, {
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
        new Chart(polarCtx, {
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
    });
</script>