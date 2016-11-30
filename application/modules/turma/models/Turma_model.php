<?php
class Turma_model extends CI_Model{
 
  public $id;
  public $loginProfessor;
  public $idDisciplina;
  
  #Constroi o objeto
  public function __construct($id='',$loginProfessor='',$idDisciplina=''){
     if(isset($id)) $this->id=$id;
     if(isset($loginProfessor)) $this->loginProfessor=$loginProfessor;
     if(isset($idDisciplina)) $this->idDisciplina=$idDisciplina;
  }
  
  #Insere uma nova turma
  public function insert(){
     //Cria um vetor de valores para inserção
     $data = [];
     if(isset($this->id)) $data['id'] = $this->id;
     if(isset($this->loginProfessor)) $data['loginProfessor'] = $this->loginProfessor;
     if(isset($this->idDisciplina)) $data['idDisciplina'] = $this->idDisciplina;
    
     return $this->db->insert('turma',$data);
  }
  
  #Desativa uma turma de acordo com a chave primária
  public function remove() {
   //Cria um vetor de valores para atualização
    $data = [];
    if(isset($this->id)) $data['id'] = $this->id;
    if(isset($this->loginProfessor)) $data['loginProfessor'] = $this->loginProfessor;
    if(isset($this->idDisciplina)) $data['idDisciplina'] = $this->idDisciplina;
    
    return $this->db->delete('turma',$data);
  }
 
  #Atualiza o objeto a partir da chave primaria
  public function update ($id='',$loginProfessor='',$idDisciplina='') {
     //Cria um vetor de valores para atualização
     $data = [];
     if(isset($this->idDisciplina)) $data['idDisciplina'] = $this->id;
     if(isset($this->loginProfessor)) $data['loginProfessor'] = $this->loginProfessor;
   
     //Cria um vetor com a chave primaria
     $where['id']=$id;
     $where['loginProfessor']=$loginProfessor;
     $where['idDisciplina']=$idDisciplina;
     
     //$this->db->update(idDisciplina da tabela,valores de atualização,referência)
     return $this->db->update('turma',$data,$where);
  }
  
  #Retorna a turma
  public function select($filtro='') {
   //Adiciona clausula where
   if(!empty($filtro['id'])) $this->db->where('id', $filtro['id']);
   if(!empty($filtro['loginProfessor'])) $this->db->where('loginProfessor', $filtro['loginProfessor']);
   if(!empty($filtro['idDisciplina'])) $this->db->where('idDisciplina', $filtro['idDisciplina']);
   return $this->db->get('turma');
  }
  
  #Calcula a media da turma
  public function media($filtro='') {
   //Adiciona clausula where
   if(!empty($filtro['idTurma'])) $this->db->where('avaliacao.idTurma', $filtro['idTurma']);
   if(!empty($filtro['idDisciplina'])) $this->db->where('avaliacao.idDisciplina', $filtro['idDisciplina']);
   if(!empty($filtro['loginProfessor'])) $this->db->where('avaliacao.loginProfessor', $filtro['loginProfessor']);
    
   //Consultar inner join
   $this->db->select('avg(nota.nota) as media');    
   $this->db->from('avaliacao');
   $this->db->join('nota', 'avaliacao.id = nota.idAvaliacao','inner');
   return $this->db->get();
  }
  
}
