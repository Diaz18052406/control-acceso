<?php
// Datos de conexión
$host = 'localhost';
$usuario = 'root';
$contraseña = '';
$base_datos = 'control_acceso'; 

// Nombre del archivo de respaldo
$fecha = date("Y-m-d_H-i-s");
$nombre_archivo = "respaldo_" . $base_datos . "_$fecha.sql";

// Comando para realizar el respaldo
$comando = "\"C:\\xampp\\mysql\\bin\\mysqldump.exe\" --user=$usuario --password=$contraseña --host=$host $base_datos > $nombre_archivo";


// Ejecutar el comando
system($comando, $resultado);

if ($resultado === 0) {
    // Descargar el archivo
    header('Content-Type: application/octet-stream');
    header("Content-Disposition: attachment; filename=\"$nombre_archivo\"");
    readfile($nombre_archivo);
    
    unlink($nombre_archivo);
} else {
    echo "Error al crear el respaldo.";
}
?>
