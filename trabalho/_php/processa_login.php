<?php
session_start();
include_once('conexao.php');

if (empty($_POST['usuario']) || empty($_POST['senha'])) {
    header('Location: login.php');
    exit();
}

$usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);

$query = "SELECT nm_nome FROM usuario WHERE nm_usuario = '{$usuario}' AND ds_senha = md5('{$senha}')";

$result = mysqli_query($conn, $query);

$row = mysqli_num_rows($result);
if ($row == 1) {
    $usuario_bd = mysqli_fetch_assoc($result);
    $_SESSION['nm_nome'] = $usuario_bd['nm_nome'];
    header('Location: denuncia.php');
    exit();
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: login.php');
    exit();
}
