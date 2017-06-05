<?php
  require_once 'vendor/econea/nusoap/src/nusoap.php';
  // require_once './nusoap/lib/nusoap.php';

  $us="root";
  $pas="";
  $server = "localhost";
  $bdd="libros";

  $conexion = mysqli_connect($server, $us, $pas, $bdd) or die ("No es posible conectar");
  // $bbdd = mysql_select_db("phpws") or due ("BBDD no disponible");

  function muestraLibros(){

    $us="root";
    $pas="";
    $server = "localhost";
    $bdd="libros";

    $conexion = mysqli_connect($server, $us, $pas, $bdd) or die ("No es posible conectar");
    mysqli_set_charset($conexion, "utf8");
    $resultado=mysqli_query($conexion,"SELECT * FROM libros");

    while($row=mysqli_fetch_array($resultado)){
      $all[] = $row;

    }
    return $all;
  }
  if(!isset($HTTP_RAW_POST_DATA)) $HTTP_RAW_POST_DATA=file_get_contents('php://input');

  $server = new soap_server();//creamos el serviidor soap
  $server->register("muestraLibros");//registramos la función en el servidor
  $server->service($HTTP_RAW_POST_DATA);

  exit;
?>
