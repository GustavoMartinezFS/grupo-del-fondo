<?php
require_once("funciones.php");
include("conexion.php");

$array= validar();

?>

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
                            <label for="nombre">Nombre completo</label>
                            <span class="row"><input type="text" class="form-control col-12" value="" name="nombre" required placeholder=" Escribe aqui tu nombre completo " id="Ingresá tu nombre"
                                    aria-describedby="emailHelp"></span>
                        </div>
                        <div class="bg-new">
                          <?php if(isset($array["errores"]["nombre"])){
                            echo $array["errores"]["nombre"];
                          } ?>
                        </div>
                        <br>

                        <div class="form-group column d-flex flex-column">
                            <label for="email">Correo electronico</label>
                            <span class="row"><input type="email" placeholder=" Escribe aqui tu correo electronico " required value="" name="email" class="form-control col-12" aria-describedby="emailHelp"></span>
                        </div>
                        <div class="bg-new">
                          <?php if(isset($array["errores"]["email"])){echo $array["errores"]["email"];}
                          if(isset($array["errores"]["existe"])){echo $array["errores"]["existe"];} ?>
                        </div>
                        <br>

                        <div class="form-group column">
                            <label for="pass">Contraseña</label>
                            <span class="row"><input type="password" placeholder=" Escribe una contraseña con al menos 5 caracteres " required name="pass" class="form-control col-12"
                                    id="exampleInputPassword1"></span>
                        </div>
                        <div class="bg-new">
                          <?php if(isset($array["errores"]["pass"])){echo $array["errores"]["pass"];} ?>
                        </div>
                        <br>

                        <div class="form-group column">
                            <label for="repass">Repita contraseña</label>
                            <span class="row"><input type="password"  placeholder=" Repite tu contraseña " required name="repass" class="form-control col-12"
                                    id="exampleInputPassword1"></span>
                        </div>
                        <div class="bg-new">
                          <?php if(isset($array["errores"]["repass"])){echo $array["errores"]["repass"];} ?>
                        </div>
                        <br>
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
