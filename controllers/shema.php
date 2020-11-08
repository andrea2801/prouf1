<?php
    
    function InsertSchema($db, $email, $username, $userpasswd){
        
        $insertComand=" INSERT INTO Users(username ,email, password, role) 
        VALUES ('$username','$email','$userpasswd', 3)";
        try{
            $db->exec($insertComand);
            header("location: /?url=login");
        }catch(PDOException $e){
            die($e->getMessage());
        }
            
            }
           
                    
            
            function deleteSchema(PDO $db, $username){
                $deleteComand=" DELETE FROM users 
                WHERE name =  '.$username.'";
        
                try{
                    $db->exec($deleteComand);
                    echo "Se ha eliminado correctamente";
                }catch(PDOException $e){
                    die($e->getMessage());
                }
            }


            function validar($db, $mail):bool{
               
                $q = $db->prepare("SELECT * FROM Users WHERE email =:email");
                $q ->execute([':email'=>$mail]);
                $count=$q ->rowCount();
                try{
                    if($db->$count == 0){
                        return true;
                }
                else{
                    return false;
                }
                }catch(PDOException $e){
                    die($e->getMessage());
                }
            }
        // funció d'autenticacion
    function auth($db,$email,$pass):bool{
        
        try{   
            $stmt=$db->prepare('SELECT * FROM Users WHERE email=:email LIMIT 1');
            $stmt->execute([':email'=>$email]);
            $count=$stmt->rowCount();
            $row=$stmt->fetchAll(PDO::FETCH_ASSOC);  
            
            if($count==1){       
                $user=$row[0];
                $res=password_verify($pass,$user['password']);
               
                if ($res){
                    $_SESSION['username']=$user['username'];
                    $_SESSION['email']=$user['email'];
           
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }catch(PDOException $e){
            return false;
        }
    }
        
    function taskUser(array $taskuser) {
        print "<br><table";
        $row = $taskuser[0];
        $title = " <tr> ";
        foreach ($row as $field => $value) {
            $title .= "<td>  $field  </td> ";
        }
        print $title . "<tr>";
    
        foreach ($taskuser as $row) {
            $line = "<tr>";
            foreach ($row as $field) {
                $line .= "<td>$field</td>";
            }
            print $line . "</tr>";
        }
        print "</table><br>";
    }
    
        

   