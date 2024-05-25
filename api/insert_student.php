<?php

header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");


include "../config/config.php";

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $name = $_POST['name'];
    $age = $_POST['age'];
    $course = $_POST['course'];

    $res = $config->insertStudent($name, $age, $course);
    if ($res) {

        $arr['data'] = "Student Inserted Successfully...";
    } else {
        $arr["data"] = "Student Insertion Failed...";
    }
} else {
    $arr['err'] = "Only GET request allowed...";
}

echo json_encode($arr);
