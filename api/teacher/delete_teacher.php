<?php

header("Access-Control-Allow-Methods: DELETE");
header("Content-Type: application/json");

include "../../config/config.php";

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == "DELETE") {

    $input = file_get_contents('php://input');
    parse_str($input, $_DELETE);

    $id = $_DELETE['id'];

    $res = $config->deleteTeacher($id);

    if ($res) {
        $arr['data'] = "Teacher deleted Successfully...";
    } else {
        $arr['data'] = "Teacher deletion failed...";
    }
} else {
    $arr['err'] = "Only DELETE request allowed..";
}

echo json_encode($arr);
