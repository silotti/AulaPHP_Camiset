<!-- chama pagina com crud  -->

<?php
  include_once './model/crud.php';
?>

<!-- Pagina inicial  -->
<body>

 <!-- botao de add user -->
 <div class="col-xs-12 col-sm-12 text-center coroda altcab">
	</br>
	<ul class="nav nav-tabs">
		<li class="nav-item">
      <a class="nav-link active" href="./?crd=inclui&listar=usuarios">Add usuário novo</a>
    </li>
	</ul>
 </div>

 <?php
 //verifica se botão de inclusão de dados --
 //print_r($_GET);
  if ($_GET["crd"]=="inclui") {
   include "incluir.php";
  }
 ?>

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
         <?php
          // se botão atualizar
          if(isset($_GET['edit'])) {
           ?>
           <button type="submit" name="update">atualizar</button>
           <?php
          }
          // caso contrario se botão salvar 
          else {
           ?>
           <button type="submit" name="save">salvar novo</button>
           <?php
          }

         ?>
        </td></tr>
      </table>
      <!-- exibe titulo da lista de user -->
      <h4>Tabela de usuarios</h4>
    </form>
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

      <!-- chama banco de dados -->  
      <?php
       $res = $MySQLiconn->query("SELECT * FROM usuario");
       while($row=$res->fetch_array()) {
       ?>

       <!-- lista de usuarios cadastrados-->
       <tr>
       <td><?php echo $row['id_user']; ?></td>
       <td><?php echo $row['user']; ?></td>
       <td><?php echo $row['senha']; ?></td>
       <td><?php echo $row['tipo']; ?></td>    
       <td><a href="./?listar=usuarios&edit=<?php echo $row['id_user']; ?>" onclick="return confirm('Deseja Editar !'); " ><i class="fas fa-edit"></i></a></td>
       <td><a href="?listar=usuarios&del=<?php echo $row['id_user']; ?>" onclick="return confirm('Deseja Deletar !'); " ><i class="fas fa-trash-alt"></i></a></td>
       </tr>

       <!-- fecha o while-->
       <?php
       }
      ?>

   </table>
  </div>
</body>
