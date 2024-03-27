<?php
//Base de datos
include ("admin/bd.php");

// Consulta para obtener el último banner registrado en la base de datos
$sentencia = $conexion->prepare("SELECT * FROM tbl_banners ORDER BY id DESC limit 1");
$sentencia->execute();
$lista_banners = $sentencia->fetchAll(PDO::FETCH_ASSOC);

// Consulta para obtener los últimos 2 comentarios registrados en la base de datos
$sentencia = $conexion->prepare("SELECT * FROM tbl_comentarios ORDER BY id DESC limit 2");
$sentencia->execute();
$lista_comentarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

// Verificar si se ha enviado el formulario de contacto
if ($_POST) {
    // Filtrar y obtener los datos del formulario de contacto
    $nombre = filter_var($_POST["nombre"], FILTER_SANITIZE_STRING);
    $correo = filter_var($_POST["correo"], FILTER_SANITIZE_EMAIL);
    $mensaje = filter_var($_POST["mensaje"], FILTER_SANITIZE_STRING);

    // Verificar si los campos del formulario no están vacíos
    if ($nombre && $correo && $mensaje) {
        // Preparar la consulta para insertar el mensaje en la base de datos
        $sql = "INSERT INTO tbl_mensajes(nombre, correo, mensaje) VALUES (:nombre, :correo,:mensaje)";
        $resultado = $conexion->prepare($sql);
        $resultado->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $resultado->bindParam(":correo", $correo, PDO::PARAM_STR);
        $resultado->bindParam(":mensaje", $mensaje, PDO::PARAM_STR);
        $resultado->execute(); // Ejecutar la consulta para insertar el mensaje
    }
}
?>



<!doctype html>
<html lang="en">

<head>
    <title>Come y bebe</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>



    <!-- Navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">


        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="#"><i></i><img src="./images/logo.png" alt="" style="width:60px"></a>
            <!-- Botón -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="nav navbar-nav ml-auto">


                    <li class="nav-item">
                        <a class="nav-link" href="#inicio">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#menu">Menú del día</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#chefs">Chefs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#comentarios">Comentarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contacto">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#horario">Horario</a>
                    </li>
                    <li>
                        <a class="nav-link" href="./admin/login.php"
                            style="border:2px double white; margin-left:600px; border-radius: 10px;">
                            <strong>Iniciar sesión</strong>
                        </a>
                    </li>



                </ul>


            </div>

        </div>
    </nav>


    <!-- TITULO -->

    <section id="inicio" class="container-fluid p-0">

        <div class="banner-img"
            style="position:relative;background:url('images/background.jpeg') center/cover no-repeat; height:400px;">

            <?php
            foreach ($lista_banners as $banner) {
                ?>
                <div class="banner-text"
                    style="position:absolute; top:50%;left:50%;transform:translate(-50%,-50%); text-align:center;color:white">
                    <h1>
                        <?php echo $banner['titulo']; ?>
                    </h1>
                    <p>
                        <?php echo $banner['descripcion']; ?>
                    </p>
                    <a href="<?php echo $banner['link']; ?>" class="btn btn-primary">Ver menú</a>
                <?php } ?>
            </div>

    </section>


    <!-- BIENVENIDA -->

    <section class="container mt-4 text-center">


        <div class="jumbotron bg-dark text-white" style="padding: 10px;">

            <br>
            <h2>¡Bienvenido a tu restaurante de especialidades!</h2>
            <p>
                Descubre una experiencia culinaria única
            </p>


        </div>

    </section>

    <!-- CHEFS -->
    <section id="chefs" class="container mt-4 text-center">

        <h2>Nuestros chefs</h2>
        <div class="row">

            <div class="col-md-4">

                <div class="card"> <!--Imagen-->
                    <img src="./images/chefs/chef1.jpg" class="card-img-top" alt="Chef 1">

                    <div class="card-body">
                        <h5 class="card-title">David</h5>
                        <p class="card-text">El chef de comida picante</p>

                        <div class="social-icons mt-3">
                            <a href="#" class="text-dark me-2"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="text-dark me-2"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="text-dark me-2"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="text-dark me-2"><i class="fab fa-linkedin"></i></a>
                        </div>

                    </div>



                </div>

            </div>


            <div class="col-md-4">

                <div class="card"> <!--Imagen-->
                    <img src="./images/chefs/chef2.jpg" class="card-img-top" alt="Chef 1">

                    <div class="card-body">
                        <h5 class="card-title">Oscar</h5>
                        <p class="card-text">Chef del mediterráneo</p>

                        <div class="social-icons mt-3">
                            <a href="#" class="text-dark me-2"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="text-dark me-2"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="text-dark me-2"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="text-dark me-2"><i class="fab fa-linkedin"></i></a>
                        </div>

                    </div>



                </div>

            </div>


            <div class="col-md-4">

                <div class="card"> <!--Imagen-->
                    <img src="./images/chefs/chef3.jpeg" class="card-img-top" alt="Chef 1">

                    <div class="card-body">
                        <h5 class="card-title">Pedro</h5>
                        <p class="card-text">Especialista en gastronomía italiana</p>

                        <div class="social-icons mt-3">
                            <a href="#" class="text-dark me-2"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="text-dark me-2"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="text-dark me-2"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="text-dark me-2"><i class="fab fa-linkedin"></i></a>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- COMENTARIOS -->

    <section id="comentarios" class="bg-light py-5">

        <div class="container">

            <h2 class="text-center mb-4">Comentarios</h2>

            <div class="row">

                <?php foreach ($lista_comentarios as $comentario) { ?>

                    <div class="col-md-6 d-flex">
                        <div class="card mb-4 w-100">
                            <div class="card-body">
                                <p class="card-text">
                                    <?php echo $comentario["opinion"]; ?>
                                </p>
                            </div>
                            <div class="card-footer text-muted">
                                <?php echo $comentario["nombre"]; ?>
                            </div>

                        </div>

                    </div>

                <?php } ?>



            </div>

        </div>



    </section>

    <br>
    <br>


    <!-- GALERIA DE MENU -->


    <section id="menu" class="container mt-4">

        <h2 class="text-center">Recomendaciones</h2>
        <br>
        <div class="row row-cols-1 row-cols-md-4 g-4">

            <div class="col d-flex">
                <div class="card">
                    <img src="./images/menu/paella.jpeg" alt="Paella" class="card-img-top" width="50">
                    <div class="card-body">
                        <h5 class="card-title">Paella de marisco</h5>
                        <p class="card-text small"><strong>Ingredientes: </strong>Arroz,mejillones,gambas y cigalas</p>
                        <p class="card-text"> <strong>40,99 € </strong> </p>
                    </div>
                </div>

            </div>


            <div class="col d-flex">
                <div class="card">
                    <img src="./images/menu/risoto.jpeg" alt="Risoto" class="card-img-top" width="50">
                    <div class="card-body">
                        <h5 class="card-title">Risoto de setas</h5>
                        <p class="card-text small"><strong>Ingredientes: </strong>Arroz,setas variadas,cebolla y
                            parmesano</p>
                        <p class="card-text"> <strong>14,00 € </strong> </p>
                    </div>
                </div>

            </div>

            <div class="col d-flex">
                <div class="card">
                    <img src="./images/menu/pizza.jpeg" alt="Pizza" class="card-img-top" width="50">
                    <div class="card-body">
                        <h5 class="card-title">Pizza especialidad</h5>
                        <p class="card-text small"><strong>Ingredientes: </strong>Mozzarella,tomate y pesto e
                            ingrediente de la casa</p>
                        <p class="card-text"> <strong>16,95 € </strong> </p>
                    </div>
                </div>

            </div>

            <div class="col d-flex">
                <div class="card">
                    <img src="./images/menu/tiramisu.jpeg" alt="Tiramisú" class="card-img-top" width="50">
                    <div class="card-body">
                        <h5 class="card-title">Tiramisú tradicional</h5>
                        <p class="card-text small"><strong>Ingredientes: </strong>Mascarpone Galbani,café y canela</p>
                        <p class="card-text"> <strong>7,99 € </strong> </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <br>
    <!-- CONTACTO -->

    <section id="contacto" class="container mt-4">
        <h2>Contacto</h2>
        <p>Estamos aquí para servirle</p>

        <form action="?" method="post">

            <div class="mb-3">
                <label for="nombre">Nombre:</label><br>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escribe tu nombre"
                    required><br>
            </div>

            <div class="mb-3">

                <label for="correo ">Correo electrónico</label><br>
                <input type="email" class="form-control" id="correo" name="correo"
                    placeholder="Escribe tu correo electrónico " required><br>

            </div>


            <div class="mb-3">
                <label for="mensaje">Mensaje:</label><br>
                <textarea rows="6" cols="50" id="message" name="mensaje" class="form-control"></textarea><br>
            </div>



            <input type="submit" class="btn btn-primary" value="Enviar mensaje">
        </form>

    </section>
    <br><br>

    <div id="horario" class="text-center bg-light p-4">
        <h3 class="mb-4">Horario de atención</h3>

        <div>

            <p><strong>Lunes a Viernes</strong></p>
            <p>13:00 p.m - 22:00 p.m.</p>
        </div>

        <div>

            <p><strong>Sabado</strong></p>
            <p>13:00 p.m - 16:00 p.m.</p>
        </div>


        <div>

            <p><strong>Domingo</strong></p>
            <p>Cerrado</p>
        </div>


    </div>


    <!-- FOOTER -->
    <footer class="bg-dark text-light text-center">

        <p>&copy; 2024 Come y Bebe, Derechos Reservados</p>

    </footer>








    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>