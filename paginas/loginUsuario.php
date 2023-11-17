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
    <form method="POST" name="login"action="../includes/db/loginUsuario.php">
            <div class="form-group">
                <label for="correo_usuario">Usuario: </label>
                <input id="correo_usuario" name="correo_usuario" placeholder="correo" type="text">
            </div>
            <div class="form-group">
                <label for="clave">Clave: </label>
                <input id="clave_usuario" name="clave_usuario" placeholder="clave_usuario" type="password" >
            </div>
            <button type="submit">Ingresar</button>
        </form>
    </main>
    <footer>
        
    </footer>
</body>
</html>