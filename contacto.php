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
                    <form class="text-left mb-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre:</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Telefono:</label>
                            <input type="telephone" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Dirección:</label>
                            <input type="telephone" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email:</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Consulta:</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                style="resize: none;"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
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
