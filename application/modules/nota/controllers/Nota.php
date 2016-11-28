<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nota extends CI_Controller {

	# ------------ Visualizar ----------
	
	#Index do controller
	public function index() {
		//Restrição de acesso
		if(!isset($_SESSION['tipoUsuario']) or ($_SESSION['tipoUsuario']!='admin')) redirect(base_url().'home', 'refresh');
		
		$this->load->model('Disciplina_model');
		
		 $consulta = new Disciplina_model();
		 $disciplinas = $consulta->select($filtro = '');
		 $data['disciplinas'] = $disciplinas->result_array();
			$i = -1;
		
		$this->load->view('home', $data);
		 	 }
	
	#Lista as disciplinas
	public function disciplina() {
		//Restrição de acesso
		if(!isset($_SESSION['tipoUsuario']) or ($_SESSION['tipoUsuario']!='admin')) redirect(base_url().'home', 'refresh');
		
		 $this->load->model('Disciplina_model');
		 $consulta = new Disciplina_model();
		 $disciplinas = $consulta->select($filtro = '');
		 $data['disciplinas'] = $disciplinas->result_array();
	   $this->load->view('turma/cadastroDisciplina', $data);
	 }
	
	
		#Excluir Disciplina
	public function excluirDisciplina(){
		if (!empty($_GET['id'])){
			$this->load->model('Disciplina_model');
			$disciplina = new Disciplina_model($_GET['id'],'');
			
			if($disciplina->remove()){
				$this->disciplina();
			}else{
				 $this->load->model('Disciplina_model');
				 $consulta = new Disciplina_model();
				 $disciplinas = $consulta->select($filtro = '');
				 $data['disciplinas'] = $disciplinas->result_array();
				 $data['retorno'] = 'Falha ao Excluir disciplina.';
				 $this->load->view('turma/cadastroDisciplina', $data);
			}
		}
	}
	
			#Excluir Turma
	
	#Cria um nova Disciplina
	public function atualizarDisciplina(){
		
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
			if($disciplina->update($_POST['id'])){
				//Se a operação for bem sucedida, redireciona com mensagem de sucesso
				$this->load->view('turma/sucesso');
			}else{
				//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
				$this->load->view('turma/falha');
			}
		}
		
	}
	
	public function retorna(){
	$filtro['loginAluno'] = $_SESSION['login']
		$aluno = new Aluno_model();
		$resultado = $aluno->listar_disciplinas($filtro);
		$resultado = $aluno->listar_disciplinas($filtro)->result_array();
}
	
	#Lista as disciplinas
	public function editarDisciplina() {
		//Restrição de acesso
		if(!isset($_SESSION['tipoUsuario']) or ($_SESSION['tipoUsuario']!='admin')) redirect(base_url().'home', 'refresh');
		
		 $this->load->model('Disciplina_model');
		 $consulta = new Disciplina_model();
		 $disciplinas = $consulta->select($filtro = '');
		 $data['disciplinas'] = $disciplinas->result_array();
		 $filtro['id'] = $_GET['id'];
		 $d = $consulta->select($filtro);
		 $data['disciplina'] = $d->result_array();
	   $this->load->view('turma/editarDisciplina', $data);
	 }
	
	
	
}