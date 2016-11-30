<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Turma extends CI_Controller {

	# ------------ Visualizar ----------
	
	#Index do controller
	public function index($result='') {
		//Restrição de acesso
		if(!isset($_SESSION['tipoUsuario']) or ($_SESSION['tipoUsuario']!='admin')) redirect(base_url().'home', 'refresh');
		
		//Mensagem de resultado de alguma operação
		if(isset($result)){
			switch ($result){
				case 'cad_sucesso': 
					$data['sucesso']=true;
					$data['msg'] = 'Turma cadastrada com sucesso!';
					break;
				case 'cad_falha': 
					$data['falha']=true;
					$data['msg'] = 'Falha ao cadastrar a Turma!';
					break;
				case 'alt_sucesso':
					$data['sucesso']=true;
					$data['msg'] = 'Turma atualizada com sucesso!';
					break;
				case 'alt_falha': 
					$data['falha']=true;
					$data['msg'] = 'Falha ao atualizar a Turma!';
					break;
				case 'exc_sucesso':
					$data['sucesso']=true;
					$data['msg'] = 'Turma excluida com sucesso!';
					break;
				case 'exc_falha':
					$data['falha']=true;
					$data['msg'] = 'Falha ao remover a Turma!';
					break;
			}
		}
		
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
				$filtro['idDisciplina'] = $t['idDisciplina'];
				$filtro['loginProfessor'] = $t['loginProfessor'];
				$alunosTurma = $consulta->select($filtro);
				$data['turmas'][$i]['alunos'] = $alunosTurma->result_array();
			}
		}
	   $this->load->view('turma/cadastroTurma', $data);
	 }
	
	#Lista as disciplinas
	public function disciplina($result='') {
		//Restrição de acesso
		if(!isset($_SESSION['tipoUsuario']) or ($_SESSION['tipoUsuario']!='admin')) redirect(base_url().'home', 'refresh');
		
		 $this->load->model('Disciplina_model');
		 $consulta = new Disciplina_model();
		 $disciplinas = $consulta->select($filtro = '');
		 $data['disciplinas'] = $disciplinas->result_array();
	   $this->load->view('turma/cadastroDisciplina', $data);
	 }
	
	#Lista os professores
	public function professor($result='') {
		//Restrição de acesso
		if(!isset($_SESSION['tipoUsuario']) or ($_SESSION['tipoUsuario']!='admin')) redirect(base_url().'home', 'refresh');
		
		 $this->load->model('Professor_model');
		 $consulta = new Professor_model();
		 $professores = $consulta->select($filtro = '');
		 $data['professores'] = $professores->result_array();
	   $this->load->view('turma/cadastroProfessor', $data);
	 }
	
	#Lista os alunos
	public function aluno($result='') {
		//Restrição de acesso
		if(!isset($_SESSION['tipoUsuario']) or ($_SESSION['tipoUsuario']!='admin')) redirect(base_url().'home', 'refresh');
		
		//Mensagem de resultado de alguma operação
		if(isset($result)){
			switch ($result){
				case 'cad_sucesso': 
					$data['sucesso']=true;
					$data['msg'] = 'Turma cadastrada com sucesso!';
					break;
				case 'cad_falha': 
					$data['falha']=true;
					$data['msg'] = 'Falha ao cadastrar a Turma!';
					break;
				case 'alt_sucesso':
					$data['sucesso']=true;
					$data['msg'] = 'Turma atualizada com sucesso!';
					break;
				case 'alt_falha': 
					$data['falha']=true;
					$data['msg'] = 'Falha ao atualizar a Turma!';
					break;
				case 'exc_sucesso':
					$data['sucesso']=true;
					$data['msg'] = 'Turma excluida com sucesso!';
					break;
				case 'exc_falha':
					$data['falha']=true;
					$data['msg'] = 'Falha ao remover a Turma!';
					break;
			}
		}
		
		
		 $this->load->model('Aluno_model');
		 $consulta = new Aluno_model();
		 $alunos = $consulta->select($filtro = '');
		 $data['alunos'] = $alunos->result_array();
		 $data['retorno'] = '';
		 $this->load->view('turma/cadastroAluno', $data);
	 }
	
	# ------------ Cadastrar ----------
	
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
					redirect(base_url('turma/index/cad_sucesso'));
				}else{
					//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
					redirect(base_url('turma/index/cad_falha'));
				}
			}else{
					//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
					redirect(base_url('turma/index/cad_falha'));
			}
		}
	}

	# ------------ Excluir ----------
	
	#Excluir Aluno
	public function excluirAluno(){
		if (!empty($_GET['login'])){
			$this->load->model('Aluno_model');
			$aluno = new Aluno_model($_GET['login'],'','');
			
			if($aluno->remove()){
				$this->aluno();
			}else{
				 $this->load->model('Aluno_model');
				 $consulta = new Aluno_model();
				 $alunos = $consulta->select($filtro = '');
				 $data['alunos'] = $alunos->result_array();
				 $data['retorno'] = 'Falha ao Excluir aluno, certifique-se de que ele não esteja em nenhuma turma e não tenah notas lançadas.';
				 $this->load->view('turma/cadastroAluno', $data);
			}
		}
	}
	
	#Excluir Professor
	public function excluirProfessor(){
		if (!empty($_GET['login'])){
			$this->load->model('Professor_model');
			$professor = new Professor_model($_GET['login'],'','');
			
			if($professor->remove()){
				$this->professor();
			}else{
				 $this->load->model('Professor_model');
				 $consulta = new Professor_model();
				 $professores = $consulta->select($filtro = '');
				 $data['professores'] = $professores->result_array();
				 $data['retorno'] = 'Falha ao Excluir professor.';
				 $this->load->view('turma/cadastroProfessor', $data);
			}
		}
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
	public function excluirTurma(){
		if (!empty($_GET['id']) && !empty($_GET['disciplina']) && !empty($_GET['professor'])){
			$this->load->model('Turma_model');
			$turma = new Turma_model($_GET['id'],$_GET['professor'],$_GET['disciplina']);
			
			if($turma->remove()){
				redirect(base_url('turma/index/exc_sucesso'));
			}else{
				 $this->load->model('Turma_model');
				 $this->load->model('Turma_aluno_model');
				 $consulta = new Turma_model();
				 $turmas = $consulta->select($filtro = '');
				 $data['turmas'] = $turmas->result_array();
				 $data['retorno'] = 'Falha ao Excluir disciplina.';
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
				 $this->load->view('turma/cadastroDisciplina', $data);
			}
		}
	}
	
	# ------------ Editar ----------
	
	#Atualiza um Disciplina
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
	
	#Atualiza um Professor
	public function atualizarProfessor(){
		
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
			if($professor->update($_POST['login'])){
				//Se a operação for bem sucedida, redireciona com mensagem de sucesso
				$this->load->view('turma/sucesso');
			}else{
				//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
				$this->load->view('turma/falha');
			}
		}
		
	}
	
	#Atualiza um Aluno
	public function atualizarAluno(){
		
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
			if($aluno->update($login)){
				//Se a operação for bem sucedida, redireciona com mensagem de sucesso
				$this->load->view('turma/sucesso');
			}else{
				//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha
				$this->load->view('turma/falha');
			}
		}
		
	}
	
	#Atualiza um Turma
	public function atualizarTurma(){
						
		if(!empty($_POST)){
			
			//Recebe os dados do formulario
			$turma = (empty($_POST['id'])) ? '' : $_POST['id'];
			$professor = (empty($_POST['loginProfessor'])) ? '' : $_POST['loginProfessor'];
			$disciplina = (empty($_POST['idDisciplina'])) ? '' : $_POST['idDisciplina'];
			$alunos = (empty($_POST['loginAluno'])) ? '' : $_POST['loginAluno'];
			$alunosAntigos = (empty($_POST['alunosAntigos'])) ? '' : $_POST['alunosAntigos'];
			
			//Carrega a model
			$this->load->model('Turma_model');

			//Insere o repasse no banco
			if (!empty($alunos)){
					// salva alunos
					$this->load->model('Turma_aluno_model');
				if (!empty($alunosAntigos)){
					 foreach ($alunosAntigos as $ab){
							$aluno = new Turma_aluno_model($ab, $turma, $disciplina, $professor);
							$aluno->remove();
					 }
				 }
				
				 foreach ($alunos as $a){
						$aluno = new Turma_aluno_model($a, $turma, $disciplina, $professor);
						$aluno->insert();
				 }
				 redirect(base_url('turma/index/cad_sucesso'));
			}
		}
	}
	
	#Index do controller
	public function editarTurma() {
		//Restrição de acesso
		if(!isset($_SESSION['tipoUsuario']) or ($_SESSION['tipoUsuario']!='admin')) redirect(base_url().'home', 'refresh');
		
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
				$filtro['idDisciplina'] = $t['idDisciplina'];
				$filtro['loginProfessor'] = $t['loginProfessor'];
				$alunosTurma = $consulta->select($filtro);
				$data['turmas'][$i]['alunos'] = $alunosTurma->result_array();
			}
		}
		 $filtro['id'] = $_GET['id'];
		 $filtro['loginProfessor'] = $_GET['professor'];
		 $filtro['idDisciplina'] = $_GET['disciplina'];
		 $consulta = new Turma_model();
		 $d = $consulta->select($filtro);
		 $data['turma'] = $d->result_array();
		 $consulta = new Turma_aluno_model();
		 $filtro2['idTurma'] = $data['turma'][0]['id'];
		 $filtro2['loginProfessor'] = $_GET['professor'];
		 $filtro2['idDisciplina'] = $_GET['disciplina'];
		 $alunoTurma2 = $consulta->select($filtro2);
		 $i = 0;
		 $aux[0] = '';
		 foreach ($alunoTurma2->result_array() as $a){
		 		$aux[$i] = $a['loginAluno'];
				$i++;
		 }
		 $data['turma'][0]['alunos'] = $aux;
	   
		$this->load->view('turma/editarTurma', $data);
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
	
	#Lista os professores
	public function editarProfessor() {
		//Restrição de acesso
		if(!isset($_SESSION['tipoUsuario']) or ($_SESSION['tipoUsuario']!='admin')) redirect(base_url().'home', 'refresh');
		
		 $this->load->model('Professor_model');
		 $consulta = new Professor_model();
		 $professores = $consulta->select($filtro = '');
		 $data['professores'] = $professores->result_array();
		 $filtro['login'] = $_GET['login'];
		 $d = $consulta->select($filtro);
		 $data['professor'] = $d->result_array();
	   $this->load->view('turma/editarProfessor', $data);
	 }
	
	#Lista os alunos
	public function editarAluno() {
		//Restrição de acesso
		if(!isset($_SESSION['tipoUsuario']) or ($_SESSION['tipoUsuario']!='admin')) redirect(base_url().'home', 'refresh');
		
		 $this->load->model('Aluno_model');
		 $consulta = new Aluno_model();
		 $alunos = $consulta->select($filtro = '');
		 $data['alunos'] = $alunos->result_array();
		 $data['retorno'] = '';
		 $filtro['login'] = $_GET['login'];
		 $d = $consulta->select($filtro);
		 $data['aluno'] = $d->result_array();
	   $this->load->view('turma/editarAluno', $data);
	 }
	
}