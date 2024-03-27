<?php
// Se incluye el archivo de configuración de la base de datos
include ("../../bd.php");

// Si se envía el formulario de agregar usuario ($_POST), se procesa la solicitud
if ($_POST) {
    // Se obtienen los valores enviados a través del formulario
    $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : "";
    $password = (isset($_POST['password'])) ? $_POST['password'] : "";
    // Se encripta la contraseña usando el algoritmo MD5 (no se recomienda para seguridad actual)
    $password = md5($password); // IMPORTANTE: MD5 no es seguro y no se recomienda para almacenamiento de contraseñas
    $correo = (isset($_POST['correo'])) ? $_POST['correo'] : "";

    // Se prepara la consulta para insertar un nuevo usuario en la tabla tbl_usuarios
    $sentencia = $conexion->prepare("INSERT INTO `tbl_usuarios` (`ID`, `usuario`, `password`, `correo`) VALUES (NULL, :usuario, :password, :correo);");
    $sentencia->bindParam(":usuario", $usuario);
    $sentencia->bindParam(":password", $password);
    $sentencia->bindParam(":correo", $correo);

    // Se ejecuta la consulta para agregar el nuevo usuario a la base de datos
    $sentencia->execute();

    // Después de agregar el usuario, se redirige a la página index.php
    header("Location:index.php");
}

// Se incluye el archivo de encabezado
include ("../../templates/header.php");
?>

<br>

<div class="card">
    <div class="card-header">Usuarios</div>
    <div class="card-body">
        <!-- Formulario para agregar un nuevo usuario -->
        <form action="" method="post">
            <div class="mb-3">
                <label for="usuario" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="usuario" id="usuario" aria-describedby="helpId"
                    placeholder="Inserta el nombre del usuario" />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId"
                    placeholder="Inserte una contraseña" />
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="text" class="form-control" name="correo" id="correo" aria-describedby="helpId"
                    placeholder="Inserte un correo" />
            </div>
            <button type="submit" class="btn btn-success">Agregar usuario</button>
            <a href="index.php" name="" id="" class="btn btn-primary" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php
// Se incluye el archivo de pie de página
include ("../../templates/footer.php");
?>
