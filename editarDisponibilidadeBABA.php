<?php

require 'configu.php';

$idBaba = filter_input(INPUT_GET, 'idBaba');

$querySQL = "SELECT dispo.idDisponibilidade, dia.nome as dia_da_semana, turno.nome as turno, dispo.fk_idDia as idDia  
FROM disponibilidade as dispo
LEFT JOIN dia ON dispo.fk_idDia = dia.idDia
LEFT JOIN turno ON dispo.fk_idTurno = turno.idTurno
WHERE dispo.fk_idBaba = $idBaba
ORDER BY idDia;;";

$queryPreparada = $pdo->prepare($querySQL);
$queryPreparada->execute();
$queryPreparada->setFetchMode(PDO::FETCH_ASSOC);
$disponibilidadeBaba = $queryPreparada->fetchAll();
?>

<h1>Editar Disponibilidades</h1>
<table border="1">
    <thead>
        <tr>
            <th>Dia da Semana</th>
            <th>Turno</th>
            <th>Operação</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($disponibilidadeBaba as $dispo): ?>
            <tr>
                <td><?=$dispo['dia_da_semana']; ?></td>
                <td><?=$dispo['turno']; ?></td>
                <td>
                    <a href="excluirDisponibilidadeBABA.php?idDisponibilidade=<?=$dispo['idDisponibilidade'];?>&idBaba=<?=$idBaba;?>">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a type="button" href="disponibilidadeBABA.php?idBaba=<?php echo $idBaba; ?>">[Voltar]</a>