<?php
class Professor_model extends CI_Model{
 
  public $login;
  public $senha;
  public $nome;
  
  #Constroi o objeto
  public function __construct($login='',$senha='',$nome=''){
     if(isset($login)) $this->login=$login;
     if(isset($senha)) $this->senha=$senha;
     if(isset($nome)) $this->nome=$nome;
  }
  
  #Insere um novo professor
  public function insert(){
     //Cria um vetor de valores para inserção
     $data = [];
     if(isset($this->login)) $data['login'] = $this->login;
     if(isset($this->senha)) $data['senha'] = $this->senha;
     if(isset($this->nome)) $data['nome'] = $this->nome;
    
     return $this->db->insert('professor',$data);
  }
  
  #Remove um professor de acordo com a chave primária
  public function remove() {
    //Cria um vetor de valores para atualização
    $data = [];
    if(isset($this->login)) $data['login'] = $this->login;
  
    return $this->db->delete('professor',$data);
  }
 
  #Atualiza o objeto a partir da chave primaria
  public function update ($login='') {
     //Cria um vetor de valores para atualização
     $data = [];
     if(isset($this->nome)) $data['nome'] = $this->nome;
     if(isset($this->senha)) $data['senha'] = $this->senha;
   
     //Cria um vetor com a chave primaria
     $where['login']=$login;
     
     //$this->db->update(nome da tabela,valores de atualização,referência)
     return $this->db->update('professor',$data,$where);
  }
  
  #Retorna o professor
  public function select($filtro='') {
   //Adiciona clausula where
   if(!empty($filtro['login'])) $this->db->where('login', $filtro['login']);
   if(!empty($filtro['nome'])) $this->db->where('nome', $filtro['nome']);
   if(!empty($filtro['senha'])) $this->db->where('senha', $filtro['senha']);
   return $this->db->get('professor');
  }
  
  #Lista as turmas do professor
  public function listar_turmas($filtro='') {
   //Adiciona clausula where
   if(!empty($filtro['loginProfessor'])) $this->db->where('turma.loginProfessor', $filtro['loginProfessor']);
    
   //Consultar inner join
   $this->db->select('turma.*, professor.login as login, professor.nome as nome');    
   $this->db->from('turma');
   $this->db->join('professor', 'turma.loginProfessor = professor.login','inner');
   return $this->db->get();
  }
  
  #Lista as notas das turmas
  public function listar_notas($filtro='') {
   //Adiciona clausula where
   if(!empty($filtro['loginAluno'])) $this->db->where('nota.loginAluno', $filtro['loginAluno']);
   if(!empty($filtro['idTurma'])) $this->db->where('avaliacao.idTurma', $filtro['idTurma']);
   if(!empty($filtro['idDisciplina'])) $this->db->where('avaliacao.idDisciplina', $filtro['idDisciplina']);
   if(!empty($filtro['loginProfessor'])) $this->db->where('avaliacao.loginProfessor', $filtro['loginProfessor']);
    
   //Consultar inner join
   $this->db->select('avaliacao.idTurma, avaliacao.idDisciplina, avaliacao.nome as nomeAvaliacao, nota.loginAluno, nota.idAvaliacao, nota.nota, aluno.nome as nomeAluno');    
   $this->db->from('avaliacao');
   $this->db->join('nota', 'avaliacao.id = nota.idAvaliacao','inner');
   $this->db->join('aluno', 'aluno.login = nota.loginAluno','inner');
   return $this->db->get();
  }
  
}
