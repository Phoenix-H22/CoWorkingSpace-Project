<html>
<head>
    <title>Html-Qrcode Demo</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset("dashboard/assets/css/bootstrap.min.css")}}" rel="stylesheet">
</head>
<body style="background-color: beige !important;">
        <div class="container">
      <br>

      <div id="qr-reader"></div>

    <div id="qr-reader-results"></div>
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
           $.ajax({
                url: 'https://pixelsspace.com/api/qr',
                method: 'POST',
                headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
                data: {
                'card_id': decodedText
                },
                success: function (data) {
                    // alert response code that returned from server
                    // alert(data);
                    // var req = $.parseJSON(data)
                    $("#qr-reader-results").append(data.message);
                },
                error: function (data) {
                    // alert response code that returned from server
                    // alert(errorMessage);
                    $("#qr-reader-results").append("Error: " + data);
                }
            });
            // Stop scanning after first successful one
            $('#html5-qrcode-button-camera-stop').click();
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", { fps: 60, qrbox: 200 });
        html5QrcodeScanner.render(onScanSuccess);
    });
</script>

</body>
</html>
