<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];

    $sql = "SELECT * FROM administrador WHERE usuario='$usuario' AND contraseña='$contraseña'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        header("Location: panel_control.php");
        exit();
    } else {
        $error = "Credenciales incorrectas";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Control de Acceso</title>
</head>
<body>
    <h2>Iniciar sesión</h2>
    <form method="POST" action="">
        Usuario: <input type="text" name="usuario"><br>
        Contraseña: <input type="password" name="contraseña"><br>
        <button type="submit">Ingresar</button>
    </form>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
</body>
</html>
