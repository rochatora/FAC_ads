<?php
session_start();
include_once("verifica_login.php");
?>
<html>

<head>
    <meta charset="UTF-8">
    <title>Zer@Dengue - Denuncie</title>
    <link rel="stylesheet" href="../_css/estilo.css">
    <link rel="stylesheet" href="../_css/login.css">
    <meta name="viewport" content="width=devicce-width, inicial-scale=1.0">
    <script src="https://kit.fontawesome.com/cdc5afebe1.js" crossorigin="anonymous"></script>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
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
            <li><a href="logout.php">Logout</a></li>
            <li><a href="denuncia.php">Denuncia</a></li>
        </ul>
    </nav>
    <h2>Bem vindo, <?php echo $_SESSION['nm_nome']; ?></h2>
    <div id="corpo-form-denuncia">
        <h1>Denuncie</h1>
        <?php
        if (isset($_SESSION['arquivo-enviado'])) :
        ?>
            <p style='color:green;'>Denuncia enviada com sucesso!</p>
        <?php
        endif;
        unset($_SESSION['arquivo-enviado']);
        ?>
        <form method="POST" action="upload.php" enctype="multipart/form-data">
            <input type="text" name="ocorrencia" maxlength="40" placeholder="Endereço do foco">
            <textarea name="local" cols="50" rows="10" placeholder="Descreva com detalhes as condições do local"></textarea>
            <input type="file" name="arquivo" placeholder="Anexar imagems do foco">
            <input type="submit" value="Enviar">
        </form>
    </div>
</body>

</html>