<?php
session_start();
$usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Orden- Taller Mecánico SERVIEXPRESS</title>
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
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50vh;
        }

        .card {
            width: 80%;
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
                        <a class="nav-link" href="menuCitasUsuario.php">Administrar Reservas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mostrarProducto.php">Mostrar Productos</a>
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
    <?php
    if (isset($usuario)) {
        echo <<<eot
        <main>
        <div class="card">
            <div class="card-body">
                <form method="POST" name="login" action="../includes/db/registrarOrden.php">
            <div class="form-group">
                <label for="rut">RUT del Proveedor (sin puntos):</label>
                <input type="text" id="rut" name="rut" class="form-control" style="width: 40%" required>
            </div>
            <div class="form-group">
                <select name="producto" id="producto">
                    <option value="10001">Aceite Motor</option>
                    <option value="10002">Filtro Aire</option>
                    <option value="10003">Batería 12V</option>
                    <option value="10004">Pastillas Freno</option>
                    <option value="10005">Amortiguadores</option>
                    <option value="10006">Correa Tiempo</option>
                    <option value="10007">Bujías</option>
                    <option value="10008">Líquido Frenos</option>
                    <option value="10009">Filtro Aceite</option>
                    <option value="10010">Neumáticos</option>
                    <option value="10011">Llantas</option>
                    <option value="10012">Luces LED</option>
                    <option value="10013">Anticongelante</option>
                    <option value="10014">Limpia Parabrisas</option>
                    <option value="10015">Filtro Combustible</option>
                    <option value="10016">Cables Encendido</option>
                    <option value="10017">Embrague</option>
                    <option value="10018">Radiador</option>
                    <option value="10019">Alternador</option>
                    <option value="10020">Bomba Agua</option>
                    <option value="10021">Filtro Cabina</option>
                    <option value="10022">Líquido Dirección</option>
                    <option value="10023">Radiador Aceite</option>
                    <option value="10024">Cadenas Nieve</option>
                    <option value="10025">Limpiador Motor</option>
                    <option value="10026">Sellador Radiador</option>
                    <option value="10027">Refrigerante</option>
                    <option value="10028">Tapas Válvulas</option>
                    <option value="10029">Asientos Racing</option>
                    <option value="10030">Cera Automotriz</option>
                    <option value="10031">Espárragos Rueda</option>
                    <option value="10032">Cargador Batería</option>
                    <option value="10033">Kit Herramientas</option>
                    <option value="10034">Cinta Aislante</option>
                    <option value="10035">itivo Aceite</option>
                    <option value="10036">Junta Cabeza</option>
                    <option value="10037">Reproductor DVD</option>
                    <option value="10038">Limpiador Inyectores</option>
                    <option value="10039">Bomba Combustible</option>
                    <option value="10040">Sensor O2</option>
                    <option value="10041">Retenes</option>
                    <option value="10042">Espejos Laterales</option>
                    <option value="10043">Tapón Aceite</option>
                    <option value="10044">Gato Hidráulico</option>
                    <option value="10045">Protector Carter</option>
                    <option value="10046">Termostato</option>
                    <option value="10047">Bomba Agua</option>
                    <option value="10048">Suspensión Deportiva</option>
                    <option value="10049">Compresor Aire</option>
                    <option value="10050">Cinturones Seguridad</option>
                    <option value="10051">Aire Acondicionado</option>
                    <option value="10052">Filtro Gasolina</option>
                    <option value="10053">Discos Freno</option>
                    <option value="10054">Cubiertas Asientos</option>
                    <option value="10055">Cubrevolante</option>
                    <option value="10056">Portabicicletas</option>
                    <option value="10057">Enganche Remolque</option>
                    <option value="10058">GPS Navegación</option>
                    <option value="10059">Caja Herramientas</option>
                    <option value="10060">Kit Primeros Auxilios</option>
                    <option value="10061">Cámara Retroceso</option>
                    <option value="10062">Cubierta Volante</option>
                    <option value="10063">Organizador Maletero</option>
                    <option value="10064">Extintor</option>
                    <option value="10065">Limpiador Interiores</option>
                    <option value="10066">Sellador Neumáticos</option>
                    <option value="10067">Cable Carga Batería</option>
                    <option value="10068">Alfombras Vehículo</option>
                    <option value="10069">Tornillos Ruedap </option>
                    <option value="10070">Desodorante Vehículo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-orange">Registrar pedido</button>
        </form>
            </div>
        </div>
    </main>
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
</body>

</html>