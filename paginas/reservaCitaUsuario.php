<?php
session_start(); 
$usuario=$_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de Citas - Taller Mecánico SERVIEXPRESS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
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
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="#">Taller SERVIEXPRESS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
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
                        <a class="nav-link" href="reservaCitaUsuario.php">Administrar Reservas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mostrarProducto.php">Mostrar Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="generarInforme.php">Generar Informes</a>
                    </li>
                    <li class="nav-item">
                    <?php
                        if($_SESSION!==null){
                            echo<<<eot
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