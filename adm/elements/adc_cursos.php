<?php
    require("./../../fnc/connection.php");

    $AreasSQL = $connection->query("SELECT * FROM areas WHERE status = 1");
?>
<div class="container">
    <h1>Novo Curso</h1>
    <form id="formCadastro">
        <div class="form-group">
            <div class="col-lg-6">
                <label for="">Nome:</label>
                <input type="text" name="Nome" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-6">
                <label for="">Areas:</label>
                <select name="Areas" class="form-control" id="">
                    <?php while($Areas = mysqli_fetch_array($AreasSQL)){ ?>
                        <option value="<?php echo $Areas['id']; ?>"><?php echo $Areas['descricao']; ?></option>
                    <?php } ?>     
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-6">
                <label for="">Duração:</label>
                <input type="text" name="Duracao" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-6">
                <label for="">Valor:</label>
                <input type="number" name="Valor" class="form-control" />
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
            url: "./fnc/insert_curso.php",
            type: "POST",
            data: form.serialize(),
            beforeSend: function(){
                $("#btnCadastrar").html("Carregando...");
                $("#btnCadastrar").prop("disabled", true);
            },
            success: function(data){
                if(data == 1){
                    alert("Novo Curso inserido com sucesso");
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