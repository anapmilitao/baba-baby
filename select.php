<?php
require 'configu.php';

/*select USUARIO-TODOS*/
$lista = [];
$sql = $pdo->query("SELECT * FROM usuario");
if($sql->rowCount() > 0){;
    $lista= $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<h1>Listagem de Usuários</h1>

<table border="1">
    <tr>
        <br>
        <th>ID</th>
        <th>CPF</th>
        <th>Nome</th>
        <th>Sobrenome</th>
        <th>DtaNasc</th>
        <th>Tel</th>
        <th>CEP</th>
        <th>Email</th>
        <th>Senha</th>
        <th>Ações</th>

    </tr>
    <?php foreach($lista as $usuario): ?>
        <tr>
            <td><?=$usuario['idUsuario'];?></td>
            <td><?=$usuario['cpf'];?></td>
            <td><?=$usuario['nome'];?></td>
            <td><?=$usuario['sobrenome'];?></td>
            <td><?=$usuario['dtaNascimento'];?></td>
            <td><?=$usuario['telefone'];?></td>
            <td><?=$usuario['cep'];?></td>
            <td><?=$usuario['email'];?></td>
            <td><?=$usuario['senha'];?></td>
            <td>
                <a href="editar.php?idUsuario=<?=$usuario['idUsuario'];?>">[ Editar ] </a>
                <a href="excluir.php?idUsuario=<?=$usuario['idUsuario'];?>">[ Excluir ] </a>
            </td>
            
            
        </tr>
    <?php endforeach; ?>
</table>

<a href="cadastroPG.php">Cadastrar Usuário</a><br>
<a href="index.php"><button>Voltar</button></a>
