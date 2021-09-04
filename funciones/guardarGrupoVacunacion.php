<?php

include 'conexion.php';

$fecha1 = $_POST["fecha1"];
$fecha2 = $_POST["fecha2"];
$fecha3 = $_POST["fecha3"];
$lugar = $_POST["lugar"];
$idUsuario = $_POST["idUsuario"];
$idVacuna = $_POST["idVacuna"];

// if ($fecha1 == '') {
//   $fecha1 = "NULL";
// }

// if ($fecha2 == '') {
//   $fecha2 = "NULL";
// }

// if ($fecha3 == '') {
//   $fecha3 = "NULL";
// }


 $sql = "insert into rmorales.grupo_vacunacion(fecha1, fecha2, fecha3, lugar, idUsuario, idVacuna) 
 VALUES(NULLIF('$fecha1', ''), NULLIF('$fecha2', ''), NULLIF('$fecha3', ''), '$lugar', $idUsuario, $idVacuna)";
 
 if ($conn->query($sql) === TRUE) {
    echo "Asociacion realizada";
  } else {
    // var_dump(http_response_code(500));
    echo "Error: " . $sql . " " . $conn->error;
  }
 $conn->close();



