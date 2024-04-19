<h1>Cadastrar Babá</h1>
<p>Dados Usuário</p>
<form method="POST" action="cadastrar_actB1.php">
    <ul>
    <label>
        <li>CPF: <input type="text" name="cpf" pattern="\d{3}\.?\d{3}\.?\d{3}-?\d{2}" title="Formato: XXX.XXX.XXX-XX" required/>
    </label>
    <label>
        <li>Nome: <input type="text" name="nome" pattern="[a-zA-Z\u00C0-\u00FF ]{2,45}" title="Nome entre 2 e 45 letras." required/>
    </label>
    <label>
        <li>Sobrenome: <input type="text" name="sobrenome" pattern="[a-zA-Z\u00C0-\u00FF ]{2,45}" title="Sobrenome entre 2 e 45 letras." required/>
    </label>
    <label>
        <li>Data de Nascimento: <input type="date" name="dtaNascimento" required/>
    </label>
    <label>
        <li>Telefone: <input type="text" name="telefone" pattern="\d{2}\s?\d{4,5}-?\d{4}" title="Formato: (XX) XXXX-XXXX ou (XX) XXXXX-XXXX." required/>
    </label>
    <label>
        <li>CEP: <input type="text" name="cep" pattern="\d{5}-?\d{3}" title="Formato: XXXXX-XXX" required/>
    </label>
    <label>
        <li>Email: <input type="email" name="email" title="Email entre 10 e 50 letras, deve conter @." required/>
    </label>
    <label>
        <li>Senha: <input type="password" name="senha" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,16}$" required title="A senha deve conter pelo menos uma letra maiúscula, uma letra minúscula, um número, um caractere especial e ter entre 8 e 16 caracteres"/>
    </label>
    </ul>
    <input type="submit" value="Próximo">
</form>
