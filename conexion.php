<?php
$host = "localhost";
$puerto = "3308";
$usuario = "root";
$password = "12345"; 
$bd = "control_acceso";

$conn = new mysqli($host, $usuario, $password, $bd, $puerto);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
// echo "Conexión exitosa"; 
?>
