<?php include("templates/header.php"); ?> <!-- Encabezado -->

<br>

<div class="row align-items-md-stretch">
    <div class="col-md-12">
        <div class="h-100 p-5 border rounded-3">
            <h2>Bienvenido Administrador <?php echo $_SESSION["usuario"]; ?></h2> <!-- Mostrar el nombre del usuario administrador -->
            <p>
                Este espacio es para administradores <!-- Mensaje de bienvenida -->
            </p>
            <button class="btn btn-outline-primary" type="button">
                Iniciar ahora <!-- Botón para iniciar alguna acción -->
            </button>
        </div>
    </div>
</div>

<?php include ("templates/footer.php"); ?> <!-- Footer-->
