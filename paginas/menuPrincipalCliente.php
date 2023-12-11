<?php
session_start();
$usuario = $_SESSION['usuario'];
?>
<?php
session_start();
$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal - Taller Mecánico SERVIEXPRESS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .login-message {
            text-align: center;
            margin: 20% auto;
            max-width: 400px;
        }

        .login-link {
            display: block;
            margin-top: 10px;
        }

        .navbar {
            background-color: #343a40; 
        }

        .navbar-brand, .navbar-nav .nav-link {
            color: #fff;
        }

        .navbar-toggler-icon {
            background-color: #fff;
        }

        .container-cards {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .card {
            width: 300px;
            margin-bottom: 20px;
            border: none;
            border-radius: 10px;
        }

        .card-header {
            background-color: #fd7e14;
            color: #fff;
            border-radius: 10px 10px 0 0;
        }

        .card-body {
            background-color: #fd7e14;
            border-radius: 0 0 10px 10px;
        }

        .card-title {
            color: #fff;
        }

        .card-text {
            color: #fff;
        }

        .btn-orange {
            background-color: #343a40; 
            color: white;
            border: none;
        }

        .btn-orange:hover {
            background-color: black; 
            color: gray;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Taller SERVIEXPRESS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
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
                        <a class="nav-link" href="../includes/db/cerrarSesion.php">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Bienvenido al Taller Mecánico SERVIEXPRESS</h1>
        <p class="text-center">En SERVIEXPRESS, nos dedicamos a ofrecer servicios de alta calidad para el mantenimiento y reparación de vehículos. Nuestro taller cuenta con profesionales expertos y tecnología de vanguardia para garantizar la satisfacción de nuestros clientes.</p>
        
        <div class="container-cards">
            <!-- Card 1 -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Agenda Digital</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Agenda y administra tus citas de manera digital.</p>
                    <a href="#" class="btn btn-orange">Ver más</a>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Historial de Citas</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Accede al historial de tus citas anteriores.</p>
                    <a href="#" class="btn btn-orange">Ver más</a>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Explora Nuestros Servicios</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Explora nuestros servicios y programa tu próxima visita.</p>
                    <a href="#" class="btn btn-orange">Ver más</a>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Actualiza Tu Perfil</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Actualiza tu perfil y mantén tu información al día.</p>
                    <a href="#" class="btn btn-orange">Ver más</a>
                </div>
            </div>
        </div>

        <p class="text-center mt-4">Estamos comprometidos con brindarte una experiencia conveniente y eficiente. ¡Gracias por confiar en SERVIEXPRESS!</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
