<?php
session_start();
include_once('conexao.php');

$ds_ocorrencia = $_POST['ocorrencia'];
$ds_denuncia   = $_POST['local'];
$nm_usuario    = $_SESSION['nm_nome']; //Pegar o usuario da sessao logada para poder inserir na tabela denuncia, assim identificando quem fez a denuncia
$ds_arquivo     =$_FILES['arquivo']['name'];

$resultado_denuncia = "INSERT INTO denuncia (ds_ocorrencia,ds_local,dt_registro,nm_usuario_log,ds_local_arquivo) VALUES('$ds_ocorrencia','$ds_denuncia',NOW(),'$nm_usuario','fotos/$ds_arquivo')";
$result_denuncia = mysqli_query($conn, $resultado_denuncia);

?>