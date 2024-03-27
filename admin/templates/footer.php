</section>
</main>
<footer>
    <!-- Aquí puedes colocar el contenido del pie de página si es necesario -->
    <!-- Por ejemplo: información de contacto, enlaces adicionales, etc. -->
</footer>

<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>

<!-- Script personalizado para inicializar DataTables -->
<script>
    $(document).ready(function () {
        // Inicializar DataTables con configuraciones personalizadas
        $('table').DataTable({
            "pageLength": 3, // Número de elementos por página
            "lengthMenu": [
                [3, 10, 25, 50], // Opciones de longitud del menú
                [3, 10, 25, 50]
            ],
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json" // Configurar el idioma a español
            }
        });
    });
</script>

</body>

</html>
