<?php
    require 'configu.php';
    /*delete PAIS*/

    function confirmacao(string $mensagem, int $id) {
            echo "<script>
            if (confirm('$mensagem')) {
                window.location.href = 'excluirPAIS2.php?idPais=$id';
            } else {
                window.location.href = 'selectPAIS.php';
            }
        </script>";
            
    }

    $id = filter_input(INPUT_GET, 'idPais');
    confirmacao("Deseja seguir com a exclusão da conta?",$id)

?>