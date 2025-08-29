<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Control de Acceso</title>
    <link rel="stylesheet" href="assets/estilos_css/panel_control.css">
</head>
<body>
    <div class="sidebar">
        <h2>Inicio</h2>
        <ul>
            <li><a href="registro.php">Registrar Usuario</a></li>
            <li><a href="historial.php">Historial</a></li>
            <li><a href="#">Acceso facial</a></li>
            <li><a href="#">Configuración</a></li>
        </ul>
    </div>

    <div class="main">
        <h1>Panel de Control</h1>
        <div class="cards">
            <div class="card">Usuarios registrados<br><strong>12</strong></div>
            <div class="card">Accesos permitidos hoy<br><strong>86</strong></div>
            <div class="card">Intentos denegados<br><strong>4</strong></div>
        </div>

        <table class="acceso-table">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Documento</th>
                    <th>Nombre</th>
                    <th>Resultado</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>29/07/2025</td>
                    <td>10:40</td>
                    <td>1023659852</td>
                    <td>Pedro Torres</td>
                    <td><span class="ok">✔</span></td>
                    <td><img src="assets/fotos/pedro.jpg" width="40"></td>
                </tr>
                <tr>
                    <td>29/07/2025</td>
                    <td>10:41</td>
                    <td>1028464852</td>
                    <td>Carmenza Escobar</td>
                    <td><span class="fail">✖</span></td>
                    <td><img src="assets/fotos/carmenza.jpg" width="40"></td>
                </tr>
                <!-- más filas -->
            </tbody>
        </table>

        <img src="assets/logo.png" class="logo-bottom">
    </div>
</body>
</html>
