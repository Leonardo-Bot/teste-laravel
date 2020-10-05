<?php
    require("./../../fnc/connection.php");

    $CursosSQL = $connection->query("SELECT c.*, a.descricao AS area FROM cursos c
                                     LEFT JOIN areas a ON a.id = c.id_areas");

?>
<div class="container">
<a href="#" class="btn btn-primary" onclick="areaVisualiza('./elements/adc_cursos.php')">Novo</a>
<table id="myTable" class="display">
    <thead>
        <tr>
            <th>Código</th>
            <th>Descrição</th>
            <th>Area</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php while($Cursos = mysqli_fetch_array($CursosSQL)){ ?>
            <tr>
                <td><?php echo $Cursos['id']; ?></td>
                <td><?php echo $Cursos['descricao']; ?></td>
                <td><?php echo $Cursos['area']; ?></td>
                <td><a href="#" onclick="areaVisualiza('./elements/alt_cursos.php?Curso=<?php echo $Cursos['id']; ?>')" class="btn btn-warning">Alterar</a>

                    <a href="#" onclick="areaVisualiza('./fnc/del_cursos.php?Curso=<?php echo $Cursos['id']; ?>')" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</div>

<script>
$(document).ready(function () {
    $('#myTable').DataTable({
        /*"ajax": "./fnc/select_professores.php",
        "dataSrc": "professores",
        "columns": [
            {"data": "Nome"},
            {"data": "Curso"},
            {"data": "Area"}
        ]*/
    });
});
</script>