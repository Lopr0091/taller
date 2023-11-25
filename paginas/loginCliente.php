
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
            <form method="POST" name="login"action="../includes/db/loginCliente.php">
            <h2 class="mb-4">Iniciar Sesión</h2> 
            <div class="mb-3">
            <label for="run_cliente">Run Cliente: </label>
                    <input id="run_cliente" name="run_cliente"  type="text">
                </div>
                <div class="mb-3">
                <label for="clave_cliente">Clave: </label>
                    <input id="clave_cliente" name="clave_cliente" type="password">
                    
                </div>
                <button class="btn btn-primary" type="submit">Ingresar</button>
            </form>

    </main>
    <footer>
        
    </footer>
</body>
</html>