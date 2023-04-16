
<?php 

include("../../conexion.php");
if(isset($_GET['id'])){

    $txtid=(isset($_GET['id'])?$_GET['id']:"");
    $stm=$conexion->prepare("SELECT * FROM alumnos WHERE id=:txtid");
    $stm->bindParam(":txtid",$txtid);
    $stm->execute();
   $registro=$stm->fetch(PDO::FETCH_LAZY);
   $nombre=$registro['nombre'];
   $correo=$registro['correo'];
   $contrasena=$registro['contrasena'];

}

if ($_POST){
    $txtid=(isset($_POST['txtid'])?$_POST['txtid']:"");
    $nombre=(isset($_POST['nombre'])?$_POST['nombre']:"");
    $correo=(isset($_POST['correo'])?$_POST['correo']:"");
    $contrasena=(isset($_POST['contrasena'])?$_POST['contrasena']:"");
 
     $stm = $conexion->prepare("UPDATE alumnos SET nombre=:nombre, correo=:correo , contrasena=:contrasena WHERE id=:txtid");
     
     $stm->bindParam(":nombre",$nombre);
     $stm->bindParam(":correo",$correo);
     $stm->bindParam(":contrasena",$contrasena);
     $stm->bindParam(":txtid",$txtid);
     $stm->execute();
 
     header("location:index.php");                                
 
 }


?>

<?php include("../../template/header.php"); ?>

<form action="" method ="post">
      
        <input type="hidden" class = "form-control" name="txtdid" value="<?php echo $txtid; ?>" placeholder="Ingrese su nombre";>

        <label for="">Nombre</label>
        <input type="text" class = "form-control" name="nombre" value="<?php echo $nombre; ?>" placeholder="Ingrese su nombre";>

        <label for="">Correo</label>
        <input type="text" class = "form-control" name="correo" value="<?php echo $correo; ?>"  placeholder="Ingrese su correo";>

        <label for="">Contraseña</label>
        <input type="text" class = "form-control" name="contrasena" value="<?php echo $contrasena; ?>" placeholder="Ingrese su contraseña";>

      </div>
      <div class="modal-footer">
         <a href="index.php" class="btn btn-danger">Cancelar</a>
      <button type="submit" class="btn btn-primary">Actualizar </button>
      </div>
       </form>
       
<?php include("../../template/footer.php"); ?>