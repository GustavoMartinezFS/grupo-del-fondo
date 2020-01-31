<?php

include_once('conexion.php');

if ($_POST) {


$nombre=$_POST["nombre"];
$stock=$_POST["stock"];
$precio=$_POST["precio"];
$marca=$_POST["marca"];
$categoria_id=$_POST["categoria_id"];

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
// guardo el producto completo
$guardarProducto=$DB->prepare("INSERT INTO productos VALUES (null,:nombre,:stock,:precio,:id);");
$guardarProducto->bindValue(':nombre',$nombre,PDO::PARAM_STR);
$guardarProducto->bindValue(':stock',$stock,PDO::PARAM_INT);
$guardarProducto->bindValue(':precio',$precio,PDO::PARAM_INT);
$guardarProducto->bindValue(':id',$id,PDO::PARAM_INT);
$guardarProducto->execute();

//traigo el id del producto agregado
$traerProducto=$DB->prepare("SELECT id from productos where nombre like :nombre;");
$traerProducto->bindValue(':nombre',$nombre,PDO::PARAM_STR);
$traerProducto->execute();
$producto_id=$traerProducto->fetch(PDO::FETCH_ASSOC);
$id=$producto_id["id"];
// guardo producto_id y categoria_id
$guardarRelacion=$DB->prepare("INSERT INTO producto_categoria VALUES (null,:id,:categoria_id);");
$guardarRelacion->bindValue(':id',$id,PDO::PARAM_INT);
$guardarRelacion->bindValue(':categoria_id',$categoria_id,PDO::PARAM_INT);
$guardarRelacion->execute();
?>

<h1>FELICIDADES! AGREGO UN PRODUCTO CORRECTAMENTE</h1><br><br>
<p><a href="perfilusuario.php">VOLVER AL PERFIL</a></p><br>
<p><a href="abm.php">AGREGAR OTRO PRODUCTO</a></p>
}
