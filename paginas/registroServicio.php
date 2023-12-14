<?php
session_start();
$usuario = $_SESSION['usuario'];
require '../config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            padding: auto;
            background-color: #f8f9fa;
            margin: auto;
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

        .btn-orange {
            background-color: #fd7e14;
            color: #fff;
            border: none;
            margin-bottom: 3%;
            margin-top: 1%;
        }

        .btn-orange:hover {
            background-color: #343a40;
            color: #fff;
        }

        main {
            width: 90%;
            justify-content: center;
            display: grid;

        }
    </style>
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
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Taller SERVIEXPRESS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
        </div>
    </nav>
    <main>
        <?php
        if (isset($usuario)) {
            $query = "SELECT id_servicio, nombre_servicio, precio_servicio FROM servicio";
            $result = mysqli_query($conectar, $query);
            ?>
            <div class="card mt-4">
                <div class="card-body">
                    <h1>Registro de Servicio</h1>
                    <form method="POST" name="login" action="../includes/db/registrarCliente.php">
                        <div class="form-group">
                            <label for="servicio">Servicio:</label>
                            <select class="form-control" id="servicio" name="servicio" onchange="mostrarPrecio()">
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='{$row['id_servicio']}' data-precio='{$row['precio_servicio']}'>{$row['nombre_servicio']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="valor">Valor:</label>
                            <input type="text" class="form-control" id="valor" name="valor" readonly>
                        </div>
                        <div class="form-group">
                            <label for="patente">Patente Vehículo:</label>
                            <input type="text" class="form-control" id="patente" name="patente">
                        </div>
                        <div class="form-group">
                            <label for="run">RUN Cliente:</label>
                            <input type="text" class="form-control" id="run" name="run">
                        </div>
                        <button type="submit" class="btn btn-orange">Enviar</button>
                    </form>

                    <script>
                        function mostrarPrecio() {
                            var select = document.getElementById("servicio");
                            var valorInput = document.getElementById("valor");

                            // Obtener el precio del servicio seleccionado
                            var precioSeleccionado = select.options[select.selectedIndex].getAttribute("data-precio");

                            // Mostrar el precio en el campo de valor
                            valorInput.value = precioSeleccionado;
                        }
                    </script>
                    <?php
                    // Liberar el resultado
                    mysqli_free_result($result);
        } else {
            echo <<<EOT
            <div class="login-message">
                <p>No has iniciado sesión</p>
                <a class="login-link" href="loginUsuario.php">Haz clic aquí para iniciar sesión</a>
            </div>
            EOT;
        }
        ?>
    </main>
</body>

</html>