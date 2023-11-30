<?php
    $result = [];
    include_once '../App/PasswordGenerator.php';
    if (isset($_GET['length']) and isset($_GET['quantity']))
    {
        $quantity = $_GET['quantity'];
        $length = $_GET['length'];

        $array = [];

        $obj = new PasswordGenerator($length,true,true,true,true,true,true,true,true);

        for ($i = 0; $i < $quantity; $i++) {
            $array[] = $obj->generatePassword();
        }
        $result = [
            'code'  => 201,
            'data'  => $array
        ];

        echo json_encode($result);
    }
    else{
        $result = [
            'code'  => 404,
            'error' => "Malumot olishda xatolik"
        ];

        return json_encode($result);
    }
