<?php
session_start();
$usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
    if (isset($usuario)) {
        echo <<<eot
    <main class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                    <a class="navbar-brand" href="#">Taller SERVIEXPRESS</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="../index.php">Inicio</a>
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
                </nav>
            </div>
        </div>
    </main>
eot;
    } else {
        echo <<<EOT
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <p>No haz iniciado sesión</p>
                <a href="loginUsuario.php">Haz click aquí para iniciar sesión</a>
            </div>
        </div>
    </div>
EOT;
    }
    ?>

    <!-- Agrega el script de Bootstrap (necesario para algunos componentes y funcionalidades) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
