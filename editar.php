<?php
 require_once("funciones.php");
 include_once("conexion.php");

$categorias= $DB->prepare("SELECT * FROM categorias");
$categorias->execute();
$result=$categorias->fetch(PDO::FETCH_ASSOC);

 if ($_POST) {
    $busqueda=buscar();
   $marcas= $DB->prepare("SELECT * FROM marcas Where id=:id");
   $marcas->bindValue(':id',$busqueda['marca_id']);
   $marcas->execute();
   $marca=$marcas->fetch(PDO::FETCH_ASSOC);
  }
if (!isset($_SESSION["exito"])) {
  header("Location:login.php");
  exit;
}

 ?>

<!DOCTYPE html>
<html lang="es">

<?php include_once("head.php"); ?>

<body>

  <?php include_once("header.php");?>

<!-- Main -->
  <main style="margin:90px;">
    <h1 style="text-align: center;">Editar producto</h1><hr>
    <h2>Usuario: <?php echo $_SESSION['exito'] ?></h2>

      <?php if(!empty($busqueda) && $busqueda["activo"]==1): ?>
    <form action="accion.php" method="post">
		<div><br>
      <input hidden type="text" name="producto_id" value="<?php echo $busqueda['id'] ?>">
			<label>Nombre</label>
      <span class="row"><input type="text" class="form-control col-12" name="nombre" id="nombre" required value="<?php echo $busqueda['nombre']; ?>"></span>
		</div>
		<div><br>
			<label>Stock</label>
			<span class="row"><input type="number" class="form-control col-12" name="stock" required value="<?php echo $busqueda['stock']; ?>"></span>
		</div>
		<div><br>
			<label>Precio</label>
			<span class="row"><input type="number" class="form-control col-12" name="precio" required value="<?php echo $busqueda['precio']; ?>"></span>
		</div>
		<div><br>
			<label>Marca</label>
			<span class="row"><input type="text" class="form-control col-12" name="marca" value="<?php echo $marca['nombre']; ?>"></span>
		</div>
		<div class=""><br>
			<label>Categoria</label>
			<select name="categoria_id">
				<?php
				while ($result) {
          ?><option value="<?php echo $result['id'];?>"><?php echo $result['nombre'];?></option>
				 <?php
				 $result=$categorias->fetch(PDO::FETCH_ASSOC);
				};
				?>
			</select>
		</div><br>

		<input type="submit" name="boton" value="Guardar" class="btn bg-new">
    <input type="submit" name="boton" value="Borrar" class="btn bg-new" >
    </form>
  <?php else:?>
      <div class="">
        <p>No se encontró el producto que buscas!</p>
        <p><a href="perfilusuario.php">Volver</a> </p>
      </div>
    <?php endif; ?>
      </main>

  <?php include_once("footer.php"); ?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

</body>

</html>
