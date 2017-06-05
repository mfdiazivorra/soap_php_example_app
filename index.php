<?php

require_once 'vendor/econea/nusoap/src/nusoap.php';
// require_once './nusoap/lib/nusoap.php';

$cliente = new nusoap_client ("http://localhost/libros2/service_soap_bbdd.php"); //creamos unn cliente que se conecte al servidor soap.
$libros = $cliente->call("muestraLibros");//llamamos a la funcion

echo"<h2>Mis Libros</h2>";

echo "<ul>";

foreach ($libros as $item){

echo '<li>';
echo '<strong>' .$item['autor'].'</strong><br>';
echo '<strong>' .$item['titulo'].'</strong><br>';
echo '<br><br></li>';
}

echo "</ul>";

?>
