<?php
require 'configu.php';

$delete = filter_input(INPUT_GET, 'delete');
/*select BABÁ*/
$querySQL = "SELECT DISTINCT b.idBaba, u.nome as nomeBaba, b.tempoExp, b.ref, b.sobre, f.nome as fxEtaria, b.valorH 
FROM baba as b 
LEFT JOIN usuario as u ON b.fk_idUsuario = u.idUsuario 
LEFT JOIN fxetaria as f ON b.fk_idFxEtaria = f.idFxEtaria;
";
$queryPreparada = $pdo->prepare($querySQL);
$queryPreparada->execute();
$queryPreparada->setFetchMode(PDO::FETCH_ASSOC);
$listaBaba = $queryPreparada->fetchAll();

function alerta(string $mensagem) {
    echo "<script type='text/javascript' >
                alert('$mensagem');
          </script>";
}
?>

<h1>Listagem de Babá</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Baba desde</th>
        <th>Tel Referência</th>
        <th>Sobre</th>
        <th>Faixa Etaria</th>
        <th>Valor/Hora</th>
    </tr>
    <?php foreach($listaBaba as $baba): ?>
        <tr>
            <td><?=$baba['idBaba'];?></td>
            <td><?=$baba['nomeBaba'];?></td>
            <td><?=$baba['tempoExp'];?></td>
            <td><?=$baba['ref'];?></td>
            <td><?=$baba['sobre'];?></td>
            <td><?=$baba['fxEtaria'];?></td>
            <td><?=$baba['valorH'];?></td>
            <td>
                <a href="disponibilidadeBABA.php?idBaba=<?=$baba['idBaba'];?>">[ Disponibilidade ]</a>
                <a href="editarBABA.php?idBaba=<?=$baba['idBaba'];?>">[ Editar ] </a>
                <a href="excluirBABA.php?idBaba=<?=$baba['idBaba'];?>">[ Excluir ]</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
if ($delete == 1)  {
    alerta("Registro da Baba exluído com sucesso!");
} else if ($delete === 0) {
    alerta("Falha ao excluir registro.");
} else {}
?>

<a href="cadastroPG.php">Cadastrar Usuário</a><br>
<a href="index.php"><button>Voltar</button></a>
