
<?php 

//Base de datos
include("../../bd.php");

// Si se proporciona un ID a través de la URL, se elimina el comentario correspondiente
if(isset($_GET['txtID'])){

    // Se obtiene el ID del comentario de la URL
    $txtID=(isset($_GET["txtID"]))? $_GET["txtID"]:"";
    // Se prepara la consulta para eliminar el comentario con el ID proporcionado
    $sentencia =$conexion->prepare("DELETE FROM tbl_comentarios WHERE id=:id ");
    $sentencia -> bindParam(":id",$txtID);
    // Se ejecuta la consulta para eliminar el comentario
    $sentencia -> execute();
     // Se redirige a la página index.php después de eliminar el comentario
    header("Location:index.php");



    //SENTENCIA PARA BORRAR DATOS   

$sentencia -> bindParam(":opinion",$titulo);
$sentencia -> bindParam(":nombre",$descripcion);


$sentencia ->execute();



}
// Se prepara y ejecuta una consulta para seleccionar todos los comentarios de la tabla tbl_comentarios
$sentencia =$conexion->prepare("SELECT * FROM `tbl_comentarios`");
$sentencia -> execute();
// Se almacenan los resultados de la consulta en la variable $lista_comentarios
$lista_comentarios =$sentencia-> fetchAll(PDO::FETCH_ASSOC);

//Encabezado
include ("../../templates/header.php"); 

?>

<br>

<div class="card">
    <div class="card-header">
        <a
            name=""
            id=""
            class="btn btn-primary"
            href="crear.php"
            role="button"
            >Agregar comentarios</a>
        
    </div>
    <div class="card-body">
        <div
            class="table-responsive-sm"
        >
            <table
                class="table "
            >
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Opinión</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Acciones</th

                    </tr>
                </thead>
                <?php
                        foreach ($lista_comentarios as $key => $value) { ?>
                <tbody>
                    <tr class="">
                        <td scope="row"><?php echo $value['ID'] ?></td>
                        <td><?php echo $value['opinion'] ?></td>
                        <td><?php echo $value['nombre'] ?></td>


                        <td>
                        <!-- Botones para editar y boorrar -->
                        <a
                                name=""
                                id=""
                                class="btn btn-info"
                                href="editar.php?txtID=<?php echo $value['ID']; ?>"
                                role="button"
                                >Editar</a
                            >
                            <a
                                name=""
                                id=""
                                class="btn btn-danger"
                                href="index.php?txtID=<?php echo $value['ID']; ?>"
                                role="button"
                                >Borrar</a
                            >
                        
                        </td>
                    </tr>
                    
                    <?php }?>
                </tbody>
            </table>
        </div>
        
    </div>
    <div class="card-footer text-muted"></div>
</div>








<?php include ("../../templates/footer.php"); ?>