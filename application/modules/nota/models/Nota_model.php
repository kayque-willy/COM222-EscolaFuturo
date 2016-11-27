
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
  
  #Atualiza a nota a partir da chave primaria
  public function update ($loginAluno='',$idAvaliacao='') {
     //Cria um vetor de valores para atualização
     $data = [];
     if(isset($this->nota)) $data['nota'] = $this->nota;
     
     //Cria um vetor com a chave primaria
     $where['loginAluno']=$loginAluno;
     $where['idAvaliacao']=$idAvaliacao;
     
     //$this->db->update(nome da tabela,valores de atualização,referência)
     return $this->db->update('nota',$data,$where);
  }
  
   public function removeAluno($login) {
   //Cria um vetor de valores para atualização
    $data = [];
    $data['loginAluno'] = $login; 
      
    return $this->db->delete('turma_aluno',$data);
  }
  
  #Retorna o nota
  public function select($filtro='') {
   //Adiciona clausula where
   if(!empty($filtro['loginAluno'])) $this->db->where('loginAluno', $filtro['loginAluno']);
   if(!empty($filtro['idAvaliacao'])) $this->db->where('idAvaliacao', $filtro['idAvaliacao']);
   return $this->db->get('nota');
  }
  
}
