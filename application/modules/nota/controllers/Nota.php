<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nota extends CI_Controller {

	# ------------ Visualizar ----------
	
	#Lista todas as avaliações
	public function index(){
		
	}
	
  #Lista todas as questões por disciplina
	public function questao() {
		//Restrição de acesso
		if(!isset($_SESSION['tipoUsuario']) or (($_SESSION['tipoUsuario']!='admin') and ($_SESSION['tipoUsuario']!='professor'))) redirect(base_url().'home', 'refresh');
		
		//Carrega as models
		$this->load->model('nota_model');
		
			
		
	  //Carrega a view
		$this->load->view('home', $data);
	 }
	
	
}
