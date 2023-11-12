<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de Citas - Taller SERVIEXPRESS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
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
                    <a class="nav-link" href="../includes/cerrarSesion.php">Perfil</a>
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
		</div> 
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Reserva de Citas</h1>
        <p>Seleccione la fecha y hora para su cita:</p>
        
        <!-- Formulario de reserva de citas -->
        <form>
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha" class="form-control">
            </div>
            <div class="form-group">
                <label for="hora">Hora:</label>
                <input type="time" id="hora" name="hora" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Reservar Cita</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
