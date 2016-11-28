<?php
class Avaliacao_model extends CI_Model{
 
  public $id;
  public $idTurma;
  public $idDisciplina;
  public $loginProfessor;
  public $nome;
  
  #Constroi o objeto
  public function __construct($id='',$idTurma='',$idDisciplina='',$loginProfessor='',$nome=''){
     if(isset($id)) $this->id=$id;
     if(isset($idTurma)) $this->idTurma=$idTurma;
     if(isset($idDisciplina)) $this->idDisciplina=$idDisciplina;
     if(isset($loginProfessor)) $this->loginProfessor=$loginProfessor;
     if(isset($nome)) $this->nome=$nome;
  }
  
  #Insere uma nova avaliacao
  public function insert(){
     
     //Verifica se ja existe uma avaliação com estes atributos 
     if(isset($this->idTurma))$this->db->where('idTurma',$this->idTurma);
     if(isset($this->idDisciplina)) $this->db->where('idDisciplina', $this->idDisciplina);
     if(isset($this->loginProfessor)) $this->db->where('loginProfessor', $this->loginProfessor);
     if(isset($this->nome)) $this->db->where('nome', $this->nome);
     
     //Se não existir, cadastra a avaliação
     if(empty($this->db->get('avaliacao')->result())){
       //Cria um vetor de valores para inserção
       $data = [];
       if(isset($this->id)) $data['id'] = $this->id;
       if(isset($this->idTurma)) $data['idTurma'] = $this->idTurma;
       if(isset($this->idDisciplina)) $data['idDisciplina'] = $this->idDisciplina;
       if(isset($this->loginProfessor)) $data['loginProfessor'] = $this->loginProfessor;
       if(isset($this->nome)) $data['nome'] = $this->nome;
      
       return $this->db->insert('avaliacao',$data);
     }else
        return false;
     
  }
  
  #Desativa uma avaliacao de acordo com a chave primária
  public function remove() {
   //Cria um vetor de valores para atualização
    $data = [];
    if(isset($this->id)) $data['id'] = $this->id;
  
    return $this->db->delete('avaliacao',$data);
  }
 
  #Atualiza o objeto a partir da chave primaria
  public function update ($id='') {
     //Cria um vetor de valores para atualização
     $data = [];
     if(isset($this->nome)) $data['nome'] = $this->nome;
     if(isset($this->idTurma)) $data['idTurma'] = $this->idTurma;
     if(isset($this->idDisciplina)) $data['idDisciplina'] = $this->idDisciplina;
     if(isset($this->loginProfessor)) $data['loginProfessor'] = $this->loginProfessor;
   
     //Cria um vetor com a chave primaria
     $where['id']=$id;
     
     //$this->db->update(nome da tabela,valores de atualização,referência)
     return $this->db->update('avaliacao',$data,$where);
  }
  
  #Retorna a avaliacao
  public function select($filtro='') {
   //Adiciona clausula where
   if(!empty($filtro['id'])) $this->db->where('id', $filtro['id']);
   if(!empty($filtro['idTurma'])) $this->db->where('idTurma', $filtro['idTurma']);
   if(!empty($filtro['idDisciplina'])) $this->db->where('idDisciplina', $filtro['idDisciplina']);
   if(!empty($filtro['loginProfessor'])) $this->db->where('loginProfessor', $filtro['loginProfessor']);
   if(!empty($filtro['nome'])) $this->db->where('nome', $filtro['nome']);
   $this->db->order_by("nome", "asc");
   return $this->db->get('avaliacao');
  }
  
  #Lista as questões da prova
  public function listar_questoes($filtro='') {
   //Adiciona clausula where
   if(!empty($filtro['id'])) $this->db->where('avaliacao.id', $filtro['id']);
    
   //Consultar inner join
   $this->db->select('questao.*, avaliacao.nome as nomeAvaliacao, avaliacao.idTurma as turma, avaliacao.id as idAvaliacao');    
   $this->db->from('avaliacao_questao');
   $this->db->join('avaliacao', 'avaliacao_questao.idAvaliacao = avaliacao.id','inner');
   $this->db->join('questao', 'avaliacao_questao.idQuestao = questao.id','inner');
   return $this->db->get();
  }  
  
  #Lista as questões que não estão na prova
  public function questoes_fora($filtro='') {
   //Adiciona clausula where
    
   //Consultar inner join
   $this->db->select('questao.*, avaliacao.nome as nomeAvaliacao, avaliacao.idTurma as turma, avaliacao.id as idAvaliacao');    
   $this->db->from('avaliacao');
   $this->db->join('avaliacao_questao', 'avaliacao_questao.idAvaliacao = avaliacao.id AND avaliacao.id='.$filtro['id'].'','inner');
   $this->db->join("questao", "avaliacao_questao.idQuestao = questao.id",'right',false);
   $this->db->where('questao.idDisciplina', $filtro["idDisciplina"]);
   $this->db->where('avaliacao.id is null',null,false);
   return $this->db->get();
  }  
}