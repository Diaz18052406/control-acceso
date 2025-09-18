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
            <li><a href="panel_control.php">Inicio</a></li>
            <li><a href="registro.php" class="activo">Registrar Usuario</a></li>
            <li><a href="historial_acceso.php">Historial</a></li>
            <li><a href="#">Acceso facial</a></li>
            <li><a href="#">Configuración</a></li>
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

            <label>Rango fecha y hora</label>
            <div class="fecha-hora">
                <div>
                    <label>Inicio</label>
                    <input type="date" name="fecha_inicio">
                    <input type="time" name="hora_inicio">
                </div>
                <div>
                    <label>Fin</label>
                    <input type="date" name="fecha_fin">
                    <input type="time" name="hora_fin">
                </div>
            </div>

            <label>Captura de rostro</label>
            <input type="file" name="foto">

            <button type="submit">Registrar</button>
        </form>
    </div>
</body>
</html>
