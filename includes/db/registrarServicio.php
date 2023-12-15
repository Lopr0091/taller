<?php
require '../../config.php';
session_start();
$servicio = $_POST['servicio'];
$valor = $_POST['valor'];
$patente = $_POST['patente'];
$run = $_POST['run'];
$usuario = $_SESSION['usuario'];
if (!preg_match('/^[a-zA-Z0-9]{1,6}$/', $patente)) {
    echo "<script>alert('La patente debe ser valida.'); window.location.href='../../paginas/registroServicio.php';</script>";
    exit();
}
if (!preg_match('/^[0-9]{7,8}$/', $run)) {
    echo "<script>alert('El RUN debe tener solo números.'); window.location.href='../../paginas/registroServicio.php';</script>";
    exit();
}
$consultaExistenciaRun = "SELECT * FROM `cliente` WHERE numrun1 = ?";
$stmtExistenciaRun = mysqli_prepare($conectar, $consultaExistenciaRun);
mysqli_stmt_bind_param($stmtExistenciaRun, 'i', $run);
mysqli_stmt_execute($stmtExistenciaRun);

$resultadoExistenciaRun = mysqli_stmt_get_result($stmtExistenciaRun);

if (mysqli_num_rows($resultadoExistenciaRun) == 0) {
    echo "<script>alert('El RUN no existe en la base de datos.'); window.location.href='../../paginas/registroServicio.php';</script>";
    exit();
}
$procedimientoRegistrarServicio = "CALL procedimiento_insertarServicio(?, ?, ?, ?)";
$stmtRegistrarServicio = mysqli_prepare($conectar, $procedimientoRegistrarServicio);
mysqli_stmt_bind_param($stmtRegistrarServicio, 'issi', $servicio, $patente, $run, $usuario);
mysqli_stmt_execute($stmtRegistrarServicio);
mysqli_stmt_close($stmtRegistrarServicio);
mysqli_stmt_close($stmtExistenciaRun);
echo "<script>alert('Servicio registrado correctamente'); window.location.href='../../paginas/registroServicio.php';</script>";
?>
