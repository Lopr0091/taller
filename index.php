<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Agrega el enlace al archivo CSS de Bootstrap (puedes cambiar la versión si es necesario) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos adicionales personalizados */
        main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Para centrar en la vertical también */
        }

        .usuario-box {
            border: 2px solid blue;
            padding: 10px;
            margin-right: 10px;
        }

        .cliente-box {
            border: 2px solid orange;
            padding: 10px;
        }
    </style>
</head>
<body>
    <main>
        <div class="usuario-box">
            <a href="paginas/menuPrincipalUsuario.php">Usuario</a>
        </div>
        <div class="cliente-box">
            <a href="paginas/menuPrincipalCliente.php">Cliente</a>
        </div>
    </main>

    <!-- Agrega el script de Bootstrap (necesario para algunos componentes y funcionalidades) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
