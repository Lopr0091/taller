<?php
require '../../config.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$empelado_numrun = $_SESSION['usuario'];
}
?>