<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $documento = $_POST['documento'];
    $foto = $_FILES['foto']['name'];
    $temp = $_FILES['foto']['tmp_name'];

    // Ruta de guardado
    $rutaDestino = "fotos" . $foto;

    // Mover la foto al directorio
    if (move_uploaded_file($temp, $rutaDestino)) {
        $sql = "UPDATE usuarios SET foto = '$foto' WHERE documento = '$documento'";
        if ($conn->query($sql)) {
            echo "Registro facial actualizado correctamente.";
        } else {
            echo "Error al actualizar la base de datos.";
        }
    } else {
        echo "Error al subir la foto.";
    }
}
?>
