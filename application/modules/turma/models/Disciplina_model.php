<?php
class Disciplina_model extends CI_Model{
 
  public $id;
  public $nome;

  #Constroi o objeto
  public function __construct($id='',$nome=''){
     if(isset($id)) $this->id=$id;
     if(isset($nome)) $this->nome=$nome;
  }
  
  #Insere uma nova disciplina
  public function insert(){
     //Cria um vetor de valores para inserção
     $data = [];
     if(isset($this->id)) $data['id'] = $this->id;
     if(isset($this->nome)) $data['nome'] = $this->nome;
     
     return $this->db->insert('disciplina',$data);
  }
  
  #Desativa uma disciplina de acordo com a chave primária
  public function remove() {
    //Cria um vetor de valores para atualização
    $data = [];
    if(isset($this->id)) $data['id'] = $this->id;
  
    return $this->db->delete('disciplina',$data);
  }
 
  #Atualiza o objeto a partir da chave primaria
  public function update ($id='') {
     //Cria um vetor de valores para atualização
     $data = [];
     if(isset($this->id)) $data['id'] = $this->id;
     if(isset($this->nome)) $data['nome'] = $this->nome;
   
     //Cria um vetor com a chave primaria
     $where['id']=$id;
     
     //$this->db->update(idDisciplina da tabela,valores de atualização,referência)
     return $this->db->update('disciplina',$data,$where);
  }
  
  #Retorna a disciplina
  public function select($filtro='') {
   //Adiciona clausula where
   if(!empty($filtro['id'])) $this->db->where('id', $filtro['id']);
   if(!empty($filtro['nome'])) $this->db->where('nome', $filtro['nome']);
   return $this->db->get('disciplina');
  }
  
}
