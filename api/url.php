<?php
    include_once '../App/UrlIpConverter.php';
    $result = "";
    if (isset($_GET['url'])){
        $url = $_GET['url'];
        $Url = new UrlIpConverter();
        $url_to_ip = $Url::urlToIp($url);
        $result = $url_to_ip;
    }
    if(isset($_GET['ip'])){
        $ip = $_GET['ip'];
        $Url = new UrlIpConverter();
        $ip_to_url = $Url::ipToUrl($ip);
        $result = $ip_to_url;
    }


    echo json_encode($result);


