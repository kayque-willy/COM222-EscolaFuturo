<?php
class Questao_model extends CI_Model{
 
  public $id;
  public $idDisciplina;
  public $r1;
  public $r2;
  public $r3;
  public $r4;
  public $respostaCerta;
  
  #Constroi o objeto
  public function __construct($id='',$idDisciplina='',$enunciado='',$r1='',$r2='',$r3='',$r4='',$respostaCerta=''){
     if(isset($id)) $this->id=$id;
     if(isset($idDisciplina)) $this->idDisciplina=$idDisciplina;
     if(isset($enunciado)) $this->enunciado=$enunciado;
     if(isset($r1)) $this->r1=$r1;
     if(isset($r2)) $this->r2=$r2;
     if(isset($r3)) $this->r3=$r3;
     if(isset($r4)) $this->r4=$r4;
     if(isset($respostaCerta)) $this->respostaCerta=$respostaCerta;
  }
  
  #Insere uma nova questao
  public function insert(){
     //Verifica se existe uma questão com este mesmo enunciado e mesma disciplina
     if(isset($this->idDisciplina))$this->db->where('idDisciplina',$this->idDisciplina);
     if(isset($this->enunciado)) $this->db->where('enunciado', $this->enunciado);
  
     //Se não existir, realiza a inserção
     if(empty($this->db->get('questao')->result())){
        //Cria um vetor de valores para inserção
        $data = [];
        if(isset($this->id)) $data['id'] = $this->id;
        if(isset($this->idDisciplina)) $data['idDisciplina'] = $this->idDisciplina;
        if(isset($this->enunciado)) $data['enunciado'] = $this->enunciado;
        if(isset($this->r1)) $data['r1'] = $this->r1;
        if(isset($this->r2)) $data['r2'] = $this->r1;
        if(isset($this->r3)) $data['r3'] = $this->r3;
        if(isset($this->r4)) $data['r4'] = $this->r4;
        if(isset($this->respostaCerta)) $data['respostaCerta'] = $this->respostaCerta;
        return $this->db->insert('questao',$data);
     }else{
       return false;
     } 
  }
  
  #Desativa uma questao de acordo com a chave primária
  public function remove() {
   //Cria um vetor de valores para atualização
    $data = [];
    if(isset($this->id)) $data['id'] = $this->id;
  
    return $this->db->delete('questao',$data);
  }
 
  #Atualiza o objeto a partir da chave primaria
  public function update ($id='') {
     //Cria um vetor de valores para atualização
     $data = [];
     if(isset($this->enunciado)) $data['enunciado'] = $this->id;
     if(isset($this->idDisciplina)) $data['idDisciplina'] = $this->idDisciplina;
     if(isset($this->enunciado)) $data['enunciado'] = $this->enunciado;
     if(isset($this->r1)) $data['r1'] = $this->r1;
     if(isset($this->r2)) $data['r2'] = $this->r1;
     if(isset($this->r3)) $data['r3'] = $this->r3;
     if(isset($this->r4)) $data['r4'] = $this->r4;
     if(isset($this->respostaCerta)) $data['respostaCerta'] = $this->respostaCerta;
     //Cria um vetor com a chave primaria
     $where['id']=$id;
     
     //$this->db->update(enunciado da tabela,valores de atualização,referência)
     return $this->db->update('questao',$data,$where);
  }
  
  #Retorna a questao
  public function select($filtro='') {
   //Adiciona clausula where
   if(!empty($filtro['id'])) $this->db->where('id', $filtro['id']);
   if(!empty($filtro['idDisciplina'])) $this->db->where('idDisciplina', $filtro['idDisciplina']);
   if(!empty($filtro['enunciado'])) $this->db->where('enunciado', $filtro['enunciado']);
   return $this->db->get('questao');
  }
  
}
