
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>

    </header>
    <main>
    <form method="POST" name="login"action="../includes/db/loginCliente.php">
            <div class="form-group">
                <label for="run_cliente">Run Cliente: </label>
                <input id="run_cliente" name="run_cliente" placeholder="run" type="text">
            </div>
            <div class="form-group">
                <label for="clave_cliente">Clave: </label>
                <input id="clave_cliente" name="clave_cliente" placeholder="clave" type="password" >
            </div>
            <button type="submit">Ingresar</button>
        </form>
    </main>
    <footer>
        
    </footer>
</body>
</html>