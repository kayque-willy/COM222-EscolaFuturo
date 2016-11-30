<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nota extends CI_Controller {

	# ------------ Visualizar ----------
	
	#Lista as notas por turma 
	public function index() {
		//Restrição de acesso
		if(!isset($_SESSION['tipoUsuario']) or (($_SESSION['tipoUsuario']!='admin') and ($_SESSION['tipoUsuario']!='professor'))) redirect(base_url().'home', 'refresh');
		
		//Carrega as models
		$this->load->model('turma/turma_model');
		$this->load->model('turma/professor_model');
		$this->load->model('avaliacao/avaliacao_model');
		
		//Consulta as turmas do professor
		$consulta = new Turma_model();
		$filtro['loginProfessor']=$_SESSION['login'];
		$turmas=$consulta->select($filtro)->result();
		
		$data['notas'] = [];
		foreach($turmas as $turma){
			//Adiciona a turma
			$notas['turma'] = $turma;
			
			$filtro['idTurma'] = $turma->id;
			$filtro['idDisciplina'] = $turma->idDisciplina;
			$filtro['loginProfessor'] = $turma->loginProfessor;
			
			//Consulta as avaliações por turma
			$consulta = new Avaliacao_model();
		
			//Adiciona as avaliaçõse e a turma no vetor
			$notas['avaliacoes'] = $consulta->select($filtro)->result();
				
			//Consulta as notas de cada turma
			$consulta = new Professor_model();
			
			//Adiciona as notas e a turma no vetor
		
			$notas['notas'] = $consulta->listar_notas($filtro)->result();
			$data['notas'][] = $notas;
		}
			
		//Carrega a view 
		$this->load->view('listarNota', $data);
		
	}
	
	//USA ESSE METODO DIÓGENES
	public function historico(){
		//Tem um método na model aluno que retorna o histórico
		$this->load->model('turma/aluno_model');
		if ($_SESSION['tipoUsuario'] === 'aluno'){
			$consulta = new Aluno_model();
			$filtro['loginAluno']=$_SESSION['login'];
			$notas=$consulta->historico($filtro)->result_array();
		
			$data['notas'] = $notas;
			
			//Carrega a view 
			$this->load->view('historicoAluno', $data);
			}
		
	}

}