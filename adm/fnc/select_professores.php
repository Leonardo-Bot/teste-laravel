<?php
require("./../../fnc/connection.php");

$ProfessoresSQL = $connection->query("SELECT p.id, p.nome AS Professor, c.descricao AS Curso, a.descricao AS Area FROM professores p
                                      LEFT JOIN cursos_professores cp ON p.id = cp.id_professores
                                      INNER JOIN cursos c ON cp.id_cursos = c.id
                                      INNER JOIN areas a ON a.id = c.id_areas");

while($Professores = mysqli_fetch_array($ProfessoresSQL)){
    $Array[] = array("codigo" => $Professores['id'],
                     "nome" => $Professores['Professor'],
                     "curso" => $Professores['Curso'],
                     "area" => $Professores['Area'],
                     "editar" => 'teste');
}
$Data['professores'] = $Array;
echo json_encode($Data, JSON_NUMERIC_CHECK);

mysqli_close($connection);