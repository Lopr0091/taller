<?php
$host="localhost";
$user="comprara_comprarata";
$clave="0091@Nime";
$bd="comprara_taller";

$conectar=mysqli_connect($host,$user,$clave,$bd);

if (!$conectar) {
    die("Conexion fallida: " . mysqli_connect_error());
}
?>