<?php
header('Content-Type: application/json');

session_start();


$usuario->id = $_POST['id'];
$usuario->cui = $_POST['cui'];
$usuario->nombres = $_POST['nombres'];
$usuario->estado = "ok";

$_SESSION["usuario"] = $usuario;

// session_unset();

echo json_encode($_SESSION["usuario"]);
