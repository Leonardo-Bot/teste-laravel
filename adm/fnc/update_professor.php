<?php
require("./../../fnc/connection.php");

$ID = $_POST['ID'];
$Nome = $_POST['Nome'];
$Email = $_POST['Email'];
$Telefone = $_POST['Telefone'];
$Status = $_POST['Status'];

$Update = $connection->query(
    "UPDATE professores SET
     nome = '$Nome', email = '$Email', telefone = '$Telefone', status = '$Status'
     WHERE id = '$ID'");

if($Update){
    echo 1;
}else{
    echo 0;
}
?>