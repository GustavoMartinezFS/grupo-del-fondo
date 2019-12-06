<?php
// validacion

function validar(){
  $errores = [] ;
  $nombre="";
  $email="";
  if ($_POST){
    if (strlen($_POST["nombre"]) < 2){
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
    $json = file_get_contents("array.json");

    if(!empty($json)){
      $array = json_decode($json, true);
    }
    foreach ($array["usuarios"] as $key => $value) {
      if ($value["email"] == $email) {
        $errores["existe"]="El email ya está registrado!";
      }
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

function verificar(){
  $array = file_get_contents("array.json");
  if(!empty($usuarios)){
    $usuarios = json_decode($array, true);
  }
}

// creacion usuarios

function crear(){

$usuarioNuevo = [
  "nombre" => $_POST["nombre"],
  "email" => $_POST["email"],
  "pass" => password_hash($_POST["pass"], PASSWORD_DEFAULT)
];

$json = file_get_contents("array.json");

if(!empty($json)){
  $array = json_decode($json, true);
}

$array["usuarios"][] = $usuarioNuevo;

$ajson = json_encode($array,true);

file_put_contents("array.json", $ajson);
}

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

// Foto de perfil de #usuario
function foto(){
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
      move_uploaded_file($_FILES["foto_perfil"]["tmp_name"], "images/usuarios/fotoperfil." . $ext);
      return "";
    }
  }
}
session_start();

// desde aqui es algo nuevo
function validarLogin(){

	if (!empty($_POST)) {
    $_SESSION['error']['email'] = "";
    $_SESSION['error']['password'] = "";
    if(strlen($_POST['email']) == 0) {
      $_SESSION['error']['email'] = "El email no puede estar vacío<br>";
      }elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $_SESSION['error']['email'] = "El email ingresado no es válido<br>";
        }else{
          $_SESSION['exito']['email'] = $_POST['email'];
          }
          if(strlen($_POST['password']) == 0) {
            $_SESSION['error']['password'] = "La contraseña no puede estar vacía<br>";
          } elseif(strlen($_POST['password']) < 5) {
            $_SESSION['error']['password'] = "La contraseña no puede ser menor a 5<br>";
            }else{
              $_SESSION['exito']['password'] = $_POST['password'];
              }
              if($_SESSION['error']['email'] == "" && $_SESSION['error']['password'] == ""){
                return true;
              } else{
                header('Location: login.php');
              }
  }
}

function redordarUsuario(){
    if (!empty($_POST['recordarUsuario'])) {
        $cookie_email = "email";
        $cookie_emailvalue = $_POST['email'];
        setcookie($cookie_email, $cookie_emailvalue, time()+604800);
        $cookie_password = "password";
        $cookie_passwordvalue = $_POST['password'];
        setcookie($cookie_password, $cookie_passwordvalue, time()+604800);
        header('Location: login.php');
    } elseif(isset($_COOKIE['email'])){
        setcookie('email',"",time()-604800);
        setcookie('password',"",time()-604800);
        header('Location: login.php');
    }
}

function guardarInfoUsuario(){
    // Si se envían datos por el método POST se guarda la información en variables
    if ($_POST) {
       $useremail = $_POST['email'];
       $userpassword = $_POST['password'];
    };
    // Se crea la variable a guardar en la base de datos con la información recibida
    $nuevousuario = [
        'email' => $useremail,
        'password' => $userpassword,
    ];
    return $nuevousuario;
}

function abrirJson(){
    $usersJsonEncode = file_get_contents('array.json');
    $usersJsonDecode = json_decode($usersJsonEncode, true);
    return $usersJsonDecode;
}

function recorrerBDBuscandoUsuario($usersJsonDecode, $nuevousuario){
	$flagemail = false;
	$flagpassword = false;
  foreach ($usersJsonDecode["usuarios"] as $key => $value){
    if($value["email"] == $nuevousuario["email"]){
      $flagemail= true;
      if(password_verify($nuevousuario["password"], $value["pass"])){
        $flagpassword=true;
      }
    }
  }
  if ($flagemail && $flagpassword) {
    $_SESSION['exito'] = $nuevousuario['email'];
    return true;
  }elseif($flagpassword){
    $_SESSION['error']['returnsearch'] = "<br><br>Contraseña incorrecta";
    header('Location: login.php');
	} else{
	  $_SESSION['error']['returnsearch'] = "<br><br>El usuario no existe";
	  header('Location: login.php');
	}
}



 ?>
