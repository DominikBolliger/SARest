<?php

require("DataBaseConfig.php");
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

$db = new DataBaseConfig("localhost", "root", "");
$db->createConnection();
$pos = $db->selectAllBoxes();
$db->closeConnection();

response("200", $pos);

function response($status, $data)
{
    header("HTTP/1.1 " . $status);
    $response = array_values($data);
    echo json_encode($response);
}