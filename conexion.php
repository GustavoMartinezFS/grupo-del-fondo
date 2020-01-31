
<?php

// Se crea la conexión

    // $dsn = "TIPO DE BD : dbname=NOMBRE BD ; host=127.0.0.1 ; port=3306" ;
$dsn = "mysql:dbname=gf_db;host=127.0.0.1;port=3306" ;
$user = "root";
$pass = "";
$opt=[PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION];


// $baseDeDatos = new PDO($dsn, $user, $pass);

try {
$DB = new PDO($dsn, $user, $pass,$opt);

// Me avisa si hay error en la BD
} catch(PDOException $e){
  echo "Woops!";?><br><?php
  echo $e->getMessage();
}

// echo "Funciona piola";

 ?>
