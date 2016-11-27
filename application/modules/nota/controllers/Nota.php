<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nota extends CI_Controller {

	# ------------ Visualizar ----------
	
	#Lista todas as avaliações
	public function index(){
		
	}
	
  #Lista todas as questões por disciplina
	public function Nota() {
		//Restrição de acesso
		if(!isset($_SESSION['tipoUsuario']) or (($_SESSION['tipoUsuario']!='admin') and ($_SESSION['tipoUsuario']!='professor'))) redirect(base_url().'home', 'refresh');
		
		//Carrega as models
		//$this->load->model('turma/disciplina_model');
	//	$this->load->model('Nota_model');
		$this->load->model('nota_model');
		
		//Consulta as disciplinas
		//$consulta = new Nota_model();
		//$consulta_Nota = $consulta->select($filtro = '')->result();
		
		//$data['disciplinas']=[];
		//consulta as questões
		//foreach($consulta_disciplina as $disciplina){
				//Filtra por disciplina
		//		$filtro['idDisciplina'] = $disciplina->id;
				
			  //Consulta as questões da disciplina de acordo com o id
			 // $consulta = new Questao_model();
			 // $questao = $consulta->select($filtro)->result();
			  
				//Armazena a discplina no vetor
			//  $result= [];
			 // $result['disciplina']=$disciplina;
			 // $result['questoes']=$questao;
			 // $data['disciplinas'][]=$result;
		}
		
	  //Carrega a view
	//	$this->load->view('nota/home', $data);
	 }
	
	# ------------ Cadastrar ----------
	
	#Cadastra uma questão no banco de dados
//	public function cadastrarQuestao(){
		//var_dump($_POST);
//	}
//}
