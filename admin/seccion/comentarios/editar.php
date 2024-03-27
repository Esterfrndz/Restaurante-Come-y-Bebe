<?php
// Se incluye el archivo de configuración de la base de datos
include ("../../bd.php");

// Si se proporciona un ID a través de la URL, se realiza una consulta para obtener los detalles del comentario correspondiente
if (isset($_GET['txtID'])) {
    // Se obtiene el ID del comentario de la URL
    $txtID = (isset($_GET["txtID"])) ? $_GET["txtID"] : "";

    // Se prepara la consulta para seleccionar el comentario con el ID proporcionado
    $sentencia = $conexion->prepare("SELECT * FROM `tbl_comentarios` WHERE ID=:id");
    $sentencia->bindparam(":id", $txtID);
    $sentencia->execute();

    // Se obtiene el registro del comentario
    $registro = $sentencia->fetch(PDO::FETCH_ASSOC);
    $opinion = $registro["opinion"];
    $nombre = $registro["nombre"];
}

// Si se envían datos a través del formulario de edición
if ($_POST) {
    // Se obtienen los valores del formulario
    $opinion = (isset($_POST["opinion"])) ? $_POST["opinion"] : "";
    $nombre = (isset($_POST["nombre"])) ? $_POST["nombre"] : "";
    $txtID = (isset($_POST["txtID"])) ? $_POST["txtID"] : "";

    // Se prepara la consulta para actualizar el comentario
    $sentencia = $conexion->prepare("UPDATE `tbl_comentarios` SET opinion =:opinion,nombre=:nombre WHERE ID =:id");

    // Se vinculan los parámetros de la consulta con los valores del formulario
    $sentencia->bindParam(":opinion", $opinion);
    $sentencia->bindParam(":nombre", $nombre);
    $sentencia->bindParam(":id", $txtID);
    
    // Se ejecuta la consulta para actualizar el comentario
    $sentencia->execute();

    // Se redirige a la página index.php después de actualizar el comentario
    header("Location:index.php");
}

// Se incluye el archivo de encabezado
include ("../../templates/header.php");
?>

<br>
<div class="card">
    <div class="card-header">Editar Comentario</div>
    <div class="card-body">
        <!-- FORMULARIO para editar el comentario -->
        <form action="" method="post">
            <div class="mb-3">
                <label for="txtID" class="form-label">ID</label>
                <input type="text" class="form-control" value="<?php echo $txtID; ?>" name="txtID" id="txtID"
                    aria-describedby="helpId" placeholder="ID del comentario" readonly />
            </div>
            <div class="mb-3">
                <label for="opinion" class="form-label">Opinion</label>
                <input type="text" class="form-control" value="<?php echo $opinion; ?>" name="opinion" id="opinion"
                    aria-describedby="helpId" placeholder="Escriba la opinión" />
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" value="<?php echo $nombre; ?>" name="nombre" id="nombre"
                    aria-describedby="helpId" placeholder="Nombre del autor" />
            </div>
            <button type="submit" class="btn btn-success">Modificar comentario</button>
            <a href="index.php" name="" id="" class="btn btn-primary" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php 
// Se incluye el archivo de pie de página
include ("../../templates/footer.php"); 
?>
