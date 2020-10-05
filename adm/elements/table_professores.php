<?php
require("./../../fnc/connection.php");

$ProfessoresSQL = $connection->query("SELECT * FROM professores");
?>
<div class="container">
<a href="#" class="btn btn-primary" onclick="areaVisualiza('./elements/adc_professores.php')">Novo</a>
<table id="myTable" class="">
    <thead>
        <tr>
            <th>Código</th>
            <th>Nome Professor</th>
            <th>Email</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php while($Professores = mysqli_fetch_array($ProfessoresSQL)){ ?>
        <tr>
            <td><?php echo $Professores['id']; ?></td>
            <td><?php echo $Professores['nome']; ?></td>
            <td><?php echo $Professores['email']; ?></td>
            <td><a href="#" onclick="areaVisualiza('./elements/alt_profesores.php?Professor=<?php echo $Professores['id']; ?>')" class="btn btn-warning">Alterar</a>
                <a href="#" onclick="areaVisualiza('./fnc/del_profesores.php?Professor=<?php echo $Professores['id']; ?>')" class="btn btn-danger">Excluir</a>
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