<?php

require 'configu.php';

$dispo = filter_input(INPUT_GET, 'idDisponibilidade');
$idBaba = filter_input(INPUT_GET, 'idBaba');

confirmacao("Deseja excluir a disponibilidade?", $idBaba, $dispo);
function confirmacao(string $mensagem, int $idBaba, int $dispo) {
    echo "<script>
                if (confirm('$mensagem')) {
                    window.location.href = 'excluirDisponibilidadeBABA2.php?idBaba=$idBaba&disponibilidade=$dispo';
                } else {
                    window.location.href = 'editarDisponibilidadeBABA.php?idBaba=$idBaba';
                }
          </script>";
}
?>