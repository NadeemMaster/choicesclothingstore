<!-- Side Navbar -->

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        @if (session()->has('customer'))
            <li class="nav-item">
                <a class="nav-link" href="{{ Route('index') }}">
                    <i class="mdi mdi-home menu-icon"></i>
                    <span class="menu-title">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ Route('dashboard') }}">
                    <i class="mdi mdi-view-dashboard menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('indexorder') }}">
                    <i class="mdi mdi-sale menu-icon"></i>
                    <span class="menu-title">Orders</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('customer/viewcart') ? 'active' : '' }}"
                    href="{{ Route('viewcart') }}">
                    <i class="mdi mdi mdi-cart menu-icon"></i>
                    <span class="menu-title"> Cart (
                        <livewire:cart.cart-item-counter />)
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ Route('contactus') }}">
                    <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                    <span class="menu-title">Contact Us</span>
                </a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" href="{{ Route('index') }}">
                    <i class="mdi mdi-home menu-icon"></i>
                    <span class="menu-title">Home</span>
                </a>
            </li>

            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ Route('contactus') }}">
                    <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                    <span class="menu-title">Contact Us</span>
                </a>
            </li>
        @endif
    </ul>
</nav>
