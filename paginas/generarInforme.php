<?php
session_start();
$usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar Informes - Administrador</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .login-message {
            text-align: center;
        }

        .login-link {
            display: block;
            margin-top: 10px;
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
                        <a class="nav-link" href="registroCliente.php">Registrar cliente</a>
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
        <?php
        if (isset($usuario)) {
            echo <<<eot
    <div class="container mt-4">
        <h1>Generar Informes - Administrador</h1>
        <p>Seleccione los parámetros de búsqueda y filtros:</p>
        
        <!-- Formulario de generación de informes -->
        <form id="informeForm" onsubmit="enviarInforme(); return false;">
            <div class="form-group">
                <label for="fechaInicio">Fecha de Inicio:</label>
                <input type="date" id="fechaInicio" name="fechaInicio" class="form-control">
            </div>
            <div class="form-group">
                <label for="fechaFin">Fecha de Fin:</label>
                <input type="date" id="fechaFin" name="fechaFin" class="form-control">
            </div>
            <div class="form-group">
                <label for="tipoInforme">Tipo de Informe:</label>
                <select id="tipoInforme" name="tipoInforme" class="form-control">
                    <option value="1">Informe de Ventas</option>
                    <option value="2">Informe de Servicios</option>
                    <option value="3">Informe de Clientes</option>
                </select>
            </div>
            <div class="form-group">
                <label for="formatoInforme">Formato del Informe:</label>
                <select id="formatoInforme" name="formatoInforme" class="form-control">
                    <option value="PDF">PDF</option>
                    <option value="Excel">Excel</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Generar Informe</button>
        </form>
    </div>
    </main>
    eot;
        } else {
            echo <<<EOT
        <div class="login-message">
            <p>No has iniciado sesión</p>
            <a class="login-link" href="loginCliente.php">Haz clic aquí para iniciar sesión</a>
        </div>
        EOT;
        }
        ?>
    <script>
        function enviarInforme() {
            // Aquí puedes agregar el código para enviar el informe al correo
            // Por ahora, mostraremos solo la alerta
            alert("El informe ha sido enviado al correo.");
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>