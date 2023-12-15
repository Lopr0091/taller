<?php
require '../../config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rut = $_POST['rut'];
    $producto = $_POST['producto'];
    if (!preg_match('/^[0-9]{7,9}$/', $rut)) {
        echo "<script>alert('El RUT debe contener solo números.'); window.location.href='../../paginas/registrarOrden.php';</script>";
        exit();
    }
    $confirmarexistencia = "SELECT funcion_existenciaProveedor($rut) AS resultado";
    $queryconfirmarexistencia = mysqli_query($conectar, $confirmarexistencia);
    $rowconfirmarexistencia = mysqli_num_rows($queryconfirmarexistencia);
    $insertar = "CALL procedimiento_registrarOrden($producto, $rut);";
    $query = mysqli_query($conectar, $insertar);
    echo "<script>alert('Orden registrada'); window.location.href='../../paginas/registrarOrden.php';</script>";
}
?>
