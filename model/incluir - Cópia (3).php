
<!-- chama pagina com crud  -->
<?php
 include_once './model/crud.php';
?>

<!-- Pagina inicial  -->
</br>
<center>
<br/>
<a href="http://pepinoteca.blogspot.com.br/" title="Pepinoteca link"><h3>Registro de Novo Usuário</h3></a>
<br/>

<!-- formulario para adicionar usuario novo ao banco -->
<div id="form">
 <form method="post">
	<table width="100%" border="1" cellpadding="15">

	 <!-- exibe a lista de user -->
	 <tr><td><input type="text" name="user" placeholder="Nome" 
	 value="<?php if(isset($_GET['edit'])) echo $getROW['user'];  ?>" /></td></tr>

	 <tr><td><input type="password" name="senha" placeholder="Senha" 
	 value="<?php if(isset($_GET['edit'])) echo $getROW['senha'];  ?>" /></td></tr>

	 <tr><td><input type="text" name="tipo" placeholder="Tipo" 
	 value="<?php if(isset($_GET['edit'])) echo $getROW['tipo'];  ?>" /></td></tr>			
	
	 <tr><td>
	 <!-- botão update -->
	 <?php
	  if(isset($_GET['edit']))
	  {
	 ?>
	 <button type="submit" name="update">update</button>

	 <!-- botão save -->
	 <?php
	  }
	  else
	  {
	 ?>
	 <button type="submit" name="save">save</button>
		
	 <?php
	  }
	 ?>
	 </td></tr>
	</table>
 </form>




 <!-- exibe titulo da lista de user -->
 <h2">Tabela de usuarios</h2>

 <!-- cria tabela de dados-->
 <br/><br/>
 <table width="100%" border="1" cellpadding="15" align="center">
  <!-- exibe em negrito titulos da lista de user-->
  <thead>
    <tr>
      <th scope="col">id_user</th>
      <th scope="col">Usuário</th>
      <th scope="col">Senha</th>
      <th scope="col">Tipo</th>
      <th scope="col">Editar</th>
      <th scope="col">Excluir</th>
    </tr>
  </thead>

	<!-- conecta ao banco de dados -->			
 	<?php
	 $res = $MySQLiconn->query("SELECT * FROM usuario");
	 while($row=$res->fetch_array())
	 {
 	?>

 	<!-- exibe a lista dos usuarios -->
 	<tr>
     <td><?php echo $row['id_user']; ?></td>
     <td><?php echo $row['user']; ?></td>
   	 <td><?php echo $row['senha']; ?></td>
     <td><?php echo $row['tipo']; ?></td>

     <!-- menssagem de confirmação de edição -->    
     <td><a href="?edit=<?php echo $row['id_user']; ?>" onclick="return 
     confirm('Certeza que quer editar !'); " ><i class="fas fa-edit"></i></a></td>

     <!-- menssagem de confirmação de exclusão --> 
     <td><a href="?del=<?php echo $row['id_user']; ?>" onclick="return 
     confirm('Certeza que quer deletar !'); " ><i class="fas fa-trash-alt"></i></a></td>
    </tr>
 <?php
 }
 ?>
 </table>
</div>
</center>

