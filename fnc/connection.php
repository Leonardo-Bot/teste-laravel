<?php
$connection = mysqli_connect("localhost", "root", "") or die("Erro de conexão");
$db = mysqli_select_db($connection, "avaliacao");