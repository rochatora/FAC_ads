<?php
session_start();
include_once("conexao.php");

$nome               = mysqli_real_escape_string($conn, trim($_POST['nome']));
$usuario            = mysqli_real_escape_string($conn, trim($_POST['usuario']));
$email              = mysqli_real_escape_string($conn, trim($_POST['email']));
$telefone           = mysqli_real_escape_string($conn, trim($_POST['telefone']));
$rg                 = mysqli_real_escape_string($conn, trim($_POST['rg']));
$cpf                = mysqli_real_escape_string($conn, trim($_POST['cpf']));
$senha              = mysqli_real_escape_string($conn, trim(md5($_POST['senha'])));
$cep                = mysqli_real_escape_string($conn, trim($_POST['cep']));
$endereco           = mysqli_real_escape_string($conn, trim($_POST['endereco']));
$numero             = mysqli_real_escape_string($conn, trim($_POST['numero']));
$complemento        = mysqli_real_escape_string($conn, trim($_POST['complemento']));
$bairro             = mysqli_real_escape_string($conn, trim($_POST['bairro']));
$cidade             = mysqli_real_escape_string($conn, trim($_POST['cidade']));
$estado             = mysqli_real_escape_string($conn, trim($_POST['estado']));
$erro               = 0;

$resultado  = "SELECT count(*) as total FROM usuario WHERE nm_usuario = '$usuario'";
$result     = mysqli_query($conn, $resultado);
$row        = mysqli_fetch_assoc($result);

if ($row['total'] == 1){
    $_SESSION['usuario_existe'] = true;
    header('Location: cadastrar.php');
    exit;
}

$resultado = "INSERT INTO usuario (nm_nome,nm_usuario,ds_email,nr_telefone,nr_rg,nr_cpf,ds_senha,nr_cep,ds_endereco,nr_endereco,ds_complemento,ds_bairro,ds_cidade,ds_estado,dt_registro) VALUES ('$nome','$usuario','$email','$telefone','$rg','$cpf','$senha','$cep','$endereco','$numero','$complemento','$bairro','$cidade','$estado',NOW())";

header('Location: login.php');
