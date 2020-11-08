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
           
                    
            
            function deleteTarea(PDO $db, $idtask){
                $deleteComand=" DELETE FROM Task 
                WHERE id =  '$idtask'";
        
                try{
                    $db->exec($deleteComand);
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
        
    // funció de selecció de  tots els registres
      function selectAll($db,$table,array $fields=null):array
      {
          if (is_array($fields)){
              $columns=implode(',',$fields);
              
          }else{
              $columns="*";
          }
          
          $sql="SELECT {$columns} FROM {$table}";
         
          $stmt=$db->prepare($sql);
          $stmt->execute();
          $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
          return $rows;
      }
    
         // insertar tareas
    function insertTareas($db,$table,$data):bool 
    {
       if (is_array($data)){
          $columns='';$bindv='';$values=null;
            foreach ($data as $column => $value) {
                $columns.='`'.$column.'`,';
                $bindv.='?,';
                $values[]=$value;
            }
            $columns=substr($columns,0,-1);
            $bindv=substr($bindv,0,-1);
              
            $sql="INSERT INTO {$table}({$columns}) VALUES ({$bindv})";
            
                try{
                    $stmt=$db->prepare($sql);

                    $stmt->execute($values);
                }catch(PDOException $e){
                    echo $e->getMessage();
                    return false;
                }
            
            return true;
            }
            return false;
        }
        

   
