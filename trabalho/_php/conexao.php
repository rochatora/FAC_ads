<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "zeradengue";

//criar conexão
$conn = mysqli_connect($servidor, $usuario, $senha);
$db = mysqli_select_db($conn,$dbname);
