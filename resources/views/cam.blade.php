<html>
<head>
    <title>Html-Qrcode Demo</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
<body>
    <div id="qr-reader" style="width:500px"></div>
    <div id="qr-reader-results"></div>
</body>
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script>
    function docReady(fn) {
        // see if DOM is already available
        if (document.readyState === "complete"
            || document.readyState === "interactive") {
            // call on next available tick
            setTimeout(fn, 1);
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
                url: 'http://192.168.1.110/CoWorkingSpace-Project/public/qr',
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: {
                'card_id': decodedText
                },
                success: function (data) {
                  alert(data);

                },
                error: function (data) {
                    // alert response code that returned from server

                    // alert(errorMessage);
                    $("#qr-reader-results").append("Error: " + data);


                }
            });
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", { fps: 60, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess);
    });
</script>
</head>
</html>
