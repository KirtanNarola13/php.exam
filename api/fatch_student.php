<?php

header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json");


include "../config/config.php";

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $res = $config->fatchStudent();

    $allStudents = [];

    while ($result = mysqli_fetch_assoc($res)) {
        array_push($allStudents, $result);
    }

    $arr['data'] = $allStudents;
} else {
    $arr['err'] = "Only GET Request Allowed...";
}

echo json_encode($arr);
