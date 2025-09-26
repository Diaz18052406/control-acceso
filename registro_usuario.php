<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'conexion.php';

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $documento = $_POST['documento'];
    $celular = $_POST['celular'];
    $foto_base64 = $_POST['foto_base64'];

    // Guardar la imagen 
    if (!empty($foto_base64)) {
        $foto_base64 = str_replace('data:image/png;base64,', '', $foto_base64);
        $foto_base64 = str_replace(' ', '+', $foto_base64);
        $foto_data = base64_decode($foto_base64);
        $nombre_foto = uniqid() . '.png';
        $ruta_foto = 'fotos/' . $nombre_foto;
        file_put_contents($ruta_foto, $foto_data);
    }

    $sql = "INSERT INTO usuario (nombre, apellido, documento, celular, foto_path) 
            VALUES ('$nombre', '$apellido', '$documento', '$celular', '$ruta_foto')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Usuario registrado correctamente');</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Usuario</title>
    <link rel="stylesheet" href="assets/estilos_css/registro_usuario.css">
</head>
<body>
    <div class="sidebar">
        <ul>
            <li><a href="panel_control.php">inicio</a></li>
            <li><a href="registro_usuario.php" class="activo">Registrar Usuario</a></li>
            <li><a href="historial_acceso.php">Historial</a></li>
            <li><a href="acceso_facial.php">Acceso facial</a></li>
            <li><a href="configuracion.php">Configuración</a></li>
        </ul>
    </div>

    <div class="contenido">
        <h2>Registrar usuario nuevo</h2>
        <form action="#" method="post" enctype="multipart/form-data">
            <label>Nombre</label>
            <input type="text" name="nombre">

            <label>Apellido</label>
            <input type="text" name="apellido">

            <label>Documento</label>
            <input type="text" name="documento">

            <label>Celular</label>
            <input type="text" name="celular">

            <button type="button" id="activarCamara">Activar Cámara</button>
            <button type="button" id="capturar" disabled>Tomar Foto</button>


            <label>Captura de rostro</label>
            <video id="video" width="320" height="240" autoplay playsinline style="border: 1px solid #ccc;"></video>
            
            <canvas id="canvas" width="320" height="240" style="display:none;"></canvas>
            <input type="hidden" name="foto_base64" id="foto_base64">

<script>
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const activarBtn = document.getElementById('activarCamara');
    const capturarBtn = document.getElementById('capturar');
    const fotoBase64 = document.getElementById('foto_base64');

    let streamActivo = null;

    // Activar la cámara 
    activarBtn.addEventListener('click', async () => {
        try {
            streamActivo = await navigator.mediaDevices.getUserMedia({ video: true });
            video.srcObject = streamActivo;
            video.play();
            capturarBtn.disabled = false; 
        } catch (err) {
            console.error("No se pudo acceder a la cámara", err);
            alert("Error: no se pudo acceder a la cámara.");
        }
    });

    // Capturar la foto
    capturarBtn.addEventListener('click', () => {
        const context = canvas.getContext('2d');
        context.drawImage(video, 0, 0, canvas.width, canvas.height);
        const dataUrl = canvas.toDataURL('image/png');
        fotoBase64.value = dataUrl;
        alert("Foto tomada correctamente");

        if (streamActivo) {
            streamActivo.getTracks().forEach(track => track.stop());
            video.srcObject = null;
            streamActivo = null;
            capturarBtn.disabled = true; // Desactivar botón de capturar
        }
    });
</script>

            <button type="submit">Registrar</button>
        </form>
        <img src="assets/logo.png.jpeg" class="logo-bottom">
    </div>
</body>
</html>


