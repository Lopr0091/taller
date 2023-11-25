<?php
require '../../config.php';
session_start();
$rut_proveedor=$_POST['rut'];
$digito_proveedor=$_POST['digito'];
$nombre_proveedor=$_POST['nombre'];
$telefono_proveedor=$_POST['telefono'];
$email_proveedor=$_POST['email'];
$contacto_proveedor=$_POST['contacto'];
$llamarProcedimientoInsertarProveedor=" CALL InsertarProveedor($rut_proveedor, '$digito_proveedor', '$nombre_proveedor', $telefono_proveedor, '$email_proveedor', '$contacto_proveedor')";
$queryllamarProcedimientoInsertarProveedor=mysqli_query($conectar, $llamarProcedimientoInsertarProveedor);
echo "<script>alert('Proveedor registrado'); window.location.href='../../paginas/registroProveedores.php';</script>";
?>