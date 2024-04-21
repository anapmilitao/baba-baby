<?php
require 'configu.php';

$pais = [];
$idPais = filter_input(INPUT_GET, 'idPais');
if ($idPais) {
    $sql = $pdo->prepare("SELECT * FROM pais WHERE idPais = :idPais");
    $sql->bindValue(':idPais', $idPais);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $pais = $sql->fetch(PDO::FETCH_ASSOC);
    } else {
        header("Location: select.php");
        exit;
    }
} else {
    header("Location: select.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\editarPAIS.css">
    <title>Editar Pais</title>
</head>

<body>
    <div class="cabecalho">
        <h1>Editar Pais</h1>
        <br>
    </div>
    <div class="formulario">
        <form method="POST" action="editarPAIS_act.php">
            <ul>
            <div class="caixa">
                <input type="hidden" name="idPais" value="<?= $idPais; ?>" />
                <label>
                   <strong>Endereço:</strong> <input type="text" name="endereco" pattern="[a-zA-Z0-9\s,'-]*" required
                            title="Por favor, insira um endereço válido" value="<?= $pais['endereco']; ?>" />
                </label>
                <label>
                    <strong>Qtde Criança:</strong> <input type="number" name="qtdeCrianca" value="<?= $pais['qtdeCrianca']; ?>" />
                </label>
                <label>
                    <strong>Descriação:</strong> <input type="text" name="descricao"
                            title="Detalhe um pouco sobre como é sua família." required
                            value="<?= $pais['descricao']; ?>" />
                </label>
            </div>
            <div class="btn_atualizar">
                <input type="submit" id="button" value="Atualizar" />
            </div>
            </ul>
        </form>
    </div>
    <a href="selectPAIS.php" class="voltar">Voltar</a>
</body>

</html>