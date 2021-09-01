<?php
header('Content-Type: application/json');

include 'conexion.php';

$clave = hash('md5', $_POST["clave"]);

// echo "clave enviada: $clave \n";


$sql = "SELECT id, nombre FROM centro_vacunacion;";
$result = $conn->query($sql);
$rows = array();
$conn->close();

  while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
  }

  $vacunas->data = $rows;  

  print json_encode($vacunas);