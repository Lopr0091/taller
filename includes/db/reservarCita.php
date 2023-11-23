<?php
require '../../config.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$fecha_reserva = $_POST['fecha_reserva'];
$fechaFormateada = date("Y-m-d", strtotime($fecha_reserva));
$hora_reserva = $_POST['hora_reserva'];
$horaFormateada = date("H:i:s", strtotime($hora_reserva));
$cliente_numrun = $_SESSION['usuario'];
$confirmarexistencia="select funcion_existenciaProveedor($cliente_numrun)as resultado";
$queryconfirmarexistencia=mysqli_query($conectar, $confirmarexistencia);
$rowconfirmarexistencia = mysqli_num_rows($queryconfirmarexistencia);

$insertar = "CALL procedimiento_registrarReserva('$fechaFormateada','$hora_reserva',$cliente_numrun);";
$query = mysqli_query($conectar, $insertar);
echo "<script>alert('Orden registrada'); window.location.href='../../paginas/reservaCitas.php';</script>";

}
if (!$query) {
    die('Error en la consulta: ' . mysqli_error($conectar));
}