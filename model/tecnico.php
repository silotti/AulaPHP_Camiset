<?php
include_once "databasecore.php";

class tecnico{

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
		$this->dbh->exec("INSERT INTO tecnicos(nome,login,senha) VALUES ('$this->nome','$this->login','$this->senha')");
		$lastId = $this->dbh->lastInsertId();
		$this->read($lastId);
	}

	function read($id){
		 $result = $this->dbh->query("SELECT * FROM tecnicos WHERE id = $id");
		 $tecArray = $result->fetchAll(PDO::FETCH_ASSOC);
		 $this->setId($tecArray[0]['id']);
		 $this->setNome($tecArray[0]['nome']);
		 $this->setLogin($tecArray[0]['login']);
		 $this->setSenha($tecArray[0]['senha']);
	}

	function update(){
		$this->dbh->exec("UPDATE tecnicos SET nome='$this->nome',login='$this->login',senha='$this->senha' WHERE id = $this->id");
		$this->read($this->id);
	}

	function delete(){
		$this->dbh->exec("DELETE FROM tecnicos WHERE id = $this->id");
		$this->id = 0; // Remover referência
	}

	static function getAll(){
		$dbh = dataBaseCore::getHandler();
		$result = $dbh->query("SELECT * FROM tecnicos");
		$tecArray = $result->fetchAll(PDO::FETCH_ASSOC);
		$x=0;
		foreach ($tecArray as $row) {
			$tecnico = new tecnico();
			$tecnico->read($row[id]);
			$retorno[$x] = $tecnico;
			$x++;
		}
		return $retorno;
	}

	static function search($keyword = ""){
		$dbh = dataBaseCore::getHandler();
		$result = $dbh->query("SELECT id FROM tecnicos WHERE nome LIKE '%$keyword%' OR login LIKE '%$keyword%'");
		$tecArray = $result->fetchAll(PDO::FETCH_ASSOC);
		$x=0;
		foreach ($tecArray as $row) {
			$tecnico = new tecnico();
			$tecnico->read($row[id]);
			$retorno[$x] = $tecnico;
			$x++;
		}
		return $retorno;
	}

}
?>