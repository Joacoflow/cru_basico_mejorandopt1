
<?php

if ($_POST){

   $nombre=(isset($_POST['nombre'])?$_POST['nombre']:"");
   $correo=(isset($_POST['correo'])?$_POST['correo']:"");
   $contrasena=(isset($_POST['contrasena'])?$_POST['contrasena']:"");

    $stm = $conexion->prepare("INSERT INTO alumnos(id,nombre,correo,contrasena)
    VALUES(null,:nombre,:correo,:contrasena)");
    
    $stm->bindParam(":nombre",$nombre);
    $stm->bindParam(":correo",$correo);
    $stm->bindParam(":contrasena",$contrasena);
    $stm->execute();

    header("location:index.php");
}

?>

<!-- Modal create -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR ALUMNO </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method ="post">
      <div class="modal-body">
        <label for="">Nombre</label>
        <input type="text" class = "form-control" name="nombre" value="" placeholder="Ingrese su nombre";>

        <label for="">Correo</label>
        <input type="text" class = "form-control" name="correo" value=""  placeholder="Ingrese su correo";>

        <label for="">Contraseña</label>
        <input type="text" class = "form-control" name="contrasena" value="" placeholder="Ingrese su contraseña";>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
      </div>
       </form>
    </div>
  </div>
</div>