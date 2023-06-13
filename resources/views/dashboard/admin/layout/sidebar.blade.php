 <!-- Sidebar Start -->
 <div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><img src="{{asset('assets/images/logo.png')}}" alt="" width="50"> {{env("APP_NAME")}}</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{url("storage/users/profile_image/".Auth::user()->file_path)}}" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{Auth::user()->name}}</h6>
                <span>{{Auth::user()->role}}</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{url("admin/dashboard")}}" class="nav-item nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }} "><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle {{ Request::is('admin/user') ? 'active' : '' }}" data-bs-toggle="dropdown"><i class="fas fa-user me-2"></i>users</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{url("admin/user/")}}" class="dropdown-item {{ Request::is('admin/user') ? 'active' : '' }}">All Users</a>
                    <a href="{{url("admin/user/create")}}" class="dropdown-item {{ Request::is('admin/user/create') ? 'active' : '' }}">Create User</a>

                </div>
            </div>
            <!-- <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Sessions</a> -->
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle {{ Request::is('admin/sessions') ? 'active' : '' }}" data-bs-toggle="dropdown"><i class="fas fa-clock me-2"></i>Sessions</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{url("admin/sessions")}}" class="dropdown-item {{ Request::is('admin/sessions') ? 'active' : '' }}">All Sessions</a>
                    <a href="{{url("admin/sessions/create")}}" class="dropdown-item">Create Session</a>
                    <a href="{{url("scan")}}" class="dropdown-item">Scan Card</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle {{ Request::is('admin/kitchen') ? 'active' : '' }}" data-bs-toggle="dropdown"><i class="fas fa-hamburger me-2"></i>Kitchen</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{url("admin/kitchen")}}" class="dropdown-item {{ Request::is('admin/kitchen') ? 'active' : '' }}">All Products</a>
                    <a href="{{url("admin/kitchen/create")}}" class="dropdown-item">Add Products</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle {{ Request::is('admin/gallery') ? 'active' : '' }}" data-bs-toggle="dropdown"><i class="fab fa-envira me-2"></i>Gallery</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{url("admin/gallery")}}" class="dropdown-item {{ Request::is('admin/gallery') ? 'active' : '' }}">All Products</a>
                    <a href="{{url("admin/gallery/create")}}" class="dropdown-item">Add Products</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle {{ Request::is('admin/stationary') ? 'active' : '' }}" data-bs-toggle="dropdown"><i class="fas fa-pen-nib me-2"></i>Stationary</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{url("admin/stationary")}}" class="dropdown-item {{ Request::is('admin/stationary') ? 'active' : '' }}">All Products</a>
                    <a href="{{url("admin/stationary/create")}}" class="dropdown-item">Add Products</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle {{ Request::is('admin/settings') ? 'active' : '' }}" data-bs-toggle="dropdown"><i class="fas fa-cogs me-2"></i>Settings</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{url("admin/settings")}}" class="dropdown-item {{ Request::is('admin/settings') ? 'active' : '' }}">Global Settings</a>
                </div>
            </div>
        </div>
    </nav>
</div>
<!-- Sidebar End -->

