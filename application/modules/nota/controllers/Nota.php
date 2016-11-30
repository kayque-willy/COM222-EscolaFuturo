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
		
		if ($_SESSION['tipoUsuario'] === 'aluno'){
			$consulta = new Turma_model();
		} else {
			//Consulta as turmas do professor
			$consulta = new Turma_model();
			$filtro['login']=$_SESSION['login'];
			$turmas=$consulta->select($filtro)->result();
			
			//Consulta as notas de cada turma
			$data['notas'] = [];
			foreach($turmas as $turma){
				$consulta = new Professor_model();
				$filtro['idTurma'] = $turma->id;
				$filtro['idDisciplina'] = $turma->idDisciplina;
				$filtro['loginProfessor'] = $turma->loginProfessor;
				
				//Adiciona as notas e a turma no vetor
				$notas['turma'] = $turma;
				$notas['notas'] = $consulta->listar_notas($filtro)->result();
				$data['notas'][] = $notas;
			}
			
			var_dump($data['notas'][0]);
			
			//Carrega a view 
			$this->load->view('listarNota', $data);
		}
	}

}