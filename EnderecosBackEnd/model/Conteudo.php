<?php

include __DIR__.'/Conexao.php';

class Conteudo extends Conexao {
    private $id; 
	private $nome_estab;
    private $estab;
    private $rua;
    private $numero;
    private $bairro;
    private $cidade;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    function getnome_estab() {
        return $this->nome_estab;
    }

    function getestab() {
        return $this->estab;
    }

    function getrua() {
        return $this->rua;
    }

    function getnumero() {
        return $this->numero;
    }
    function getbairro() {
        return $this->bairro;
    }
    function getcidade() {
        return $this->cidade;
    }

    function setnome_estab($nome_estab) {
        $this->nome_estab = $nome_estab;
    }

    function setestab($estab) {
        $this->estab = $estab;
    }

    function setrua($rua) {
        $this->rua = $rua;
    }

    function setnumero($numero) {
        $this->numero = $numero;
    }
    function setbairro($bairro) {
        $this->bairro = $bairro;
    }
    function setcidade($cidade) {
        $this->cidade = $cidade;
    }

    public function insert($obj){
    	$sql = "INSERT INTO conteudo(nome_estab,estab,rua,numero,bairro,cidade) VALUES (:nome_estab,:estab,:rua,:numero,:bairro,:cidade)";
    	$consulta = Conexao::prepare($sql);
        $consulta->bindValue('nome_estab',  $obj->nome_estab);
        $consulta->bindValue('estab', $obj->estab);
        $consulta->bindValue('rua' , $obj->rua);        
        $consulta->bindValue('numero' , $obj->numero);
        $consulta->bindValue('bairro' , $obj->bairro);
        $consulta->bindValue('cidade' , $obj->cidade);
        return $consulta->execute();
        return Conexao::lastId();
	}

	public function update($obj,$id = null){
		$sql = "UPDATE conteudo SET nome_estab = :nome_estab, estab = :estab,rua = :rua, numero = :numero, bairro = :bairro, cidade = :cidade WHERE id = :id ";
		$consulta = Conexao::prepare($sql);
		$consulta->bindValue('nome_estab', $obj->nome_estab);
		$consulta->bindValue('estab', $obj->estab);
		$consulta->bindValue('rua' , $obj->rua);
        $consulta->bindValue('numero' , $obj->numero);
        $consulta->bindValue('bairro' , $obj->bairro);
        $consulta->bindValue('cidade' , $obj->cidade);
		$consulta->bindValue('id', $id);
		return $consulta->execute();
	}

	public function delete($obj,$id = null){
		$sql =  "DELETE FROM conteudo WHERE id = :id";
		$consulta = Conexao::prepare($sql);
		$consulta->bindValue('id',$id);
        $consulta->execute();
        return $consulta->execute();
	}

	public function find($id = null){
        $sql =  "SELECT * FROM conteudo WHERE id = :id";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('id',$id);
        $consulta->execute();
        return $consulta->fetch();
        
	}

	public function findAll(){
		$sql = "SELECT * FROM conteudo";
		$consulta = Conexao::prepare($sql);
        $consulta->execute();
        return $consulta->fetchAll();
		
	}

}
?>