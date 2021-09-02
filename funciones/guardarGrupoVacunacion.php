<?php

include 'conexion.php';

$fecha = $_POST["fecha"];
$lugar = $_POST["lugar"];
$idUsuario = $_POST["idUsuario"];
$idVacuna = $_POST["idVacuna"];


 $sql = "insert into rmorales.grupo_vacunacion(fecha, lugar, idUsuario, idVacuna) 
 VALUES('$fecha', '$lugar', $idUsuario, $idVacuna)";
 
 if ($conn->query($sql) === TRUE) {
    echo "Asociacion realizada";
  } else {
    var_dump(http_response_code(500));
    echo "Error: " . $sql . " " . $conn->error;
  }
 $conn->close();



