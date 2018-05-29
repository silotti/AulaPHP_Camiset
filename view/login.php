<!--Formulario de login-->
<form action="./controller/validalogin.php" method="post" name="formlogin" id="formlogin">
<!--<form name="loginform" method="post" action="./?controller=login">-->
	<div class="text-center suplogin">
		<div style="margin: 3px; text-align:center; font-size:12px;color:#666666;font-family:'Arial';" class="">
			<input type="text" name="login" placeholder="Login" style="padding: 0px; height: 25px; width: 180px;" /><br/>
			<input type="password" name="senha" placeholder="Senha" style="padding: 0px; height: 25px; width: 180px;" /><br/>
		</div>
		<button input type="submit" class="btn btn-primary btn-xs" style="padding-top: 1px; border-top: 1px;">Cadastrar</button>		
		<button input type="submit" class="btn btn-primary btn-xs" style="padding-top: 1px; border-top: 1px;">Logar</button>
	</div>
</form>
