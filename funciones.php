<?php
// validacion

function validar(){
  $errores = array();
  if ($_POST){
    if (strlen($_POST["nombre"]) == 0){
      $errores[] = "No llenaste el nombre URA <br>";
    }
    if (strlen($_POST["apellido"]) < 2){
      $errores[] = "Que son OCHO caracteres herrrrmano <br>";
    }
    if (strlen($_POST["email"]) == 0){
      $errores[] = "No llenaste el email <br>";
      }
    if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false){
        $errores[] = "El mail no tiene el formato correcto <br>";
    }
    if (strlen($_POST["pass"]) < 5){
        $errores[] = "La contraseña debe tener almenos 5 caracteres <br>";
    }
    if (($_POST["repass"]) != ($_POST["pass"])){
        $errores[] = "Las contraseñas no coinciden <br>";
    }
    if (!$errores){
      crear();
      header("Location:perfilusuario.php");
    }else {
      return $errores;
    }
  }
}

function verificar(){
  $array = file_get_contents("usuarios.json");

  if(!empty($usuarios)){
    $usuarios = json_decode($array, true);
  }
}

// creacion usuarios

function crear(){

$miArray = [
  "nombre" => $_POST["nombre"],
  "apellido" => $_POST["apellido"],
  "email" => $_POST["email"],
  "pass" => password_hash($_POST["pass"], PASSWORD_DEFAULT)
];

$usuarios = file_get_contents("usuarios.json");

if(!empty($usuarios)){
  $usuarios = json_decode($usuarios, true);
}

$usuarios["usuarios"][] = $miArray;

$ajson = json_encode($usuarios, true);

file_put_contents("usuarios.txt", $ajson, FILE_APPEND);
}

// persistencia
$nombre="";
$apellido="";
$email="";
if ($_POST){
  $email = (isset($_POST ["email"]))? $_POST ["email"] : "" ;
  $nombre = (isset($_POST ["nombre"]))? $_POST ["email"] : "" ;
  $apellido = (isset($_POST ["apellido"]))? $_POST ["email"] : "" ;
}

// //
//
function log_in(){
if (!empty($_POST)) {
  $user = $_POST["email"];
  $pass = $_POST["pass"];
    $usuarios = file_get_contents("usuarios.json");
    $miArray = json_decode($usuarios, true);
    foreach ($miArray["usuarios"] as $key => $value) {
      if ( $value["email"] == $user) {
        if (password_verify("$pass", $value["pass"])) {
          header("Location:perfilusuario.php");
        }else {
          echo "Contraseña incorrecta <br>";
          break;
        }
      }
    }
  }
}

// Foto de perfil de #usuario

if($_FILES){

  if($_FILES["foto_perfil"]["error"] !=0){
    echo "Hubo un error al cargar su foto de perfil <br>";
  }else {
    $ext = pathinfo($_FILES["foto_perfil"]["name"], PATHINFO_EXTENSION);
  }
      if ($ext != "jpeg" && $ext != "jpg" && $ext != "png") {
        echo "Su foto de perfil debe ser .jpeg, .jpg o .png <br>";
      }else {
        move_uploaded_file($_FILES["foto_perfil"]["tmp_name"], "images/usuarios/fotoperfil." . $ext);
      }
}

//
// // datos perfilusuario
// función  datos_user () {
//   session_start ();
// }



 ?>
