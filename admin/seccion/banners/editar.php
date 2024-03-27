<?php
// Base de datos
include ("../../bd.php");

// Verifica si se ha proporcionado un ID de banner para editar a través de la URL
if (isset($_GET['txtID'])) {
    // Obtiene el ID del banner de la URL
    $txtID = (isset($_GET["txtID"])) ? $_GET["txtID"] : "";

    // Prepara una sentencia SQL para seleccionar el banner con el ID proporcionado
    $sentencia = $conexion->prepare("SELECT * FROM `tbl_banners` WHERE ID=:id");
    $sentencia->bindparam(":id", $txtID);
    $sentencia->execute();

    // Obtiene los datos del banner seleccionado
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);
    $titulo = $registro["titulo"];
    $descripcion = $registro["descripcion"];
    $link = $registro["link"];
}

// Si se envían datos mediante el método POST (es decir, cuando se envía el formulario)
if ($_POST) {
    // Obtiene los valores enviados a través del formulario
    $titulo = (isset($_POST["titulo"])) ? $_POST["titulo"] : "";
    $descripcion = (isset($_POST["descripcion"])) ? $_POST["descripcion"] : "";
    $link = (isset($_POST["link"])) ? $_POST["link"] : "";
    $txtID = (isset($_POST["txtID"])) ? $_POST["txtID"] : "";

    // Prepara una sentencia SQL para actualizar los datos del banner en la base de datos
    $sentencia = $conexion->prepare("UPDATE `tbl_banners` SET titulo =:titulo,descripcion=:descripcion,link=:link WHERE ID =:id");
    $sentencia->bindParam(":titulo", $titulo);
    $sentencia->bindParam(":descripcion", $descripcion);
    $sentencia->bindParam(":link", $link);
    $sentencia->bindParam(":id", $txtID);

    // Ejecuta la sentencia SQL para actualizar los datos del banner
    $sentencia->execute();

    // Redirecciona a la página de índice después de haber modificado los datos
    header("Location:index.php");
}

// Encabezado
include ("../../templates/header.php");
?>

<br>

<div class="card">
    <div class="card-header">Editar Banners</div>

    <div class="card-body">
        <!-- FORMULARIO PARA EDITAR BANNER -->
        <form action="" method="post">
            <div class="mb-3">
                <label for="titulo" class="form-label">ID</label>
                <!-- Muestra el ID del banner como un campo de solo lectura -->
                <input type="text" class="form-control" value="<?php echo $txtID; ?>" name="txtID" id="txtID" aria-describedby="helpId" placeholder="Escriba el titulo del banner" readonly />
            </div>

            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo:</label>
                <!-- Muestra el título actual del banner y permite editar -->
                <input type="text" class="form-control" value="<?php echo $titulo; ?>" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Escriba el titulo del banner" />
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <!-- Muestra la descripción actual del banner y permite editar -->
                <input type="text" class="form-control" value="<?php echo $descripcion; ?>" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Escriba la descripción del banner" />
            </div>

            <div class="mb-3">
                <label for="link" class="form-label">Link</label>
                <!-- Muestra el enlace actual del banner y permite editar -->
                <input type="text" class="form-control" value="<?php echo $link; ?>" name="link" id="link" aria-describedby="helpId" placeholder="Escriba el enlace" />
            </div>

            <!-- Botón para enviar el formulario -->
            <button type="submit" class="btn btn-success">Modificar banner</button>
            <!-- Enlace para cancelar y volver al índice -->
            <a href="index.php" name="" id="" class="btn btn-primary" role="button">Cancelar</a>
        </form>

    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php
// Footer
include ("../../templates/footer.php");
?>
<br>
