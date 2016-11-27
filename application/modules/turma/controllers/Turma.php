<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Turma extends CI_Controller {

	#Index do controller
	public function index() {
		 $this->load->model('Turma_model');
		$this->load->model('Professor_model');
		$this->load->model('Disciplina_model');
		$this->load->model('Aluno_model');
		$this->load->model('Turma_aluno_model');
		
		 $consulta = new Turma_model();
		 $turmas = $consulta->select($filtro = '');
		 $data['turmas'] = $turmas->result_array();
		 $consulta = new Professor_model();
		 $professores = $consulta->select($filtro = '');
		 $data['professores'] = $professores->result_array();
		 $consulta = new Disciplina_model();
		 $disciplinas = $consulta->select($filtro = '');
		 $data['disciplinas'] = $disciplinas->result_array();
		 $consulta = new Aluno_model();
		 $alunos = $consulta->select($filtro = '');
		 $data['alunos'] = $alunos->result_array();
		if (!empty($turmas)){
			$i = -1;
			foreach ($data['turmas'] as $t){
				$i++;
				$consulta = new Turma_aluno_model();
				$filtro['idTurma'] = $t['id'];
				$alunosTurma = $consulta->select($filtro);
				$data['turmas'][$i]['alunos'] = $alunosTurma->result_array();
			}
		}
	   $this->load->view('turma/cadastroTurma', $data);
	 }
	
	#Lista as disciplinas
	public function disciplina() {
		 $this->load->model('Disciplina_model');
		 $consulta = new Disciplina_model();
		 $disciplinas = $consulta->select($filtro = '');
		 $data['disciplinas'] = $disciplinas->result_array();
	   $this->load->view('turma/cadastroDisciplina', $data);
	 }
	
	#Lista os professores
	public function professor() {
		 $this->load->model('Professor_model');
		 $consulta = new Professor_model();
		 $professores = $consulta->select($filtro = '');
		 $data['professores'] = $professores->result_array();
	   $this->load->view('turma/cadastroProfessor', $data);
	 }
	
	#Lista os alunos
	public function aluno() {
		 $this->load->model('Aluno_model');
		 $consulta = new Aluno_model();
		 $alunos = $consulta->select($filtro = '');
		 $data['alunos'] = $alunos->result_array();
	   $this->load->view('turma/cadastroAluno', $data);
	 }
	
	#Cria um nova Disciplina
	public function cadastrarDisciplina(){
		
		//Restrição de acesso
		//if(($_SESSION['tipo']!='Administrativo') and ($_SESSION['tipo']!='Gestor de Projetos')) redirect('/projeto/', 'refresh');
		
		if(!empty($_POST)){
			
			//Recebe os dados do formulario
			$id = (empty($_POST['id'])) ? '' : $_POST['id'];
			$nome = (empty($_POST['nome'])) ? '' : $_POST['nome'];
						
			//Carrega a model
			$this->load->model('Disciplina_model');
		
			//Cria um nova disciplina com os dados do POST
			$disciplina = new Disciplina_model($id,$nome);
			
			//Insere o repasse no banco
			if($disciplina->insert()){
				//Se a operação for bem sucedida, redireciona com mensagem de sucesso
				$this->load->view('turma/sucesso');
			}else{
				//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
				$this->load->view('turma/falha');
			}
		}
		
	}
	
	#Cria um nova Professor
	public function cadastrarProfessor(){
		
		//Restrição de acesso
		//if(($_SESSION['tipo']!='Administrativo') and ($_SESSION['tipo']!='Gestor de Projetos')) redirect('/projeto/', 'refresh');
		
		if(!empty($_POST)){
			
			//Recebe os dados do formulario
			$login = (empty($_POST['login'])) ? '' : $_POST['login'];
			$nome = (empty($_POST['nome'])) ? '' : $_POST['nome'];
			$senha = (empty($_POST['senha'])) ? '' : $_POST['senha'];
						
			//Carrega a model
			$this->load->model('Professor_model');
		
			//Cria um nova disciplina com os dados do POST
			$professor = new Professor_model($login, $senha, $nome);
			
			//Insere o repasse no banco
			if($professor->insert()){
				//Se a operação for bem sucedida, redireciona com mensagem de sucesso
				$this->load->view('turma/sucesso');
			}else{
				//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
				$this->load->view('turma/falha');
			}
		}
		
	}
	
	#Cria um nova Aluno
	public function cadastrarAluno(){
		
		//Restrição de acesso
		//if(($_SESSION['tipo']!='Administrativo') and ($_SESSION['tipo']!='Gestor de Projetos')) redirect('/projeto/', 'refresh');
		
		if(!empty($_POST)){
			
			//Recebe os dados do formulario
			$login = (empty($_POST['login'])) ? '' : $_POST['login'];
			$nome = (empty($_POST['nome'])) ? '' : $_POST['nome'];
			$senha = (empty($_POST['senha'])) ? '' : $_POST['senha'];
						
			//Carrega a model
			$this->load->model('Aluno_model');
		
			//Cria um nova disciplina com os dados do POST
			$aluno = new Aluno_model($login, $senha, $nome);
			
			//Insere o repasse no banco
			if($aluno->insert()){
				//Se a operação for bem sucedida, redireciona com mensagem de sucesso
				$this->load->view('turma/sucesso');
			}else{
				//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
				$this->load->view('turma/falha');
			}
		}
		
	}
	
	#Cria um nova Turma
	public function cadastrarTurma(){
		
		//Restrição de acesso
		//if(($_SESSION['tipo']!='Administrativo') and ($_SESSION['tipo']!='Gestor de Projetos')) redirect('/projeto/', 'refresh');
		
		if(!empty($_POST)){
			
			//Recebe os dados do formulario
			$turma = (empty($_POST['id'])) ? '' : $_POST['id'];
			$professor = (empty($_POST['loginProfessor'])) ? '' : $_POST['loginProfessor'];
			$disciplina = (empty($_POST['idDisciplina'])) ? '' : $_POST['idDisciplina'];
			$alunos = (empty($_POST['loginAluno'])) ? '' : $_POST['loginAluno'];
			
			//Carrega a model
			$this->load->model('Turma_model');
		
			//Cria um nova disciplina com os dados do POST
			$turmac = new Turma_model($turma, $professor, $disciplina);
			
			//Insere o repasse no banco
			if (!empty($alunos)){
				if($turmac->insert()){
					//Se a operação for bem sucedida, redireciona com mensagem de sucesso
					// salva alunos
					$this->load->model('Turma_aluno_model');
					foreach ($alunos as $a){
						$aluno = new Turma_aluno_model($a, $turma, $disciplina, $professor);
						$aluno->insert();
					}

					$this->load->view('turma/sucesso');
				}else{
					//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
					$this->load->view('turma/falha');
				}
			}else{
					//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
					$this->load->view('turma/falha');
			}
		}
	}
}