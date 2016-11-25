<?php
class Nota_model extends CI_Model{
 
  public $loginAluno;
  public $idAvaliacao;
  public $nota;
  
  #Constroi o objeto
  public function __construct($loginAluno='',$idAvaliacao='',$nota=''){
     if(isset($loginAluno)) $this->loginAluno=$loginAluno;
     if(isset($idAvaliacao)) $this->idAvaliacao=$idAvaliacao;
     if(isset($nota)) $this->nota=$nota;
  }
  
  #Insere um novo nota
  public function insert(){
     //Cria um vetor de valores para inserção
     $data = [];
     if(isset($this->loginAluno)) $data['loginAluno'] = $this->loginAluno;
     if(isset($this->idAvaliacao)) $data['idAvaliacao'] = $this->idAvaliacao;
     if(isset($this->nota)) $data['nota'] = $this->nota;
    
     return $this->db->insert('nota',$data);
  }
  
  #Remove um nota de acordo com a chave primária
  public function remove() {
    //Cria um vetor de valores para atualização
    $data = [];
    if(isset($this->codigo)) $data['loginAluno'] = $this->codigo;
  
    return $this->db->delete('nota',$data);
  }
  
  #Retorna o nota
  public function select($filtro='') {
   //Adiciona clausula where
   if(!empty($filtro['loginAluno'])) $this->db->where('loginAluno', $filtro['loginAluno']);
   if(!empty($filtro['idAvaliacao'])) $this->db->where('idAvaliacao', $filtro['idAvaliacao']);
   return $this->db->get('nota');
  }
  
}
