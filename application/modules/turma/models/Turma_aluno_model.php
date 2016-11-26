<?php
class Turma_aluno_model extends CI_Model{
 
  public $loginAluno;
  public $idTurma;
  public $idDisciplina;
  public $loginProfessor;

  #Constroi o objeto
  public function __construct($loginAluno='',$idTurma='',$idDisciplina='',$loginProfessor=''){
     if(isset($loginAluno)) $this->loginAluno=$loginAluno;
     if(isset($idTurma)) $this->idTurma=$idTurma;
     if(isset($idDisciplina)) $this->idDisciplina=$idDisciplina;
     if(isset($loginProfessor)) $this->loginProfessor=$loginProfessor;
  }
  
  #Insere uma nova turma_aluno
  public function insert(){
     //Cria um vetor de valores para inserção
     //Verifica se o aluno ja esta matriculado em alguma turma da disciplina
     if(isset($this->loginAluno))$this->db->where('loginAluno',$this->loginAluno);
     if(isset($this->idDisciplina)) $this->db->where('idDisciplina', $this->idDisciplina);
  
     //Se não estiver matriculado, realiza a matricula
     if(empty($this->db->get('turma_aluno')->result())){
        $data = [];
        if(isset($this->loginAluno)) $data['loginAluno'] = $this->loginAluno;
        if(isset($this->idTurma)) $data['idTurma'] = $this->idTurma;
        if(isset($this->idDisciplina)) $data['idDisciplina'] = $this->idDisciplina; 
        if(isset($this->loginProfessor)) $data['loginProfessor'] = $this->loginProfessor; 
       return $this->db->insert('turma_aluno',$data);
     }else{
       return false;
     } 
  }
  
  #Desativa uma turma_aluno de acordo com a chave primária
  public function remove() {
   //Cria um vetor de valores para atualização
    $data = [];
    if(isset($this->loginAluno)) $data['loginAluno'] = $this->loginAluno;
    if(isset($this->idTurma)) $data['idTurma'] = $this->idTurma;
    if(isset($this->idDisciplina)) $data['idDisciplina'] = $this->idDisciplina; 
    if(isset($this->loginProfessor)) $data['loginProfessor'] = $this->loginProfessor; 
    
    return $this->db->delete('turma_aluno',$data);
  }
 
  #Atualiza o objeto a partir da chave primaria
  public function update ($loginAluno='',$idTurma='',$idDisciplina='',$loginProfessor='') {
     //Cria um vetor de valores para atualização
     $data = [];
     if(isset($this->loginAluno)) $data['loginAluno'] = $this->loginAluno;
     if(isset($this->idTurma)) $data['idTurma'] = $this->idTurma;
     if(isset($this->idDisciplina)) $data['idDisciplina'] = $this->idDisciplina; 
     if(isset($this->loginProfessor)) $data['loginProfessor'] = $this->loginProfessor; 
    
     //Cria um vetor com a chave primaria
     $where['loginAluno']=$loginAluno;
     $where['idTurma']=$idTurma;
     $where['idDisciplina']=$idDisciplina;
     $where['loginProfessor']=$loginProfessor;
     
     //$this->db->update(loginAlunoDisciplina da tabela,valores de atualização,referência)
     return $this->db->update('turma_aluno',$data,$where);
  }
  
  #Retorna a turma_aluno
  public function select($filtro='') {
   //Adiciona clausula where
   if(!empty($filtro['loginAluno'])) $this->db->where('loginAluno', $filtro['loginAluno']);
   if(!empty($filtro['idTurma'])) $this->db->where('idTurma', $filtro['idTurma']);
   if(!empty($filtro['idDisciplina'])) $this->db->where('idDisciplina', $filtro['idDisciplina']);
   if(!empty($filtro['loginProfessor'])) $this->db->where('loginProfessor', $filtro['loginProfessor']);
    
   return $this->db->get('turma_aluno');
  }
  
  #Lista os alunos da turma
  public function listar_alunos($filtro='') {
   //Adiciona clausula where
   if(!empty($filtro['idTurma'])) $this->db->where('turma_aluno.idTurma', $filtro['idTurma']);
   if(!empty($filtro['idDisciplina'])) $this->db->where('turma_aluno.idDisciplina', $filtro['idDisciplina']);
   if(!empty($filtro['loginProfessor'])) $this->db->where('turma_aluno.loginProfessor', $filtro['loginProfessor']); 
   //Consultar inner join
   $this->db->select('turma_aluno.*, aluno.login as login, aluno.nome as nome');    
   $this->db->from('turma_aluno');
   $this->db->join('aluno', 'turma_aluno.loginAluno = aluno.login','inner');
   return $this->db->get();
  }
  
}
