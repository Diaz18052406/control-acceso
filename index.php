<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Control de Acceso</title>
    <link rel="stylesheet" href="assets/estilos_css/index_login.css">
</head>
<body>

    <h1>Control de Acceso</h1>

    <div class="formulario">
        <form method="POST" action="">
            <label for="Usuario">Usuario</label>
            <input type="text" id="usuario" name="usuario" required>

            <label for="contraseña">Contraseña</label>
            <input type="password" id="contraseña" name="contraseña" required>

            <button type="submit">Iniciar sesión</button>
        </form>

        <div class="enlace">
            <a href="#">¿Olvidaste tu contraseña?</a>
        </div>

        <?php if (!empty($error)) echo "<p style='color:red; text-align:center;'>$error</p>"; ?>
    </div>

    <img src="assets/logo.png" class="logo" alt="Logo control acceso">
</body>
</html>
<?php
session_start();
include("conexion.php");

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST["usuario"]);
    $contraseña = trim($_POST["contraseña"]);

    if (empty($usuario) || empty($contraseña)) {
        $error = "Por favor ingresa todos los campos.";
    } else {
        // Consulta segura con sentencia preparada
        $stmt = $conn->prepare("SELECT * FROM administrador WHERE usuario = ? AND contraseña = ?");
        $stmt->bind_param("ss", $usuario, $contraseña);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $admin = $resultado->fetch_assoc();

            // Guardar datos en sesión
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['usuario'] = $admin['usuario'];

            // Redirigir al panel de control
            header("Location: panel_control.php");
            exit();
        } else {
            $error = "Usuario o contraseña incorrectos.";
        }
    }
}
?>
