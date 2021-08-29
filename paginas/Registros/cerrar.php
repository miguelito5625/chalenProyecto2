<?php
  unset($_SESSION["correo"]);
  session_destroy();
  header("Location: sesion.php");
  exit;
?>
