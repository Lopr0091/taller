<?php
require '../../config.php';
session_start();
$tipoInforme=$_POST['tipoInforme'];
if($tipoInforme==1){
    echo "<script>window.open('../../paginas/informe1.php');</script>";
}else if($tipoInforme==2){
    echo "<script>window.open('../../paginas/informe2.php', '_blank');</script>";
}
?>