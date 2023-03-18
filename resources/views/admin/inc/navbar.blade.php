    <!-- Navbar -->

    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex justify-content-center">
            <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
                <a class="navbar-brand brand-logo" href="{{ Route('index') }}">
                    <img src="{{ asset($setting->logo) }}" alt="logo" />
                </a>
                <a class="navbar-brand brand-logo-mini" href="{{ Route('index') }}">
                    <img src="{{ asset($setting->logo_mini) }}" alt="logo" />
                </a>
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-sort-variant"></span>
                </button>
            </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            @if (session()->has('admin'))
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="" data-bs-toggle="dropdown"
                            id="profileDropdown">
                            <img src="{{ asset(Session::get('adminimage')) }}" alt="profile" />
                            <span class="nav-profile-name">{{ Session::get('adminname') }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a href="{{ Route('adminlogout') }}" class="dropdown-item">
                                <i class="mdi mdi-logout text-primary"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                @else
                    <ul class="navbar-nav mr-lg-4 w-100">
                        <li class="nav-item">
                            <strong>Please login to continue.</strong>
                        </li>
                    </ul>
            @endif
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
