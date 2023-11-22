<?php
session_start(); 

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de Factura - Taller Mecánico SERVIEXPRESS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f4f4;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            margin-top: 50px;
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
                        if($_SESSION!==null){
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
    

    <div class="container">
        <h1 class="mt-4">Ingreso de Factura</h1>
        <form>
            <div class="form-group">
                <label for="rut">RUT del Proveedor:</label>
                <input type="text" class="form-control" id="rut" placeholder="Ingrese el RUT del proveedor">
            </div>
            <div class="form-group">
                <label for="razonSocial">Razón Social:</label>
                <input type="text" class="form-control" id="razonSocial" readonly>
            </div>
            <div class="form-group">
                <label for="giro">Giro:</label>
                <input type="text" class="form-control" id="giro" readonly>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" class="form-control" id="direccion" readonly>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Ítem</th>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Aquí puedes agregar dinámicamente más filas para los ítems -->
                    <tr>
                        <td>1</td>
                        <td><input type="text" class="form-control" name="descripcion[]"></td>
                        <td><input type="text" class="form-control" name="cantidad[]"></td>
                        <td><input type="text" class="form-control" name="precioUnitario[]"></td>
                        <td>0</td>
                    </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-primary" id="agregarItem">Agregar Ítem</button>
            <div class="form-group">
                <label for="montoTotal">Monto Total:</label>
                <input type="text" class="form-control" id="montoTotal" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Ingresar Factura</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#agregarItem").click(function() {
                var newItem = '<tr>' +
                    '<td>1</td>' +
                    '<td><input type="text" class="form-control" name="descripcion[]"></td>' +
                    '<td><input type="text" class="form-control" name="cantidad[]"></td>' +
                    '<td><input type="text" class="form-control" name="precioUnitario[]"></td>' +
                    '<td>0</td>' +
                '</tr>';
                $("table tbody").append(newItem);
            });
        });
    </script>
</body>
</html>
