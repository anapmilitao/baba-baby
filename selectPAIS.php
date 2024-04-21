<?php
require 'configu.php';

$delete = filter_input(INPUT_GET, 'delete');
/*select PAIS*/
$querySQL = "SELECT idPais, endereco, qtdeCrianca, descricao, 
nome from pais 
left join usuario on usuario.idUsuario = pais.fk_idUsuario";

$queryPreparada = $pdo->prepare($querySQL);
$queryPreparada->execute();
$queryPreparada->setFetchMode(PDO::FETCH_ASSOC);
$listaPais = $queryPreparada->fetchAll();

function alerta(string $mensagem)
{
    echo "<script type='text/javascript' >
                alert('$mensagem');
          </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css\selepais.css">
    
</head>
<body>
<header>
    <a href="cadastroPG.php" class="button">
        Cadastrar Usuário
        <div class="hoverEffect">
            <div>
            </div>
        </div>
    </a>
  
    <a href="index.php" class="voltar">Voltar</a>
    <img src="imagem/bbbyy.png" width="120px" class="imagemhead" >
</header>

    <h1>Listagem de Pais</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Endereço</th>
            <th>QtdeCriança</th>
            <th>Descrição</th>
            <th>Ações</th>

        </tr>
        <?php foreach($listaPais as $pais): ?>
            <tr>
                <td><?=$pais['idPais'];?></td>
                <td><?=$pais['nome'];?></td>
                <td><?=$pais['endereco'];?></td>
                <td><?=$pais['qtdeCrianca'];?></td>
                <td><?=$pais['descricao'];?></td>
                <td class="acoes">
                    <a href="editarPAIS.php?idPais=<?=$pais['idPais'];?>" class="botao editar"> Editar </a>
                    <a href="excluirPAIS.php?idPais=<?=$pais['idPais'];?>" class="botao excluir"> Excluir </a>
                    
                </td> 
            </tr>

        <?php endforeach; ?>
    </table>
    <?php
        if ($delete == 1) {
            alerta("Registro de Pais excluído com sucesso!");
        } else if ($delete === 0) {
            alerta("Falha ao excluir registro.");
        } else {
        }
        ?>

</body>
</html>
