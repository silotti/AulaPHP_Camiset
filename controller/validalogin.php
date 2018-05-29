<?php 
// session_start inicia a sessão
session_start();

// as variáveis login e senha recebem os dados digitados na página anterior
$login = $_POST['login'];
$senha = $_POST['senha'];

// as próximas 3 linhas são responsáveis em se conectar com o bando de dados.
$con = mysqli_connect("127.0.0.1", "root", "", "server");
//$select = mysqli_select_db($con, "server");
 
// A variavel $result pega as varias $login e $senha, faz uma pesquisa na tabela de usuarios
$result = mysqli_query($con, "SELECT * FROM usuario WHERE user = '$login' AND senha= '$senha'");

//echo $user->tipo; exit();
//print_r($user); exit(); //--> mostra a variavel e para nesse ponto...

/* Logo abaixo temos um bloco com if e else, verificando se a variável $result foi bem sucedida, ou seja se ela estiver encontrado algum registro idêntico o seu valor será igual a 1, se não, se não tiver registros seu valor será 0. Dependendo do resultado ele redirecionará para a pagina site.php ou retornara  para a pagina do formulário inicial para que se possa tentar novamente realizar o login */

// se usuario e senha validos...
if(mysqli_num_rows ($result) > 0 ){
    $reg_user=$result->fetch_object();
	$_SESSION['login'] = $login;
	$_SESSION['senha'] = $senha;
    $_SESSION['tipo'] = $reg_user->tipo;
	//echo "aqui"; exit(); --> mostra aqui nesse ponto...
	$_SESSION['sclogin'] = 1;
    header('location:../index.php');
    echo $_SESSION['username'];
//	header('location:site.php'); 
}

//se usuario e/ou senha nao validos...
else{
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
    unset ($_SESSION['sclogin']);
    header('location:../index.php');
    }
?>