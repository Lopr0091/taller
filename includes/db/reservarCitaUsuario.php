<?php
require '../../config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente_numrun = $_POST['run'];

    // Verificar que el cliente exista en la base de datos
    $consultaCliente = "SELECT * FROM `cliente` WHERE numrun1 = ?";
    $stmtCliente = mysqli_prepare($conectar, $consultaCliente);
    mysqli_stmt_bind_param($stmtCliente, 'i', $cliente_numrun);
    mysqli_stmt_execute($stmtCliente);
    $resultadoCliente = mysqli_stmt_get_result($stmtCliente);

    if (mysqli_num_rows($resultadoCliente) == 0) {
        echo "<script>alert('El cliente no existe en la base de datos.'); window.location.href='../../paginas/reservaCitaUsuario.php';</script>";
        exit();
    }

    // Si el cliente existe, continuar con la reserva
    $fecha_reserva = $_POST['fecha_reserva'];
    $fechaFormateada = date("Y-m-d", strtotime($fecha_reserva));

    // Validar que la fecha de reserva no sea anterior a la fecha actual
    if (strtotime($fechaFormateada) < strtotime(date("Y-m-d"))) {
        echo "<script>alert('La fecha de reserva no puede ser anterior a la fecha actual.'); window.location.href='../../paginas/reservaCitaUsuario.php';</script>";
        exit();
    }

    $hora_reserva = $_POST['hora_reserva'];
    $horaFormateada = date("H:i:s", strtotime($hora_reserva));

    // Realizar la inserción en la base de datos
    $insertar = "CALL procedimiento_registrarReserva('$fechaFormateada','$horaFormateada',$cliente_numrun);";
    $query = mysqli_query($conectar, $insertar);

    if (!$query) {
        die('Error en la consulta: ' . mysqli_error($conectar));
    }

    echo "<script>alert('Reserva registrada'); window.location.href='../../paginas/reservaCitaUsuario.php';</script>";
}
?>
