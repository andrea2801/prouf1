<?php
include "shema.php";
include 'config.php';
include 'src/connect.php';
//render vista
require APP.'/src/render.php';
//si esta definida la session
$user=$_SESSION['username'] ?? ''; /*??=operador cualescencia si no esta 
definido entonces email seria ''*/
$db=connectMysql($dsn,$dbuser,$dbpass);
$table="Task";
$fields=['id','description','user','due_date'];
$selectAll=selectAll($db,$table,$fields);
echo render('home',['Usuario'=>'Bienvenid@ '.$user, 'Tarea' => $selectAll]);



