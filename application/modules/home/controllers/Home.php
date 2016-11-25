<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index(){
		$this->load->model('turma/professor_model');
		
		$turma_professor = new Professor_model();
		
		$filtro['loginProfessor']='admin@email.com';
		var_dump($turma_professor->listar_turmas($filtro)->result());
		
		//$this->load->view('layout/header');
		//$this->load->view('home/welcome_message');
		//$this->load->view('layout/footer');	
	}
}
