<?php
require 'configu.php';

$baba = [];
$idBaba = filter_input(INPUT_GET, 'idBaba');
if ($idBaba) {
    $sql = $pdo->prepare("SELECT * FROM baba WHERE idBaba = :idBaba");
    $sql->bindValue(':idBaba', $idBaba);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $baba = $sql->fetch(PDO::FETCH_ASSOC);
    } else {
        header("Location: selectBABA.php");
        exit;
    }
} else {
    header("Location: selectBABA.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\editarBABA.css">
    <!-- <link rel="stylesheet" type="text/css" href="selebaba.css"> -->
    <title>Editar Baba</title>
</head>
<a href="selectBABA.php" class="voltar">Voltar</a>
<body>
    <h1>Editar Babá</h1>
    <div class="formulario">
        <form method="POST" action="editarBABA_act.php">
            <ul>
            <div class="caixa">
                <input type="hidden" name="idBaba" value="<?= $baba['idBaba']; ?>" />
                <label>
                    <strong>Sobre Mim</strong><input type="text" name="sobre" title="Descreva um pouco sobre você e suas experiências."
                            required value="<?= $baba['sobre']; ?>" />
                </label>
                <label>
        <strong>Referência (Telefone):</strong> <input type="text" name="telefone" pattern="\d{2}\s?\d{4,5}-?\d{4}" title="Formato: (XX) XXXX-XXXX ou (XX) XXXXX-XXXX." required/>
        </label>
                <label>
                    <strong>Valor/hora</strong><input type="text" name="valorH" pattern="\d+(\.\d+)?" required
                            title="Insira um valor em reais (com ponto ao invés de vírgula!)"
                            value="<?= $baba['valorH']; ?>" />
                </label>
                <label>
                    <strong>Tempo de Experiência</strong><input type="text" name="experiencia" title="Descreva seu tempo de experiência."
                            required value="<?= $baba['sobre']; ?>" />
                </label>
            </div>
            </ul>
            <div class="btn_atualizar">
                <input type="submit" id="button" value="Atualizar" />
            </div>
        </form>
    </div>
</body>
<style>
    a.voltar {
    position: absolute;
    top: 55px;
    left: 29px;
    background-color: #ac9e9d;
    color: white;
    padding: 0px 20px;
    text-align: center;
    line-height: 35px;
    text-decoration: none;
    font-size: 14px;
    cursor: pointer;
    border-radius: 8px;

}
</style>
</html>


