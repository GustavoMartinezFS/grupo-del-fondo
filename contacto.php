<?php
require_once("funciones.php"); ?>
<!DOCTYPE html>
<html lang="es">

<?php include_once("head.php"); ?>

<body>
  <?php include_once("header.php"); ?>

    <main role="main" style="margin-top: 40px;">
        <section class="text-center container">
            <h1 id="contact">CONTACTANOS</h1>
            <div class="star-navy">
                <i class="fa fa-star"></i>
            </div>
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <form  action="" method="post" class="text-left mb-3">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input required type="text" class="form-control" name="nombre">
                        </div>
                        <div class="form-group">
                            <label for="tel">Telefono:</label>
                            <input required type="tel" class="form-control" name="tel" >
                        </div>
                        <div class="form-group">
                            <label for="dir">Dirección:</label>
                            <input required type="text" class="form-control" name="dir">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input required type="email" class="form-control" name="email" >
                        </div>
                        <div class="form-group">
                            <label for="msje">Consulta:</label>
                            <textarea required class="form-control" name="msje" style="resize: none;"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                        <br> <br>
                        <?php correo(); ?>

                    </form>
                </div>
            </div>
        </section>

    </main>

    <?php include_once("footer.php"); ?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

</body>

</html>
