<?php
// validacion
$errores = array();

// function validar_nombre(){
if ($_POST) {
  if (strlen($_POST["nombre"]) == 0){
    $errores[] = "No completaste el nombre <br>";
  }
}
// }

// function validar_apellido() {
if ($_POST) {
  if (strlen($_POST["apellido"]) < 2){
    $errores[] = "No completaste el apellido <br>";
  }
}
// }

// function validar_email() {
if ($_POST) {
  if (strlen($_POST["email"]) == 0){
    $errores[] = "No completaste el email <br>";
    // echo "No llenaste el email <br>";
    }
    if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false) {
      $errores[] = "El mail no tiene el formato correcto <br>";


  }
}
// }

// function validar_pass() {
  if ($_POST) {
    if (strlen($_POST["pass"]) < 5) {
      $errores[] = "La contraseña debe tener almenos 5 caracteres <br>";
    }
  }
// }

// function validar_repass() {
  if ($_POST) {
    if (($_POST["repass"]) != ($_POST["pass"])) {
      $errores[] = "Las contraseñas no coinciden <br>";
    }
  }
// }

// registro exitoso = perfilusuario
if ($_POST) {
  if (!$errores){
    crear();
    header("Location:perfilusuario.php"); exit;
  }
}



// creacion usuarios

function crear(){

$miArray = ["nombre" => $_POST["nombre"],
            "apellido" => $_POST["apellido"],
            "email" => $_POST["email"],
            "pass" => password_hash($_POST["pass"], PASSWORD_DEFAULT)
          ];

$usuarios = file_get_contents("usuarios.json");

if(!empty($usuarios)){
  $usuarios = json_decode($usuarios, true);
};

$usuarios["usuarios"][] = $miArray;

$ajson = json_encode($usuarios, true);

file_put_contents("usuarios.json", $ajson);

}


// Se registró correctamente y va a su perfil - no se por que no funcionaaaaaa
//
// if (){
//   header("Location:perfilusuario.php");exit;
// }



// persistencia

$email = "";
$nombre = "";
$apellido = "";

if ($_POST) {

  $email = $_POST ["email"];
  $nombre = $_POST ["nombre"];
  $apellido = $_POST ["apellido"];
  }

// //
//
// // Se valida usuario y contraseña
    //   PERO NO ESTARIA FUNCIONANDO JEJE SALUDOS

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
};
// //
// //
//

//<?php


//Foto de perfil de #usuario

if($_FILES){

  if($_FILES["foto_perfil"]["error"] !=0){
    echo "Hubo un error al cargar su foto de perfil <br>";
  }else {
    $ext = pathinfo($_FILES["foto_perfil"]["name"], PATHINFO_EXTENSION);
  }
      if ($ext != "jpeg" && $ext != "jpg" && $ext != "png") {
        echo "Su foto de perfil debe ser .jpeg, .jpg o .png <br>";
      }else {
        move_uploaded_file($_FILES["foto_perfil"]["tmp_name"], "files/fotoperfil." . $ext);
      }
}


//datos perfilusuario

function datos_user(){
  session_start();

}



 ?>
