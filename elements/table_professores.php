<?php
    require("./../fnc/connection.php");
    $ProfessoresSQL = $connection->query("SELECT p.nome AS Professor, c.descricao AS Curso, a.descricao AS Area FROM professores p
    LEFT JOIN cursos_professores cp ON p.id = cp.id_professores
    INNER JOIN cursos c ON cp.id_cursos = c.id
    INNER JOIN areas a ON a.id = c.id_areas");
?>
<div class="container">
<table id="myTable" class="display">
    <thead>
        <tr>
            <th>Nome Professor</th>
            <th>Curso</th>
            <th>Area</th>
        </tr>
    </thead>
    <tbody>
        <?php while($Professores = mysqli_fetch_array($ProfessoresSQL)){ ?>
            <tr>
                <td><?php echo $Professores['Professor']; ?></td>
                <td><?php echo $Professores['Curso']; ?></td>
                <td><?php echo $Professores['Area']; ?></td>
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
            {"data": "Area"},
        ]*/
    });
});
</script>