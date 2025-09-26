<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Verificación Facial</title>
</head>
<body>
    <h2>Verificación Facial</h2>

    <video id="video" width="320" height="240" autoplay></video>
    <button id="capturar">Verificar rostro</button>
    <canvas id="canvas" width="320" height="240" style="display:none;"></canvas>
    <input type="hidden" id="foto_base64">

    <script>
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const capturarBtn = document.getElementById('capturar');
        const fotoBase64 = document.getElementById('foto_base64');

        let stream;

        capturarBtn.addEventListener('click', () => {
            const context = canvas.getContext('2d');
            context.drawImage(video, 0, 0, canvas.width, canvas.height);
            const dataUrl = canvas.toDataURL('image/png');
            fotoBase64.value = dataUrl;

            // Enviar al servidor
            fetch('verificar_foto.php', {
                method: 'POST',
                body: JSON.stringify({ foto: dataUrl }),
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(res => res.text())
            .then(data => alert(data))
            .catch(err => console.error(err));
        });

        navigator.mediaDevices.getUserMedia({ video: true })
            .then(s => {
                stream = s;
                video.srcObject = stream;
            })
            .catch(err => {
                alert("No se puede acceder a la cámara.");
                console.error(err);
            });
    </script>
</body>
</html>
