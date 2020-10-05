<?php
require("./../../fnc/connection.php");

$AreasSQL = $connection->query("SELECT * FROM areas");

while($Areas = mysqli_fetch_array($AreasSQL)){
    $Array[] = array("id" => $Areas['id'],
                     "descricao" => $Areas['descricao'],);
}
$data['areas'] = $Array;
echo json_encode($data, JSON_NUMERIC_CHECK);

mysqli_close($connection);