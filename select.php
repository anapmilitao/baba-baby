<?php
require 'configu.php';

/*select USUARIO-TODOS*/
$lista = [];
$sql = $pdo->query("SELECT * FROM usuario");
if($sql->rowCount() > 0){;
    $lista= $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="selectgeral.css">
    
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

<?php
    if(isset($_GET["erro"]) && $_GET["erro"] == 1){
        echo "<h1>Erro: Não foi possível excluir o registro. Delete a conta pela Babá/Pais.</h1>";
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
            <td class="acoes">
                <a href="editar.php?idUsuario=<?=$usuario['idUsuario'];?>" class="botao editar"> Editar </a>
                <a href="excluir.php?idUsuario=<?=$usuario['idUsuario'];?>"class="botao excluir"> Excluir </a>
            </td>
            
            
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
