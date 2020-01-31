<?php
require_once("funciones.php");
include_once("conexion.php");
$id_prod=$_POST["producto_id"];
$nombre=$_POST["nombre"];
$stock=$_POST["stock"];
$precio=$_POST["precio"];
$marca=$_POST["marca"];
$categoria_id=$_POST["categoria_id"];
global $DB;
$email=$_SESSION["exito"];
$user = $DB->prepare("SELECT * FROM usuarios WHERE email LIKE :email;");
$user->bindValue(":email",$email,PDO::PARAM_STR);
$user->execute();
$user_id=$user->fetch(PDO::FETCH_ASSOC);

if($_POST['boton']=="Guardar"){
  // traigo todas las categorias
  $categorias= $DB->prepare("SELECT * FROM categorias");
  $categorias->execute();
  $result=$categorias->fetch(PDO::FETCH_ASSOC);

  //busco si la marca esta guardada
$traer=$DB->prepare("SELECT id from marcas where nombre like :marca;");
$traer->bindValue(':marca',$marca,PDO::PARAM_STR);
$traer->execute();
$marca_id=$traer->fetch(PDO::FETCH_ASSOC);
  //si devuelve null es porque no encontro la marca y la guardo
if ($marca_id == NULL) {
    // guardo nueva marca
  $guardarMarca=$DB->prepare("INSERT INTO marcas VALUES (null,:marca,1);");
  $guardarMarca->bindValue(':marca',$marca,PDO::PARAM_STR);
  $guardarMarca->execute();
  // traigo el id de la nueva marca
  $traerMarca=$DB->prepare("SELECT id from marcas where nombre like :marca;");
  $traerMarca->bindValue(':marca',$marca,PDO::PARAM_STR);
  $traerMarca->execute();
  $marca_id=$traerMarca->fetch(PDO::FETCH_ASSOC);
}
$id=$marca_id["id"];

  $guardarProducto= $DB->prepare("UPDATE productos SET nombre=:nombre where id=:id;UPDATE productos SET stock=:stock where id=:id;UPDATE productos SET precio=:precio where id=:id;UPDATE productos SET marca_id=:id_mar where id=:id");
  $guardarProducto->bindValue(':id',$id_prod);
  $guardarProducto->bindValue(':nombre',$nombre,PDO::PARAM_STR);
  $guardarProducto->bindValue(':stock',$stock,PDO::PARAM_INT);
  $guardarProducto->bindValue(':precio',$precio,PDO::PARAM_INT);
  $guardarProducto->bindValue(':id_mar',$id,PDO::PARAM_INT);
  $guardarProducto->execute();

  echo "Los cambios se guardaron correctamente";
}

if ($_POST['boton']=="Borrar") {
  $borrar= $DB->prepare("UPDATE productos SET activo=0 where id=:id");
  $borrar->bindValue(':id',$id_prod,PDO::PARAM_INT);
  $borrar->execute();

  echo "El producto se elimino correctamente";

}

?>
 <p><a href="perfilusuario.php">VOLVER </a> </p>
