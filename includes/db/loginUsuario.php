<?php
require '../../config.php';
session_start();
$correo_usuario = $_POST['correo_usuario'];
$clave_usuario = $_POST['clave_usuario'];
$logeo = "SELECT funcion_loginUsuario('$correo_usuario', '$clave_usuario') AS resultado";
$querylogeo = mysqli_query($conectar, $logeo);
$resultado = mysqli_fetch_assoc($querylogeo);

if ($resultado['resultado'] == 1) {
    $_SESSION['usuario'] = $correo_usuario;
    header("Location: ../../index.php");
} else {
    echo "<script>alert('Combinacion usuario/clave incorrecta'); setTimeout(function() { window.location.href = '../../paginas/loginUsuario.php'; }, 500);</script>";
    header("Location: ../paginas/loginUsuario.php");
}
?>