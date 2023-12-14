<?php
session_start();
$usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal - Taller Mecánico SERVIEXPRESS</title>
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
    <?php
    if (isset($usuario)) {
        echo <<<eot
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
                        <a class="nav-link" href="reservaCitaUsuario.php">Administrar Reservas</a>
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

    <!-- Contenido de bienvenida y cards -->
    <div class="container mt-5">
        <h1 class="text-center mb-4" style="color: #fd7e14;">¡Bienvenido al Taller Mecánico SERVIEXPRESS!</h1>
        <p class="text-center" style="color: #343a40;">Gracias por confiar en SERVIEXPRESS, tu taller mecánico de confianza. A continuación, encontrarás opciones para gestionar distintos aspectos del taller:</p>
        
        <div class="container-cards">
            <!-- Card 1 -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Registrar Cliente</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Registra a un nuevo cliente en el sistema.</p>
                    <a href="registroCliente.php" class="btn btn-orange">Ver más</a>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Administración de Boletas/Facturas</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Administra las boletas y facturas del taller.</p>
                    <a href="ingresoFactura.php" class="btn btn-orange">Ver más</a>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Registrar Orden de Pedido</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Registra una nueva orden de pedido en el sistema.</p>
                    <a href="registrarOrden.php" class="btn btn-orange">Ver más</a>
                </div>
            </div>
        </div>

        <div class="container-cards">
            <!-- Card 4 -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Registrar Servicios</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Registra los servicios ofrecidos por el taller.</p>
                    <a href="registroServicio.php" class="btn btn-orange">Ver más</a>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Registrar Proveedores</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Registra a los proveedores asociados al taller.</p>
                    <a href="registroProveedores.php" class="btn btn-orange">Ver más</a>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Administrar Reservas</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Administra las reservas de servicios realizadas por los clientes.</p>
                    <a href="reservaCitaUsuario.php" class="btn btn-orange">Ver más</a>
                </div>
            </div>
        </div>

        <div class="container-cards">
            <!-- Card 7 -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Generar Informes</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Genera informes relacionados con el taller.</p>
                    <a href="generarInforme.php" class="btn btn-orange">Ver más</a>
                </div>
            </div>
        </div>

        <p class="text-center mt-4" style="color: #343a40;">Estamos comprometidos con brindarte una experiencia conveniente y eficiente. ¡Gracias por confiar en SERVIEXPRESS!</p>
    </div>
eot;
    } else {
        echo <<<EOT
        <div class="login-message">
        <p>No has iniciado sesión</p>
        <a class="login-link" href="loginUsuario.php">Haz clic aquí para iniciar sesión</a>
    </div>
EOT;
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
