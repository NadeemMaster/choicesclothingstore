<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <img src="{{ asset( $setting->logo ) }}" alt="Logo" width="150" height="50"
        class="d-inline-block align-text-top mx-3">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            <li class="nav-item">
                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ Route('index') }}">Home</a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('collections') ? 'active' : '' }}" href="{{ Route('indexcategories') }}">Categories</a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}" href="{{ Route('contactus') }}">Contact
                    us</a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="{{ Route('aboutus') }}">About
                    us</a>
            </li>

        </ul>

        <form class="d-flex mx-3" action="{{ route('search') }}" method="GET">
            <input class="form-control me-2" name="searchbar" value="{{Request::get('searchbar')}}" placeholder="Search here" />
                <a class="my-2 mt-2" type="submit"><i class="fa fa-search fa-lg text-white"></i></a>
        </form>

        <ul class="navbar-nav">
                        
            <li class="nav-item">
                <a class="nav-link {{ Request::is('customer/viewcart') ? 'active' : '' }}" href="{{ Route('viewcart') }}">
                    <i class="fa fa-shopping-cart"></i> Cart (<livewire:cart.cart-item-counter />)
                </a>
            </li>

            @if (session()->has('admin') && session()->has('customer'))
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ Request::is('customer/dashboard') ? 'active' : '' }}"
                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Session::get('customername') }}
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ Route('dashboard') }}">Dashboard</a></li>
                    <li><a class="dropdown-item" href="{{ Route('logout') }}">Logout</a></li>
                </ul>

            </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ Session::get('adminname') }}
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ Route('admindashboard') }}">Dashboard</a></li>
                        <li><a class="dropdown-item" href="{{ Route('adminlogout') }}">Logout</a></li>
                    </ul>

                </li>

            @elseif (session()->has('customer'))

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ Request::is('customer/dashboard') ? 'active' : '' }}"
                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Session::get('customername') }}
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ Route('dashboard') }}">Dashboard</a></li>
                    <li><a class="dropdown-item" href="{{ Route('logout') }}">Logout</a></li>
                </ul>

            </li>

            <li class="nav-item">
                    <a class="nav-link" href="{{ Route('adminloginform') }}">Admin</a>
                </li>

            @elseif (session()->has('admin'))

            <li class="nav-item">
                <a class="nav-link"
                    href="{{ Route('loginform') }}">
                    Login
                </a>
            </li>

            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ Session::get('adminname') }}
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ Route('admindashboard') }}">Dashboard</a></li>
                        <li><a class="dropdown-item" href="{{ Route('adminlogout') }}">Logout</a></li>
                    </ul>

                </li>

            @else

            <li class="nav-item">
                <a class="nav-link"
                    href="{{ Route('loginform') }}">
                    Login
                </a>
            </li>

            <li class="nav-item">
                    <a class="nav-link" href="{{ Route('adminloginform') }}">Admin</a>
                </li>

            @endif

        </ul>

    </div>

</nav>
