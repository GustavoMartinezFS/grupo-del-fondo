<?php require_once("funciones.php");
    if (validarLogin()) {
        redordarUsuario();
      if (recorrerBDBuscandoUsuario(abrirJson(), guardarInfoUsuario())){
        header('Location: perfilusuario.php');exit;
      } }
 ?>

 <!DOCTYPE html>
 <html lang="es">

 <?php include_once("head.php"); ?>

 <body>

   <?php include_once("header.php"); ?>

<!-- Main -->
    <main role="main"  style="margin-top: 40px;">
        <section class="text-center container mt-3">
            <h1 id="contact">INICIO SESIÓN</h1>
            <div class="star-navy">
                <i class="fa fa-star"></i>
            </div>
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <form class="text-center mb-3" action="" method="post">
                        <div class="form-group column d-flex flex-column">
                            <label for="email">Correo electronico</label>
                            <span class="row"><input type="email" name="email" class="form-control col-12"
                               <?php
                                    if (isset($_COOKIE['email'])) {
                                        echo "value='".$_COOKIE['email']."' ";
                                    }
                                    elseif (isset($_SESSION['exito']['email'])) {
                                        echo "value='".$_SESSION['exito']['email']."' ";
                                    }
                            ?> id="exampleInputEmail1"
                                    aria-describedby="emailHelp"></span>
                        </div>
                        <div class="bg-new">
                          <?php
                                if(isset($_SESSION['error']['email'])){
                                    if ($_SESSION['error']['email'] != "") {
                                        echo '<span class="messagerror">'.$_SESSION['error']['email'].'</span>';
                                    }
                                }
                            ?>
                        </div>
                        <br>

                        <div class="form-group column">
                            <label for="pass">Contraseña</label>
                            <span class="row"><input name="password" requiered type="password" <?php
                                    if (isset($_COOKIE['password'])) {
                                        echo "value='".$_COOKIE['password']."' ";
                                    }
                                    elseif (isset($_SESSION['exito']['password'])) {
                                        echo "value='".$_SESSION['exito']['password']."' ";
                                    }
                            ?> class="form-control col-12"
                                    id="exampleInputPassword1"></span>
                        </div>
                        <div class="bg-new">
                          <?php
                            if(isset($_SESSION['error']['password'])){
                                if ($_SESSION['error']['password'] != "") {
                                    echo '<span class="messagerror">'.$_SESSION['error']['password'].'</span>';
                                }
                            }
                        ?>
                        </div>
                        <br>

                        <label><input type="checkbox" name="recordarUsuario" value="marcado"></input> Recordarme</label><br>

                        <div class="btn bg-new col-md-6">
                          <input type="submit" name="enviar" value="enviar" class="btn bg-new col-md-6">
                        </div>

                    </form>

                </div>
            </div>

        </section>
    </main>

    <?php require_once("footer.php");
?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

</body>

</html>
