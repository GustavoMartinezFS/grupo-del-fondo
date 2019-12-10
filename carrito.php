<?php require_once("funciones.php");
if (!isset($_SESSION["exito"])) {
  header("Location:login.php");
  exit;
}
 ?>

<!DOCTYPE html>
<html lang="es">

<?php include_once("head.php"); ?>

<body>

  <?php include_once("header.php"); ?>

<!-- Main -->
    <main role="main" style="margin-top: 90px;">
        <section class="text-center container">
            <h1 style="text-align: left;">Carrito (6)</h1>
                <div class="row items">
                <div class="col-12 card producto">
                    <img src="images/productos/product-1.jpg" class="card-img-top" alt="Producto1">
                    <div class="card-body">
                        <h3>$ 1.890</h3>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
                <div class="col-12 card producto">
                    <img src="images/productos/product-2.jpg" class="card-img-top" alt="Producto2">
                    <div class="card-body">
                        <h3>$ 1.390</h3>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
                <div class="col-12 card producto">
                    <img src="images/productos/product-3.jpg" class="card-img-top" alt="Producto3">
                    <div class="card-body">
                        <h3>$ 1.290</h3>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
                <div class="col-12 ard producto">
                    <img src="images/productos/product-1.jpg" class="card-img-top" alt="Producto1">
                    <div class="card-body">
                        <h3>$ 1.890</h3>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
                <div class="col-12 card producto">
                    <img src="images/productos/product-2.jpg" class="card-img-top" alt="Producto2">
                    <div class="card-body">
                        <h3>$ 1.390</h3>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
                <div class="col-12 card producto">
                    <img src="images/productos/product-3.jpg" class="card-img-top" alt="Producto3">
                    <div class="card-body">
                        <h3>$ 1.290</h3>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
                </div><section id="comprar">
                        <h2>Productos:(6) Total:$ 9.140 <button type="submit" class="btn bg-new col-2"><a style="color: white;"href="index.php">Continuar compra</a></button></h2>
                      </section>
        </section>
    </main>

    <?php include_once("footer.php"); ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

</body>

</html>
