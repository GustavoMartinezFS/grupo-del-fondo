<?php require_once("funciones.php"); ?>

<!DOCTYPE html>
<html lang="es">

<?php include_once("head.php"); ?>

<body>

  <?php include_once("header.php"); ?>

    <main role="main">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="bd-placeholder-img" width="100%" src="images/iconos/shoping.jpg"
                        preserveAspectRatio="xMidYMid slice" focusable="false" role="img" alt="shoping">
                    <div class="container">
                        <div class="carousel-caption text-left">
                            <h2>Grupo del Fondo</h2>
                            <p>Es el comercio electronico en donde todos quieren comprar.</p>
                            <p><a class="btn btn-lg bg-new" href="#" role="button">Conocer más</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="bd-placeholder-img" width="100%" src="images/iconos/perchero.jpg"
                        preserveAspectRatio="xMidYMid slice" focusable="false" role="img" alt="shoping">
                    <div class="container">
                        <div class="carousel-caption">
                            <h2>Orden por categorías</h2>
                            <p>Grupo del Fondo tiene una forma simple de ordenar tus productos por categorías.</p>
                            <p><a class="btn btn-lg bg-new" href="#" role="button">Conocer más</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="bd-placeholder-img" width="100%" src="images/iconos/phone.jpg"
                        preserveAspectRatio="xMidYMid slice" focusable="false" role="img" alt="shoping">
                    <div class="container">
                        <div class="carousel-caption text-right">
                            <h2>Fácil para registrarse y para usar</h2>
                            <p>No querrás otro comercio electronico luego de probar el nuestro.</p>
                            <p><a class="btn btn-lg bg-new" href="registro.php" role="button">Registrarme ahora</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


        <div class="container marketing">

            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <h3>Sobre nosotros</h3>
                    <p>Nuestra plataforma nació de la necesidad de proporcionar una sistema de comercio electronico
                        personalizado y de fácil acceso para cada persona que quiere emprender.</p>
                    <p><a class="btn bg-new" href="contacto.php" role="button">Contactanos &raquo;</a></p>
                </div><!-- /.col-lg-4 -->

            </div><!-- /.row -->



            <hr class="featurette-divider">
            <div class="row lista">
                <div class="card producto col-md-4">
                    <a href="producto.php?id=0" style="text-decoration: none; color: rgb(46, 46, 46);">
                        <img src="images/productos/product-1.jpg" class="card-img-top" alt="Producto1">

                        <div class="card-body">
                            <h3>$ 1.890</h3>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of
                                the card's content.</p>
                        </div>
                    </a>
                </div>
                <div class="card producto col-md-4">
                    <a href="producto.php?id=1" style="text-decoration: none; color: rgb(46, 46, 46);">
                        <img src="images/productos/product-2.jpg" class="card-img-top" alt="Producto2">
                        <div class="card-body">
                            <h3>$ 1.390</h3>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of
                                the card's content.</p>
                        </div>
                    </a>
                </div>
                <div class="card producto col-md-4">
                    <a href="producto.php?id=2" style="text-decoration: none; color: rgb(46, 46, 46);">
                        <img src="images/productos/product-3.jpg" class="card-img-top" alt="Producto3">
                        <div class="card-body">
                            <h3>$ 1.290</h3>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of
                                the card's content.</p>
                        </div>
                    </a>
                </div>
                <div class="card producto col-md-4">
                    <a href="producto.php?id=0" style="text-decoration: none; color: rgb(46, 46, 46);">
                        <img src="images/productos/product-1.jpg" class="card-img-top" alt="Producto1">
                        <div class="card-body">
                            <h3>$ 1.890</h3>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of
                                the card's content.</p>
                        </div>
                    </a>
                </div>
                <div class="card producto col-md-4">
                    <a href="producto.php?id=1" style="text-decoration: none; color: rgb(46, 46, 46);">
                        <img src="images/productos/product-2.jpg" class="card-img-top" alt="Producto2">
                        <div class="card-body">
                            <h3>$ 1.390</h3>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of
                                the card's content.</p>
                        </div>
                    </a>
                </div>
                <div class="card producto col-md-4">
                    <a href="producto.php?id=2" style="text-decoration: none; color: rgb(46, 46, 46);">
                        <img src="images/productos/product-3.jpg" class="card-img-top" alt="Producto3">
                        <div class="card-body">
                            <h3>$ 1.290</h3>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of
                                the card's content.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="card" style="width: 100%;">
                    <div class="card-header bg-new copy">
                        Categorías
                    </div>
                    <ul class="list-group list-group-flush">
                        <a href="#">
                            <li class="list-group-item">Zapatos</li>
                        </a>
                        <a href="#">
                            <li class="list-group-item">Carteras</li>
                        </a>
                        <a href="#">
                            <li class="list-group-item">Perfumes</li>
                        </a>
                    </ul>
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
