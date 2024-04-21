<?php
require 'configu.php';

$usuario = [];
$idUsuario = filter_input(INPUT_GET, 'idUsuario');
if ($idUsuario) {
    $sql = $pdo->prepare("SELECT * FROM usuario WHERE idUsuario = :idUsuario");
    $sql->bindValue(':idUsuario', $idUsuario);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $usuario = $sql->fetch(PDO::FETCH_ASSOC);
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
    <link rel="stylesheet" href="css\editar.css">
    <title>Document</title>
</head>

<body>
    <div class="cabecalho">
        <h1>Editar Usuário</h1>
    </div>
    <div class="formulario">
        <form method="POST" action="editar_act.php">
            <ul>
                <div class="caixa">
                    <input type="hidden" name="idUsuario" value="<?= $usuario['idUsuario']; ?>" />
                    <label>
                        <strong>Nome:</strong> <input type="text" name="nome" pattern="[a-zA-Z\u00C0-\u00FF ]{2,45}"
                            title="Nome entre 2 e 45 letras." required value="<?= $usuario['nome']; ?>" />
                    </label>
                    <label>
                        <strong>Sobrenome:</strong> <input type="text" name="sobrenome"
                            pattern="[a-zA-Z\u00C0-\u00FF ]{2,45}" title="Sobrenome entre 2 e 45 letras." required
                            value="<?= $usuario['sobrenome']; ?>" />
                    </label>
                    <label>
                        <strong>Telefone:</strong> <input type="text" name="telefone" pattern="\d{2}\s?\d{4,5}-?\d{4}"
                            title="Formato: (XX) XXXX-XXXX ou (XX) XXXXX-XXXX." required
                            value="<?= $usuario['telefone']; ?>" />
                    </label>
                    <label>
                        <strong>CEP:</strong> <input type="text" name="cep" pattern="\d{5}-?\d{3}"
                            title="Formato: XXXXX-XXX" required value="<?= $usuario['cep']; ?>" />
                    </label>
                    <label>
                        <strong>Email:</strong> <input type="email" name="email"
                            title="Email entre 10 e 50 letras, deve conter @." required
                            value="<?= $usuario['email']; ?>" />
                    </label>
                    <label>
                        <strong>Senha:</strong> <input type="password" name="senha"
                            pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,16}$" required
                            title="A senha deve conter pelo menos uma letra maiúscula, uma letra minúscula, um número, um caractere especial e ter entre 8 e 16 caracteres"
                            value="<?= $usuario['senha']; ?>" />
                    </label>
                </div>
                <div class="btn_atualizar">
                    <input type="submit" id="button" value="Atualizar" />
                </div>
            </ul>
        </form>
    </div>
    <a href="select.php" class="voltar">Voltar</a>
</body>

</html>