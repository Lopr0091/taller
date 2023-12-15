<?php
session_start();
require '../config.php';

// Verificar si se hizo clic en el botón "Anular"
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['anular_reserva'])) {
    $nro_reserva_a_anular = $_POST['nro_reserva'];

    // Llamar al procedimiento almacenado para eliminar la reserva
    $eliminar_reserva = "CALL procedimiento_eliminarReserva(?)";
    $stmt_eliminar = mysqli_prepare($conectar, $eliminar_reserva);
    mysqli_stmt_bind_param($stmt_eliminar, 'i', $nro_reserva_a_anular);
    mysqli_stmt_execute($stmt_eliminar);
    mysqli_stmt_close($stmt_eliminar);
}

// Verificar si se envió el formulario para ingresar el "run"
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_run'])) {
    // Obtener el "run" ingresado por el usuario
    $usuario = $_POST['run'];

    // Consultar las reservas del usuario
    $query = "SELECT nro_reserva, fecha_reserva, hora_reserva FROM reserva WHERE cliente_numrun1 = ?";
    $stmt = mysqli_prepare($conectar, $query);
    mysqli_stmt_bind_param($stmt, 'i', $usuario);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $nro_reserva, $fecha_reserva, $hora_reserva);

    $reservas = [];
    while (mysqli_stmt_fetch($stmt)) {
        $reservas[] = [
            'nro_reserva' => $nro_reserva,
            'fecha_reserva' => $fecha_reserva,
            'hora_reserva' => $hora_reserva,
        ];
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conectar);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Citas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #343a40;
            padding: 15px 0;
            border-bottom: 2px solid #fff;
        }

        .navbar-brand {
            color: #fff !important;
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            color: #fff !important;
            margin-right: 10px;
            padding: 15px 0;
        }

        .navbar-toggler-icon {
            background-color: #fff;
        }

        /* Estilos para las cards */
        .container-cards {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .card {
            width: 300px;
            margin: 0 10px 20px 10px;
            border: 2px solid #343a40;
            border-radius: 10px;
            overflow: hidden;
        }

        .card-header {
            background-color: #343a40;
            color: #fff;
            border-radius: 10px 10px 0 0;
            padding: 10px;
        }

        .card-body {
            background-color: #fff;
            border-radius: 0 0 10px 10px;
            padding: 15px;
        }

        .card-title {
            color: #fff;
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .card-text {
            color: #343a40;
            margin-bottom: 20px;
        }

        .btn-orange {
            background-color: #fd7e14;
            color: #fff;
            border: none;
        }

        .btn-orange:hover {
            background-color: #343a40;
            color: #fff;
        }
    </style>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Taller SERVIEXPRESS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="menuPrincipalUsuario.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registroCliente.php">Registrar Cliente</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ingresoFactura.php">Administración de Boletas/Facturas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registrarOrden.php">Registrar Orden de Pedido</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registroServicio.php">Registrar Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registroProveedores.php">Registrar Proveedores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="menuCitasUsuario.php">Administrar Reservas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mostrarProducto.php">Mostrar Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="generarInforme.php">Generar Informes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../includes/db/cerrarSesion.php">Cerrar Sesion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    </header>
    <main>
    <div class="container">
        <h1 class="text-center">Historial de Citas</h1>
        
        <!-- Formulario para ingresar el "run" -->
        <form method="post" action="">
            <label for="run">Ingrese el run del cliente:</label>
            <input type="text" id="run" name="run" required>
            <button type="submit" name="submit_run">Consultar Reservas</button>
        </form>

        <?php if (isset($reservas)): ?>
            <?php if (empty($reservas)): ?>
                <p class="text-center">No hay reservas disponibles para el run proporcionado.</p>
            <?php else: ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Número de Reserva</th>
                            <th>Fecha de Reserva</th>
                            <th>Hora de Reserva</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reservas as $reserva): ?>
                            <?php
                                // Verifica si la fecha de la reserva es posterior al día de hoy
                                $puede_anular = strtotime($reserva['fecha_reserva']) > strtotime(date("Y-m-d"));
                            ?>
                            <tr>
                                <td><?php echo $reserva['nro_reserva']; ?></td>
                                <td><?php echo $reserva['fecha_reserva']; ?></td>
                                <td><?php echo $reserva['hora_reserva']; ?></td>
                                <td>
                                    <?php if ($puede_anular): ?>
                                        <!-- Agrega un formulario por cada botón "Anular" -->
                                        <form method="post" action="">
                                            <input type="hidden" name="nro_reserva" value="<?php echo $reserva['nro_reserva']; ?>">
                                            <button type="submit" name="anular_reserva" class="btn btn-danger">Anular</button>
                                        </form>
                                    <?php else: ?>
                                        <span>La reserva ya pasó</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    </main>
</body>
</html>
