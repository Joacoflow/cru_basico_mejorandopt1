<?php 

include("../../conexion.php");

$stm=$conexion->prepare("SELECT * FROM alumnos");
$stm->execute();
$alumnos=$stm->fetchAll(PDO::FETCH_ASSOC);


if(isset($_GET['id'])){

    $txtid=(isset($_GET['id'])?$_GET['id']:"");
    $stm=$conexion->prepare("DELETE FROM alumnos WHERE id=:txtid");
    $stm->bindParam(":txtid",$txtid);
    $stm->execute();
    header("location:index.php");
}

?><?php include("../../template/header.php"); ?>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
  Agregar
</button>

<div class="table-responsive">
    <table class="table ">
        <thead class= "table table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Contraseña</th>
                <th> Acciones </th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($alumnos as $alumno){?>
            <tr class="">
                <td scope="row"><?php echo $alumno['id']; ?></td>
                <td><?php echo $alumno['nombre']; ?></td>
                <td><?php echo $alumno['correo']; ?></td>
                <td><?php echo $alumno['contrasena']; ?></td>
                <td>
                   <a href="edit.php?id=<?php echo $alumno['id'];?>" class="btn btn-sucess">Editar</a>
                   <a href="index.php?id=<?php echo $alumno['id'];?>" class="btn btn-danger">Borrar</a>
                </td>
                

            </tr><?php } ?>

        </tbody>
    </table>
</div><?php include("create.php");?><?php include("../../template/footer.php");?>