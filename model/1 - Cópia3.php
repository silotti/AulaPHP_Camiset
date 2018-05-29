<div class="col-xs-12 col-sm-12 text-center coroda altcab">
	</br>
	<ul class="nav nav-tabs">
		<li class="nav-item">
      <a class="nav-link active" href="./?crd=inclui&listar=usuarios">Criar usuário novo</a>
      </li>
	</ul>
</div>
</br>

    <?php
    //chama pelo botão arquivo de inclusão de dados --
    //print_r($_GET);
    if ($_GET["crd"]=="inclui") {
      include "incluir.php";
    }
    ?>

 <!-- exibe titulo da lista de user -->
 <h2">Tabela de usuarios</h2>
<table class="table table-bordered">  
  <thead>
    <tr>
      <th scope="col">id_user</th>
      <th scope="col">Usuário</th>
      <th scope="col">Senha</th>
      <th scope="col">Tipo</th>
      <th scope="col">Excluir</th>
      <th scope="col">Editar</th>
    </tr>
  </thead>
  <tbody>

<?php
//require_once("./controller/db.php");
$con = mysqli_connect("127.0.0.1", "root", "", "server");
$result = $con->query("SELECT * FROM usuario");
if($result){
    while($exibe = $result->fetch_assoc()){
    	?>
    
      <!-- exibe dados da lista de usuarios -->
    <tr>
      <th scope="row">
          <?=$exibe['id_user']?></th>
      <td><?=$exibe['user'];?></td>
      <td><?=$exibe['senha'];?></td>
      <td><?=$exibe['tipo'];?></td>
      <td><i class="fas fa-trash-alt"></i></td>
      <td><i class="fas fa-edit"></i></td>
    </tr>

		<?php
    }
}
?>
  </tbody>
</table>