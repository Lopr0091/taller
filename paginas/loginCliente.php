
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
    <header>

    </header>
    <main>
        <div class="form-signin w-100 m-auto">
            <form method="POST" name="login"action="../includes/db/loginCliente.php">
                <div class="form-floating">
                    <input id="run_cliente" name="run_cliente"  type="text">
                    <label for="run_cliente">Run Cliente: </label>
                </div>
                <div class="form-floating">
                    <input id="clave_cliente" name="clave_cliente" type="password">
                    <label for="clave_cliente">Clave: </label>
                </div>
                <button class="btn btn-primary w-100 py-2" type="submit">Ingresar</button>
            </form>
        </div>
    </main>
    <footer>
        
    </footer>
</body>
</html>