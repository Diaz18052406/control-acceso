<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Configuración - Control de Acceso</title>
    <link rel="stylesheet" href="assets/estilos_css/configuracion.css">
</head>
<body>
    <div class="menu-lateral">
        <ul>
            <li><a href="panel_control.php">Inicio</a></li>
            <li><a href="registro_usuario.php">Registrar Usuario</a></li>
            <li><a href="historial_acceso.php">Historial</a></li>
            <li><a href="acceso_facial.php">Acceso Facial</a></li>
            <li><a href="configuracion.php" class="activo">Configuración</a></li>
        </ul>
    </div>

    <div class="contenido">
        <h2>Configuración</h2>

        <div class="botones">
            <button class="btn" onclick="abrirModal('modalPassword')">Cambiar contraseña</button>
            <button class="btn" onclick="abrirModal('modalFacial')">Actualizar Registro facial</button>
            <button class="btn" id="btnRespaldar">Respaldar DB</button>
            <button class="btn">Parámetros del sistema</button>
            <a href="cerrar_sesion.php" class="btn">Cerrar sesión</a>
        </div>

        <div class="logo">
            <img src="assets/logo.png.jpeg" alt="Digital Access Control">
        </div>
    </div>
    <!-- Modal Cambiar Contraseña -->
<div id="modalPassword" class="modal">
  <div class="modal-contenido modal-password">
    <span class="cerrar" onclick="cerrarModal('modalPassword')">&times;</span>
    <h3>Cambiar contraseña</h3>
    <form method="POST" action="cambiar_contrasena.php">
      <label>Contraseña actual</label>
      <input type="password" name="actual" required>

      <label>Nueva contraseña</label>
      <input type="password" name="nueva" required>

      <label>Confirmar contraseña</label>
      <input type="password" name="confirmar" required>

      <button class="btn-azul" type="submit">Actualizar</button>
    </form>
  </div>
</div>
<!-- Modal Actualizar Registro Facial -->
<div id="modalFacial" class="modal">
  <div class="modal-contenido modal-facial">
    <span class="cerrar" onclick="cerrarModal('modalFacial')">&times;</span>
    <h3>Actualizar registro facial</h3>
    <form method="POST" action="actualizar_facial.php" enctype="multipart/form-data">
      <label>Ingresar documento</label>
      <input type="text" name="documento" required>

      <label>Subir foto</label>
      <input type="file" name="foto" accept="image/*" required>

      <button class="btn-azul" type="submit">Subir foto</button>
    </form>
  </div>
</div>

<script>
  function abrirModal(id) {
    document.getElementById(id).style.display = 'block';
  }

  function cerrarModal(id) {
    document.getElementById(id).style.display = 'none';
  }

  // Cierra el modal si se hace clic fuera de él
  window.onclick = function (event) {
    const modal = document.getElementById('modalPassword');
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
  

</script>
</body>
</html>
