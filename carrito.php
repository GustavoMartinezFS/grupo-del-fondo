<?php require_once("funciones.php");
//if (!isset($_SESSION["exito"])) {
//  header("Location:login.php");
//  exit;
//}
 ?>

<!DOCTYPE html>
<html lang="es">

<?php include_once("head.php"); ?>

<body>

  <?php include_once("header.php"); ?>

<!-- Main -->
  <main role="main" style="margin-top: 90px;">
    <h1 style="text-align: left;">Agregar producto</h1>
    <button type="submit" class="btn bg-new col-2"><a style="color: white;"href="index.php">Agregar</a></button>
  </main>
  
  <?php include_once("footer.php"); ?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

</body>

</html>
