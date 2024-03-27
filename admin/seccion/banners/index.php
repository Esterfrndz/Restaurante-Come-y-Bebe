<?php 
//Base de datos
include("../../bd.php");

// Se verifica si se ha pasado el parámetro txtID a través de la URL
if(isset($_GET['txtID'])){
    // Se obtiene el valor de txtID de la URL
    $txtID=(isset($_GET["txtID"]))? $_GET["txtID"]:"";
    
    // Se prepara la consulta para eliminar el registro correspondiente de la tabla tbl_banners
    $sentencia =$conexion->prepare("DELETE FROM tbl_banners WHERE id=:id ");
    $sentencia -> bindParam(":id",$txtID);
    
    // Se ejecuta la consulta para eliminar el registro
    $sentencia -> execute();
        
    // Se redirige a index.php después de eliminar el registro
    header("Location:index.php");
}

// Se prepara y ejecuta una consulta para seleccionar todos los registros de la tabla tbl_banners
$sentencia =$conexion->prepare("SELECT * FROM `tbl_banners`");
$sentencia -> execute();
// Se almacenan los resultados de la consulta en la variable $lista_banners
$lista_banners =$sentencia-> fetchAll(PDO::FETCH_ASSOC);

// Encabezado
include ("../../templates/header.php"); 
?>

<div class="card">
    <div class="card-header">
        <!-- BOTON para agregar nuevos registros -->
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar registros</a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <!-- TABLA para mostrar los registros existentes -->
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Título</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Enlace</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Se recorre la lista de banners y se muestra cada uno en una fila de la tabla
                    foreach ($lista_banners as $key => $value) { ?>
                    <tr class="">
                        <td scope="row"><?php echo $value['ID'] ?></td>
                        <td><?php echo $value['titulo'] ?></td>
                        <td><?php echo $value['descripcion'] ?></td>
                        <td><?php echo $value['link'] ?></td>
                        <td>
                            <!-- BOTONES para editar y borrar registros -->
                            <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $value['ID']; ?>" role="button">Editar</a>
                            <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $value['ID']; ?>" role="button">Borrar</a>
                        </td>  
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php 
// Footer
include ("../../templates/footer.php"); 
?>
