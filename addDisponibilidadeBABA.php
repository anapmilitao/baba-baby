<?php

$id = $_GET['idBaba'];
// $erro = filter_input(INPUT_GET, 'erro');

require 'configu.php';
//OBTEM DIAS DA SEMANA
$querySQL = "SELECT * FROM dia";
$queryPreparada = $pdo->prepare($querySQL);
$queryPreparada->execute();
$queryPreparada->setFetchMode(PDO::FETCH_ASSOC);
$dias = $queryPreparada->fetchAll();

//OBTEM HORARIOS
$querySQL = "SELECT * FROM turno";
$queryPreparada = $pdo->prepare($querySQL);
$queryPreparada->execute();
$queryPreparada->setFetchMode(PDO::FETCH_ASSOC);
$turnos = $queryPreparada->fetchAll();

// function alerta(string $mensagem) {
//     echo "<script type='text/javascript' >
//                 alert('$mensagem');
//           </script>";
// }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\addDispo.css">
    <title>Adicionar Disponibilidade</title>
</head>

<body>
    <header>
        <a href="disponibilidadeBABA.php?idBaba=<?php echo $id; ?>" class="voltar">Voltar</a>
    </header>
    <div class="cabecalho">
        <h1>Cadastrar Disponibilidade</h1>
        <br>
    </div>
    <div class="formulario">
        <form method="POST" action="addDisponibilidadeBABA2.php?idBaba=<?php echo $id; ?>">
            <div class="caixa">
                <div class="checkbox">
                    <label class="form-control" for="dias_semana">Selecione o dia da semana:</label>
                    <?php foreach ($dias as $dia): ?>
                        <div id='<?= $dia['idDia']; ?>'>
                            <input type="checkbox" name="dia[]" value="<?= $dia['idDia']; ?>" />
                            <label class="labelCheck" for=""><?= $dia['nome']; ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="div-select">
                    <label for="turno">Selecione o turno:</label>
                    <select name="turno" id="turno">
                        <?php foreach ($turnos as $turno): ?>
                            <option value="<?= $turno['idTurno']; ?>"><?= $turno['nome']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <input type="submit" class="btnSalvar" value="Salvar" />
        </form>
    </div>
</body>

</html>
<?php
// if ($erro == 1) {
//     alerta("Você está tentando inserir uma disponibilidade que Já está registrada! Verifique e tente novamente.");
// }
?>