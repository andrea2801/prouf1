<?php
//render vista
require APP.'/src/render.php';

//Cerrar la sesion
session_destroy();
header("location: ?url=login");
//si esta definida la session
$user=$_SESSION['username'] ?? ''; 