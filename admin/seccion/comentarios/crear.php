<?php
//Base de datos
include ("../../bd.php");

// Se verifica si se ha enviado algún dato a través del método POST
if ($_POST) {
    // Se obtienen los valores de los campos del formulario
    $opinion = (isset($_POST['opinion'])) ? $_POST['opinion'] : "";
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "";

    // Se prepara la consulta para insertar un nuevo comentario en la tabla tbl_comentarios
    $sentencia = $conexion->prepare("INSERT INTO `tbl_comentarios` (`ID`, `opinion`, `nombre`) VALUES (NULL, :opinion, :nombre);");

    // Se vinculan los parámetros de la consulta con los valores obtenidos del formulario
    $sentencia->bindParam(":opinion", $opinion);
    $sentencia->bindParam(":nombre", $nombre);

    // Se ejecuta la consulta para insertar el nuevo comentario en la base de datos
    $sentencia->execute();
    
    // Se redirige a la página index.php después de agregar el comentario
    header("Location:index.php");
}

// Encabezado
include ("../../templates/header.php");
?>
<br>

<div class="card">
    <div class="card-header">
        Comentarios
    </div>

    <div class="card-body">
        <!-- Formulario para agregar comentarios -->
        <form action="" method="post">

            <div class="mb-3">
                <label for="" class="form-label">Opinion</label>
                <input type="text" class="form-control" name="opinion" id="opinion" aria-describedby="helpId"
                    placeholder="" />
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId"
                    placeholder="" />
            </div>

            <!-- Botones para enviar el formulario o cancelar -->
            <button type="submit" class="btn btn-success">Agregar comentario</button>
            <a href="index.php" name="" id="" class="btn btn-primary" role="button">Cancelar</a>

        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php 
// Footer
include ("../../templates/footer.php"); 
?>
