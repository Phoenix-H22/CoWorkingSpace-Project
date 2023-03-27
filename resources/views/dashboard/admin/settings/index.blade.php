<!DOCTYPE html>
<html lang="en">
@include('dashboard.admin.layout.header')

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        @include('dashboard.admin.layout.sidebar')


        <!-- Content Start -->
        <div class="content">
    @include('dashboard.admin.layout.navbar')

    <br>            <br>


            <div class="container">
                @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                <div class="row">
                    <div class="col-12">

                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Update Settings</h6>
                            <form action="{{route('admin.settings.store')}}" method="post">
                                <div class="form-floating mb-3">
                                    @csrf
                                    <input type="text" class="form-control" id="floatingInput" value="{{$settings->shared_area_price_per_hour}}" name="shared_area_price_per_hour" placeholder="Shared Area Price">
                                    @error('sharedAreaPrice')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="floatingInput">Shared Area Price Per Hour</label>
                                </div>
                                <div class="form-floating mb-3">

                                    <input type="text" class="form-control" id="floatingInput" value="{{$settings->small_room_price_per_hour}}" name="small_room_price_per_hour" placeholder="Small Room Price Per Hour">
                                    @error('small_room_price_per_hour')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="floatingPassword">Small Room Price Per Hour</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" value="{{$settings->big_room_price_per_hour}}" name="big_room_price_per_hour" placeholder="Big Room Price Per Hour">
                                    @error('small_room_price_per_hour')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="floatingPassword">Big Room Price Per Hour</label>
                                </div>
                                <!-- Status Button -->
                                <!-- <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" aria-label="Status" name="status">
                                        <option value="1" >Active</option>
                                        <option value="0" >Inactive</option>
                                    </select>
                                    @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="floatingInput">Status</label>
                                </div> -->
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

                                <button class="btn btn-primary" type="submit">Update</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>



        @include('dashboard.admin.layout.footer')
</body>

</html>
