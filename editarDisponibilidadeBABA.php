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

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\removeDispo.css">
    <title>Editar Disponibilidade</title>
</head>

<body>
<header>
        <a href="disponibilidadeBABA.php?idBaba=<?php echo $idBaba; ?>" class="voltar">Voltar</a>
        <img src="imagem/bbbyy.png" width="120px" class="imagemhead" >
    </header>
    <h1>Remover Disponibilidades</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Dia da Semana</th>
                <th>Turno</th>
                <th>Operação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($disponibilidadeBaba as $dispo): ?>
                <tr>
                    <td><?= $dispo['dia_da_semana']; ?></td>
                    <td><?= $dispo['turno']; ?></td>
                    <td>
                        <a
                            href="excluirDisponibilidadeBABA.php?idDisponibilidade=<?= $dispo['idDisponibilidade']; ?>&idBaba=<?= $idBaba; ?>" class="botao excluir">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>