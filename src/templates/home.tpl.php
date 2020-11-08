
<?php
include 'src/templates/header.tpl.php';
?>
<main id="home"><h1><?=$Usuario;?></h1>
<p class="homes">Empieza a gestionar tus tareas<p><a href="?url=dasboard">  Editar</a>
     <?php
     include 'config.php';
     require 'src/connect.php';
     $db=connectMysql($dsn,$dbuser,$dbpass);
     $name=$_SESSION['username'];
     if ($db) {
                        $querySelect = "SELECT username FROM Users WHERE username='$name'";
                        $taskuser = [];
                        $db->exec($querySelect, $taskuser);
                        taskUser($taskuser);
                    }
                    ?>
</main>
<?php
include 'src/templates/footer.tpl.php';
?>


