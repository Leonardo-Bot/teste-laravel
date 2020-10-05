<?php
require("./../../fnc/connection.php");

$ID = $_POST['ID'];
$Nome = $_POST['Nome'];
$Duracao = $_POST['Duracao'];
$Valor = $_POST['Valor'];
$Areas = $_POST['Areas'];
$Status = $_POST['Status'];

$Update = $connection->query("UPDATE cursos SET descricao = '$Nome', id_areas = '$Areas',
                              duracao = '$Duracao', valor = '$Valor', 
                              status = '$Status' WHERE id = '$ID'");

if($Update){
    echo 1;
}else{
    echo 0;
}