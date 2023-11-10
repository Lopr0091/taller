<?php
$host="localhost";
$user="comprara_claudio";
$clave="Tr@vian5824693170";
$bd="comprara_taller";

$conectar=mysqli_connect($host,$user,$clave,$bd);

if (!$conectar) {
    die("Conexion fallida: " . mysqli_connect_error());
}
?>