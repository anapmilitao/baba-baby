<?php
require 'configu.php';
?>
<h1>Cadastrar Babá</h1>
<p>Dados Babá</p>
<form method="POST" action="cadastrar_actB2.php">
    <ul>
        <label>
            <input type="hidden" name="Conta" value="BABÁ" />
            <input type="hidden" name="fk_idUsuario" value="<?php echo $_GET['idUsuario']; ?>" />
            <input type="hidden" name="statuz" value="Em Verificação" />
        </label>
        <label>
            <li>Tempo de Experiência (Desde -ano): <input type="text" name="tempoExp" pattern="[0-9]{4}" required
                    title="Por favor, insira um ano válido (quatro dígitos)" />
        </label>
        <label>
            <li>Referência (contato): <input type="text" name="ref"
                    pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}|^\d{10,}$" required
                    title="Por favor, insira um email ou um número de telefone válido para contato (min. 10 dígitos)." />
        </label>
        <label>
            <li>Sobre: <input type="text" name="sobre" title="Descreva um pouco sobre você e suas experiências."
                    required />
        </label>
        <label>
            <p>
                <li>Tenho prefência em cuidar de (opção única):
                    Bebê <input type="radio" name="fk_idFxEtaria" value="1">
                    Criança <input type="radio" name="fk_idFxEtaria" value="2">
                    Infantojuvenil <input type="radio" name="fk_idFxEtaria" value="3">
                    Adolescente <input type="radio" name="fk_idFxEtaria" value="4">
            </p>
        </label>
        <label>
            <li>Valor/hora: <input type="text" name="valorH" pattern="\d+(\.\d+)?" required
                    title="Insira um valor em reais (com ponto ao invés de vírgula!)" />
        </label>
        <?php
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
        ?>
        <label>
            <li>Disponibilidade de Dias</li>
            <?php foreach($dias as $dia): ?>
                <div id='<?=$dia['idDia'];?>'>
                    <input type="checkbox" name="dia[]" value="<?=$dia['idDia'];?>"/>
                    <label for=""><?=$dia['nome'];?></label>
                </div>
            <?php endforeach; ?>
        <label>
            <li>Disponibilidade de Horário</li>
            <?php foreach($turnos as $turno): ?>
                <div id='<?=$turno['idDia'];?>'>
                    <input type="checkbox" name="turno[]" value="<?=$turno['idTurno'];?>" />
                    <label for=""><?=$turno['nome'];?></label>
                </div>
            <?php endforeach; ?>
        </label>
    </ul>
    <input type="submit" onclick="alert('Cadastro BABÁ feito!')" value="Salvar" />
</form>