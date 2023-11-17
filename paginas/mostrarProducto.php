<?php
//session_start(); 
require '../config.php';
$sql = "SELECT id_producto, nombre_producto, descripción, stock, valor_producto FROM producto";
$conectarsql=mysqli_query($conectar,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
                        <a class="nav-link" href="#">Registrar Usuario</a>
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
                        <a class="nav-link" href="reservaCitas.php">Administrar Reservas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="generarInforme.php">Generar Informes</a>
                    </li>
                    <li class="nav-item">
                    <?php
                        if($sesion!==null){
                            echo<<<eot
                            <a class="nav-link" href="../includes/cerrarSesion.php">Cerrar Sesion</a>
                            eot;
                        }
                    ?>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Stock</th>
                <th>Valor</th>
            </tr>
        </thead>
        <?php
        
        while ($row = $conectarsql->fetch_array()) {
            $id = $row['id_producto'];
            $nombre_producto = $row['nombre_producto'];
            $descripcion = $row['descripcion'];
            $stock = $row['stock'];
            $valor = $row['valor'];
        ?>        
        <div id="productos">
        
        <tbody>
            <tr>
                <td><?php echo $id ?></td>
                <td><?php echo $nombre_producto ?></td>
                <td><?php echo $descripcion ?></td>
                <td><?php echo $stock ?></td>
                <td><?php echo $valor ?></td>
            </tr>
        </tbody>
    </table>
                </div>
        <?php
        }
        ?>
    </main>
</body>
</html>