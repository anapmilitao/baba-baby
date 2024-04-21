<?php

require 'configu.php';

$id = filter_input(INPUT_GET, 'idPais');

function deletePais(int $id) {
    global $pdo;
    $sql = $pdo->prepare("DELETE FROM pais WHERE idPais = :idPais");
    $sql->bindValue(':idPais', $id);
    $sucesso = $sql->execute();
    header("Location: selectPais.php?delete=$sucesso");
}

deletePais($id);