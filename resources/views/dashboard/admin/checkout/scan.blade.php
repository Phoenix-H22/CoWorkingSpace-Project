<html>
<head>
    <title>Scan - {{env("APP_NAME")}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset("dashboard/assets/css/bootstrap.min.css")}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset("assets/fonts/icomoon/style.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/bootstrap-select.min.css")}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset("assets/css/bootstrap.min.css")}}">
    <!-- Style -->
    <link rel="stylesheet" href="{{asset("assets/css/style.css")}}">
</head>
<body style="background-color: beige !important;">
        <div class="container">
      <br>
      <div id="qr-reader"></div>
    <div id="qr-reader-results">
    </div>
    <br>
    <br>
    <form action="{{route("checkout.store")}}" method="post">
        @csrf
        <div class="form-group">
            <label for="card_id">Session Code</label>
            <input type="text" class="form-control" name="session_code" required value="" id="session_code" placeholder="Enter Session Code">
        </div>
        <div class="form-group">
            <label for="card_id">Area Type</label>
            <select class="selectpicker form-control" required name="area_type">
                <option value="1">Shared Area</option>
                <option value="2">Big Room</option>
                <option value="3">Small Rom</option>
            </select>
        </div>
        <div class="form-group">
            <label for="card_id">Gallery Products</label>
            <select class="selectpicker form-control" name="gallery[]" multiple data-max-options="90">
                @foreach ($gallery_products as $product)
                    <option value="{{$product->id}}">{{$product->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="card_id">Kitchen Products</label>
            <select class="selectpicker form-control" name="kitchen[]" multiple data-max-options="90">
                @foreach ($kitchen_products as $product)
                    <option value="{{$product->id}}">{{$product->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="card_id">Stationary Products</label>
            <select class="selectpicker form-control" multiple name="stationary[]" data-max-options="90">
                @foreach ($stationary_products as $product)
                    <option value="{{$product->id}}">{{$product->name}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">CheckOut</button>
    </form>
        </div>


    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="{{asset("assets/js/htmlQrCode.min.js")}}" type="text/javascript"></script>
<script>
    function docReady(fn) {
        // see if DOM is already available
        if (document.readyState === "complete"
            || document.readyState === "interactive") {
            // call on next available tick
            setTimeout(fn, 1);

            $(document).ready(function(){
                $('.html5-qrcode-element').addClass('btn');
            $('.html5-qrcode-element').addClass('btn-primary');
            });
        } else {
            document.addEventListener("DOMContentLoaded", fn);
        }
    }

    docReady(function () {
        var resultContainer = document.getElementById('qr-reader-results');
        var lastResult, countResults = 0;
        function onScanSuccess(decodedText, decodedResult) {
        //    on successfull scan
        //    $.ajax({
        //         url: 'https://pixelsspace.com/api/qr',
        //         method: 'POST',
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             },
        //         data: {
        //         'card_id': decodedText
        //         },
        //         success: function (data) {
        //             // alert response code that returned from server
        //             // alert(data);
        //             // var req = $.parseJSON(data)
        //             $("#qr-reader-results").append(data.message);
        //         },
        //         error: function (data) {
        //             // alert response code that returned from server
        //             // alert(errorMessage);
        //             $("#qr-reader-results").append("Error: " + data);
        //         }
        //     });
            $('#session_code').val(decodedText);
            // Stop scanning after first successful one
            $('#html5-qrcode-button-camera-stop').click();
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", { fps: 60, qrbox: 200 });
        html5QrcodeScanner.render(onScanSuccess);
    });
</script>
    <script src="{{asset("assets/js/popper.min.js")}}"></script>
    <script src="{{asset("assets/js/bootstrap.min.js")}}"></script>
    <script src="{{asset("assets/js/bootstrap-select.min.js")}}"></script>


</body>
</html>
