<?php
require '../../config.php';
$rut=$_POST['rut'];
$producto=$_POST['producto'];
$confirmarexistencia="select funcion_existenciaProveedor($rut)as resultado";
$queryconfirmarexistencia=mysqli_query($conectar, $confirmarexistencia);
$rowconfirmarexistencia = mysqli_num_rows($queryconfirmarexistencia);

if ($rowconfirmarexistencia >= 1) {
    $insertar = "call procedimiento_registrarOrden($rut,$producto)";
    $query = mysqli_query($conectar, $insertar);
}
?>