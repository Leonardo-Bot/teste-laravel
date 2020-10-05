<?php
require("./../../fnc/connection.php");

$ID = $_GET['Curso'];

$Curso = mysqli_fetch_assoc($connection->query("SELECT * FROM cursos WHERE id = '$ID'"));
$AreasSQL = $connection->query("SELECT * FROM areas");
?>
<div class="container">
    <h1>Editar Curso</h1>
    <form id="formCadastro">
        <div class="form-group">
            <div class="col-lg-6">
                <label for="">Código:</label>
                <input type="text" name="ID" value="<?php echo $Curso['id']; ?>" class="form-control" readonly />
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-6">
                <label for="">Nome:</label>
                <input type="text" name="Nome" value="<?php echo $Curso['descricao']; ?>" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-6">
                <label for="">Valor:</label>
                <input type="text" name="Valor" value="<?php echo $Curso['valor']; ?>" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-6">
                <label for="">Duração:</label>
                <input type="text" name="Duracao" value="<?php echo $Curso['duracao']; ?>" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-6">
                <label for="">Areas:</label>
                <select name="Areas" class="form-control" id="">
                    <?php while($Areas = mysqli_fetch_array($AreasSQL)){ ?>
                        <option value="<?php echo $Areas['id']; ?>" <?php echo ($Curso['id_areas'] == $Areas['id'] ? 'selected' : ''); ?>><?php echo $Areas['descricao']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-6">
                <label for="">Status:</label>
                <select name="Status" class="form-control" id="">
                    <option value="1" <?php echo ($Curso['status'] == 1 ? 'selected' : ''); ?>>Ativo</option>
                    <option value="0" <?php echo ($Curso['status'] == 0 ? 'selected' : ''); ?>>Inativo</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <button id="btnCadastrar" class="btn btn-primary">Cadastrar</button>
            <a href="#" onclick="areaVisualiza('./elements/table_cursos.php')" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
<script>
    $(document).ready(function(){
        $("#formCadastro").submit(function(e){
            e.preventDefault();

            var form = $(this);

            $.ajax({
            url: "./fnc/update_curso.php",
            type: "POST",
            data: form.serialize(),
            beforeSend: function(){
                $("#btnCadastrar").html("Carregando...");
                $("#btnCadastrar").prop("disabled", true);
            },
            success: function(data){
                if(data == 1){
                    alert("Curso alterado com sucesso");
                    areaVisualiza('./elements/table_cursos.php');
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