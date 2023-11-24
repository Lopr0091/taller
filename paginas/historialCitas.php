<?php
session_start();
$usuario = $_SESSION['usuario'];
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
mysqli_close($conectar);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Citas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="#">Taller SERVIEXPRESS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reservaCitas.php">Reserva de Citas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="historialCitas.php">Historial de Citas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <?php
                        if ($_SESSION !== null) {
                            echo <<<eot
                            <a class="nav-link" href="../includes/db/cerrarSesion.php">Cerrar Sesion</a>
                            eot;
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <h1>Historial de Citas</h1>

        <?php if (empty($reservas)): ?>
            <p>No hay reservas disponibles.</p>
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
    </main>
</body>
</html>
