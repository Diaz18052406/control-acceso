<?php
session_start();              // Inicia o reanuda sesión
session_unset();              // Limpia variables de sesión
session_destroy();            // Destruye la sesión

// Redirige al login 
header("Location: index.php");
exit;
