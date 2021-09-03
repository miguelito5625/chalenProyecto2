<?php
header('Content-Type: application/json');

include 'conexion.php';

$sql = "SELECT id_grupo_vacunacion, cui, nombres_usuario, apellidos_usuario, 
lugar, fecha, nombre_vacuna
FROM vista_grupos_vacunacion;";

$result = $conn->query($sql);
$rows = array();
$conn->close();

  while ($row = $result->fetch_row()) {
    $rows[] = $row;
  }

  $vacunas->data = $rows;  

  print json_encode($vacunas);