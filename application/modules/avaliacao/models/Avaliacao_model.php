<?php
class Avaliacao_model extends CI_Model{
 
  public $id;
  public $idTurma;
  public $nome;
  
  #Constroi o objeto
  public function __construct($id='',$idTurma='',$nome=''){
     if(isset($id)) $this->id=$id;
     if(isset($idTurma)) $this->idTurma=$idTurma;
     if(isset($nome)) $this->nome=$nome;
  }
  
  #Insere uma nova avaliacao
  public function insert(){
     //Cria um vetor de valores para inserção
     $data = [];
     if(isset($this->id)) $data['id'] = $this->id;
     if(isset($this->idTurma)) $data['idTurma'] = $this->idTurma;
     if(isset($this->nome)) $data['nome'] = $this->nome;
    
     return $this->db->insert('avaliacao',$data);
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
     if(isset($this->nome)) $data['nome'] = $this->id;
     if(isset($this->idTurma)) $data['idTurma'] = $this->idTurma;
   
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
   if(!empty($filtro['nome'])) $this->db->where('nome', $filtro['nome']);
   return $this->db->get('avaliacao');
  }
  
  #Lista as questões da prova
  public function listar_questoes($filtro='') {
   //Adiciona clausula where
   if(!empty($filtro['id'])) $this->db->where('avaliacao.id', $filtro['id']);
    
   //Consultar inner join
   $this->db->select('questao.*, avaliacao.*');    
   $this->db->from('avaliacao_questao');
   $this->db->join('avaliacao', 'avaliacao_questao.idAvaliacao = avaliacao.id','inner');
   $this->db->join('questao', 'avaliacao_questao.idQuestao = questao.id','inner');
   return $this->db->get();
  } 
  
}
