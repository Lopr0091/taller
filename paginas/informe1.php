<?php
session_start();
$usuario=$_SESSION['usuario'];
require '../config.php';
$query = "SELECT * FROM `servicio`;";
$result = mysqli_query($conectar, $query);
$resultado = [];
while ($row = mysqli_fetch_assoc($result)) {
    $resultado[] = $row;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="table-container">
    <h1 class="text-center">Servicios</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resultado as $servicio): ?>
                <tr>
                    <td><?php echo $servicio['id_servicio']; ?></td>
                    <td><?php echo $servicio['nombre_servicio']; ?></td>
                    <td><?php echo $servicio['descripcion_servicio']; ?></td>
                    <td><?php echo $servicio['precio_servicio']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>