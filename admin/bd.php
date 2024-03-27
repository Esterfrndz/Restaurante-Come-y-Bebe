<?php
// Detalles de la base de datos
$servidor = "localhost"; // Servidor de la base de datos
$usuario = "root"; // Usuario de la base de datos
$contrasena = ""; // Contraseña de la base de datos
$baseDatos = "restaurante"; // Nombre de la base de datos

try {
    // Crear una nueva instancia de PDO para conectarse a la base de datos
    $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $contrasena);
} catch (Exception $error) {
    // Manejar cualquier error que ocurra durante la conexión
    echo $error->getMessage(); // Imprimir el mensaje de error
}
?>
