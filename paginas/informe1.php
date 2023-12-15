<?php
session_start();
$usuario=$_SESSION['usuario'];
require '../config.php';
$query = "SELECT * FROM `servicio`;";
$result = mysqli_query($conectar, $query);
$resultado = [];
while ($row = mysqli_fetch_assoc($result)) {
    $resultado[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
<div class="table-container">
    <h1 class="text-center">Servicios</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resultado as $servicio): ?>
                <tr>
                    <td><?php echo $servicio['id_servicio']; ?></td>
                    <td><?php echo $servicio['nombre_servicio']; ?></td>
                    <td><?php echo $servicio['descripcion_servicio']; ?></td>
                    <td><?php echo $servicio['precio_servicio']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
    </main>
</body>
</html>