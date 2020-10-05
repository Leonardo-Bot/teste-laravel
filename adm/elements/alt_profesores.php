<?php
require("./../../fnc/connection.php");

$ID = $_GET['Professor'];

$Professores = mysqli_fetch_assoc($connection->query("SELECT * FROM professores WHERE id = '$ID'"));
?>
<div class="container">
    <h1>Editar Professor</h1>
    <form id="formCadastro">
        <div class="form-group">
            <div class="col-lg-6">
                <label for="">Código:</label>
                <input type="text" name="ID" value="<?php echo $Professores['id']; ?>" class="form-control" readonly />
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-6">
                <label for="">Nome:</label>
                <input type="text" name="Nome" value="<?php echo $Professores['nome']; ?>" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-6">
                <label for="">Email:</label>
                <input type="text" name="Email" value="<?php echo $Professores['email']; ?>" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-6">
                <label for="">Telefone:</label>
                <input type="text" name="Telefone" value="<?php echo $Professores['telefone']; ?>" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-6">
                <label for="">Stauts:</label>
                <select name="Status" class="form-control" id="">
                    <option value="1" <?php echo ($Professores['status'] == 1 ? 'selected' : ''); ?>>Ativo</option>
                    <option value="0" <?php echo ($Professores['status'] == 0 ? 'selected' : ''); ?>>Inativo</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <button id="btnCadastrar" class="btn btn-primary">Cadastrar</button>
            <a href="#" onclick="areaVisualiza('./elements/table_professores.php')" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
<script>
    $(document).ready(function(){
        $("#formCadastro").submit(function(e){
            e.preventDefault();

            var form = $(this);

            $.ajax({
            url: "./fnc/update_professor.php",
            type: "POST",
            data: form.serialize(),
            beforeSend: function(){
                $("#btnCadastrar").html("Carregando...");
                $("#btnCadastrar").prop("disabled", true);
            },
            success: function(data){
                if(data == 1){
                    alert("Professor alterado com sucesso");
                    areaVisualiza('./elements/table_professores.php');
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