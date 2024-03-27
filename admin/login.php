<?php
// Iniciar la sesión para mantener el estado de inicio de sesión del usuario
session_start();

// Verificar si se ha enviado el formulario de inicio de sesión
if ($_POST) {
    // Incluir el archivo de conexión a la base de datos
    include ("bd.php");

    // Obtener los datos del formulario de inicio de sesión
    $usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : '';
    $password = isset($_POST["password"]) ? $_POST["password"] : '';

    // Encriptar la contraseña proporcionada por el usuario utilizando MD5
    $password_encrypted = md5($password);

    // Consulta para buscar el usuario en la base de datos
    $sentencia = $conexion->prepare("SELECT *, count(*) as n_usuario FROM tbl_usuarios WHERE usuario=:usuario AND password=:password");
    $sentencia->bindParam(":usuario", $usuario);
    $sentencia->bindParam(":password", $password_encrypted);
    $sentencia->execute();
    
    // Obtener el resultado de la consulta
    $lista_usuarios = $sentencia->fetch(PDO::FETCH_LAZY);
    $n_usuario = $lista_usuarios["n_usuario"];

    // Verificar si se encontró un usuario con las credenciales proporcionadas
    if ($n_usuario == 1) {
        // Si las credenciales son válidas, iniciar sesión y redirigir al usuario a la página de inicio
        $_SESSION["usuario"] = $lista_usuarios["usuario"]; // Establecer el nombre de usuario en la sesión
        $_SESSION["logueado"] = true; // Establecer el estado de inicio de sesión como verdadero
        header("Location:index.php"); // Redirigir a la página de inicio
        exit; // Terminar la ejecución del script después de redirigir
    } else {
        // Si las credenciales son inválidas, mostrar un mensaje de error
        $mensaje = "Usuario o contraseña incorrecta...";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>

    <main>
        <div class="container">
            <div class="row">
                <div class="col"></div>

                <div class="col">
                    <br><br>
                    <?php if (isset($mensaje)) { ?>
                        <!-- Mostrar un mensaje de error si las credenciales son incorrectas -->
                        <div class="alert alert-danger" role="alert">
                            <strong>Error:</strong>
                            <?php echo $mensaje ?>
                        </div>
                    <?php } ?>

                    <div class="card text-center">
                        <div class="card-header">Login</div>
                        <div class="card-body">
                            <!-- Formulario de inicio de sesión -->
                            <form action="login.php" method="post">
                                <div class="mb-3">
                                    <label for="" class="form-label">Usuario</label>
                                    <input type="text" class="form-control" name="usuario" id="usuario"
                                        aria-describedby="helpId" placeholder="" />
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="">
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    Entrar
                                </button>
                            </form>
                            <!-- Fin del formulario de inicio de sesión -->
                        </div>
                    </div>
                </div>
                <!-- Columna vacía-->
                <div class="col"></div>
            </div>
        </div>
    </main>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>

</body>

</html>