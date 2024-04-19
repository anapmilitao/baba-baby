<h1>Cadastrar Pais</h1>
<p>Dados Pais</p>
<form method="POST" action="cadastrar_actP2.php">
    <ul>
    <label>
        <input type="hidden" name="Conta" value="PAIS" />
        <input type="hidden" name="fk_idUsuario" value="<?php echo $_GET['idUsuario'];?>" />
    </label>
    <label>
        <li>Endereço: <input type="text" name="endereco" pattern="[a-zA-Z0-9\s,'-]*" required title="Por favor, insira um endereço válido"/>
    </label>
    <label>
        <li>Quantidade de criança: <input type="text" name="qtdeCrianca" pattern="[0-9]+" title="Insira apenas números." required/>
    </label>
    <label>
        <li>Descrição da família: <input type="text" name="descricao" title="Detalhe um pouco sobre como é sua família." required/>
    </label>
    </ul>
    <input type="submit" onclick="alert('Cadastro PAIS feito!')" value="Salvar"/>
</form>
