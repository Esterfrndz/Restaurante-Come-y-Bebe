<?php

// Base de datos
include("../../bd.php");

// Comprueba si se ha enviado algún dato a través del método POST
if ($_POST) {

    // Recupera los valores enviados a través del formulario, si no se han enviado, asigna un valor vacío
    $titulo = (isset($_POST["titulo"])) ? $_POST["titulo"] : "";
    $descripcion = (isset($_POST["descripcion"])) ? $_POST["descripcion"] : "";
    $link = (isset($_POST["link"])) ? $_POST["link"] : "";

    // Prepara una sentencia SQL para insertar datos en la tabla 'tbl_banners'
    $sentencia = $conexion->prepare("INSERT INTO `tbl_banners` (`ID`, `titulo`, `descripcion`, `link`) VALUES (NULL, :titulo, :descripcion, :link);");

    // Vincula los parámetros de la sentencia SQL con las variables
    $sentencia->bindParam(":titulo", $titulo);
    $sentencia->bindParam(":descripcion", $descripcion);
    $sentencia->bindParam(":link", $link);

    // Ejecuta la sentencia SQL
    $sentencia->execute();

    // Redirecciona a la página de índice después de haber insertado los datos
    header("Location:index.php");
}

// Encabezado
include("../../templates/header.php");
?>

<br>

<div class="card">
    <div class="card-header">Banners</div>

    <div class="card-body">

        <!-- Formulario para agregar un nuevo banner -->
        <form action="" method="post">
            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo:</label>
                <input type="text" class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Escriba el título del banner" />
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <input type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Escriba la descripción del banner" />
            </div>

            <div class="mb-3">
                <label for="link" class="form-label">Link:</label>
                <input type="text" class="form-control" name="link" id="link" aria-describedby="helpId" placeholder="Escriba el enlace" />
            </div>

            <!-- Botón para enviar el formulario -->
            <button type="submit" class="btn btn-success">Crear banner</button>
            <!-- Enlace para cancelar y volver al índice -->
            <a href="index.php" name="" id="" class="btn btn-primary" role="button">Cancelar</a>
        </form>

    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php
// Incluye el pie de página HTML
include("../../templates/footer.php");
?>

<br>
