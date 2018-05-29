
<!-- Pagina inicial  -->
<?php
	error_reporting(0); // para o caso de server gratuito.
	session_id( 'sc' );
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>SISTEMA WEB</title>
	<script src="_support/bootstrap_old/dist/js/jquery.min.js"></script>
	<script src="_support/bootstrap_old/dist/js/bootstrap.min.js"></script>
	<link href="_support/bootstrap_old/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">	

	<!-- chama CSS  -->
	<link rel="stylesheet" type="text/css" href=".\css\style.css">

</head>
<body>
<!-- Linha 1 Cabeçalho  -->
	<div class="row">
		<!-- imagem logo  -->
		<div class="col-xs-12 col-sm-2 altcab">
			<img src="camiseta2.png" class="logotam center-block" />
		</div>
		<!-- nome da empresa  -->
		<div class="col-xs-12 col-sm-8 text-center coroda altcab">
			<!--<h4>Imprima T-shirt Ltda</h4> -->
			</br>
			<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link active" href="./?controller=home">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="./?controller=sobre">Sobre nós</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="./?controller=fale">Fale conosco</a>
			</li>
			<li class="nav-item">
				<a class="nav-link disabled" href="./?controller=localiza">Localização</a>
			</li>
			</ul>
		</div>
		<!-- login  -->
		<div class="col-xs-12 col-sm-2 altcab corfundologo">
			<?php
			//include_once "./model/tecnico.php";
			//include_once "./model/usuario.php";
			//include_once "./model/chamado.php";
			$logado = $_SESSION['sclogin'];
			$tipo = $_SESSION['tipo'];

			//verifica: caso não logado
			if(!$logado){
				include './view/login.php';
			}
			//verifica: caso logado
			else{
				if($logado&$tipo=='1'){
					($_GET["controller"]="adm");
				}
				if($logado&$tipo=='2'){
					($_GET["controller"]="user");
				}
				if($logado&$tipo=='3'){
					($_GET["controller"]="vendas");
				}
				echo $_SESSION['login'];
				echo " Seja Bem Vindo!"; 
				
			?>
					<form action="./controller/validalogin.php" method="post" name="formlogin" id="formlogin">
					<button input type="submit" class="btn btn-primary btn-xs" style="padding-top: 1px; border-top: 1px;">Sair</button>
					</form>
			<?php
			}
			?>

		</div>
		<!--Fim login -->

	</div>
<!-- Linha 2 Centro  -->
	<div class="row">
		<div class="col-sm-2 corcolesq altcentro" style="text-align: center;">

		<!-- coluna esquerda  -->
		<div class="btn-group-vertical btn-group-lg" role="group" aria-label="vertical button group">
			<div></div>
		<ul class="nav flex-column">
			<li class="nav-item">
				<a class="nav-link active" href="./?controller=camisetas">Camisetas</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active" href="./?controller=bermudas">Bermudas</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="./?controller=calcas">Calças</a>
			</li>
			<li class="nav-item">
				<a class="nav-link disabled" href="./?controller=moletons">Moletons</a>
			</li>
		</ul>
		</div>
		</div>

		<!-- coluna centro  -->
		<div class="col-sm-8 altcentro" style="background-color: #a5a5a5;">
		<?php
		if ($_GET["controller"]=="camisetas") {
			include "produtos/camisetas.php";
		}
		if ($_GET["controller"]=="bermudas") {
			include "produtos/bermudas.php";
		}
		if ($_GET["controller"]=="calcas") {
			include "produtos/calcas.php";
		}
		if ($_GET["controller"]=="moletons") {
			include "produtos/moletons.php";
		}
		if ($_GET["controller"]=="home") {
			include "home.php";
		}			
		if ($_GET["controller"]=="sobre") {
			include "sobre.php";
		}
		if ($_GET["controller"]=="fale") {
			include "fale.php";
		}
		if ($_GET["controller"]=="localiza") {
			include "localiza.php";
		}
		if ($_GET["controller"]=="adm") {
			include "./model/adm.php";
		}
		if ($_GET["controller"]=="user") {
			include "./model/user.php";
		}
		if ($_GET["controller"]=="vendas") {
			include "./model/vendas.php";
		}				
		if ($_GET["controller"]=="") {
			include "home.php";
		}
		?>
		</div>
		
		<!-- coluna direita  -->		
		<div class="col-sm-2 altcentro corcoldir" style="text-align: center;">
		<div class="btn-group-vertical btn-group-lg" role="group" aria-label="vertical button group">
			<div></div>
			<h5 class="textoal">Carrinho de Compras</h5>
		</div>
		</div>
		</div>
	</div>

<!-- Linha 3 Rodapé  -->
	<div class="row coroda">
		<div class="col-sm-12">
			<div class="copyright">
			 Imprima T-shirt Ltda @ 2018. Todos os direitos reservados.
			</div>
		</div>
	</div>

<!--	
-->

</body>
</html>