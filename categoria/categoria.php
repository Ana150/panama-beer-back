<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Content-Type: application/json");

include('../connection.php');
include('../model/modelCategoria.php');
include('../controller/controllerCategoria.php');

$_connection = new Connection();
$model = new ModelCategoria($_connection->returnConnection());
$controller = new ControllerCategoria($model);

$dados = $controller->router();

echo json_encode(array("status"=>"success", "data"=>$dados));
?>