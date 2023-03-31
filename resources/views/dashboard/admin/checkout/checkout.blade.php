<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset("assets/fonts/icomoon/style.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/bootstrap-select.min.css")}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset("assets/css/bootstrap.min.css")}}">
<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <title>CheckOut - {{env("APP_NAME")}}</title>
    <style>
        body {
    color: #000;
    overflow-x: hidden;
    height: 100%;
    background-color: #fff;
    background-repeat: no-repeat;
}

.plus-minus {
    position: relative;
}

.plus {
    position: absolute;
    top: -11px;
    left: 5px;
    cursor: pointer;
}

.minus {
    position: absolute;
    top: 8px;
    left: 5px;
    cursor: pointer;
}

.vsm-text:hover {
    color: #FF5252;
}

.book, .book-img {
    width: 120px;
    height: 180px;
    border-radius: 5px;
}

.book {
    margin: 20px 15px 5px 15px;
}

.border-top {
    border-top: 1px solid #EEEEEE !important;
    margin-top: 20px;
    padding-top: 15px;
}

.card {
    margin: 40px 0px;
    padding: 40px 50px;
    border-radius: 20px;
    border: none;
    box-shadow: 1px 5px 10px 1px rgba(0,0,0,0.2);
}

input, textarea {
    background-color: #F3E5F5;
    padding: 8px 15px 8px 15px;
    width: 100%;
    border-radius: 5px !important;
    box-sizing: border-box;
    border: 1px solid #F3E5F5;
    font-size: 15px !important;
    color: #000 !important;
    font-weight: 300;
}

input:focus, textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #9FA8DA;
    outline-width: 0;
    font-weight: 400;
}

button:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0;
}

.pay {
    width: 80px;
    height: 40px;
    border-radius: 5px;
    border: 1px solid #673AB7;
    margin: 10px 20px 10px 0px;
    cursor: pointer;
    box-shadow: 1px 5px 10px 1px rgba(0,0,0,0.2);
}

.gray {
    -webkit-filter: grayscale(100%);
    -moz-filter: grayscale(100%);
    -o-filter: grayscale(100%);
    -ms-filter: grayscale(100%);
    filter: grayscale(100%);
    color: #E0E0E0;
}

.gray .pay {
    box-shadow: none;
}

#tax {
    border-top: 1px lightgray solid;
    margin-top: 10px;
    padding-top: 10px;
}

.btn-blue {
    border: none;
    border-radius: 10px;
    background-color: #673AB7;
    color: #fff;
    padding: 8px 15px;
    margin: 20px 0px;
    cursor: pointer;
}

.btn-blue:hover {
    background-color: #311B92;
    color: #fff;
}

#checkout {
    float: left;
}

#check-amt {
    float: right;
}

@media screen and (max-width: 768px) {
    .book, .book-img {
        width: 100px;
        height: 150px;
    }

    .card {
        padding-left: 15px;
        padding-right: 15px;
    }

    .mob-text {
        font-size: 13px;
    }

    .pad-left {
        padding-left: 20px;
    }
}
    </style>
</head>
<body>
    <div class="container px-4 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-5">
                <h4 class="heading">Shopping Bag</h4>
            </div>
            <div class="col-7">
                <div class="row text-right">
                    <div class="col-4">
                        <h6 class="mt-2">Type</h6>
                    </div>
                    <div class="col-4">
                        <h6 class="mt-2">Quantity</h6>
                    </div>
                    <div class="col-4">
                        <h6 class="mt-2">Price</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <h4 class="mob-text">Kitchen Products</h4>
        </div>
        @forelse($kitchen_products as $gallery_product)
        <div class="row d-flex justify-content-center border-top">

            <div class="col-5">
                <div class="row d-flex">
                    <div class="book">
                        <img src="{{asset("assets/images/food.png")}}" class="book-img">
                    </div>
                    <div class="my-auto flex-column d-flex pad-left">
                        <h6 class="mob-text">{{$gallery_product->name}}</h6>
                        <!-- <p class="mob-text">{{$gallery_product->description}}</p> -->
                    </div>
                </div>
            </div>
            <div class="my-auto col-7">
                <div class="row text-right">
                    <div class="col-4">
                        <p class="mob-text">Kitchen</p>
                    </div>
                    <div class="col-4">
                        <div class="row d-flex justify-content-end px-3">
                            <p class="mb-0 mr-3" id="cnt1">1</p>
                            <div class="d-flex flex-column plus-minus">
                                <span class="vsm-text plus"><i class="fas fa-plus mb-2"></i></span>

                                <span class="vsm-text minus"><i class="fas fa-minus"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 pricediv">
                        <h6 class="mob-text"><span class="price" price="{{$gallery_product->price}}">{{$gallery_product->price}}</span> EGP</h6>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <p>No Kitchen Products</p>
        @endforelse
        <div class="col-12">
            <h4 class="mob-text">Gallery Products</h4>
        </div>
        @forelse($gallery_products as $gallery_product)
        <div class="row d-flex justify-content-center border-top">

            <div class="col-5">
                <div class="row d-flex">
                    <div class="book">
                        <img src="{{asset("assets/images/food.png")}}" class="book-img">
                    </div>
                    <div class="my-auto flex-column d-flex pad-left">
                        <h6 class="mob-text">{{$gallery_product->name}}</h6>
                        <!-- <p class="mob-text">{{$gallery_product->description}}</p> -->
                    </div>
                </div>
            </div>
            <div class="my-auto col-7">
                <div class="row text-right">
                    <div class="col-4">
                        <p class="mob-text">Gallery</p>
                    </div>
                    <div class="col-4">
                        <div class="row d-flex justify-content-end px-3">
                            <p class="mb-0 mr-3" id="cnt1">1</p>
                            <div class="d-flex flex-column plus-minus">
                                <span class="vsm-text plus"><i class="fas fa-plus mb-2"></i></span>

                                <span class="vsm-text minus"><i class="fas fa-minus"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 pricediv">
                        <h6 class="mob-text"><span class="price" price="{{$gallery_product->price}}">{{$gallery_product->price}}</span> EGP</h6>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <p>No Gallery Products</p>
        @endforelse
        <div class="col-12">
            <h4 class="mob-text">Stationary Products</h4>
        </div>
        @forelse($stationary_products as $gallery_product)
        <div class="row d-flex justify-content-center border-top">
            <div class="col-5">
                <div class="row d-flex">
                    <div class="book">
                        <img src="{{asset("assets/images/food.png")}}" class="book-img">
                    </div>
                    <div class="my-auto flex-column d-flex pad-left">
                        <h6 class="mob-text">{{$gallery_product->name}}</h6>
                        <!-- <p class="mob-text">{{$gallery_product->description}}</p> -->
                    </div>
                </div>
            </div>
            <div class="my-auto col-7">
                <div class="row text-right">
                    <div class="col-4">
                        <p class="mob-text">Stationary</p>
                    </div>
                    <div class="col-4">
                        <div class="row d-flex justify-content-end px-3">
                            <p class="mb-0 mr-3" id="cnt1">1</p>
                            <div class="d-flex flex-column plus-minus">
                                <span class="vsm-text plus"><i class="fas fa-plus mb-2"></i></span>

                                <span class="vsm-text minus"><i class="fas fa-minus"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 pricediv">
                        <h6 class="mob-text"><span class="price" price="{{$gallery_product->price}}">{{$gallery_product->price}}</span> EGP</h6>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <p>No Stationary Products</p>
        @endforelse



        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="row">
                        <!-- <div class="col-lg-3 radio-group">
                            <div class="row d-flex px-3 radio">
                                <img class="pay" src="https://i.imgur.com/WIAP9Ku.jpg">
                                <p class="my-auto">Credit Card</p>
                            </div>
                            <div class="row d-flex px-3 radio gray">
                                <img class="pay" src="https://i.imgur.com/OdxcctP.jpg">
                                <p class="my-auto">Debit Card</p>
                            </div>
                            <div class="row d-flex px-3 radio gray mb-3">
                                <img class="pay" src="https://i.imgur.com/cMk1MtK.jpg">
                                <p class="my-auto">PayPal</p>
                            </div>
                        </div> -->
                        <div class="col-lg-5">
                            <div class="row px-2">
                                <div class="form-group col-md-6">
                                    <label class="form-control-label">Card ID</label>
                                    <input type="text" id="cname" name="cname" disabled value="{{$session_code}}" placeholder="565416">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-control-label">Area Type</label>
                                    <input type="text" id="cnum" name="cnum" disabled value="{{$area_name}}">
                                </div>
                            </div>
                            <div class="row px-2">
                                <div class="form-group col-12">
                                    <label class="form-control-label">Seller Name</label>
                                    <input type="text" id="exp" name="exp" disabled value="{{Auth::user()->name}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-2">
                            <div class="row d-flex justify-content-between px-4">
                                <p class="mb-1 text-left">Discount</p>
                                <h6 class="mb-1 text-right">0 EGP</h6>
                            </div>
                            <div class="row d-flex justify-content-between px-4" id="tax">
                                <p class="mb-1 text-left">Total (tax included)</p>
                                <h6 class="mb-1 text-right"><span class="total">0</span> EGP</h6>
                            </div>
                            <button class="btn-block btn-blue">
                                <span>
                                    <span id="checkout">Checkout</span>
                                    <span id="check-amt"><span class="total">0</span> EGP</span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="{{asset("assets/js/popper.min.js")}}"></script>
    <script src="{{asset("assets/js/bootstrap.min.js")}}"></script>
    <script src="{{asset("assets/js/bootstrap-select.min.js")}}"></script>
    <script>
        $(document).ready(function(){
            function total(){
    var total = 0;
    $('.price').each(function(){
        total += Number($(this).text());
    });
    $('.total').text(total);
}
total();

$('.radio-group .radio').click(function(){
    $('.radio').addClass('gray');
    $(this).removeClass('gray');
});

    $('.plus-minus .plus').click(function () {
    var count = $(this).parent().prev().text();
    var price = $(this).parent().parent().parent().parent().children(".pricediv").children().children(".price").attr("price");
    $(this).parent().prev().html(Number(count) + 1);
    $(this).parent().parent().parent().parent().children(".pricediv").children().children(".price").html(Number(price) * (Number(count) + 1));
    total();
});
$('.plus-minus .minus').click(function(){
    var count = $(this).parent().prev().text();
    var price = $(this).parent().parent().parent().parent().children(".pricediv").children().children(".price").attr("price");
    $(this).parent().prev().html(Number(count) - 1);
    $(this).parent().parent().parent().parent().children(".pricediv").children().children(".price").html(Number(price) * (Number(count) - 1));
    total();
});

});
    </script>
</body>
</html>
