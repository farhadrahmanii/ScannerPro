<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('assets/images/logo-icon.png') }}" class="logo-icon" width="" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">{{ __('sidebar.admin') }}</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{route('dashboard')}}">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">{{ __('sidebar.dashboard') }}</div>
            </a>
        </li>
        <li>
            @if (Auth::user()->can('driver.list'))
                <a href="{{route('all.drivers')}}">
                    <div class="parent-icon"> <img src="{{asset('images/icons/driver.png')}}" class="logo-icon"
                            width="80px" />
                    </div>
                    <div class="menu-title">{{ __('sidebar.drivers') }}</div>
                </a>
            @endif
        </li>

        <li>
            @if (Auth::user()->can('vehicle.list'))
                <a href="{{ route('all.vehicles') }}">
                    <div class="parent-icon"><i class="fa fa-truck" aria-hidden="true"></i>
                    </div>
                    <div class="menu-title">{{ __('sidebar.vehicles') }}</div>
                </a>
            @endif
        </li>

        <li>
            @if (Auth::user()->can('transaction.list'))

                <a href="{{route('all.transactions')}}">
                    <div class="parent-icon"><i class="fadeIn animated"><img src="{{asset('images/icons/transaction.png')}}"
                                class="logo-icon" width="80px" /></i>
                    </div>
                    <div class="menu-title">{{ __('sidebar.transactions') }}</div>
                </a>
            @endif
        </li>

        <li class="menu-label">{{ __('sidebar.settings') }}</li>
        <li>
            <a href="#" class="has-arrow">
                <div class="parent-icon"><i class='lni lni-cog'></i>
                </div>
                <div class="menu-title">{{ __('sidebar.system_settings') }}</div>
            </a>
            <ul>
                <li>
                    @if (Auth::user()->can('transport.company.list'))
                        <a href="{{ route('all.transportCompany')}}">
                            <div class="parent-icon"><i class="fadeIn animated lni lni-apartment"></i>
                            </div>
                            <div class="menu-title">{{ __('sidebar.transport_company') }}</div>
                        </a>
                    @endif
                </li>
                <li>
                    @if (Auth::user()->can('consignee.company.list'))
                        <a href="{{ route('all.consigneeCompany')}}">
                            <div class="parent-icon"><i class="fadeIn animated bx bx-buildings"></i>
                            </div>
                            <div class="menu-title">{{ __('sidebar.consignee_company') }}</div>
                        </a>
                    @endif
                </li>
                <li>
                    @if (Auth::user()->can('site.list'))
                        <a href="{{ route('province.site')}}">
                            <div class="parent-icon"><i class="fadeIn animated bx bx-location-plus"></i>
                            </div>
                            <div class="menu-title">{{ __('sidebar.province') }}</div>
                        </a>
                    @endif
                </li>

                <li>
                    @if (Auth::user()->can('site.list'))
                        <a href="{{ route('site')}}">
                            <div class="parent-icon"><i class='bx bx-current-location'></i>
                            </div>
                            <div class="menu-title">{{ __('sidebar.sites') }}</div>
                        </a>
                    @endif
                </li>


                <li>
                    <a href="{{route('users.list')}}">
                        <div class="parent-icon"><i class="fadeIn animated bx bx-user"></i>
                        </div>
                        <div class="menu-title">{{ __('sidebar.users') }}</div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Role and Permission Links -->
        <li class="menu-label">{{ __('sidebar.roles_permissions') }}</li>
        <li>
            <a href="#" class="has-arrow">
                <div class="parent-icon"><i class='lni lni-protection'></i>
                </div>
                <div class="menu-title">{{ __('sidebar.roles') }}</div>
            </a>
            <ul>
                @if (Auth::user()->can('Permission.list'))
                    <li> <a href="{{ route('all.permissions') }}"><i
                                class='bx bx-radio-circle'></i>{{ __('sidebar.all_permissions') }}</a>
                    </li>
                @endif

                <li>
                    <a href="{{route('all.roles')}}"><i class='bx bx-radio-circle'></i>{{ __('sidebar.all_roles') }}</a>
                </li>

                <li> <a href="{{route('all.roles.permission')}}"><i
                            class='bx bx-radio-circle'></i>{{ __('sidebar.all_roles_permissions') }}</a>
                </li>

            </ul>
        </li>
    </ul>
    <!--end navigation-->
</div>
<script>
    function reinitializeComponents() {
        // Reinitialize any JavaScript components here
        // Example: reinitialize tooltips, dropdowns, etc.
        // $('[data-toggle="tooltip"]').tooltip();
        // $('.dropdown-toggle').dropdown();
    }

    document.addEventListener('live', function () {
        reinitializeComponents();
    });

    document.addEventListener('livewire:load', function () {
        reinitializeComponents();
    });

    document.addEventListener('DOMContentLoaded', function () {
        reinitializeComponents();
    });
</script>