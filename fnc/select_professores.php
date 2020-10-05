<?php
require("./connection.php");

$ProfessoresSQL = $connection->query("SELECT p.nome AS Professor, c.descricao AS Curso, a.descricao AS Area FROM professores p
                                      LEFT JOIN cursos_professores cp ON p.id = cp.id_professores
                                      INNER JOIN cursos c ON cp.id_cursos = c.id
                                      INNER JOIN areas a ON a.id = c.id_areas");

while($Professores = mysqli_fetch_array($ProfessoresSQL)){
    $Array[] = array("Nome" => $Professores['Professor'],
                     "Curso" => $Professores['Curso'],
                     "Area" => $Professores['Area']);
}
$Data['professores'] = $Array;
echo json_encode($Data);

mysqli_close($connection);