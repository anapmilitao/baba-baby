<?php
require 'configu.php';

/*select PAIS*/
$lista = [];
$sql = $pdo->query("SELECT idPais, endereco, qtdeCrianca, descricao, nome from pais left join usuario on usuario.idUsuario = pais.fk_idUsuario");
if($sql->rowCount() > 0){;
    $lista= $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<h1>Listagem de Pais</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Endereço</th>
        <th>QtdeCriança</th>
        <th>Descrição</th>
        

    </tr>
    <?php foreach($lista as $pais): ?>
        <tr>
            <td><?=$pais['idPais'];?></td>
            <td><?=$pais['nome'];?></td>
            <td><?=$pais['endereco'];?></td>
            <td><?=$pais['qtdeCrianca'];?></td>
            <td><?=$pais['descricao'];?></td>
            <td>
                <a href="editarPAIS.php?idPais=<?=$pais['idPais'];?>">[ Editar ] </a>
                <a onclick="confirmarExclusao()" href="excluirPAIS.php?idPais=<?=$pais['idPais'];?>">[ Excluir ]</a>
                
            </td>
            
            
            
        </tr>
    <?php endforeach; ?>
</table>
<li><a href="selectCRIA.php">[ Filho(s) ] </a></li>
<a href="cadastroPG.php">Cadastrar Usuário</a><br>
<a href="index.php"><button>Voltar</button></a>

<script>
    function confirmarExclusao() {
        
        if (confirm('Tem certeza que deseja excluir sua conta? Esta ação não poderá ser desfeita.')) {
            <a href="excluirPAIS.php?idPais=<?=$pais['idPais'];?>"></a>
            alert('Sua conta foi excluída com sucesso.');
        }
    }
</script>