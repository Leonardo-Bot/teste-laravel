<?php
    require("./../../fnc/connection.php");

    $AreasSQL = $connection->query("SELECT * FROM areas");
?>
<div class="container">
<div class="form-group">
    <a href="#" class="btn btn-primary" onclick="areaVisualiza('./elements/adc_areas.php')">Novo</a>
</div>
<table id="myTable" class="display">
    <thead>
        <tr>
            <th>Código</th>
            <th>Descrição</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php while($Areas = mysqli_fetch_array($AreasSQL)){ ?>
        <tr>
            <td><?php echo $Areas['id']; ?></td>
            <td><?php echo $Areas['descricao']; ?></td>
            <td><a href="#" onclick="areaVisualiza('./elements/alt_areas.php?Area=<?php echo $Areas['id']; ?>')" class="btn btn-warning">Alterar</a>

                <a href="#" onclick="areaVisualiza('./fnc/del_areas.php?Area=<?php echo $Areas['id']; ?>')" class="btn btn-danger">Excluir</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
</div>

<script>
$(document).ready(function () {
    $('#myTable').DataTable({
        /*"ajax": "./fnc/select_areas.php",
        "dataSrc": "areas",
        "columns": [
            {"data": "id"},
            {"data": "descricao"}
        ]*/
    });
});
</script>