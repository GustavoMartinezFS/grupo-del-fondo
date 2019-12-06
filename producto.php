<?php
$productosj= file_get_contents("productos.json");
$productos= json_decode($productosj,true);
 session_start(); 

//para agregar nuevos productos!
// $productos[]=[
//     "src"=>"",
//     "alt"=>"",
//     "titulo" => "",
//     "precio" => "",
//     "stock" => "",
//     "detalle" => ""
// ];
// $productonuevo = json_encode($productos);
// file_put_contents("usuarios.json",$productonuevo);
 ?>

<!DOCTYPE html>
<html lang="es">

<?php include_once("head.php"); ?>

<body>

  <?php include_once("header.php"); ?>

<!-- Main -->
    <main role="main" style="margin-top: 40px;">
        <div class="container producto">
            <div class="card mb-3 ml-auto  col-md-12" style="max-width: 1080px;">
                <div class="row no-gutters">
                    <div class="col-md-7 col-lg-8">
                        <img src="<?=$productos[$_GET["id"]]["src"]?>" class="card-img-top" alt="<?=$productos[$_GET["id"]]["alt"]?>">
                    </div>
                    <div class="col-md-5 col-lg-4">
                        <div class="card-body">
                            <h4 class="card-title"><?=$productos[$_GET["id"]]["titulo"]?></h4>
                            <h5 class="card-title col-md-6"><?=$productos[$_GET["id"]]["precio"]?></h5>
                            <p class="card-text col-md-6"><small class="text-muted"><?=$productos[$_GET["id"]]["stock"]?></small></p>
                            <p class="card-text">
                              <?=$productos[$_GET["id"]]["detalle"]?></p>

                        </div>
                    </div>
                    <div class="col-md-12" style="padding:20px; display: flex; justify-content: space-around;">
                        <a class="btn btn-lg btn-secondary" style="font-size: 0.8em; width: 33%;" href="inicio.html"
                            role="button">COMPRAR</a>
                        <a class="btn btn-lg btn-primary" style="font-size: 0.8em; width: 33%;" href="carrito.html"
                            role="button">AGREGAR AL CARRITO</a>
                        <a class="btn btn-lg btn-information"
                            style="font-size: 0.8em; width: 33%; box-shadow: black 1px 1px 3px;" href="index.html"
                            role="button">SEGUIR VIENDO PRODUCTOS</a>
                    </div>
                </div>
            </div>


            <hr class="featurette-divider">
            <div class="row lista">
                <h2 class="card producto col-md-12">Publicaciones relacionadas</h2>
                <div class="card producto col-md-4">
                    <img src="images/productos/product-1.jpg" class="card-img-top" alt="Producto1">
                    <div class="card-body">
                        <h3>$ 500</h3>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
                <div class="card producto col-md-4">
                    <img src="images/productos/product-2.jpg" class="card-img-top" alt="Producto1">
                    <div class="card-body">
                        <h3>$ 500</h3>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
                <div class="card producto col-md-4">
                    <img src="images/productos/product-3.jpg" class="card-img-top" alt="Producto3">
                    <div class="card-body">
                        <h3>$ 500</h3>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="card" style="width: 100%;">
                    <div class="card-header bg-azul-oscuro copy">
                        Categorías
                    </div>
                    <ul class="list-group list-group-flush">
                        <a href="#">
                            <li class="list-group-item">Electrónica</li>
                        </a>
                        <a href="#">
                            <li class="list-group-item">Muebles</li>
                        </a>
                        <a href="#">
                            <li class="list-group-item">Electrodomesticos</li>
                        </a>
                    </ul>
                </div>
            </div>

        </div>

    </main>

    <?php include_once("footer.php"); ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="/docs/4.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous">
        </script>

</body>

</html>
