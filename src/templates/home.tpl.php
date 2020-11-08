
<?php
include 'src/templates/header.tpl.php';
?>
<main id="home"><h1><?=$Usuario;?></h1>
<p class="homes">Empieza a gestionar tus tareas<p><a href="?url=dasboard">Editar</a>
<?php
        if(isset($data['Tarea'])){
        if(count($data['Tarea']) > 0){
    ?>  
<table class="table">
            <thead>
            <tr>
                <th>Task ID</th>
                <th>Description</th>
                <th>User ID</th>
                <th>Date</th>
            </tr>
            </thead>
            <?php

foreach($data['Tarea'] as $valor){
    echo "<tr>";
        foreach($valor as $fields){
            echo "<td>".$fields."</td>";
        }
            echo "</tr>";
}}}
?>
</table>
</main>
<?php
include 'src/templates/footer.tpl.php';
?>


