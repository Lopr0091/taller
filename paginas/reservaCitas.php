<?php
session_start(); 
$usuario=$_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de Citas - Taller SERVIEXPRESS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <head>
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
                    <?php
                        if($_SESSION!==null){
                            echo<<<eot
                            <a class="nav-link" href="../includes/db/cerrarSesion.php">Cerrar Sesion</a>
                            eot;
                        }
                    ?>
                    </li>
            </div> 
                </ul>
            </div>
        </nav>
    </head>
    <main>
        <div class="container mt-4">
            <h1>Reserva de Citas</h1>
            <p>Seleccione la fecha y hora para su cita:</p>
            <form method="POST" name="login"action="../includes/db/reservarCita.php">
            <input type="hidden" name="run_cliente" value="<?php echo $run_cliente; ?>">
                <div class="form-group">
                    <label for="fecha">Fecha:</label>
                    <input type="date" id="fecha" name="fecha" class="form-control">
                </div>
                <div class="form-group">
                    <label for="hora">Hora:</label>
                    <select id="hora" name="hora" class="form-control"></select>
                </div>
                <button type="submit" class="btn btn-primary">Reservar Cita</button>
            </form>
        </div>
    </main>
</body>
<script>
    window.onload = function() {
        var selectHora = document.getElementById('hora');
        for(var i = 0; i <= 23; i++) {
            for(var j = 0; j < 60; j += 30) { // Incrementa en 30 minutos
                var hora = i.toString().padStart(2, '0');
                var minuto = j.toString().padStart(2, '0');
                selectHora.innerHTML += '<option value="' + hora + ':' + minuto + '">' + hora + ':' + minuto + '</option>';
            }
        }
    };
</script>

</html>
