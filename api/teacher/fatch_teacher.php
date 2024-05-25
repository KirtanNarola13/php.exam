<?php

header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json");


include "../../config/config.php";

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $res = $config->fatchTeacher();

    $allTeacher = [];

    while ($result = mysqli_fetch_assoc($res)) {
        array_push($allTeacher, $result);
    }

    $arr['data'] = $allTeacher;
} else {
    $arr['err'] = "Only GET Request Allowed...";
}

echo json_encode($arr);
