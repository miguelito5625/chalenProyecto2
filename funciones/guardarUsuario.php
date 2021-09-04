<?php

 include 'conexion.php';

$cui = $_POST["cui"];
$nombres = $_POST["nombres"];
$apellidos = $_POST["apellidos"];
$nacimiento = $_POST["nacimiento"];
$clave = hash('md5', $_POST["clave"]);
$rol = 2;

 $sql = "insert into rmorales.usuario(cui,nombres,apellidos,nacimiento,clave,idRol) VALUES('$cui', '$nombres', '$apellidos', '$nacimiento', '$clave', $rol)";
 
 if ($conn->query($sql) === TRUE) {
    echo "Usuario creado";
  } else {
    var_dump(http_response_code(500));
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
 $conn->close();