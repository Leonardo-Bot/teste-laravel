<?php
require("./../../fnc/connection.php");

$ProfessoresSQL = $connection->query("SELECT * FROM professores");
$CursosSQL = $connection->query("SELECT * FROM cursos");

?>
<div class="container">
    <h1>Vinculo Professor</h1>
    <form id="formCadastro">
        <div class="form-group">
            <div class="col-lg-6">
                <label for="">Professor:</label>
                <select name="Professor" class="form-control" id="">
                    <?php while($Professores = mysqli_fetch_array($ProfessoresSQL)){ ?>
                        <option value="<?php echo $Professores['id']; ?>"><?php echo $Professores['nome']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-6">
                <label for="">Curso:</label>
                <select name="Curso" class="form-control" id="">
                <?php while($Cursos = mysqli_fetch_array($CursosSQL)){ ?>
                    <option value="<?php echo $Cursos['id']; ?>"><?php echo $Cursos['descricao']; ?></option>
                <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-6">
                <label for="">Stauts:</label>
                <select name="Status" class="form-control" id="">
                    <option value="1">Ativo</option>
                    <option value="0">Inativo</option>
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
            url: "./fnc/insert_vinculo.php",
            type: "POST",
            data: form.serialize(),
            beforeSend: function(){
                $("#btnCadastrar").html("Carregando...");
                $("#btnCadastrar").prop("disabled", true);
            },
            success: function(data){
                if(data == 1){
                    alert("Novo Professor inserido com sucesso");
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