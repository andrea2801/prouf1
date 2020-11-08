

<?php 
ini_set('display_errors','On');
require "shema.php";
include "start.php";

$nameRegister = filter_input(INPUT_POST, 'username2', FILTER_SANITIZE_SPECIAL_CHARS);
$emailRegister = filter_input(INPUT_POST, 'email2', FILTER_SANITIZE_SPECIAL_CHARS);
$userpasswd = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_SPECIAL_CHARS);
$userpasswd = password_hash($userpasswd, PASSWORD_BCRYPT, ["cost" => 4]);


if ($nameRegister!=null && $emailRegister!=null  && $userpasswd!=null ) {
    $validar=validar($db, $emailRegister);
   if($validar==false){
          echo "El usuario ya existe";
    }else if($validar==true){
        InsertSchema($db, $emailRegister, $nameRegister, $userpasswd);
         
    }
   
    
} else{
    echo "vacio";
}



?>