<?php
session_start();
$usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de Facturas - Taller Mecánico SERVIEXPRESS</title>
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


    <div class="container">
        <h1 class="mt-4">Ingreso de Factura</h1>
        <form>
            <div class="form-group">
                <label for="rut">RUT del Cliente:</label>
                <input type="text" class="form-control" id="rut" placeholder="Ingrese el RUT del Cliente">
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
                        <td class="item-num">1</td>
                        <td><input type="text" class="form-control descripcion" name="descripcion[]"></td>
                        <td><input type="text" class="form-control cantidad" name="cantidad[]"></td>
                        <td><input type="text" class="form-control precioUnitario" name="precioUnitario[]"></td>
                        <td class="total">0</td>
                    </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-orange" id="agregarItem">Agregar Ítem</button>
            <div class="form-group">
                <label for="montoTotal">Monto Total:</label>
                <input type="text" class="form-control" id="montoTotal" readonly>
            </div>
            <button type="submit" class="btn btn-orange">Ingresar Factura</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#agregarItem").click(function () {
                var numItems = $(".item-num").length + 1;
                var newItem = '<tr>' +
                    '<td class="item-num">' + numItems + '</td>' +
                    '<td><input type="text" class="form-control descripcion" name="descripcion[]"></td>' +
                    '<td><input type="text" class="form-control cantidad" name="cantidad[]"></td>' +
                    '<td><input type="text" class="form-control precioUnitario" name="precioUnitario[]"></td>' +
                    '<td class="total">0</td>' +
                    '</tr>';
                $("table tbody").append(newItem);
            });

            $("tbody").on("input", "input[name='cantidad[]'], input[name='precioUnitario[]']", function () {
                var fila = $(this).closest("tr");
                var cantidad = parseFloat(fila.find("input.cantidad").val()) || 0;
                var precioUnitario = parseFloat(fila.find("input.precioUnitario").val()) || 0;
                var total = cantidad * precioUnitario;
                fila.find("td.total").text(total.toFixed(2));

                actualizarMontoTotal();
            });

            function actualizarMontoTotal() {
                var montoTotal = 0;
                $("td.total").each(function () {
                    montoTotal += parseFloat($(this).text()) || 0;
                });
                $("#montoTotal").val(montoTotal.toFixed(2));
            }
        });
    </script>
</body>

</html>