<?php

 include 'conexion.php';

$cui = $_POST["cui"];
$nombres = $_POST["nombres"];
$apellidos = $_POST["apellidos"];
$nacimiento = $_POST["nacimiento"];
$clave = hash('md5', $_POST["clave"]);
$rol = 1;

 $sql = "insert into rmorales.usuario(cui,nombres,apellidos,nacimiento,clave,idRol) VALUES('$cui', '$nombres', '$apellidos', '$nacimiento', '$clave', $rol)";
 
 if ($conn->query($sql) === TRUE) {
    echo "Usuario creado";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
 $conn->close();