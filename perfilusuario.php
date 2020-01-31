<?php require_once("funciones.php");
if (!isset($_SESSION["exito"])) {
  header("Location:login.php");
  exit;
}
$email=$_SESSION["exito"];
global $DB;
$user = $DB->prepare("SELECT * FROM usuarios WHERE email LIKE :email;");
$user->bindValue(":email","$email",PDO::PARAM_STR);
  $user->execute();
  $info=$user->fetch(PDO::FETCH_ASSOC);
  $_SESSION['nombre']=$info['nombre'];
  $_SESSION['admin']=$info['admin'];
 ?>

 <!DOCTYPE html>
 <html lang="es">
 <?php include_once("head.php"); ?>
 <body>
      <?php include_once("header.php"); ?>
   <main role="main" >
      <div class="py-5">
   <div class="container">
     <div class="row">
       <div class="col-md-12" >
       <h2>Bienvenido <?php if (isset($_SESSION["exito"])) {
         echo $_SESSION['exito'];
        }?></h2>
        </div>
     </div>
   </div>
      </div>
      <div class="py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
         <ul class="nav nav-tabs" >
           <li class="nav-item"> <a href="" class="active nav-link" data-toggle="tab" role="tablist" data-target="#perfil">Mi perfil</a> </li>
           <li class="nav-item"> <a class="nav-link" href="" data-toggle="tab" role="tab" data-target="#resumen">Resumen</a> </li>
           <li class="nav-item"> <a href="" class="nav-link" data-toggle="tab" data-target="#pedidos">Mis pedidos</a> </li>
           <li class="nav-item"> <a href="" class="nav-link" data-toggle="tab" data-target="#ventas">Ventas</a> </li>

         </ul>

           <div class="tab-content mt-2">
             <div class="tab-pane fade show active" id="perfil" role="tabpanel">
               <h3>Perfil</h3>
               <div class="py-5">
                 <div class="container">
                   <div class="row">
                     <div class="col-md-4" >
                       <img src= "<?php
                       $usu=$_SESSION["exito"];
                        if(file_get_contents("images/usuarios/$usu.png")): echo "images/usuarios/$usu.png";?>
                      <?php else: ?>
                        images/iconos/lusuario.png
                      <?php endif; ?>
                         "
                        class="rounded" alt="image user" style="max-width: 150px;">
                       <br>
                       <br>
                       <form class="" action="perfilusuario.php" method="post" enctype="multipart/form-data">
                         <div class="">
                           <input type="file" class="btn btn-sm bg-new" name="foto_perfil" value="Subir">
                         </div>
                         <div class="">
                           <input type="submit" name="enviar_foto" value="Subir">
                         </div>
                         <?=foto() ?>
                       </form>
                     </div>
                     <div class="col-md-8">
                         <h5><b>Información del usuario</b></h5>
                         <p>Nombre: <?php echo $_SESSION['nombre']; ?></p>
                         <p>Email: <?php echo $_SESSION['exito']; ?></p>
                         <p><?php if ($_SESSION['admin']==1) {
                           echo "Administrador de la pagina";
                           ?><p><a class="btn bg-new" href="admin.php">ADMINISTRAR USUARIOS</a></p><?php
                         } ?></p><br>

                     </div>
                   </div>
             </div>
             </div>
             </div>
             <div class="tab-pane fade" id="resumen" role="tabpanel">
               <h3>Resumen</h3>
               <p>Esta sección está vacía! Compra o vende artículos en nuestra página y así obtienes puntos de ventaja para
                 adquirir oportunidades únicas!</p>
             </div>
             <div class="tab-pane fade" id="pedidos" role="tabpanel">
               <h3>Mis pedidos</h3>
               <p>Esta sección está vacía! Compra artículos en nuestra página y así obtienes puntos de ventaja para adquirir
                 ofertas y beneficios únicos!</p>
             </div>
             <div class="tab-pane fade" id="ventas" role="tabpanel">
               <h3>Ventas</h3>
               <p> Todavia no obtuvo ninguna venta de sus productos</p><br>
                 <p><a href="agregar.php">AGREGAR PRODUCTO</a></p>
                 <p>Para editar o borrar un producto, debe buscarlo:</p>
                 <form class="form-inline mt-2 mt-md-0" action="editar.php" method="post">
                   <input required name="producto" class="form-control mr-sm-2" type="text" placeholder="Que producto busca?" aria-label="Search">
                   <button type="submit" class="btn bg-new">Buscar</button>
                 </form>
               </div>

           </div>
       </div>
          </div>
        </div>
      </div>
   </main>

  <?php include_once('footer.php'); ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous" style=""></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous" style=""></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous" style=""></script>

</body>

</html>


  <!-- <main role="main" style="margin-top: 40px;">
    <div class="row">
      <div class="col-3" style="margin-top: 15px; margin-bottom: 5px;">
        <div class="list-group">
          <a href="#" class="list-group-item list-group-item-action">Resumen</a>
          <a href="#" class="list-group-item list-group-item-action">Perfil</a>
          <a href="#" class="list-group-item list-group-item-action">Compras</a>
          <a href="#" class="list-group-item list-group-item-action">Ventas</a>
          <a href="#" class="list-group-item list-group-item-action">Configuración</a>
        </div>
      </div>
      <div class="col-9" style="margin-top: 15px; margin-bottom: 5px;">
        <h2>Bienvenido #Usuario!</h2>
        <h3>Resumen</h3>
        <p>Esta sección está vacía! Compra o vende artículos en nuestra página y así obtienes puntos de ventaja para
          adquirir oportunidades únicas!</p>
        <h3>Perfil</h3>
        <img src="images/lusuario.png" class="rounded" alt="image user" style="max-width: 150px;">
        <h3>Compras</h3>
        <p>Esta sección está vacía! Compra artículos en nuestra página y así obtienes puntos de ventaja para adquirir
          ofertas y beneficios únicos!</p>
        <h3>Ventas</h3>
        <p>Esta sección está vacía! Vende artículos en nuestra página y así obtienes puntos de ventaja para adquirir
          ofertas y beneficios únicos!</p>
      </div>
    </div> -->
