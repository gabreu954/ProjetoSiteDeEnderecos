<?php

include __DIR__.'/Conexao.php';

class Endereco extends Conexao {
    private $id; 
	private $nome_estab;
    private $estab;    
    private $altura;
    private $numero;
    private $bairro;
    private $cidade;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getnome_estab() {
        return $this->nome_estab;
    }
    public function setnome_estab($nome_estab) {
        $this->nome_estab = $nome_estab;
        return $this;
    }

    public function getAltura() {
        return $this->altura;
    }

    public function setAltura($altura) {
        $this->altura = $altura;
        return $this;
    }
    
    public function getnumero() {
        return $this->numero;
    }

    public function setnumero($numero) {
        $this->numero = $numero;
        return $this;
    }
    
    public function getbairro()  {
        return $this->bairro;
    }

    public function setbairro($bairro) {
        $this->bairro = $bairro;
        return $this;
    }
    
    public function getestab()   {
        return $this->estab;
    }

    public function setestab($estab) {
        $this->estab = $estab;
        return $this;
    }
    public function getcidade(){
        return $this->cidade;
    }
    public function setcidade($cidade) {
        $this->estab = $cidade;
        return $this;
    }
    
    public function insert($obj){    
    	$sql = "INSERT INTO enderecos(nome_estab,estab,altura,numero,bairro,cidade) VALUES (:nome_estab,:estab,:altura,:numero,:bairro,:cidade)";
    	$consulta = Conexao::prepare($sql);
        $consulta->bindValue('nome_estab',  $obj->nome_estab);
        $consulta->bindValue('estab' , $obj->estab);
        $consulta->bindValue('numero' , $obj->numero);
        $consulta->bindValue('altura', $obj->altura);
        $consulta->bindValue('bairro' , $obj->bairro);
        $consulta->bindValue('cidade' , $obj->cidade);
    	$consulta->execute();
        return Conexao::lastId(); /*Aqui vc tem o ID da Endereco, você pode não retornar ele e adicionar uma nova query para inserção e inserir nas duas tabelas ao mesmo tempo se for sempre assim */        
	}

	public function update($obj,$id = null){
		$sql = "UPDATE enderecos SET 
            nome_estab = :nome_estab, 
            altura = :altura,
            numero = :numero, 
            bairro = :bairro,
            estab =:estab,
            cidade = :cidade, 
        WHERE id = :id ";
		$consulta = Conexao::prepare($sql);
		$consulta->bindValue('nome_estab', $obj->nome_estab);
		$consulta->bindValue('estab' , $obj->estab);		
        $consulta->bindValue('numero' , $obj->numero);
        $consulta->bindValue('altura', $obj->altura);
        $consulta->bindValue('bairro', $obj->bairro);
        $consulta->bindValue('cidade', $obj->cidade);
		$consulta->bindValue('id', $id);
		return $consulta->execute();
	}

	public function delete($obj,$id = null){
		$sql =  "DELETE FROM enderecos WHERE id = :id";
		$consulta = Conexao::prepare($sql);
		$consulta->bindValue('id',$id);
		$consulta->execute();
        return $consulta->execute();
	}

	public function find($id = null){
        $sql =  "SELECT * FROM enderecos WHERE id = :id";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('id',$id);
        $consulta->execute();
        return $consulta->fetch();
	}

	public function findAll(){
		$sql = "SELECT * FROM enderecos";
		$consulta = Conexao::prepare($sql);
		$consulta->execute();
		return $consulta->fetchAll();
	}
}
?>