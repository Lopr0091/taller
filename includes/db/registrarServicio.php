<?php
require '../../config.php';
session_start();

// Obtener los valores del formulario
$servicio = $_POST['servicio'];
$valor = $_POST['valor'];
$patente = $_POST['patente'];
$run = $_POST['run'];
$usuario = $_SESSION['usuario'];
    $procedimientoRegistrarServicio = "CALL procedimiento_insertarServicio(?, ?, ?, ?)";
    $stmtRegistrarServicio = mysqli_prepare($conectar, $procedimientoRegistrarServicio);
    mysqli_stmt_bind_param($stmtRegistrarServicio, 'issi', $servicio, $patente, $run, $usuario);
    mysqli_stmt_execute($stmtRegistrarServicio);
    mysqli_stmt_close($stmtRegistrarServicio);
    echo "<script>alert('Servicio registrado correctamente'); window.location.href='ruta_a_otra_pagina.php';</script>";

?>
