<?php
 require_once("funciones.php");
 include_once("conexion.php");

$categorias= $DB->prepare("SELECT * FROM categorias");
$categorias->execute();
$result=$categorias->fetch(PDO::FETCH_ASSOC);

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
    <h1 style="text-align: center;">Agregar producto</h1><hr>
    <h2>Usuario: <?php echo $_SESSION['exito'] ?></h2>
    <?php if(empty($_POST)):?>
    <form action="" method="post">
		<div><br>
			<label>Nombre</label>
      <span class="row"><input type="text" class="form-control col-12" name="nombre" id="nombre" required placeholder="Nombre del producto"></span>
		</div>
		<div><br>
			<label>Stock</label>
			<span class="row"><input type="number" class="form-control col-12" name="stock" required placeholder="Stock del producto"></span>
		</div>
		<div><br>
			<label>Precio</label>
			<span class="row"><input type="number" class="form-control col-12" name="precio" required placeholder="Precio del producto"></span>
		</div>
		<div><br>
			<label>Marca</label>
			<span class="row"><input type="text" class="form-control col-12" name="marca" placeholder="Marca del producto"></span>
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
		<button type="submit" class="btn bg-new">Guardar producto</button>
  </form><br>
    <form class="" action="perfilusuario.php" method="post">
      <button class="btn bg-new" type="submit" name="button">Volver al perfil</button>
    </form>
<?php endif; ?>
<?php if (guardar()): ?>
  <h4>FELICIDADES! AGREGO UN PRODUCTO CORRECTAMENTE</h4><br><br>
  <h5><a href="agregar.php">Agregar otro producto</a> </h5>
  <h6><a href="perfilusuario.php">Volver al perfil</a> </h6>
  </form>
  <?php endif; ?>



  </main>

  <?php include_once("footer.php"); ?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

</body>

</html>
