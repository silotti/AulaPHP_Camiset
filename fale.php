<?php
if(isset($_POST["enviar"])){
	$nome = $_POST["nome"];
	$remetente = $_POST["remetente"];
	$telefone = $_POST["telefone"];
	$assunto = $_POST["assunto"];
	$menssagem = $_POST["menssagem"];
	
	//Monta o Corpo da Mensagem
	//====================================================
	$email_conteudo = "Nome: $nome \n"; 
	$email_conteudo .= "Email: $remetente \n";
	$email_conteudo .= "Telefone: $telefone \n";
	$email_conteudo .= "Assunto: $assunto \n";	
	$email_conteudo .= "Mensagem: $menssagem"; 
	//====================================================	
	
	$headers = "MIME-Version 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	
	$headers .= "To:contato2testes@gmail.com";
	$headers .= "From:" . $remetente; 
	
	// função para enviar email em php
	mail('contato2testes@gmail.com', 'FormFaleConosco', nl2br($email_conteudo), 'From: $remetente');
	echo "Email enviado com sucesso";
	
}
?>

<!-- formulario de envio em html -->
<form  name="envio" action="#" method="POST">
		<div style="margin: 3px; text-align:left; font-size:12px;color:#666666;font-family:'Arial';" class="">
		<br>
		Nome:<br> <input type="text" name="nome" style="padding: 0px; height: 21px; width: 260px;"/>
		</div>
	
		<div style="margin: 3px; text-align:left; font-size:12px;color:#666666;font-family:'Arial';" class="">
		Email:<br> <input type="text" name="remetente"  style="padding: 0px; height: 21px; width: 260px;"/>
		</div>
		
		<div style="margin: 3px; text-align:left; font-size:12px;color:#666666;font-family:'Arial';" class="">
		Telefone:<br> <input type="text" name="telefone"  style="padding: 0px; height: 21px; width: 260px;"/>
		</div>		
		
		<div style="margin: 3px; text-align:left; font-size:12px;color:#666666;font-family:'Arial';" class="">
		Assunto:<br> <input type="text" name="assunto"  style="padding: 0px; height: 21px; width: 260px;"/>
		</div>
		
		<div style="margin: 3px; text-align:left; font-size:12px;color:#666666;font-family:'Arial';" class="">
		Sua menssagem:<br> <textarea name="menssagem" rows="1" cols="1" class="param[max(1000)]" 
		style="padding: 0px; height: 100px; resize: none; width: 100%;"></textarea><br>
		</div>
		
		<!-- botao de enviar -->
		<input type="submit" name="enviar" value="Enviar"/>
		<input type="reset" name="BTapaga" value="Apagar">

</form>