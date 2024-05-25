<?php

header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");


include "../../config/config.php";

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $name = $_POST['name'];
    $language_id = $_POST['language_id'];

    $res = $config->insertTeacher($name, $language_id);
    if ($res) {

        $arr['data'] = "Language Inserted Successfully...";
    } else {
        $arr["data"] = "Language Insertion Failed...";
    }
} else {
    $arr['err'] = "Only GET request allowed...";
}

echo json_encode($arr);
