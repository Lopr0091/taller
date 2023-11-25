<?php
require '../../config.php';
session_start();
$rut_cliente=$_POST['rut'];
$digito_cliente=$_POST['dv'];
$email_clienter=$_POST['email'];
$primernombre_cliente=$_POST['primerNombre'];
$segundonombre_cliente=$_POST['segundoNombre'];
$primerapellido_cliente=$_POST['primerApellido'];
$segundoapellido_cliente=$_POST['segundoApellido'];
$telefono_cliente=$_POST['telefono'];
$giro_cliente=$_POST['giro'];
$limitefiado_cliente=$_POST['limiteFiado'];
$razonsocial_cliente=$_POST['razonSocial'];
$calle_cliente=$_POST['calle'];
$numero_cliente=$_POST['numero'];
$comuna_cliente=$_POST['comuna'];
$ciudad_cliente=$_POST['ciudad'];
$region_cliente=$_POST['region'];
$llamarProcedimientoInsertarCliente=" CALL insertarCliente($rut_cliente, '$giro_cliente', 0, $limitefiado_cliente, '$razonsocial_cliente', '$calle_cliente',$numero_cliente);";
$queryllamarProcedimientoInsertarCliente=mysqli_query($conectar, $llamarProcedimientoInsertarCliente);
echo "<script>alert('Cliente registrado'); window.location.href='../../paginas/registroCliente.php';</script>";
?>