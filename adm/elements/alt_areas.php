<?php
require("./../../fnc/connection.php");

$ID = $_GET['Area'];

$Areas = mysqli_fetch_assoc($connection->query("SELECT * FROM areas WHERE id = '$ID'"));
?>
<div class="container">
    <h1>Editar Area</h1>
    <form id="formCadastro">
        <div class="form-group">
            <div class="col-lg-6">
                <label for="">Código:</label>
                <input type="text" name="ID" value="<?php echo $Areas['id']; ?>" class="form-control" readonly />
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-6">
                <label for="">Nome:</label>
                <input type="text" name="Nome" value="<?php echo $Areas['descricao']; ?>" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-6">
                <label for="">Status:</label>
                <select name="Status" class="form-control" id="">
                    <option value="1" <?php echo ($Areas['status'] == 1 ? 'selected' : ''); ?>>Ativo</option>
                    <option value="0" <?php echo ($Areas['status'] == 0 ? 'selected' : ''); ?>>Inativo</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <button id="btnCadastrar" class="btn btn-primary">Cadastrar</button>
            <a href="#" onclick="areaVisualiza('./elements/table_areas.php')" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
<script>
    $(document).ready(function(){
        $("#formCadastro").submit(function(e){
            e.preventDefault();

            var form = $(this);

            $.ajax({
            url: "./fnc/update_area.php",
            type: "POST",
            data: form.serialize(),
            beforeSend: function(){
                $("#btnCadastrar").html("Carregando...");
                $("#btnCadastrar").prop("disabled", true);
            },
            success: function(data){
                if(data == 1){
                    alert("Area alterada com sucesso");
                    areaVisualiza('./elements/table_areas.php');
                }else{
                    alert("Erro ao salvar");
                    $("#btnCadastrar").html("Cadastrar");
                    $("#btnCadastrar").prop("disabled", false);
                }
            },
            error: function(){
                alert("Erro interno");
            }
            });
        });
    });
</script>