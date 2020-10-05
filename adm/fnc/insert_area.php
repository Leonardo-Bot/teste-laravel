<?php
require("./../../fnc/connection.php");

$Nome = $_POST['Nome'];
$Status = $_POST['Status'];

$Insert = $connection->query(
    "INSERT INTO areas 
     (descricao, status) 
     VALUES 
     ('$Nome', '$Status')");

if($Insert){
    echo 1;
}else{
    echo 0;
}
?>