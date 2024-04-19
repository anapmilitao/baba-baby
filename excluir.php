<?php
    require 'configu.php';
    /*delete*/
    $id = filter_input(INPUT_GET, 'idUsuario');
    $sql = $pdo->prepare("DELETE FROM usuario WHERE idUsuario = :idUsuario");
    $sql->bindValue(':idUsuario', $id);
    try{
        $sql->execute();
    }catch(PDOException $e){
        echo $e->getMessage("Deve-se deletar a conta diretamente na Babá ou Pais primeiro.");
    }
    header("Location: select.php");
?>
