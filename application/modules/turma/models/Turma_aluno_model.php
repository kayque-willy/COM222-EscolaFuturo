<?php
class Turma_aluno_model extends CI_Model{
 
  public $loginAluno;
  public $idTurma;

  #Constroi o objeto
  public function __construct($loginAluno='',$idTurma=''){
     if(isset($loginAluno)) $this->loginAluno=$loginAluno;
     if(isset($idTurma)) $this->idTurma=$idTurma;
  }
  
  #Insere uma nova turma_aluno
  public function insert(){
     //Cria um vetor de valores para inserção
     $data = [];
     if(isset($this->loginAluno)) $data['loginAluno'] = $this->loginAluno;
     if(isset($this->idTurma)) $data['idTurma'] = $this->idTurma;
 
     return $this->db->insert('turma_aluno',$data);
  }
  
  #Desativa uma turma_aluno de acordo com a chave primária
  public function remove() {
   //Cria um vetor de valores para atualização
    $data = [];
    if(isset($this->loginAluno)) $data['loginAluno'] = $this->loginAluno;
    if(isset($this->idTurma)) $data['idTurma'] = $this->idTurma;
    return $this->db->delete('turma_aluno',$data);
  }
 
  #Atualiza o objeto a partir da chave primaria
  public function update ($loginAluno='') {
     //Cria um vetor de valores para atualização
     $data = [];
     if(isset($this->loginAluno)) $data['loginAluno'] = $this->loginAluno;
     if(isset($this->idTurma)) $data['idTurma'] = $this->idTurma;
   
     //Cria um vetor com a chave primaria
     $where['loginAluno']=$loginAluno;
     
     //$this->db->update(loginAlunoDisciplina da tabela,valores de atualização,referência)
     return $this->db->update('turma_aluno',$data,$where);
  }
  
  #Retorna a turma_aluno
  public function select($filtro='') {
   //Adiciona clausula where
   if(!empty($filtro['loginAluno'])) $this->db->where('loginAluno', $filtro['loginAluno']);
   if(!empty($filtro['idTurma'])) $this->db->where('idTurma', $filtro['idTurma']);
   return $this->db->get('turma_aluno');
  }
  
}
