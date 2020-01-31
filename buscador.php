<?php
 require_once("funciones.php");
$abuscar=$_POST["producto"];
$prod= $DB->prepare("SELECT * FROM productos where nombre like :abuscar;");
$prod->bindValue(':abuscar',"%$abuscar%",PDO::PARAM_STR);
$prod->execute();
$mostrar=$prod->fetch(PDO::FETCH_ASSOC);
 ?>

<!DOCTYPE html>
<html lang="es">

<?php include_once("head.php"); ?>

<body>

  <?php include_once("header.php");?>

<!-- Main -->
  <main style="margin:90px;">
    <h1 style="text-align: center;">Productos encontrados: </h1><hr>
    <?php while ($mostrar) { ?>
  <li><a href="producto.php?producto_id=<?php echo $mostrar['id']?>"><?php echo $mostrar['nombre']?></a></li>
<?php
 $mostrar=$prod->fetch(PDO::FETCH_ASSOC);
} ?>
  </main>

  <?php include_once("footer.php"); ?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

</body>

</html>
