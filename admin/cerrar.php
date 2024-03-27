<?php 
session_start();

// Redirigir a la página de inicio antes de destruir la sesión
header("Location: index.php");

// Destruir la sesión
session_destroy();

// Este mensaje no se mostrará porque el usuario ya ha sido redirigido
echo "Sesión cerrada. Redirigiendo a la página de inicio...";
?>
