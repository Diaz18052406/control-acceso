<?php
include("conexion.php");

$filtro = "";
$condiciones = [];

if (!empty($_GET['fecha'])) {
    $fecha = $_GET['fecha'];
    $condiciones[] = "fecha = '$fecha'";
}
if (!empty($_GET['documento'])) {
    $documento = $_GET['documento'];
    $condiciones[] = "documento LIKE '%$documento%'";
}
if (!empty($_GET['usuario'])) {
    $usuario = $_GET['usuario'];
    $condiciones[] = "nombre LIKE '%$usuario%'";
}

if (count($condiciones) > 0) {
    $filtro = "WHERE " . implode(" AND ", $condiciones);
}

$sql = "SELECT * FROM historial_acceso $filtro ORDER BY fecha DESC, hora DESC";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Historial de Accesos</title>
    <link rel="stylesheet" href="assets/estilos_css/historial_acceso.css">
</head>
<body>
    <div class="menu-lateral">
        <ul>
            <li><a href="panel_control.php">Inicio</a></li>
            <li><a href="registrar_usuario.php">Registrar Usuario</a></li>
            <li><a href="historial_acceso.php" class="activo">Historial</a></li>
            <li><a href="#">Acceso Facial</a></li>
            <li><a href="#">Configuración</a></li>
        </ul>
    </div>

    <div class="contenido">
        <h2>Historial de Accesos</h2>
        
        <form class="filtros" method="GET" action="">
            <input type="date" name="fecha" placeholder="Buscar por fecha">
            <input type="text" name="documento" placeholder="Buscar por documento">
            <input type="text" name="usuario" placeholder="Buscar por usuario">
            <button type="submit">Buscar</button>
        </form>

        <table>
            <tr>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Documento</th>
                <th>Nombre</th>
                <th>Resultado</th>
                <th>Foto</th>
            </tr>
            <?php while ($fila = $resultado->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $fila['fecha']; ?></td>
                    <td><?php echo $fila['hora']; ?></td>
                    <td><?php echo $fila['documento']; ?></td>
                    <td><?php echo $fila['nombre']; ?></td>
                    <td>
                        <?php if ($fila['resultado'] == 'exitoso'): ?>
                            ✅
                        <?php else: ?>
                            ❌
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if (!empty($fila['foto'])): ?>
                            <img src="fotos/<?php echo $fila['foto']; ?>" width="50" alt="Foto">
                        <?php endif; ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
