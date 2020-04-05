<?php
include_once("processa_denuncia.php");

$ds_ocorrencia  =$_POST['ocorrencia'];
$ds_local       =$_POST['local'];
$ds_arquivo     =$_FILES['arquivo'];
$erro       = 0;

//verifica se o campo ocorrencia esta em branco
if (empty($ds_ocorrencia)) {
    echo "Favor digitar local do foco.<br>";
    $erro = 1;
}

//verifica se o campo arquivo esta em branco
if (empty($ds_arquivo)) {
    echo "Erro arquivo.<br>";
    $erro = 1;
}

//verifica se o campo local esta vazio
if (empty($ds_local)) {
    echo "Favor entre com algum comentario.<br>";
    $erro = 1;
}

$ds_arquivo = $_FILES['arquivo']['name'];

//Pasta onde o arquivo vai ser salvo
$_UP['pasta'] = '../_fotos/';

//Tamanho maximo do arquivo em Bytes
$_UP['tamanho'] = 1024 * 1024 * 100; //5mb

//Array com a extensao permitida
$_UP['extencao'] = array('png', 'jpg', 'jpeg', 'gif');

//Renomear
$_UP['renomeia'] = false;

// Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload e maior do que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
if ($_FILES['arquivo']['error'] != 0) {
    die("Não foi possivel fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['tArquivo']['error']]);

    exit; // Para a execucao do script
}

// Caso script chegue a esse ponto, nao houve erro com o upload e o PHP pode continuar
$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
if (array_search($extensao, $_UP['extensoes']) === false) {
    echo "Por favor, envie arquivos com as seguintes extensoes: jpg, png, doc, docx, pdf ou gif";
}

// Faz a verificacao do tamanho do arquivo
else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
    echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
}

// O arquivo passou em todas as verificacoes, hora de tentar movÃª-lo para a pasta
else {

    // Primeiro verifica se deve trocar o nome do arquivo
    if ($_UP['renomeia'] == true) {

        // Cria um nome baseado no UNIX TIMESTAMP atual e com extensao .jpg
        $nome_final = time() . '.jpg';
    } else {

        // Mantem o nome original do arquivo
        $nome_final =  $_FILES['arquivo']['name'];
    }

    // Depois verifica se e possivel mover o arquivo para a pasta escolhida
    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
$_SESSION['arquivo-enviado'] = true;
        // Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
      /*  echo "Upload efetuado com sucesso!";
        echo '<br /><a href="' . $_UP['pasta'] . $nome_final . '">Clique aqui para visualizar o arquivo</a>';*/
        header('Location: denuncia.php');
    } else {

        // Nao foi possi­vel fazer o upload, provavelmente a pasta estao incorreta
        echo "NÃ£o foi possÃ­vel enviar o arquivo, tente novamente";
    }
}
//verifica se nao houve erro - neste caso chama a include para inserir os dados
if ($erro == 0) {
    echo "Todos os dados foram digitados corretamente.<br>";
}