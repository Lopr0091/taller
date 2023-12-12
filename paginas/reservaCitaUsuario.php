<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de Citas - Taller Mecánico SERVIEXPRESS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        header {
            background-color: #343a40;
            padding: 15px 0;
        }

        .navbar-brand,
        .navbar-nav .nav-link {
            color: #fff !important;
        }

        main {
            margin-top: 20px;
        }

        .form-card {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-orange {
            background-color: #fd7e14;
            color: white;
            border: none;
        }

        .btn-orange:hover {
            background-color: black;
            color: gray;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Taller SERVIEXPRESS</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="menuPrincipalCliente.php">Inicio</a>
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
        <div class="container">
            <h1 class="mb-4 text-center">Reserva de Citas</h1>
            <div class="card form-card">
                <div class="card-body">
                    <form method="POST" name="login" action="../includes/db/reservarCitaUsuario.php">
                        <input type="hidden" name="run_cliente" value="<?php echo $run_cliente; ?>">
                        <div class="form-group">
                            <label for="run">Run Cliente:</label>
                            <input type="text" id="run" name="run" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="fecha">Fecha:</label>
                            <input type="date" id="fecha_reserva" name="fecha_reserva" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="hora">Hora:</label>
                            <select id="hora_reserva" name="hora_reserva" class="form-control">
                                <?php
                                $horaInicio = strtotime("09:00");
                                $horaFin = strtotime("17:00");

                                while ($horaInicio <= $horaFin) {
                                    echo '<option value="' . date("H:i", $horaInicio) . '">' . date("H:i", $horaInicio) . '</option>';
                                    $horaInicio += 1800;
                                }
                                ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-orange">Reservar Cita</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>