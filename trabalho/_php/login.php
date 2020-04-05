<?php
session_start();
?>

<html>

<head>
    <meta charset="UTF-8">
    <title>Zer@Dengue - Login</title>
    <link rel="stylesheet" href="../_css/estilo.css">
    <link rel="stylesheet" href="../_css/login.css">
    <meta name="viewport" content="width=devicce-width, inicial-scale=1.0">
    <script src="https://kit.fontawesome.com/cdc5afebe1.js" crossorigin="anonymous"></script>
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
    <div id="corpo-form">
        <h1>Entrar</h1>
        <?php
        if (isset($_SESSION['nao_autenticado'])) :
        ?>
            <p style='color:red;'>Usuário ou senha inválidos.</p>

        <?php
        endif;
        unset($_SESSION['nao_autenticado']);
        ?>
        <form method="POST" action="processa_login.php">
            <input type="text" name="usuario" placeholder="Usuário">
            <input type="password" name="senha" placeholder="Senha">
            <input type="submit" value="ACESSAR">
            <a href="cadastrar.php">Ainda não é inscrito?<br /><strong>Cadastre-se aqui</strong></a>
        </form>
    </div>
</body>

</html>