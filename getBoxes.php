<?php

require("DataBaseConfig.php");
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

if (!empty($_GET['limit'])) {
    $limit = $_GET['limit'];
}

$db = new DataBaseConfig("localhost", "root", "");
$db->createConnection();
$pos = $db->selectBoxes($limit);
$db->closeConnection();

response("200", $pos);

function response($status, $data)
{
    header("HTTP/1.1 " . $status);
    $response = array_values($data);
    echo json_encode($response);
}