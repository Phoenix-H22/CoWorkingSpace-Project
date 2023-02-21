<!DOCTYPE html>
<html lang="en">
@include('dashboard\admin\layout\header')

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        @include('dashboard\admin\layout\sidebar')


        <!-- Content Start -->
        <div class="content">
    @include('dashboard\admin\layout\navbar')

    <br>            <br>


            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Creating New Session</h6>
                            <form action="{{url("admin/user/store")}}" method="post">
                                <div class="form-floating mb-3">
                                    @csrf
                                    <input type="text" class="form-control" id="floatingInput" name="name" placeholder="Ahmed">
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="floatingInput">Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="floatingInput">Email address</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                                    @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="floatingPassword">Password</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingInput" name="phone" placeholder="01069683986">
                                    @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="floatingInput">Phone Number</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" aria-label="Role" name="role">

                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                    @error('role')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="floatingSelect">Role</label>
                                </div>
                                @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                                @endif
                                @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                                @endif

                                <button class="btn btn-primary" type="submit">Create</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>



        @include('dashboard\admin\layout\footer')
</body>

</html>
