<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taller Mecánico SERVIEXPRESS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f2f2f2;
        }

        header {
            background-color: #343a40;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh; 
        }

        .card {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 0 10px;
            text-align: center;
            width: 200px;
        }

        .usuario-box {
            border: 2px solid #007bff;
        }

        .cliente-box {
            border: 2px solid #fd7e14;
        }
    </style>
</head>
<body>
    <header>
        <h1>Taller Mecánico SERVIEXPRESS</h1>
    </header>

    <main>
        <div class="card usuario-box">
            <h3>Área de Usuarios</h3>
            <a href="paginas/menuPrincipalUsuario.php" class="btn btn-primary">Ingresar</a>
        </div>

        <div class="card cliente-box">
            <h3>Área de Clientes</h3>
            <a href="paginas/menuPrincipalCliente.php" class="btn btn-warning">Ingresar</a>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
