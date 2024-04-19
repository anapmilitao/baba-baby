<?php

require 'configu.php';

$id = filter_input(INPUT_GET, 'idBaba');
$dispo = filter_input(INPUT_GET, 'disponibilidade');

if ($dispo) {
    deleteDisponibilidade($id);
}

deleteBaba($id);

function deleteBaba(int $id) {
    global $pdo;
    $sql = $pdo->prepare("DELETE FROM baba WHERE idBaba = :idBaba");
    $sql->bindValue(':idBaba', $id);
    $sucesso = $sql->execute();
    header("Location: selectBABA.php?delete=$sucesso");
}

function deleteDisponibilidade(int $id) {
    global $pdo;
    $sql = $pdo->prepare("DELETE FROM disponibilidade WHERE fk_idBaba = :idBaba");
    $sql->bindValue(':idBaba', $id);
    $sql->execute();
} 