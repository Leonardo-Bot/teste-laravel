<?php
require("./../../fnc/connection.php");

$Nome = $_POST['Nome'];
$Areas = $_POST['Areas'];
$Duracao = $_POST['Duracao'];
$Valor = $_POST['Valor'];
$Status = $_POST['Status'];

$Insert = $connection->query(
    "INSERT INTO cursos 
     (id_areas, descricao, duracao, valor, status) 
     VALUES 
     ('$Areas', '$Nome', '$Duracao', '$Valor', '$Status')");

if($Insert){
    echo 1;
}else{
    echo 0;
}
?>