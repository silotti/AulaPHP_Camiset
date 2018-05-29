<?php
include_once "databasecore.php";

class usuario{

	private $id = 0;
	private $nome = '';
	private $login = '';
	private $senha = '';
	private $dbh = '';

	function __construct(){
		$this->dbh = dataBaseCore::getHandler();
	}

	function setId($id){
		$this->id = $id;
	}

	function getId(){
		return $this->id;
	}
	function setNome($nome){
		$this->nome = $nome;
	}

	function getNome(){
		return $this->nome;
	}

	function setLogin($login){
		$this->login = $login;
	}

	function getLogin(){
		return $this->login;
	}

	function setSenha($senha){
		$this->senha = $senha;
	}

	function getSenha(){
		return $this->senha;
	}

	function create(){
		$this->dbh->exec("INSERT INTO usuarios(nome,login,senha) VALUES ('$this->nome','$this->login','$this->senha')");
		$lastId = $this->dbh->lastInsertId();
		$this->read($lastId);
	}
	
	function read($id){
		 $result = $this->dbh->query("SELECT * FROM usuarios WHERE id = $id");
		 $usrArray = $result->fetchAll(PDO::FETCH_ASSOC);
		 $this->setId($usrArray[0]['id']);
		 $this->setNome($usrArray[0]['nome']);
		 $this->setLogin($usrArray[0]['login']);
		 $this->setSenha($usrArray[0]['senha']);
	}

	function update(){
		$this->dbh->exec("UPDATE usuarios SET nome='$this->nome',login='$this->login',senha='$this->senha' WHERE id = $this->id");
		$this->read($this->id);
	}

	function delete(){
		$this->dbh->exec("DELETE FROM usuarios WHERE id = $this->id");
		$this->id = 0; // Remover referência
	}

	static function getAll(){
		$dbh = dataBaseCore::getHandler();
		$result = $dbh->query("SELECT * FROM usuarios");
		$usrArray = $result->fetchAll(PDO::FETCH_ASSOC);
		$x=0;
		foreach ($usrArray as $row) {
			$usuario = new usuario();
			$usuario->read($row[id]);
			$retorno[$x] = $usuario;
			$x++;
		}
		return $retorno;
	}

	static function search($keyword = ""){
		$dbh = dataBaseCore::getHandler();
		$result = $dbh->query("SELECT id FROM usuarios WHERE nome LIKE '%$keyword%' OR login LIKE '%$keyword%'");
		$usrArray = $result->fetchAll(PDO::FETCH_ASSOC);
		$x=0;
		foreach ($usrArray as $row) {
			$usuario = new usuario();
			$usuario->read($row[id]);
			$retorno[$x] = $usuario;
			$x++;
		}
		return $retorno;
	}
}
?>