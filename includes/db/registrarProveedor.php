<?php
require '../../config.php';
session_start();

$rut_proveedor = $_POST['rut'];
$digito_proveedor = $_POST['digito'];
$nombre_proveedor = $_POST['nombre'];
$telefono_proveedor = $_POST['telefono'];
$email_proveedor = $_POST['email'];
$contacto_proveedor = $_POST['contacto'];

if (!preg_match('/^[0-9]{7,8}$/', $rut_proveedor)) {
    echo "<script>alert('El RUT debe ser valido.'); window.location.href='../../paginas/registroProveedores.php';</script>";
    exit();
}
if (!preg_match('/^[1-9Kk]$/', $digito_proveedor)) {
    echo "<script>alert('El dígito verificador debe ser un dígito del 1 al 9 o K.'); window.location.href='../../paginas/registroProveedores.php';</script>";
    exit();
}
if (!preg_match('/^[0-9]{9}$/', $telefono_proveedor)) {
    echo "<script>alert('El teléfono debe contener 9 digitos'); window.location.href='../../paginas/registroProveedores.php';</script>";
    exit();
}

$llamarProcedimientoInsertarProveedor = "CALL InsertarProveedor($rut_proveedor, '$digito_proveedor', '$nombre_proveedor', $telefono_proveedor, '$email_proveedor', '$contacto_proveedor')";
$queryllamarProcedimientoInsertarProveedor = mysqli_query($conectar, $llamarProcedimientoInsertarProveedor);

echo "<script>alert('Proveedor registrado'); window.location.href='../../paginas/registroProveedores.php';</script>";
?>
