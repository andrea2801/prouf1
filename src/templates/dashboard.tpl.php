
<?php
include 'header.tpl.php';
?>
<main>
<h1><?=$Usuario;?>
<p class="homes">Crea nuevas tareas o elimina tareas acabadas<p>

<h3>Crear tareas:</h3>
<table class="table">
            <thead>
                <tr> 
                    <th>Descripcion</th>
                    <th>Id User</th>
                   <th>Data</th>
                </tr>
            </thead>
        <form action="?url=dashboard" method="POST">
            <tbody>
                <tr>
                <td><input required type="text" name="des" placeholder="Descripcion de la tarea"></td>

                    <td><input required type="number" name="user" placeholder="Tu Id"></td>
                    <td><input required type="date" name="date"></td>

                    <td><button type="submit">Crear</button></td>
                </tr>
            </tbody>
        </table>
        </form>
        <h3>Eliminar tareas:</h3>
        <hr>
        <table >
            <form action="?url=dashboard" method="POST">
                <input required type="number" name="tarea" placeholder="Tarea id" >
                <button type="submit"> Eliminar</button>
        </table>
        </form>
</main>
<?php
include 'footer.tpl.php';
?>
