<?php
class Avaliacao_questao_model extends CI_Model{
 
  public $idAvaliacao;
  public $idQuestao;
 
  #Constroi o objeto
  public function __construct($idAvaliacao='',$idQuestao=''){
     if(isset($idAvaliacao)) $this->idAvaliacao=$idAvaliacao;
     if(isset($idQuestao)) $this->idQuestao=$idQuestao;
  }
  
  #Insere uma nova avaliacao_questao
  public function insert(){
     //Cria um vetor de valores para inserção
     $data = [];
     if(isset($this->idAvaliacao)) $data['idAvaliacao'] = $this->idAvaliacao;
     if(isset($this->idQuestao)) $data['idQuestao'] = $this->idQuestao;
    
     return $this->db->insert('avaliacao_questao',$data);
  }
  
  #Desativa uma avaliacao_questao de acordo com a chave primária
  public function remove() {
   //Cria um vetor de valores para atualização
    $data = [];
    if(isset($this->idAvaliacao)) $data['idAvaliacao'] = $this->idAvaliacao;
    if(isset($this->idQuestao)) $data['idQuestao'] = $this->idQuestao; 
    return $this->db->delete('avaliacao_questao',$data);
  }
 
  #Atualiza o objeto a partir da chave primaria
  public function update ($idAvaliacao='',$idQuestao='') {
     //Cria um vetor de valores para atualização
     $data = [];
     if(isset($this->idQuestao)) $data['idQuestao'] = $this->idQuestao;
   
     //Cria um vetor com a chave primaria
     $where['idAvaliacao']=$idAvaliacao;
     $where['idQuestao']=$idQuestao;
     
     //$this->db->update(nome da tabela,valores de atualização,referência)
     return $this->db->update('avaliacao_questao',$data,$where);
  }
  
  #Retorna a avaliacao_questao
  public function select($filtro='') {
   //Adiciona clausula where
   if(!empty($filtro['idAvaliacao'])) $this->db->where('idAvaliacao', $filtro['idAvaliacao']);
   if(!empty($filtro['idQuestao'])) $this->db->where('idQuestao', $filtro['idQuestao']);
   
   //Consultar inner join
   $this->db->select('questao.*, avaliacao_questao.idAvaliacao');    
   $this->db->from('avaliacao_questao');
   $this->db->join('questao', 'avaliacao_questao.idQuestao = questao.id','inner');
   return $this->db->get();
  } 
}
