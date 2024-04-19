<?php

require 'configu.php';

$idBaba = filter_input(INPUT_GET, 'idBaba');
$dispo = filter_input(INPUT_GET, 'disponibilidade');

deleteDisponibilidade($dispo);

function deleteDisponibilidade(int $id) {
    global $pdo;
    $querySQL = "DELETE FROM disponibilidade WHERE idDisponibilidade = $id";
    $queryPreparada = $pdo->prepare($querySQL);
    $queryPreparada->execute();
} 

header("Location: editarDisponibilidadeBABA.php?idBaba=$idBaba");