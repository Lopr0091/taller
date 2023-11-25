<?php
session_start(); 
$usuario=$_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Clientes - Empleado</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
<?php
            if(isset($usuario)){
        echo<<<eot
    <div class="container mt-4">
        <h1>Registro de Clientes</h1>
        <p>Ingrese los datos del nuevo cliente:</p>
        <form method="POST" name="login"action="../includes/db/registrarCliente.php">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="rut">RUT:</label>
                    <input type="text" id="rut" name="rut" class="form-control" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="rut">Digito verificador:</label>
                    <input type="text" id="dv" name="dv" class="form-control" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="primerNombre">Primer Nombre:</label>
                    <input type="text" id="primerNombre" name="primerNombre" class="form-control" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="segundoNombre">Segundo Nombre:</label>
                    <input type="text" id="segundoNombre" name="segundoNombre" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <label for="primerApellido">Primer Apellido:</label>
                    <input type="text" id="primerApellido" name="primerApellido" class="form-control" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="segundoApellido">Segundo Apellido:</label>
                    <input type="text" id="segundoApellido" name="segundoApellido" class="form-control" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" id="telefono" name="telefono" class="form-control" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="giro">Giro:</label>
                    <input type="text" id="giro" name="giro" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <label for="limiteFiado">Límite Fiado:</label>
                    <input type="text" id="limiteFiado" name="limiteFiado" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label for="razonSocial">Razón Social:</label>
                <input type="text" id="razonSocial" name="razonSocial" class="form-control">
            </div>
            <div class="form-group">
                <label for="calle">Dirección (Calle):</label>
                <input type="text" id="calle" name="calle" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="calle">Dirección (Numero):</label>
                <input type="text" id="numero" name="numero" class="form-control" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="comuna">Comuna:</label>
                    <input type="text" id="comuna" name="comuna" class="form-control" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="ciudad">Ciudad:</label>
                    <input type="text" id="ciudad" name="ciudad" class="form-control" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="region">Región:</label>
                    <input type="text" id="region" name="region" class="form-control" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Registrar Cliente</button>
        </form>
    </div>
    </main>
    eot;}
    else{
        echo <<<EOT
        <div class="login-message">
        <p>No has iniciado sesión</p>
        <a class="login-link" href="loginUsuario.php">Haz clic aquí para iniciar sesión</a>
    </div>
EOT;
        }
        ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.
