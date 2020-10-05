<?php
require("./../../fnc/connection.php");

$ProfessoresSQL = $connection->query("SELECT cp.id, p.nome AS Professor, c.descricao AS Curso FROM cursos_professores cp
                                      LEFT JOIN cursos c ON c.id = cp.id_cursos
                                      LEFT JOIN professores p ON p.id = cp.id_professores");
?>
<div class="container">
<a href="#" class="btn btn-primary" onclick="areaVisualiza('./elements/vinculo_professor.php')">Novo</a>
<table id="myTable" class="">
    <thead>
        <tr>
            <th>Código</th>
            <th>Nome Professor</th>
            <th>Curso</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php while($Professores = mysqli_fetch_array($ProfessoresSQL)){ ?>
        <tr>
            <td><?php echo $Professores['id']; ?></td>
            <td><?php echo $Professores['Professor']; ?></td>
            <td><?php echo $Professores['Curso']; ?></td>
            <td><a href="#" onclick="areaVisualiza('./elements/alt_vinculo.php?Vinculo=<?php echo $Professores['id']; ?>')" class="btn btn-warning">Alterar</a>
                <a href="#" onclick="areaVisualiza('./fnc/del_vinculo.php?Vinculo=<?php echo $Professores['id']; ?>')" class="btn btn-danger">Excluir</a>
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
            {"data": "codigo"},
            {"data": "nome"},
            {"data": "curso"},
            {"data": "area"},
            {"data": "editar"}
        ]*/
    });
});
</script>