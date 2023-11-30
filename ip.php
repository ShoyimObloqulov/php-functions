<?php
    include_once './App/UrlIpConverter.php';

    $UrlIpCon = new UrlIpConverter();

    $client_ip = $UrlIpCon::getUserIP();
    $ip = $UrlIpCon::myIp();
    $host_name = $UrlIpCon::gethostname();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .address{
            width: 500px;
        }
    </style>
</head>
<body>
<div class="address container">
    <div class="border border-primary-subtle justify-content-md-center mt-5">
        <table class="table table-striped">
            <tr class="table-success border-success">
                <th class="text-center">Your IP address</th>
            </tr>
            <tr>
                <th class="text-center"><?php  echo $ip;?> </th>
            </tr>

            <tr class="table-success border-success">
                <th class="text-center">Client IP address</th>
            </tr>
            <tr>
                <th class="text-center"><?php  echo $client_ip;?> </th>
            </tr>

            <tr class="table-success border-success">
                <th class="text-center">Your host name</th>
            </tr>
            <tr>
                <th class="text-center"><?php  echo $host_name;?> </th>
            </tr>
            <tr class="table-success border-success">
                <th class="text-center">Time</th>
            </tr>

            <tr>
                <th class="text-center"><?php  echo date('Y-m-d H:i');?> </th>
            </tr>
        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>