<?php
header('Content-Type: application/json');

include 'conexion.php';

$cui = $_POST["cui"];
$clave = hash('md5', $_POST["clave"]);

// echo "clave enviada: $clave \n";


$sql = "SELECT id, cui, nombres, apellidos, nacimiento, idRol, clave FROM usuario  WHERE cui = '$cui' AND clave = '$clave' AND idRol = 1";
$result = $conn->query($sql);
$rows = array();
$conn->close();
if ($result->num_rows == 1) {

  while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
  }
  session_start();
  $_SESSION['usuario'] = $rows;
  $myObj->usuario = $rows;
  $myObj->mensaje = "usuario existe";
  $myObj->estado = "ok";
  print json_encode($myObj);
} else {
  $myObj->usuario = $rows;
  $myObj->mensaje = "usuario no existe";
  $myObj->estado = "error";
  print json_encode($myObj);
}
