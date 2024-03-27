<?php

//Base de datos
include ("../../bd.php");

// Si se ha proporcionado un ID a través de la URL, se procede a eliminar el mensaje correspondiente
if (isset($_GET['txtID'])) {
        // Se obtiene el ID del mensaje de la URL
    $txtID = isset($_GET["txtID"]) ? $_GET["txtID"] : "";

    // Se prepara la consulta para eliminar el mensaje con el ID proporcionado
    $sentencia = $conexion->prepare("DELETE FROM tbl_mensajes WHERE id=:id ");
    $sentencia->bindParam(":id", $txtID);
    // Se ejecuta la consulta para eliminar el mensaje
    $sentencia->execute();

    // Después de eliminar el mensaje, se redirige a la página index.php
    header("Location:index.php");
}


// Se prepara y ejecuta una consulta para seleccionar todos los mensajes de la tabla tbl_mensajes
$sentencia = $conexion->prepare("SELECT * FROM `tbl_mensajes`");
$sentencia->execute();
// Se almacenan los resultados de la consulta en la variable $lista_mensajes
$lista_mensajes = $sentencia->fetchAll(PDO::FETCH_ASSOC);

//Encabezado
include ("../../templates/header.php");

?>

<div class="card">
    <div class="card-header">Mensajes</div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Mensajes</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_mensajes as $registro) { ?>
                        <tr class="">
                            <td>
                                <?php echo $registro["ID"] ?>
                            </td>
                            <td>
                                <?php echo $registro["nombre"] ?>
                            </td>
                            <td>
                                <?php echo $registro["correo"] ?>
                            </td>
                            <td>
                                <?php echo $registro["mensaje"] ?>
                            </td>

                            <td>

                                <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $value['ID']; ?>"
                                    role="button">Borrar</a>

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

//Footer
include ("../../templates/footer.php"); ?>