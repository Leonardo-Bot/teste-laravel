<div class="container">
    <h1>Novo Professor</h1>
    <form id="formCadastro">
        <div class="form-group">
            <div class="col-lg-6">
                <label for="">Nome:</label>
                <input type="text" name="Nome" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-6">
                <label for="">Email:</label>
                <input type="text" name="Email" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-6">
                <label for="">Telefone:</label>
                <input type="text" name="Telefone" class="form-control" />
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
            url: "./fnc/insert_professor.php",
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