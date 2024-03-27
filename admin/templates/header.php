<?php

// Iniciar sesión
session_start();

// URL base del sitio web
$url_base = "http://localhost/restaurant/admin/";

// Verificar si no hay un usuario conectado
if (!isset($_SESSION["usuario"])) {
    // Redirigir a la página de inicio de sesión
    header("Location:" . $url_base . "login.php");
    // Finalizar la ejecución del script
    exit;
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Administrador del sitio web</title>
    <!-- Meta etiquetas necesarias -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">

    <!-- DataTables JavaScript -->
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <header>
        <!-- Barra de navegación -->
        <nav class="navbar navbar-expand navbar-light bg-light">
            <div class="nav navbar-nav">
                <!-- Enlace al inicio -->
                <a class="nav-item nav-link active" href="<?php echo $url_base; ?>index.php" aria-current="page">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-person" viewBox="0 0 16 16">
                        <path
                            d="M8 8a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm4-4a4 4 0 1 0-8 0h8zM6.5 11.5a6.5 6.5 0 0 0 5 0v.5a1.5 1.5 0 0 1-3 0v-.5a3.5 3.5 0 0 0-7 0v.5a1.5 1.5 0 0 1-3 0v-.5a6.5 6.5 0 0 0 5 0v-.5a2 2 0 0 1 4 0v.5z" />
                    </svg>
                    Administrador <span class="visually-hidden">(current)</span>
                </a>

                <!-- Enlaces del menú de navegación -->
                <a class="nav-item nav-link" href="<?php echo $url_base; ?>/seccion/banners">Banners</a>
                <a class="nav-item nav-link" href="<?php echo $url_base; ?>/seccion/comentarios">Comentarios</a>
                <a class="nav-item nav-link" href="<?php echo $url_base; ?>/seccion/usuarios">Usuarios</a>
                <a class="nav-item nav-link" href="<?php echo $url_base; ?>cerrar.php">Cerrar sesión</a>
            </div>
        </nav>
    </header>
    <main>
        <!-- Contenido principal -->
        <section class="container">
