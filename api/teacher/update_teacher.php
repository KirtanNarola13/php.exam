<?php

header("Access-Control-Allow-Methods: PUT,PATCH");
header("Content-Type: application/json");

include("../../config/config.php");

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'PUT' || $_SERVER['REQUEST_METHOD'] == 'PATCH') {

    $input = file_get_contents('php://input');

    parse_str($input, $_UPDATE);

    $id = $_UPDATE['id'];
    $name = $_UPDATE['name'];

    $res = $config->updateTeacher($id, $name);

    if ($res) {
        $arr['data'] = "Teacher Updated Successfully...";
    } else {
        $arr['data'] = "Teacher Updation Failed...";
    }
} else {
    $arr['err'] = "Only PUT & PATCH request allowed...";
}
echo json_encode($arr);
