<?php
ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE); 

$servername = "localhost";
$username = "rmorales";
$password = "rmorales";
$dbname = "rmorales";


$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
die("Fallo conectarse por: " . mysqli_connect_error());
}