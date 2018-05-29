<?php
include_once "databasecore.php";

class chamado{

	private $id = 0;
	private $descricao = '';
	private $status = 0;
	private $id_tecnico = 0;
	private $id_usuario = 0;
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
	function setDescricao($descricao){
		$this->descricao = $descricao;
	}

	function getDescricao(){
		return $this->descricao;
	}


	function setStatus($status){
		$this->status = $status;
	}

	function getStatus(){
		return $this->status;
	}

	function setIdTecnico($id_tecnico){
		$this->id_tecnico = $id_tecnico;
	}

	function getIdTecnico(){
		return $this->id_tecnico;
	}

	function setIdUsuario($id_usuario){
		$this->id_usuario = $id_usuario;
	}

	function getIdUsuario(){
		return $this->id_usuario;
	}

	function create(){
		$this->dbh->exec("INSERT INTO chamados(descricao,status,id_tecnico,id_usuario) VALUES ('$this->descricao',$this->status,$this->id_tecnico,$this->id_usuario)");
		$lastId = $this->dbh->lastInsertId();
		$this->read($lastId);
	}

	function read($id){
		 $result = $this->dbh->query("SELECT * FROM chamados WHERE id = $id");
		 $chmArray = $result->fetchAll(PDO::FETCH_ASSOC);
		 $this->setId($chmArray[0]['id']);
		 $this->setDescricao($chmArray[0]['descricao']);
		 $this->setStatus($chmArray[0]['status']);
		 $this->setIdTecnico($chmArray[0]['id_tecnico']);
		 $this->setIdUsuario($chmArray[0]['id_usuario']);
	}

	function update(){
		$this->dbh->exec("UPDATE chamados SET descricao='$this->descricao',status=$this->status,id_tecnico=$this->id_tecnico,id_usuario=$this->id_usuario WHERE id = $this->id");
		$this->read($this->id);
	}

	function delete(){
		$this->dbh->exec("DELETE FROM chamados WHERE id = $this->id");
		$this->id = 0; // Remover referência
	}

	static function getAll($status = 1,$id_usuario = 'id_usuario',$id_tecnico = 'id_tecnico'){
		$dbh = dataBaseCore::getHandler();
		$result = $dbh->query("SELECT id FROM chamados WHERE status = $status AND id_usuario = $id_usuario AND id_tecnico = $id_tecnico ORDER BY id DESC");
		$chmArray = $result->fetchAll(PDO::FETCH_ASSOC);
		$x=0;
		foreach ($chmArray as $row) {
			$chamado = new chamado();
			$chamado->read($row[id]);
			$retorno[$x] = $chamado;
			$x++;
		}
		return $retorno;
	}

	static function search($keyword = "", $status = 1,$id_usuario = 'id_usuario',$id_tecnico = 'id_tecnico'){
		$dbh = dataBaseCore::getHandler();
		$result = $dbh->query("SELECT id FROM chamados WHERE status = $status AND id_usuario = $id_usuario AND id_tecnico = $id_tecnico AND descricao LIKE '%$keyword%' ORDER BY id DESC");

		$chmArray = $result->fetchAll(PDO::FETCH_ASSOC);
		$x=0;
		foreach ($chmArray as $row) {
			$chamado = new chamado();
			$chamado->read($row[id]);
			$retorno[$x] = $chamado;
			$x++;
		}
		return $retorno;
	}



}
?>