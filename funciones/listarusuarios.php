<?php
header('Content-Type: application/json');

include 'conexion.php';

$sql = "SELECT id, cui, nombres, apellidos, nacimiento FROM usuario users WHERE idRol = 2
AND NOT EXISTS 
(
SELECT * FROM grupo_vacunacion gv
WHERE
users.id = gv.idUsuario
);";

$result = $conn->query($sql);
$rows = array();
$conn->close();

  while ($row = $result->fetch_row()) {
    $rows[] = $row;
  }

  $vacunas->data = $rows;  

  print json_encode($vacunas);