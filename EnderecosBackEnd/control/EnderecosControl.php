<?php
include __DIR__.'/../model/Enderecos.php';

class EnderecoControl{
	function insert($obj){		
		$Endereco = new Endereco();	
		/* CHANCE DE MANIPULAR A REQUISIÇÃO ANTES DE ACESSAR O MODEL */			
		return $Endereco->insert($obj);		
	}

	function update($obj,$id){
		$Endereco = new Endereco();
		return $Endereco->update($obj,$id);
	}

	function delete($obj,$id){
		$Endereco = new Endereco();
		return $Endereco->delete($obj,$id);
	}

	function find($id = null){
		$Endereco = new Endereco();
		return $Endereco->find($id);
	}

	function findAll(){
		$Endereco = new Endereco();
		return $Endereco->findAll();
	}
}

?>