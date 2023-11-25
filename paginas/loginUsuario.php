<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>

    </header>
    <main class="container mt-5">
        <form method="POST" name="login" action="../includes/db/loginUsuario.php" class="col-md-6 offset-md-3">
            <h2 class="mb-4">Iniciar Sesión</h2>
            <div class="mb-3">
                <label for="correo_usuario" class="form-label">Usuario:</label>
                <input id="correo_usuario" name="correo_usuario" placeholder="Correo" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label for="clave_usuario" class="form-label">Clave:</label>
                <input id="clave_usuario" name="clave_usuario" placeholder="Clave" type="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Ingresar</button>
        </form>
    </main>
    <footer>
        
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
