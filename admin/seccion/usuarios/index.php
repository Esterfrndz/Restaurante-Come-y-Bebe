<?php

// Base de datos
include ("../../bd.php");

// Encabezado
include ("../../templates/header.php");

// Verificar si se ha enviado un ID a través de la URL para eliminar un usuario
if (isset($_GET['txtID'])) {
    // Se obtiene el ID de la URL
    $txtID = isset($_GET["txtID"]) ? $_GET["txtID"] : "";

    // Verificar si el ID es válido antes de realizar la eliminación
    if (!empty($txtID)) {
        // Se prepara la consulta para eliminar el usuario con el ID proporcionado
        $sentencia = $conexion->prepare("DELETE FROM tbl_usuarios WHERE id=:id ");
        $sentencia->bindParam(":id", $txtID);
        // Se ejecuta la consulta para eliminar el usuario
        $sentencia->execute();
        // Después de eliminar el usuario, se redirige a la página index.php
        header("Location:index.php");
        // Se finaliza la ejecución del script después de redirigir para evitar que se siga ejecutando el código
        exit;
    }
}

// Se prepara y ejecuta una consulta para seleccionar todos los usuarios de la tabla tbl_usuarios
$sentencia = $conexion->prepare("SELECT * FROM tbl_usuarios");
$sentencia->execute();
// Se almacenan los resultados de la consulta en la variable $lista_usuarios
$lista_usuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="card">
    <div class="card-header">
        <!-- Botón para agregar usuarios -->
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar usuarios</a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <!-- Tabla para mostrar los usuarios existentes -->
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Usuarios</th>
                        <th scope="col">Password</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_usuarios as $registro) { ?>
                        <tr class="">
                            <!-- Se muestra cada usuario en una fila de la tabla -->
                            <td><?php echo $registro["ID"] ?></td>
                            <td><?php echo $registro["usuario"] ?></td>
                            <td><?php echo $registro["password"] ?></td>
                            <td><?php echo $registro["correo"] ?></td>
                            <td>
                                <!-- Botón para borrar el usuario -->
                                <a name="" id="" class="btn btn-danger"
                                    href="index.php?txtID=<?php echo $registro['ID']; ?>" role="button">Borrar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php
// Footer
include ("../../templates/footer.php");
?>
