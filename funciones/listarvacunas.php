<?php
header('Content-Type: application/json');

include 'conexion.php';

$cui = $_POST["cui"];
$clave = hash('md5', $_POST["clave"]);

// echo "clave enviada: $clave \n";


$sql = "SELECT id, nombre FROM vacuna;";
$result = $conn->query($sql);
$rows = array();
$conn->close();

  while ($row = $result->fetch_row()) {
    $rows[] = $row;
  }

  $vacunas->data = $rows;  

  print json_encode($vacunas);