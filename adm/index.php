<?php
session_start();
    if(empty($_SESSION['ID'])){
        header("location: ./../login.php");
    }
?>
<?php require("./../menu/navbarADM.php"); ?>
    <div id="areaVisualiza"></div>
<?php require("./../menu/footer.php"); ?>
<script>
    function areaVisualiza(url){
        $.ajax({
            url: url,
            data: "form=areaVisualiza",
            success: function(data){
                $("#areaVisualiza").html(data);
            }
        })
    }
</script>