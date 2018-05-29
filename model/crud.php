<?php
  /* conecta ao banco de dados */
  include_once './controller/db.php';

  	/* codigo para inserir dados */
  	if(isset($_POST['save'])) {
      $user = $MySQLiconn->real_escape_string($_POST['user']);
      $senha = $MySQLiconn->real_escape_string($_POST['senha']);	
      $tipo = $MySQLiconn->real_escape_string($_POST['tipo']);

 	  $SQL = $MySQLiconn->query("INSERT INTO usuario (user,senha,tipo) VALUES('$user','$senha','$tipo')");
 	 // testa se está conectado 
	 if(!$SQL) {
	  echo $MySQLiconn->error;
	 } 
	}

	/* codigo para editar dados */
	/* se clicado em edit... */
	if(isset($_GET['edit'])) {
	 $SQL = $MySQLiconn->query("SELECT * FROM usuario WHERE id_user=".$_GET['edit']);
	 $getROW = $SQL->fetch_array();
	}

	/* codigo para salvar dados atualizados */
	/* se clicado em atualizar... */
	if(isset($_POST['update'])) {
	 $SQL = $MySQLiconn->query("UPDATE usuario SET 	
	 user='".$_POST['user']."', senha='".$_POST['senha']."', tipo='".$_POST['tipo']."' WHERE id_user=".$_GET['edit']);
	 //include_once "1.php";
 	}

 	/* codigo para deletar dados */
	/* se clicado em del... */
	if(isset($_GET['del'])) {
	 $SQL = $MySQLiconn->query("DELETE FROM usuario WHERE id_user=".$_GET['del']);
	 //include_once "1.php";
	}
?>