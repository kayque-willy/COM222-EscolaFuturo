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
    if(isset($this->codigo)) $data['login'] = $this->codigo;
  
    return $this->db->delete('aluno',$data);
  }
  
  #Atualiza o objeto a partir da chave primaria
  public function update ($login='') {
     //Cria um vetor de valores para atualização
     $data = [];
     if(isset($this->nome)) $data['nome'] = $this->login;
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
   return $this->db->get('aluno');
  }
  
  #Lista as turmas do aluno
  public function listar_turmas($filtro='') {
   //Adiciona clausula where
   if(!empty($filtro['loginAluno'])) $this->db->where('turma_aluno.loginAluno', $filtro['loginAluno']);
    
   //Consultar inner join
   $this->db->select('turma_aluno.*, aluno.login as login, aluno.nome as nome');    
   $this->db->from('turma_aluno');
   $this->db->join('aluno', 'turma_aluno.loginAluno = aluno.login','inner');
   return $this->db->get();
  }
  
}
