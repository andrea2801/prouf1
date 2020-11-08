<?php
include "shema.php";
include 'config.php';
include 'src/connect.php';
//render vista
require APP.'/src/render.php';
//si esta definida la session
$user=$_SESSION['username'] ?? ''; /*??=operador cualescencia si no esta 
definido entonces email seria ''*/
$des=filter_input(INPUT_POST, "des", FILTER_SANITIZE_SPECIAL_CHARS);
$userid= filter_input(INPUT_POST, "user", FILTER_SANITIZE_SPECIAL_CHARS);
$date= filter_input(INPUT_POST, "date", FILTER_SANITIZE_SPECIAL_CHARS);
$tarea= filter_input(INPUT_POST, "tarea", FILTER_SANITIZE_SPECIAL_CHARS);
echo render('dashboard',['Usuario'=>'Hola '.$user]);
$db=connectMysql($dsn,$dbuser,$dbpass);
$table="Task";


if(isset($userid) && isset($des) && isset($date)){

    $date = ['user' => $userid,'description' => $des,'due_date' => $date];
    insertTareas($db,$table,$date);
   
  
}
if($tarea!=null){

    deleteTarea( $db, $tarea);
   
  
}
