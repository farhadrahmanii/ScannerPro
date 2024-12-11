<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Admin</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li class="menu-label"></li>
        <li>
            <a href="{{route('all.drivers')}}">
                <div class="parent-icon"> <i class="fadeIn animated bx bx-taxi"></i>
                </div>
                <div class="menu-title">Drivers</div>
            </a>
        </li>
        <li>

            <!-- <li class="menu-label"></li> -->
            <a href="{{ route('all.vehicles') }}">
                <div class="parent-icon"><i class="fa fa-truck" aria-hidden="true"></i>
                </div>
                <div class="menu-title">Vehicles</div>
            </a>
        </li>
        <li>

            <!-- <li class="menu-label"></li> -->
            <a href="{{route('all.transactions')}}">
                <div class="parent-icon"><i class="fadeIn animated"><img src="{{asset('images/icons/transaction.png')}}"
                            class="logo-icon" width="100px" /></i>
                </div>
                <div class="menu-title">Transactions</div>
            </a>
        </li>

        </li>
        <li class="menu-label">System Settings</li>
        <li>

            <a href="{{ route('province.site')}}">
                <div class="parent-icon"><i class="fadeIn animated bx bx-location-plus"></i>
                </div>
                <div class="menu-title">Province Sites</div>
            </a>
        </li>
        <li>

            <a href="{{route('users.list')}}">
                <div class="parent-icon"><i class="fadeIn animated bx bx-user"></i>
                </div>
                <div class="menu-title">Users</div>
            </a>
        </li>



    </ul>
    <!--end navigation-->
</div>