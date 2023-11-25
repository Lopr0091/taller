<?php
session_start();
$usuario=$_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
<?php
            if(isset($usuario)){
        echo<<<eot
    <main>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="#">Taller SERVIEXPRESS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="menuPrincipalCliente.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reservaCitas.php">Reserva de Citas</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="historialCitas.php">Historial de Citas</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../includes/db/cerrarSesion.php">Cerrar Sesion</a>
                    </li>
                </ul>
            </div>
        </nav>
    </main>
    eot;}
    else{
        echo<<<EOT
        <div class="login-message">
            <p>No has iniciado sesión</p>
            <a class="login-link" href="loginCliente.php">Haz clic aquí para iniciar sesión</a>
        </div>
        EOT;
        }
        ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>