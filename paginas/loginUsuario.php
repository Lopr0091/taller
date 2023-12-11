<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Taller Mecánico SERVIEXPRESS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #343a40;
            color: #fff;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
        }

        main {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 80vh;
        }

        .login-form {
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        .login-form h2 {
            color: #007bff;
            margin-bottom: 10px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border: 1px solid #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border: 1px solid #0056b3;
        }

        .welcome-message {
            margin-top: 20px;
            color: #6c757d;
            font-size: 14px;
        }

        footer {
            background-color: #343a40;
            color: #fff;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>Taller Mecánico SERVIEXPRESS</h1>
    </header>

    <main class="container mt-3">
        <div class="login-form">
            <form method="POST" name="login" action="../includes/db/loginUsuario.php">
                <h2>Iniciar Sesión</h2>
                <div class="form-group">
                    <label for="correo_usuario">Usuario:</label>
                    <input id="correo_usuario" name="correo_usuario" placeholder="Correo" type="text">
                </div>
                <div class="form-group">
                    <label for="clave_usuario">Clave:</label>
                    <input id="clave_usuario" name="clave_usuario" placeholder="Clave" type="password">
                </div>
                <button class="btn btn-primary" type="submit">Ingresar</button>
                <p class="welcome-message">¡Bienvenido a la zona de Usuarios del Sistema!</p>
            </form>
            <img src="https://via.placeholder.com/150" alt="Imagen de Cliente" class="img-fluid rounded-circle mt-4">
        </div>
    </main>

    <footer>
        &copy; 2023 Taller Mecánico SERVIEXPRESS. Todos los derechos reservados.
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
