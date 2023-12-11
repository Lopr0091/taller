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
            justify-content: center;
            align-items: center;
            height: 80vh;
        }

        .login-form {
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
        }

        .login-form h2 {
            color: #007bff;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #6c757d;
            font-size: 14px;
            margin-bottom: 20px;
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
        }

        .btn-primary {
            background-color: #007bff;
            border: 1px solid #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border: 1px solid #0056b3;
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
            <form method="POST" name="login" action="../includes/db/loginCliente.php">
                <h2>Iniciar Sesión</h2>
                <p class="subtitle">Login de Clientes</p>
                <div class="form-group">
                    <label for="run_cliente">Run Cliente:</label>
                    <input id="run_cliente" name="run_cliente" type="text">
                </div>
                <div class="form-group">
                    <label for="clave_cliente">Clave:</label>
                    <input id="clave_cliente" name="clave_cliente" type="password">
                </div>
                <button class="btn btn-primary" type="submit">Ingresar</button>
		<p class="welcome-message">¡Bienvenido a la zona de clientes!</p>
            </form>
        </div>
    </main>

    <footer>
        &copy; 2023 Taller Mecánico SERVIEXPRESS. Todos los derechos reservados.
    </footer>
</body>
</html>