<?php
require '../../config.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$fecha_reserva = $_POST['fecha_reserva'];
$fechaFormateada = date("Y-m-d", strtotime($fecha_reserva));
$hora_reserva = $_POST['hora_reserva'];
$horaFormateada = date("H:i:s", strtotime($hora_reserva));
error_log("Fecha formateada: $fechaFormateada, Hora formateada: $horaFormateada");
$cliente_numrun = $_POST['run'];

$insertar = "CALL procedimiento_registrarReserva('$fechaFormateada','$horaFormateada',$cliente_numrun);";
$query = mysqli_query($conectar, $insertar);
echo "<script>alert('Reserva registrada'); window.location.href='../../paginas/reservaCitaUsuario.php';</script>";

}
if (!$query) {
    die('Error en la consulta: ' . mysqli_error($conectar));
}