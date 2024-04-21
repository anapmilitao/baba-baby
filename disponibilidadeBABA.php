<?php

require 'configu.php';

$idBaba = filter_input(INPUT_GET, 'idBaba');

$querySQL = "SELECT dia.nome as dia_da_semana, turno.nome as turno, dispo.fk_idDia as idDia  
FROM disponibilidade as dispo
LEFT JOIN dia ON dispo.fk_idDia = dia.idDia
LEFT JOIN turno ON dispo.fk_idTurno = turno.idTurno
WHERE dispo.fk_idBaba = $idBaba
ORDER BY idDia;";

$queryPreparada = $pdo->prepare($querySQL);
$queryPreparada->execute();
$queryPreparada->setFetchMode(PDO::FETCH_ASSOC);
$disponibilidadeBaba = $queryPreparada->fetchAll();


$listaConsolidada = array();
foreach($disponibilidadeBaba as $dispo) {
    if(!isset($listaConsolidada[$dispo["dia_da_semana"]])) {
        $listaConsolidada[$dispo["dia_da_semana"]] = array();
    }
    array_push($listaConsolidada[$dispo["dia_da_semana"]], $dispo["turno"]);
}
foreach($listaConsolidada as $dia => $turnos) {
    $listaConsolidada[$dia] = implode(" - ", $turnos);
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/disponibilidadebb.css">
    
</head>
<body>
    <header>
        <a  href="addDisponibilidadeBABA.php?idBaba=<?php echo $idBaba; ?>" class="adicionar">Adicionar disponibilidade</a>
        <a  href="editarDisponibilidadeBABA.php?idBaba=<?php echo $idBaba; ?>" class="remover">Remover disponibilidade</a>        
        <a href="index.php" class="voltar">Voltar</a>
        <img src="imagem/bbbyy.png" width="120px" class="imagemhead" >
    </header>
    
    <h1>Disponibilidade da Baba</h1>
    
<table border="1">
    <thead>
        <tr>
            <th>Dia da Semana</th>
            <th>Turno</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($listaConsolidada as $dia => $turnos): ?>
            <tr>
                <td><?php echo $dia; ?></td>
                <td><?php echo $turnos; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
