<?php
date_default_timezone_set('Asia/Tashkent');
require __DIR__.'./../vendor/autoload.php';
use GuzzleHttp\Client;
class UrlIpConverter {
    public static function urlToIp($url) {
        $client = new Client();

        try {
            $response = $client->request('GET', $url);
            return gethostbyname(parse_url($url, PHP_URL_HOST));
        } catch (Exception $e) {

            return null;
        }
    }

    public static function ipToUrl($ip) {
        return gethostbyaddr($ip);
    }

    public static function myIp(){
        return $_SERVER['SERVER_ADDR'];
    }

    public static function ClientIPaddress()
    {
        return $_SERVER['REMOTE_ADDR'];
    }

    public static function gethostname()
    {
        return gethostname();
    }

    public static function getUserIP() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
}

