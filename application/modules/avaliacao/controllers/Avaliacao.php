<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Avaliacao extends CI_Controller {

	# ------------ Visualizar ----------
	
	#Lista todas as avaliações
	public function index(){
		
	}
	
  #Lista todas as questões por disciplina
	public function questao() {
		//Restrição de acesso
		if(!isset($_SESSION['tipoUsuario']) or (($_SESSION['tipoUsuario']!='admin') and ($_SESSION['tipoUsuario']!='professor'))) redirect(base_url().'home', 'refresh');
		
		//Carrega as models
		$this->load->model('turma/disciplina_model');
		$this->load->model('avaliacao/questao_model');
		
		//Consulta as disciplinas
		$consulta = new Disciplina_model();
		$data['disciplinas'] = $consulta->select($filtro = '')->result();
		
	  //Carrega a view
		$this->load->view('avaliacao/cadastroQuestao', $data);
	 }
	
	# ------------ Cadastrar ----------
	
	#Cadastra uma questão no banco de dados
	public function cadastrarQuestao(){
		var_dump($_POST);
		
	}
}
