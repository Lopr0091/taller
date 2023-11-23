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
                        <a class="nav-link" href="../index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reservaCitas.php">Reserva de Citas</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Historial de Citas</a>
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
        <p>No haz iniciado sesion</p>
        <a href="loginCliente.php">Haz click aqui para iniciar sesion</a>
        EOT;
        }
        ?>
</body>
</html>