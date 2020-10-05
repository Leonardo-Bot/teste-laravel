<?php require("./menu/navbar.php"); ?>
<div class="container">
    <form id="formLogin">
        <div class="form-group">
            <div class="col-lg-6">
                <label for="">Email:</label>
                <input type="email" name="Email" class="form-control" id="email" required />
            </div>        
        </div>    
        <div class="form-group">
            <div class="col-lg-6">
                <label for="">Senha:</label>
                <input type="password" name="Senha" class="form-control" id="email" required />
            </div>        
        </div>    
        <div class="form-group">
            <button class="btn btn-primary" id="btnEntrar">Entrar</button>
        </div>
    </form>
</div>
<?php require("./menu/footer.php"); ?>

<script>
    $(document).ready(function(){
        $("#formLogin").submit(function(e){
            e.preventDefault();

            var form = $(this);

            $.ajax({
            url: "./fnc/fnc_login.php",
            type: "POST",
            data: form.serialize(),
            beforeSend: function(){
                $("#btnEntrar").html("Carregando...");
                $("#btnEntrar").prop("disabled", true);
            },
            success: function(data){
                if(data == 1){
                    window.location.href="./adm/";
                }else{
                    alert("Email ou senha inválidos");
                    $("#btnEntrar").html("Entrar");
                    $("#btnEntrar").prop("disabled", false);
                }
            },
            error: function(){
                alert("Erro interno");
            }
        });
        });
    });
</script>