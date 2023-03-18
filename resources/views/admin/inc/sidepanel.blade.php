<!-- Side Navbar -->

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        @if (session()->has('admin'))
            <li class="nav-item">
                <a class="nav-link" href="{{ Route('index') }}">
                    <i class="mdi mdi-home menu-icon"></i>
                    <span class="menu-title">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ Route('admindashboard') }}">
                    <i class="mdi mdi-view-dashboard menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ Route('indexproduct') }}">
                    <i class="mdi mdi-shopping menu-icon"></i>
                    <span class="menu-title">Products</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ Route('indexcategory') }}">
                    <i class="mdi mdi-folder menu-icon"></i>
                    <span class="menu-title">Categories</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ Route('indexsubcategory') }}">
                    <i class="mdi mdi-folder-multiple menu-icon"></i>
                    <span class="menu-title">Sub Categories</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ Route('adminindexorders') }}">
                    <i class="mdi mdi-sale menu-icon"></i>
                    <span class="menu-title">Orders</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ Route('indexcontactus') }}">
                    <i class="mdi mdi-mail menu-icon"></i>
                    <span class="menu-title">Messages</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                    <i class="mdi mdi-account-convert menu-icon"></i>
                    <span class="menu-title">Users</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="auth">
                    <ul class="nav flex-column sub-menu">
                        <a class="nav-link" href="{{ Route('adminindex') }}"><i
                                class="mdi mdi-account-star menu-icon"></i>Admins </a>
                        <a class="nav-link" href="{{ route('customerindex') }}"><i
                                class="mdi mdi-account menu-icon"></i>Customers </a>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('indexslider') }}">
                    <i class="mdi mdi-view-carousel menu-icon"></i>
                    <span class="menu-title">Slider</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('settings') }}">
                    <i class="mdi mdi-settings menu-icon"></i>
                    <span class="menu-title">Settings</span>
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
