<?php
require("./../../fnc/connection.php");

$ID = $_GET['Professor'];

$Delete = $connection->query("DELETE FROM professores WHERE id = '$ID'");

if($Delete){
    echo '<script>alert("Excluido com sucesso");window.location.href="./"';
}else{
    echo '<script>alert("Erro ao tentar excluir");window.location.href="./"';
}