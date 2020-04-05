<?php
session_start();
?>
<html>

<head>
	<meta charset="UTF-8">
	<title>Zer@Dengue - Cadastrar usuário</title>
	<link rel="stylesheet" href="../_css/estilo.css">
    <link rel="stylesheet" href="../_css/login.css">
    <meta name="viewport" content="width=devicce-width, inicial-scale=1.0">
    <script src="https://kit.fontawesome.com/cdc5afebe1.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/cdc5afebe1.js" crossorigin="anonymous"></script>
	<!--Importando kit font awesome-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<!--Importando Script Jquery -->
</head>

<body>
	<nav>
		<input type="checkbox" id="check">
		<label for="check">
			<i class="fas fa-bars" id="btn"></i>
			<i class="fas fa-times" id="cancel"></i>
		</label>
		<a href="../index.html"><img src="../_imagem/mosquito_logo3.png"></a>
		<ul>
			<li><a href="../index.html">Home</a></li>
			<li><a href="#">Midia</a></li>
			<li><a href="login.php">Login</a></li>
			<li><a href="denuncia.php">Denuncia</a></li>
		</ul>

	</nav>
	<div id="corpo-form-cad">
		<h1>Cadastre-se</h1>
		<?php
        if (isset($_SESSION['usuario_existe'])) :
        ?>
                <p style='color:red;'>Usuário já existe, tente novamente.</p>
        <?php
        endif;
        unset($_SESSION['usuario_existe']);
        ?>
		<form method="POST" action="processa_cadastro.php">
			<fieldset id="usuario">
				<legend>Informações Pessoais</legend>
				<input type="text" name="nome" maxlength="30" placeholder="Nome Completo">
				<input type="text" name="usuario" maxlength="30" placeholder="Usuário">
				<input type="email" name="email" maxlength="40" placeholder="E-mail">
				<input type="text" name="telefone" maxlength="30" placeholder="Telefone">
				<input type="number" name="rg" placeholder="RG">
				<input type="number" name="cpf" placeholder="CPF">
				<input type="password" name="senha" maxlength="32" placeholder="Senha">
				<input type="password" name="confSenha" maxlength="32" placeholder="Confirmar Senha">
			</fieldset>
			<fieldset id="endereco">
				<legend>Endereço Pessoal</legend>
				<input type="number" name="cep" id="icep" min="1" maxlength="8" placeholder="CEP">
				<input type="text" name="endereco" id="ilogradouro" maxlength="40" placeholder="Endereço">
				<input type="number" name="numero" id="inumero" min="1" maxlength="10" placeholder="Nº">
				<input type="text" name="complemento" id="icomplemento" maxlength="40" placeholder="Complemento">
				<input type="text" name="bairro" id="ibairro" maxlength="40" placeholder="Bairro">
				<input type="text" name="cidade" id="icidade" maxlength="40" placeholder="Cidade">
				<select name="estado" id="iuf">
					<option value="AC">Acre</option>
					<option value="AL">Alagoas</option>
					<option value="AP">Amapá</option>
					<option value="AM">Amazonas</option>
					<option value="BA">Bahia</option>
					<option value="CE">Ceará</option>
					<option value="DF">Distrito Federal</option>
					<option value="ES">Espírito Santo</option>
					<option value="GO">Goiás</option>
					<option value="MA">Maranhão</option>
					<option value="MT">Mato Grosso</option>
					<option value="MS">Mato Grosso do Sul</option>
					<option value="MG">Minas Gerais</option>
					<option value="PA">Pará</option>
					<option value="PB">Paraíba</option>
					<option value="PR">Paraná</option>
					<option value="PE">Pernambuco</option>
					<option value="PI">Piauí</option>
					<option value="RJ">Rio de Janeiro</option>
					<option value="RN">Rio Grande do Norte</option>
					<option value="RS">Rio Grande do Sul</option>
					<option value="RO">Rondônia</option>
					<option value="RR">Roraima</option>
					<option value="SC">Santa Catarina</option>
					<option value="SP">São Paulo</option>
					<option value="SE">Sergipe</option>
					<option value="TO">Tocantins</option>
				</select>
			</fieldset>
			<input type="submit" value="CADASTRAR">
		</form>
	</div>
	<script type="text/javascript">
		$("#icep").focusout(function() {
			//Início do Comando AJAX
			$.ajax({
				//O campo URL diz o caminho de onde virá os dados
				url: 'https://viacep.com.br/ws/' + $(this).val() + '/json/',
				//Tipo de dado, JSON.
				dataType: 'json',
				//SUCESS é referente a função que será executada caso
				//ele consiga ler a fonte de dados com sucesso.
				//O parâmetro dentro da função se refere ao nome da variável
				//que vai dar para ler esse objeto.
				success: function(resposta) {
					//Definicao dos valores que serao preenchidos automaticamente
					$("#ilogradouro").val(resposta.logradouro);
					$("#icomplemento").val(resposta.complemento);
					$("#ibairro").val(resposta.bairro);
					$("#icidade").val(resposta.localidade);
					$("#iuf").val(resposta.uf);
					$("#inumero").focus();
				}
			});
		});
	</script>

</body>

</html>