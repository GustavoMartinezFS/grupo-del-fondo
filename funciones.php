<?php
include_once("conexion.php");
// validacion

function validar(){
  $errores = [] ;
  $nombre="";
  $email="";
  if ($_POST){
    if (strlen($_POST["nombre"]) <= 2){
      $errores["nombre"] = "Tu nombre no tiene una sola letra eeeh <br>";
    }else {
      $nombre = (isset($_POST ["nombre"]))? $_POST ["nombre"] : "" ;
    }
    if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false){
      $errores["email"] = "El email no tiene el formato correcto <br>";
    }else {
      $email = (isset($_POST ["email"]))? $_POST ["email"] : "" ;
    }
    if (strlen($_POST["pass"]) < 5){
      $errores["pass"] = "Piensa mejor tu contraseña <br>";
    }
    if (($_POST["repass"]) != ($_POST["pass"])){
      $errores["repass"] = "Las contraseñas no coinciden <br>";
    }
    //$json = file_get_contents("array.json");
    global $DB;

    $user = $DB->prepare("SELECT email FROM usuarios WHERE email LIKE :email");
    $user->bindValue(":email",$email,PDO::PARAM_INT);
    $user->execute();
    $users=$user->fetch(PDO::FETCH_ASSOC);

    // if(!empty($json)){
    //   $array = json_decode($json, true);
    // }
    // foreach ($array["usuarios"] as $key => $value) {
    //   if ($value["email"] == $email) {
    //     $errores["existe"]="El email ya está registrado!";
    //   }
    // }
    if(!empty($users)){
      $errores["existe"]="El email ya está registrado!";
    }
    if (!$errores){
      crear();
      header("Location:login.php");
    }else {
      $array =[
        "errores"=>$errores,
        "nombre"=>$nombre,
        "email" =>$email
      ];
      return $array;
    }
  }
}

// creacion usuarios
function crear(){
  //agregar a DB
  global $DB;
  $agregar = $DB->prepare("INSERT into usuarios values (null, :nombre, :email, :pass, default,default)");
  $agregar->bindValue(":nombre", $_POST["nombre"]);
  $agregar->bindValue(":email", $_POST["email"]);
  $agregar->bindValue(":pass", password_hash($_POST["pass"], PASSWORD_DEFAULT));

  $agregar->execute();
  // $usuarioNuevo = [
  //   "nombre" => $_POST["nombre"],
  //   "email" => $_POST["email"],
  //   "pass" => password_hash($_POST["pass"], PASSWORD_DEFAULT)
  // ];
  // $json = file_get_contents("prueba.json");
  // if(!empty($json)){
  //   $array = json_decode($json, true);
  // }
  // //$array["usuarios"][] = $usuarioNuevo;
  // $ajson = json_encode($usuarioNuevo);
  // file_put_contents("prueba.json", $ajson, FILE_APPEND);
}

function recorrerBDBuscandoUsuario(){
  $email = $_POST['email'];
  $password = $_POST['password'];
	$flagemail = false;
	$flagpassword = false;
  global $DB;
  $user = $DB->prepare("SELECT pass FROM usuarios WHERE email LIKE :email;");
  $user->bindValue(":email","$email",PDO::PARAM_STR);
    $user->execute();
    $hash=$user->fetch(PDO::FETCH_ASSOC);

    if(!empty($hash)){
        $flagemail= true;
        if(password_verify($password,$hash[pass])){
          $flagpassword=true;
        }
      }

    if ($flagemail && $flagpassword) {
      $_SESSION['exito'] = $email;
      return true;
    }elseif($flagemail){
      $_SESSION['error']['returnsearch'] = "Contraseña incorrecta!";
      header('Location: login.php');
  	} else{
  	  $_SESSION['error']['returnsearch'] = "El usuario no existe! Debes registrarte primero. ";
  	  header('Location: login.php');
    }

  // foreach ($usersJsonDecode["usuarios"] as $key => $value){
  //   if($value["email"] == $nuevousuario["email"]){
  //     $flagemail= true;
  //     if(password_verify($nuevousuario["password"], $value["pass"])){
  //       $flagpassword=true;
  //     }
  //   }
  // }
  // if ($flagemail && $flagpassword) {
  //   $_SESSION['exito'] = $nuevousuario['email'];
  //   return true;
  // }elseif($flagemail){
  //   $_SESSION['error']['returnsearch'] = "Contraseña incorrecta!";
  //   header('Location: login.php');
	// } else{
	//   $_SESSION['error']['returnsearch'] = "El usuario no existe! Debes registrarte primero. ";
	//   header('Location: login.php');
	// }
}


// Foto de perfil de #usuario
function foto(){
  $usu=$_SESSION["exito"];
  if($_FILES){
    if($_FILES["foto_perfil"]["error"] !=0){
      return "Hubo un error al cargar su foto de perfil <br>";
    }else{
      $ext = pathinfo($_FILES["foto_perfil"]["name"], PATHINFO_EXTENSION);
    }
    if($ext != "jpeg" && $ext != "jpg" && $ext != "png"){
      return "Su foto de perfil debe ser .jpeg, .jpg o .png <br>";
    }else{
      $_FILES["ok"]="ok";

      move_uploaded_file($_FILES["foto_perfil"]["tmp_name"], "images/usuarios/$usu.png");
      return "";
    }
  }
}
session_start();

function redordarUsuario(){
    if (!empty($_POST['recordarUsuario'])) {
        setcookie("email", $_POST['email'], time()+604800);
        setcookie("password", $_POST['password'], time()+604800);
    } elseif(isset($_COOKIE['email'])){
        setcookie('email',"",time()-604800);
        setcookie('password',"",time()-604800);
    }
}


function guardar(){
  if ($_POST) {
      $nombre=$_POST["nombre"];
      $stock=$_POST["stock"];
      $precio=$_POST["precio"];
      $marca=$_POST["marca"];
      $categoria_id=$_POST["categoria_id"];
      global $DB;
      $email=$_SESSION["exito"];
      $user = $DB->prepare("SELECT * FROM usuarios WHERE email LIKE :email;");
      $user->bindValue(":email",$email,PDO::PARAM_STR);
      $user->execute();
      $user_id=$user->fetch(PDO::FETCH_ASSOC);


        //busco si la marca esta guardada
      $traer=$DB->prepare("SELECT id from marcas where nombre like :marca;");
      $traer->bindValue(':marca',$marca,PDO::PARAM_STR);
      $traer->execute();
      $marca_id=$traer->fetch(PDO::FETCH_ASSOC);
        //si devuelve null es porque no encontro la marca y la guardo
      if ($marca_id == NULL) {
          // guardo nueva marca
        $guardarMarca=$DB->prepare("INSERT INTO marcas VALUES (null,:marca,1);");
        $guardarMarca->bindValue(':marca',$marca,PDO::PARAM_STR);
        $guardarMarca->execute();

        // traigo el id de la nueva marca
        $traerMarca=$DB->prepare("SELECT id from marcas where nombre like :marca;");
        $traerMarca->bindValue(':marca',$marca,PDO::PARAM_STR);
        $traerMarca->execute();
        $marca_id=$traerMarca->fetch(PDO::FETCH_ASSOC);
      }
      $id=$marca_id["id"];
        // guardo el producto completo
      $guardarProducto=$DB->prepare("INSERT INTO productos VALUES (null,:nombre,:stock,:precio,default,:id);");
      $guardarProducto->bindValue(':nombre',$nombre,PDO::PARAM_STR);
      $guardarProducto->bindValue(':stock',$stock,PDO::PARAM_INT);
      $guardarProducto->bindValue(':precio',$precio,PDO::PARAM_INT);
      $guardarProducto->bindValue(':id',$id,PDO::PARAM_INT);
      $guardarProducto->execute();

        //traigo el id del producto agregado
      $traerProducto=$DB->prepare("SELECT id from productos where nombre like :nombre;");
      $traerProducto->bindValue(':nombre',$nombre,PDO::PARAM_STR);
      $traerProducto->execute();
      $producto_id=$traerProducto->fetch(PDO::FETCH_ASSOC);
      $id=$producto_id["id"];
        // guardo producto_id y categoria_id
      $guardarRelacion=$DB->prepare("INSERT INTO producto_categoria VALUES (null,:id,:categoria_id);");
      $guardarRelacion->bindValue(':id',$id,PDO::PARAM_INT);
      $guardarRelacion->bindValue(':categoria_id',$categoria_id,PDO::PARAM_INT);
      $guardarRelacion->execute();

      // guardo producto_id y usuario_id

      $guardarRelacion=$DB->prepare("INSERT INTO propiedad VALUES (null,default,:id,:user_id);");
      $guardarRelacion->bindValue(':id',$id,PDO::PARAM_INT);
      $guardarRelacion->bindValue(':user_id',$user_id,PDO::PARAM_INT);
      $guardarRelacion->execute();
      return true;
  }
}

function buscar(){
  if ($_POST) {
    $abuscar=$_POST["producto"];
    global $DB;
  $prod= $DB->prepare("SELECT * FROM productos where activo=1 and nombre like :abuscar;");
  $prod->bindValue(':abuscar',"%$abuscar%",PDO::PARAM_STR);
  $prod->execute();
  $mostrar=$prod->fetch(PDO::FETCH_ASSOC);
  return $mostrar;
 }
}

  function correo(){
  if ($_POST) {
    $nombre=$_POST["nombre"];
    $tel=$_POST["tel"];
    $dir=$_POST["dir"];
    $email=$_POST["email"];
    $msje=$_POST["msje"];
    global $DB;

    if(!is_int($tel)){
      echo "Su telefono esta mal escrito";
      exit;
    }

    $correo=$DB->prepare("INSERT INTO contacto VALUES (null,:nombre,:tel,:dire,:email,:msje);");
    $correo->bindValue(':nombre',$nombre,PDO::PARAM_STR);
    $correo->bindValue(':tel',$tel,PDO::PARAM_INT);
    $correo->bindValue(':dire',$dir,PDO::PARAM_STR);
    $correo->bindValue(':email',$email,PDO::PARAM_STR);
    $correo->bindValue(':msje',$msje,PDO::PARAM_STR);
    $correo->execute();

    echo " Su mensaje ura $tel fue enviado con exitoo!";

  }

}

//
// function verificar(){
//   $array = file_get_contents("array.json");
//   if(!empty($usuarios)){
//     $usuarios = json_decode($array, true);
//   }
// }


// // persistencia
// $nombre="";
// $email="";
//   $email = (isset($_POST ["email"]))? $_POST ["email"] : "" ;
//   $nombre = (isset($_POST ["nombre"]))? $_POST ["nombre"] : "" ;
// }

// // //
// //
// function login(){
//   if (!empty($_POST)) {
//     $user = $_POST["email"];
//     $pass = $_POST["password"];
//     $usuarios = file_get_contents("array.json");
//     $miArray = json_decode($usuarios, true);
//     foreach ($miArray["usuarios"] as $key => $value){
//       if($value["email"] == $user){
//         if(password_verify("$pass", $value["pass"])){
//           header("Location:perfilusuario.php");
//         }else{
//           echo "Contraseña incorrecta <br>";
//           return;
//         }
//       }
//     }
//     echo "Correo no registrado.";
//   }
// }


//
// // desde aqui es algo nuevo
// function validarLogin(){
//
// 	if (!empty($_POST)) {
//     $_SESSION['error']['email'] = "";
//     $_SESSION['error']['password'] = "";
//     if(strlen($_POST['email']) == 0) {
//       $_SESSION['error']['email'] = "El email no puede estar vacío<br>";
//       }elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
//         $_SESSION['error']['email'] = "El email ingresado no es válido<br>";
//         }else{
//           $_SESSION['exito']['email'] = $_POST['email'];
//           }
//           if(strlen($_POST['password']) == 0) {
//             $_SESSION['error']['password'] = "La contraseña no puede estar vacía<br>";
//           } elseif(strlen($_POST['password']) < 5) {
//             $_SESSION['error']['password'] = "La contraseña no puede ser menor a 5<br>";
//             }else{
//               $_SESSION['exito']['password'] = $_POST['password'];
//               }
//               if($_SESSION['error']['email'] == "" && $_SESSION['error']['password'] == ""){
//                 return true;
//               } else{
//                 header('Location: login.php');
//               }
//   }
// }

//
// function guardarInfoUsuario(){
//     // Si se envían datos por el método POST se guarda la información en variables
//     if ($_POST) {
//        $email = $_POST['email'];
//        $password = $_POST['password'];
//     };
//     // Se crea la variable a guardar en la base de datos con la información recibida
//     $nuevousuario = [
//         'email' => $email,
//         'password' => $password,
//     ];
//     return $nuevousuario;
// }
//
// function abrirJson(){
//     $usersJsonEncode = file_get_contents('array.json');
//     $usersJsonDecode = json_decode($usersJsonEncode, true);
//     return $usersJsonDecode;
// }

 ?>
