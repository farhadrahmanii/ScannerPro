<header>
    <div class="topbar d-flex align-items-center">
        <nav class="gap-3 navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>

            <div class="position-relative search-bar d-lg-block d-none" data-bs-toggle="modal"
                data-bs-target="#SearchModal">
                <input class="px-5 form-control" disabled type="search" placeholder="Search">
                <span class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 fs-5"><i
                        class='bx bx-search'></i></span>
            </div>

            @php
                $id = Auth::user()->id;
                $admin = App\models\User::findOrFail($id);
                $currentLocale = app()->getLocale();
                $languageName = [
                    'en' => 'English',
                    'fa' => 'دری',
                    'ps' => 'پشتو'
                ][$currentLocale];
            @endphp
            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item mobile-search-icon d-flex d-lg-none" data-bs-toggle="modal"
                        data-bs-target="#SearchModal">
                        <a class="nav-link" href="javascript:;"><i class='bx bx-search'></i>
                        </a>
                    </li>
                    
                    <li class="nav-item dropdown dropdown-laungauge d-none d-sm-flex" style="margin-right: 40px;">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                            data-bs-toggle="dropdown"><button class="btn btn-primary">{{ $languageName }}</button>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end text-center">
                            <li><a class="py-2 dropdown-item d-flex align-items-center"
                                    href="{{ route('language.switch', 'en') }}"><span class="ms-2">English</span></a>
                            </li>
                            <li><a class="py-2 dropdown-item d-flex align-items-center rounded"
                                    href="{{ route('language.switch', 'fa') }}"><span class="ms-2">دری</span></a></li>
                            <li><a class="py-2 dropdown-item d-flex align-items-center"
                                    href="{{ route('language.switch', 'ps') }}"><span class="ms-2">پشتو</span></a></li>
                        </ul>
                    </li>
                    <li class="nav-item dark-mode d-none d-sm-flex">
                        <a class="nav-link dark-mode-icon" href="javascript:;"><i class='bx bx-moon'></i>
                        </a>
                    </li>

                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                            data-bs-toggle="dropdown"><span class="alert-count">7</span>
                            <i class='bx bx-bell'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">Notifications</p>
                                    <p class="msg-header-badge">8 New</p>
                                </div>
                            </a>
                            <div class="header-notifications-list">
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="assets/images/avatars/avatar-1.png" class="msg-avatar"
                                                alt="user avatar">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">Daisy Anderson<span class="msg-time float-end">5 sec
                                                    ago</span></h6>
                                            <p class="msg-info">The standard chunk of lorem</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="notify bg-light-danger text-danger">dc
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">New Orders <span class="msg-time float-end">2
                                                    min
                                                    ago</span></h6>
                                            <p class="msg-info">You have recived new orders</p>
                                        </div>
                                    </div>
                                </a>

                            </div>
                            <a href="javascript:;">
                                <div class="text-center msg-footer">
                                    <button class="btn btn-primary w-100">View All Notifications</button>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span
                                class="alert-count">8</span>
                            <i class='fadeIn animated bx bx-transfer'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">My Transactions</p>
                                    <p class="msg-header-badge">0 Transactions</p>
                                </div>
                            </a>
                            <div class="header-message-list">


                            </div>

                        </div>
                    </li>
                </ul>
            </div>
            <div class="px-3 user-box dropdown">
                <a class="gap-3 d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ !empty($admin->photo) ? asset($admin->photo) : url('uploads/default.png')  }}"
                        class="user-img" alt="user avatar">
                    <div class="user-info">
                        <p class="mb-0 user-name">{{$admin->name}}</p>
                        <p class="mb-0 designattion">{{$admin->email}}</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item d-flex align-items-center" href="{{route('user.profile')}}"><i
                                class="bx bx-user fs-5"></i><span>Profile</span></a>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center" href=""><i
                                class="bx bx-cog fs-5"></i><span>Update Password</span></a>
                    </li>
                    <li>
                        <div class="mb-0 dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="bx bx-log-out-circle"></i>
                            <span>{{ __('Log Out') }}</span>
                        </a>
                        <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                            @csrf
                        </form>
                    </li>


                </ul>
            </div>
        </nav>
    </div>

</header>

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