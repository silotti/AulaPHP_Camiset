
<!-- Pagina inicial  -->
<?php
	include_once 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>PHP CRUD Tutorial com MySQLi extension</title>
	<link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>
</br>
	<center>
	<br />
	<a href="http://pepinoteca.blogspot.com.br/" title="Pepinoteca link" >
		<h3>Registro de Novo Usuário</h3></a>
	<br />

	<div id="form">
		<form method="post">
		<table width="100%" border="1" cellpadding="15">
		<tr><td><input type="text" name="user" placeholder="Nome" 
			value="<?php if(isset($_GET['edit'])) echo $getROW['user'];  ?>" /></td></tr>
		<tr><td><input type="text" name="senha" placeholder="Senha" 
			value="<?php if(isset($_GET['edit'])) echo $getROW['senha'];  ?>" /></td></tr>
		<tr><td><input type="text" name="tipo" placeholder="Tipo" 
			value="<?php if(isset($_GET['edit'])) echo $getROW['tipo'];  ?>" /></td></tr>			
		<tr><td>

		<?php
			if(isset($_GET['edit']))
			{
		?>

		<button type="submit" name="update">update</button>
		<?php
		}
			else
			{
			?>
			<button type="submit" name="save">save</button>
			<?php
			}
		?>

		</td>
		</tr>
		</table>
		</form>
		<br /><br />
		<table width="100%" border="1" cellpadding="15" align="center">

	<?php
		$res = $MySQLiconn->query("SELECT * FROM usuario");
		while($row=$res->fetch_array())
		{
	?>

    <tr>
    <td><?php echo $row['id_user']; ?></td>
    <td><?php echo $row['user']; ?></td>
    <td><?php echo $row['senha']; ?></td>
    <td><?php echo $row['tipo']; ?></td>    
    <td><a href="?edit=<?php echo $row['id']; ?>" onclick="return confirm('sure to edit !'); " >edit</a></td>
    <td><a href="?del=<?php echo $row['id']; ?>" onclick="return confirm('sure to delete !'); " >delete</a></td>
    </tr>
    <?php
}

?>
</table>
</div>
</center>


<form>
  <div class="form-group">
    <label for="textinput">Nome</label>
    <input type="text" class="form-control" id="$user" aria-describedby="nameHelp" placeholder="Digite seu nome">
    <small id="namelHelp" class="form-text text-muted">Verifique se você já está cadastrado.</small>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Senha</label>
    <input type="password" class="form-control" id="$senha" placeholder="Digite uma senha">
  </div>

  <div class="form-group">
    <label for="textinput">Tipo</label>
    <input type="text" class="form-control" id="$tipo" aria-describedby="tipoHelp" placeholder="Digite 1 2 ou 3">
    <small id="tipoHelp" class="form-text text-muted"> 1-Adm 2-usuarios 3-Vendedor.</small>
  </div>

   <button type="submit" id="button1id" name="registrar" class="btn btn-primary">+ Registrar</button>

</form>

<?php
  if (isset($_POST['submit'])) {
  //print_r($_GET);
	require_once("db.php");
  //$con = mysqli_connect("127.0.0.1", "root", "", "server");
  	$result = $con->query("SELECT * FROM usuario");

    $sql = $con->prepare("INSERT INTO usuario (user,senha,tipo) VALUES (".$user.", ".$senha.", ".$tipo.")");  

    $user=$_POST['user'];
    $senha = $_POST['senha'];
    $tipo= $_POST['tipo'];
    $sql->bind_param("sss", $user, $senha, $tipo); 
    if($sql->execute()) {
      $success_message = "Added Successfully";
    } else {
      $error_message = "Problem in Adding New Record";
    }
    $sql->close();   
    $con->close();
  } 
?>







</br>
</br>
