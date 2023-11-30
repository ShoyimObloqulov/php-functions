<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .url{
            width: 300px;
        }
    </style>
</head>
<body>
<div class="url container">
    <div class="justify-content-md-center mt-5">
        <form id="formDate">
            <div class="mb-3">
                <select class="form-select" aria-label="Url or Ip" id="select">
                    <option selected>Tanlang</option>
                    <option value="1">Url to Ip</option>
                    <option value="2">Ip to Url</option>
                </select>
            </div>

            <div class="mb-3" id="select-url">
                <label for="basic-url" class="form-label">Your URL</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon3">url</span>
                    <input type="text" class="form-control" name="url" id="url" aria-describedby="basic-addon3 basic-addon4">
                </div>
                <div class="form-text" id="url-error"></div>
            </div>

            <div class="mb-3" id="select-ip">
                <label for="basic-url" class="form-label">IP</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon3">Ip</span>
                    <input type="text" class="form-control" name="ip" id="ip" aria-describedby="basic-addon3 basic-addon4">
                </div>
                <div class="form-text" id="ip-error"></div>
            </div>

            <div class="mb-3">
                <div class="alert alert-success" id="result"></div>
            </div>

            <div class="mb-3">
                <button class="btn btn-primary" type="button" id="button"></button>
            </div>
        </form>


    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
    $("#select-url").hide();
    $("#select-ip").hide();
    $("#result").hide();
    $("#button").hide();

    function isIpAddress(ip) {
        var ipRegex = /^(\d{1,3}\.){3}\d{1,3}$/;

        return ipRegex.test(ip);
    }

    function isUrl(url) {
        var urlRegex = /^(ftp|http|https):\/\/[^ "]+$/;

        return urlRegex.test(url);
    }

    $("#select").change(function () {
        var id = parseInt($("#select").val());
        $("#result").hide();
        if (id === 1){
            $("#select-ip").hide();
            $("#select-url").show();
            $("#button").html("Url To Ip Convertor");
            $("#button").show();
        }
        if(id === 2){
            $("#select-url").hide();
            $("#select-ip").show();
            $("#button").html("Ip To Url Convertor");
            $("#button").show();
        }
    });

    document.getElementById('url').addEventListener('input', function () {
        var url = $("#url").val();
        if (isUrl(url)){
            $("#url-error").addClass('text-success');
            $("#url-error").removeClass('text-danger');
            $("#url-error").html("A valid url has been entered.");
        }
        else{
            $("#url-error").addClass('text-danger');
            $("#url-error").removeClass('text-success');
            $("#url-error").html("Wrong url entered.");
        }
    });


    document.getElementById('ip').addEventListener('input', function () {
        var ip = $("#ip").val();
        if (isIpAddress(ip)){
            $("#ip-error").addClass('text-success');
            $("#ip-error").removeClass('text-danger');
            $("#ip-error").html("A valid ip has been entered.");
        }
        else{
            $("#ip-error").addClass('text-danger');
            $("#ip-error").removeClass('text-success');
            $("#ip-error").html("Wrong ip entered.");
        }
    });

    $("#button").click(function (e) {
        var id = parseInt($("#select").val());
        if(id === 1){
            var url = $("#url").val();
            $.ajax({
                url:"./api/url.php",
                method: "GET",
                data: {
                    url : url
                },
                dataType:"json",
                success: function (x) {
                    $("#result").html(x);
                    $("#result").show();
                }
            });
        }
        else if(id === 2){
            var ip = $("#ip").val();
            $.ajax({
                url:"./api/url.php",
                method: "GET",
                data: {
                    ip : ip
                },
                dataType: "json",
                success: function (x) {
                    $("#result").html(x);
                    $("#result").show();
                }
            });
        }
    });
</script>
</body>
</html>