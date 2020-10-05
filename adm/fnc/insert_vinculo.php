<?php
require("./../../fnc/connection.php");

$Professor = $_POST['Professor'];
$Curso = $_POST['Curso'];

$Insert = $connection->query("INSERT INTO cursos_professores (id_cursos, id_professores, status) VALUES ('$Curso', '$Professor', 1)");

if($Insert){
    echo 1;
}else{
    echo 0;
}