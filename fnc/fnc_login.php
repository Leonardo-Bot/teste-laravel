<?php
session_start();
require("./connection.php");

$Email = $_POST['Email'];
$Senha = md5($_POST['Senha']);

$UsuarioSQL = $connection->query("SELECT * FROM usuarios WHERE email = '$Email' AND senha = '$Senha'");

if(mysqli_num_rows($UsuarioSQL)>0){
    $Usuarios = mysqli_fetch_assoc($UsuarioSQL);
    $_SESSION['ID'] = $Usuarios['id'];
    echo 1;
}else{
    echo 0;
}