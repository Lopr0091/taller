<?php
require '../../config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$rut=$_POST['rut'];
$producto=$_POST['producto'];
$confirmarexistencia="select funcion_existenciaProveedor($rut)as resultado";
$queryconfirmarexistencia=mysqli_query($conectar, $confirmarexistencia);
$rowconfirmarexistencia = mysqli_num_rows($queryconfirmarexistencia);
$insertar = "CALL procedimiento_registrarOrden($producto,$rut);";
$query = mysqli_query($conectar, $insertar);
echo "<script>alert('Orden registrada'); window.location.href='../../paginas/registrarOrden.php';</script>";
}