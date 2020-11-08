<?php
//render vista
require APP.'/src/render.php';
//si esta definida la session
$user=$_SESSION['username'] ?? ''; /*??=operador cualescencia si no esta 
definido entonces email seria ''*/
echo render('home',['Usuario'=>'Bienvenid@ '.$user.'.']);
