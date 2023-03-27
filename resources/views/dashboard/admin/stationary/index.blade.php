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
                            <div class="row mb-2">
                               <div class="col-6">
                                <h6 class="ms-auto d-inline">Products Table</h6>
                               </div>
                            <div class="col-6 position-relative mb-2">
                                <a href="{{route('admin.stationary.create')}}" class="btn btn-primary" style="position: absolute;right: 0;">Add Product</a>
                                <br>
                            </div>

                            </div>
                            <br>
                            <div class="table-responsive"  style="height: 50vh;overflow: scroll;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Sold</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Cost</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($products as $product)
                                        <tr>
                                            <th scope="row">{{$product->id}}</th>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->quantity}}</td>
                                            <td>{{$product->sold}}</td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->cost}}</td>
                                            <td>{{$product->status}}</td>
                                            <td>
                                                <a href="{{route('admin.stationary.edit',$product->id)}}" class="btn btn-primary">Edit</a>
                                                <a href="{{route('admin.stationary.delete',$product->id)}}" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        @include('dashboard\admin\layout\footer')
</body>

</html>
