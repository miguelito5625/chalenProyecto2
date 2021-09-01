<?php
// header('Content-Type: application/json');

session_start();

session_unset();

$sesion->estado = "cerrada";
$sesion->mensaje = "sesion cerrada";

header("Location: ../paginas/loginv2/registro.html");
die();
// echo json_encode("");
