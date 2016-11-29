<?php
class Aluno_model extends CI_Model{
 
  public $login;
  public $senha;
  public $nome;
  
  #Constroi o objeto
  public function __construct($login='',$senha='',$nome=''){
     if(isset($login)) $this->login=$login;
     if(isset($senha)) $this->senha=$senha;
     if(isset($nome)) $this->nome=$nome;
  }
  
  #Insere um novo aluno
  public function insert(){
     //Cria um vetor de valores para inserção
     $data = [];
     if(isset($this->login)) $data['login'] = $this->login;
     if(isset($this->senha)) $data['senha'] = $this->senha;
     if(isset($this->nome)) $data['nome'] = $this->nome;
    
     return $this->db->insert('aluno',$data);
  }
  
  #Remove um aluno de acordo com a chave primária
  public function remove() {
    //Cria um vetor de valores para atualização
    $data = [];
    if(isset($this->login)) $data['login'] = $this->login;
  
    return print_r($this->db->delete('aluno',$data));
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
     return $this->db->update('aluno',$data,$where);
  }
  
  #Retorna o aluno
  public function select($filtro='') {
   //Adiciona clausula where
   if(!empty($filtro['login'])) $this->db->where('login', $filtro['login']);
   if(!empty($filtro['nome'])) $this->db->where('nome', $filtro['nome']);
   if(!empty($filtro['senha'])) $this->db->where('senha', $filtro['senha']);
   return $this->db->get('aluno');
  }
  
  #Lista as turmas do aluno
  public function listar_turmas($filtro='') {
   //Adiciona clausula where
   if(!empty($filtro['loginAluno'])) $this->db->where('turma_aluno.loginAluno', $filtro['loginAluno']);
   
   //Consultar inner join
   $this->db->select('turma_aluno.*, disciplina.id as idDisciplina, disciplina.nome as nomeDisciplina, aluno.login as login');    
   $this->db->from('turma_aluno');
   $this->db->join('aluno', 'turma_aluno.loginAluno = aluno.login','inner');
   $this->db->join('disciplina', 'turma_aluno.idDisciplina = disciplina.id','inner');
   return $this->db->get();
  }
  
  #Lista as provas feitas ou não feitas pelo aluno
  public function listar_provas($filtro='') {
   //Adiciona clausula where
   if(!empty($filtro['loginAluno'])) $this->db->join('nota', 'avaliacao.id = nota.idAvaliacao and nota.loginAluno="'.$filtro['loginAluno'].'" ','left');
   if(!empty($filtro['idTurma'])) $this->db->where('avaliacao.idTurma', $filtro['idTurma']);
   if(!empty($filtro['idDisciplina'])) $this->db->where('avaliacao.idDisciplina', $filtro['idDisciplina']);
   if(!empty($filtro['loginProfessor'])) $this->db->where('avaliacao.loginProfessor', $filtro['loginProfessor']);
   if(!empty($filtro['provaAfazer'])) $this->db->where('nota.nota is null',null,false);
    
    //Consultar inner join
   $this->db->select('avaliacao.*,nota.loginAluno,nota.nota');    
   $this->db->from('avaliacao');
   $this->db->order_by("avaliacao.nome", "asc");
   return $this->db->get();
  }
  
  #Lista as notas do aluno
  public function listar_notas($filtro='') {
   //Adiciona clausula where
   if(!empty($filtro['loginAluno'])) $this->db->where('nota.loginAluno', $filtro['loginAluno']);
   if(!empty($filtro['idTurma'])) $this->db->where('avaliacao.idTurma', $filtro['idTurma']);
   if(!empty($filtro['idDisciplina'])) $this->db->where('avaliacao.idDisciplina', $filtro['idDisciplina']);
   if(!empty($filtro['loginProfessor'])) $this->db->where('avaliacao.loginProfessor', $filtro['loginProfessor']);
    
   //Consultar inner join
   $this->db->select('avaliacao.idTurma, avaliacao.idDisciplina, avaliacao.nome, nota.idAvaliacao, nota.nota');    
   $this->db->from('avaliacao');
   $this->db->join('nota', 'avaliacao.id = nota.idAvaliacao','inner');
   return $this->db->get();
  }
  
  #Calcula a media do aluno
  public function media($filtro='') {
   //Adiciona clausula where
   if(!empty($filtro['loginAluno'])) $this->db->where('nota.loginAluno', $filtro['loginAluno']);
   if(!empty($filtro['idTurma'])) $this->db->where('avaliacao.idTurma', $filtro['idTurma']);
   if(!empty($filtro['idDisciplina'])) $this->db->where('avaliacao.idDisciplina', $filtro['idDisciplina']);
   if(!empty($filtro['loginProfessor'])) $this->db->where('avaliacao.loginProfessor', $filtro['loginProfessor']);
    
   //Consultar inner join
   $this->db->select('avg(nota.nota) as media');    
   $this->db->from('avaliacao');
   $this->db->join('nota', 'avaliacao.id = nota.idAvaliacao','inner');
   return $this->db->get();
  }
  
  #Histórico do aluno com as disciplinas e notas 
  public function historico($filtro=''){
    if(!empty($filtro['loginAluno'])) $this->db->join('avaliacao', 'avaliacao.id = nota.idAvaliacao and nota.loginAluno="'.$filtro['loginAluno'].'" ','inner');
    
    //Iner join com Nota, Avaliação de Disciplina
    //Consultar inner join
    $this->db->select('avg(nota.nota) as media, nota.loginAluno, avaliacao.idDisciplina ');    
    $this->db->from('nota');
    
    $this->db->group_by('avaliacao.idDisciplina'); 
    return $this->db->get();
  }
}