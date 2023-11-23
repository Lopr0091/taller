<?php
require '../../config.php';
session_start();
//$run_cliente = $_SESSION['usuario'];
$run_cliente = $_POST['run_cliente'];
$clave_cliente = $_POST['clave_cliente'];
$logeo = "SELECT funcion_loginCliente('$run_cliente', '$clave_cliente') AS resultado";
$querylogeo = mysqli_query($conectar, $logeo);
$resultado = mysqli_fetch_assoc($querylogeo);

if ($resultado['resultado'] == 1) {
    $_SESSION['usuario'] = $run_cliente;
    header("Location: ../../paginas/menuPrincipalCliente.php");
} else {
    echo "<script>alert('Combinacion usuario/clave incorrecta'); setTimeout(function() { window.location.href = '../../paginas/loginCliente.php'; }, 500);</script>";
    //header("Location: ../paginas/loginUsuario.php");
}
?>