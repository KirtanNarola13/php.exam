<?php

header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json");


include "../config/config.php";

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST["id"];

    $res = $config->fatchSingleStudent($id);

    if ($res) {

        $arr['data'] = mysqli_fetch_assoc($res);
    } else {
        $arr['data'] = "No student available on this id....";
    }
} else {
    $arr['err'] = "Only GET Request Allowed...";
}

echo json_encode($arr);
