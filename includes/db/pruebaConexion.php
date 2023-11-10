<?php
require '../../config.php';
$query=$conectar;
 if (!$query){
    die ("fallo".mysqli_connect_error());
 }
    echo"conectado";
 
 mysqli_close($query);
?>