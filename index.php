<?php
//activació d'errors
ini_set('display_errors','On');
//configuracion entorno
session_start();
define('APP',__DIR__);
require APP.'/src/route.php';
//enrutamiento query_string htt:/app?url=login
$controller=getRoute();

//redirigir  a ruta capturada
require APP.'/controllers/'.$controller.'.php';