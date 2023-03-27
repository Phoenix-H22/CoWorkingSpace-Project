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
                <div class="row">
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Update Product</h6>
                            <form action="{{route("admin.gallery.update",$product->id)}}" method="post">
                                <div class="form-floating mb-3">
                                    @csrf
                                    <input type="text" class="form-control" id="floatingInput" value="{{$product->name}}" name="name" placeholder="Tea">
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="floatingInput">Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <!-- Description Textarea -->
                                    <textarea class="form-control" placeholder="Product Description" id="floatingTextarea2" style="height: 100px" value="{{$product->description}}" name="description"></textarea>
                                    @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="floatingPassword">Description</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingInput" name="quantity" value="{{$product->quantity}}" placeholder="200">
                                    @error('quantity')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="floatingInput">Quantity</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" step="0.01" class="form-control" id="floatingPassword" name="price" value="{{$product->price}}" placeholder="20.5">
                                    @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="floatingPassword">Price</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" step="0.01" class="form-control" id="floatingPassword" name="cost" value="{{$product->cost}}" placeholder="20.5">
                                    @error('cost')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="floatingPassword">Cost</label>
                                </div>

                                <!-- Status Button -->
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" aria-label="Status" name="status">
                                        <option value="1" @if($product->status == 1) selected @else  @endif >Active</option>
                                        <option value="0" @if($product->status == 0) selected @else  @endif >Inactive</option>
                                    </select>
                                    @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="floatingInput">Status</label>
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

                                <button class="btn btn-primary" type="submit">Update</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>



        @include('dashboard.admin.layout.footer')
</body>

</html>
