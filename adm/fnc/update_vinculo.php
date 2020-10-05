<?php
require("./../../fnc/connection.php");

$ID = $_POST['ID'];
$Professor = $_POST['Professor'];
$Curso = $_POST['Curso'];
$Status = $_POST['Status'];

$Insert = $connection->query(
    "UPDATE cursos_professores SET id_cursos = '$Curso', id_professores = '$Professor', status = '$Status'
     WHERE id = '$ID'");

if($Insert){
    echo 1;
}else{
    echo 0;
}