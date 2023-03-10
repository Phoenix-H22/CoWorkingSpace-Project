 <!-- Sidebar Start -->
 <div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>{{env("APP_NAME")}}</h3>
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
            <a href="{{url("admin/")}}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>users</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{url("admin/user/")}}" class="dropdown-item">All Users</a>
                    <a href="{{url("admin/user/create")}}" class="dropdown-item">Create User</a>

                </div>
            </div>
            <!-- <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Sessions</a> -->
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Sessions</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{url("admin/sessions")}}" class="dropdown-item">All Sessions</a>
                    <a href="{{url("admin/sessions/create")}}" class="dropdown-item">Create Session</a>
                    <a href="{{url("admin/sessions/scan")}}" class="dropdown-item">Scan Card</a>
                </div>
            </div>
        </div>
    </nav>
</div>
<!-- Sidebar End -->

