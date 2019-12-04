<?php require_once("funciones.php"); ?>

 <!DOCTYPE html>
 <html lang="es">

 <?php include_once("head.php"); ?>

 <body>

   <?php include_once("header.php"); ?>

    <!-- Main -->
    <main role="main" style="margin-top: 40px;">
        <section class="text-center container mt-3">
            <h1 id="contact">REGISTRO</h1>
            <div class="star-navy">
                <i class="fa fa-star"></i>
            </div>
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <form class="text-center mb-3" action="" method="post">

                        <div class="form-group column d-flex flex-column">
                            <label for="nombre">Nombre</label>
                            <span class="row"><input type="text" class="form-control col-12" value="<?=$nombre?>" name="nombre" id="Ingresá tu nombre"
                                    aria-describedby="emailHelp"></span>
                        </div>
                        <div class="bg-new">
                        </div>
                        <br>

                        <div class="form-group column d-flex flex-column">
                            <label for="apellido">Apellido</label>
                            <span class="row"><input type="text" name="apellido" value="<?=$apellido?>" class="form-control col-12" id="Ingresá tu apellido"
                                    aria-describedby="emailHelp"></span>
                        </div>
                        <div class="bg-new">
                        </div>
                        <br>

                        <div class="form-group column d-flex flex-column">
                            <label for="email">Correo electronico</label>
                            <span class="row"><input type="email" value="<?=$email?>" name="email" class="form-control col-12" id="exampleInputEmail1"
                                    aria-describedby="emailHelp"></span>
                        </div>
                        <div class="bg-new">
                        </div>
                        <br>

                        <div class="form-group column">
                            <label for="pass">Contraseña</label>
                            <span class="row"><input type="password" name="pass" class="form-control col-12"
                                    id="exampleInputPassword1"></span>
                        </div>
                        <div class="bg-new">
                        </div>
                        <br>

                        <div class="form-group column">
                            <label for="repass">Repita contraseña</label>
                            <span class="row"><input type="password" name="repass" class="form-control col-12"
                                    id="exampleInputPassword1"></span>
                        </div>
                        <div class="bg-new">
                        </div>
                        <br>

                        <?php if (isset($errores)): ?>
                          <ul class="errores" style="list-style:none">
                            <?php foreach ($errores as $error) {
                              echo "<li>" . $error . "<li>";
                            }
                            ?>
                          </ul>
                        <?php endif; ?>

                        <div class="btn bg-new col-md-6">
                          <input type="submit" name="enviar" value="Enviar" class="btn bg-new col-md-6">
                        </div>
                    </form>
                </div>
            </div>
          </form>

        </section>

    </main>

    <?php include_once("footer.php"); ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

  </body>

</html>
