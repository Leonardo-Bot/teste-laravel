<?php
require("./../../fnc/connection.php");

$Nome = $_POST['Nome'];
$Email = $_POST['Email'];
$Telefone = $_POST['Telefone'];
$Status = $_POST['Status'];

$Insert = $connection->query(
    "INSERT INTO professores 
     (nome, email, telefone, status) 
     VALUES 
     ('$Nome', '$Email', '$Telefone', '$Status')");

if($Insert){
    echo 1;
}else{
    echo 0;
}
?>