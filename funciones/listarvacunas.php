<?php
header('Content-Type: application/json');

include 'conexion.php';

$sql = "SELECT id, nombre FROM vacuna;";
$result = $conn->query($sql);
$rows = array();
$conn->close();

  while ($row = $result->fetch_row()) {
    $rows[] = $row;
  }

  $vacunas->data = $rows;  

  print json_encode($vacunas);