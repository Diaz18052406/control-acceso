<?php
$host = "localhost";
$puerto = "3308";
$usuario = "root";
$password = ""; // no tiene contraseña establecida //
$bd = "control_acceso";

$conn = new mysqli($host, $usuario, $password, $bd, $puerto);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
// echo "Conexión exitosa"; 
?>
