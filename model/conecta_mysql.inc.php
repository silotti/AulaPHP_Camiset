<?php
$conexao = mysqli_connect("127.0.0.1", "root", "", "server");
$mysqli_set_charset($conexao,'utf8');

if ($conexao->connect_error) {
	die("falha ao realizar a conexao: " . $conexao->connect_error);
}
?>