<?php
require("./../../fnc/connection.php");

$ID = $_POST['ID'];
$Nome = $_POST['Nome'];
$Status = $_POST['Status'];

$Update = $connection->query("UPDATE areas SET descricao = '$Nome', status = '$Status' WHERE id = '$ID'");

if($Update){
    echo 1;
}else{
    echo 0;
}