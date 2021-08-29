<?php
$correo = $_POST["correo"];
$clave = $_POST["clave"];

$servername = "localhost";
$username = "rmorales";
$password = "rmorales";
$conn = mysqli_connect($servername, $username, $password);
if (!$conn) {
die("Fallo conectarse por: " . mysqli_connect_error());
}

$sql = "insert into rmorales.usuario(correo,clave) values('".$correo."','".md5($clave)."');";
if ($conn->query($sql) === TRUE) {
}
$conn->close();

echo "Se creo el usuario: $correo";
?>
