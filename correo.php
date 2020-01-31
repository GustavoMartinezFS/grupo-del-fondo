<?php
include("conexion.php");

  $nombre=$_POST["nombre"];
  $tel=$_POST["tel"];
  $dir=$_POST["dir"];
  $email=$_POST["email"];
  $msje=$_POST["msje"];

  $correo=$DB->prepare("INSERT INTO contacto VALUES (null,:nombre,:tel,:dire,:email,:msje);");
  $correo->bindValue(':nombre',$nombre,PDO::PARAM_STR);
  $correo->bindValue(':tel',$tel,PDO::PARAM_INT);
  $correo->bindValue(':dire',$dir,PDO::PARAM_STR);
  $correo->bindValue(':email',$email,PDO::PARAM_STR);
  $correo->bindValue(':msje',$msje,PDO::PARAM_STR);
   $correo->execute();

  echo "Su mensaje fue enviado con exito!";
