<?php
session_start();
$correo_usuario=$_SESSION['usuario'];
echo"<p>Usuario: $correo_usuario</p>";
?>