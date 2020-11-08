

<?php 
ini_set('display_errors','On');
require "shema.php";
include "start.php";
$recordar=filter_input(INPUT_POST, "recordar", FILTER_SANITIZE_SPECIAL_CHARS);
$userpasswd= filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
$email= filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);

$authentification =auth($db,$email,$userpasswd);
if($email != null && $userpasswd != null){
    if($authentification==true){
        if($recordar){
            $_SESSION['email']=$email;
            $userpasswd = password_hash($userpasswd, PASSWORD_BCRYPT, ["cost" => 4]);
            $_SESSION['contraseñaIn']=$userpasswd;
            header("location: ?url=home");
        }else{
            header("location: ?url=home");
        }
        
        } else{
             echo "Error al iniciar session, puede que el usuario con el email:  ".$email." no exista";
        }
        if($recordar){
        $_SESSION['recordar']=$email;
        header("location: ?url=home");
    }
}else{
    echo "Error al iniciar session, puede que los campos estes vacios";
        
}
    




?>