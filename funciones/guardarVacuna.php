<?php

include 'conexion.php';

$nombre = $_POST["nombre"];


 $sql = "insert into rmorales.vacuna(nombre) VALUES('$nombre')";
 
 if ($conn->query($sql) === TRUE) {
    echo "Vacuna creada";
  } else {
    var_dump(http_response_code(500));
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
 $conn->close();



