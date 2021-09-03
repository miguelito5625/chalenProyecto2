<?php
header('Content-Type: application/json');

include 'conexion.php';

$cui = $_POST["cui"];
$clave = hash('md5', $_POST["clave"]);

// echo "clave enviada: $clave \n";


$sql = "SELECT id_grupo_vacunacion, lugar, fecha, id_usuario, cui, nombres_usuario, apellidos_usuario, nacimiento_usuario, idRol_usuario, clave_usuario FROM vista_grupos_vacunacion  WHERE cui = '$cui' AND clave_usuario = '$clave' AND idRol_usuario = 2";
$result = $conn->query($sql);
$rows = array();
$conn->close();
if ($result->num_rows == 1) {

  while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
  }
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
