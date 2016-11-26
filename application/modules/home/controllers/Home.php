<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	#Pagina inicial do sistema, de login
	public function index($result=''){
	
		$data['msg']=null;
		
		//Mensagem de falha
		if($result=='falha')
			$data['msg']='Login ou senha inválidos!';
		
		//Tela de login
		$this->load->view('home/login',$data);
	}
	
	#Cria a sessão de login de acordo com o tipo de usuário
	public function login(){
		
		//Cria uma sessão para o login do usuario
		if(!empty($_POST)){
			//Recebe os dados do formulario
			$login = (empty($_POST['login'])) ? '' : $_POST['login'];
			$senha = (empty($_POST['senha'])) ? '' : $_POST['senha'];
			$tipoUsuario = (empty($_POST['tipoUsuario'])) ? '' : $_POST['tipoUsuario'];
			
			//Login por aluno
			if($tipoUsuario=='aluno'){
				//Cria o filtro de consulta
				$filtro['login']=$login;
				$filtro['senha']=$senha;
				
				//Carrega a model
				$this->load->model('turma/aluno_model');
				$aluno = new Aluno_model();
			
				//Consulta o usuario
				if(!empty($aluno->select($filtro)->result())){
					$_SESSION['login']=$login;
					$_SESSION['tipoUsuario']='aluno';
					redirect('/home/boasVindas', 'refresh');
				}else{
					redirect('/home/index/falha', 'refresh');
				}
			//Login por professor	
			}else if($tipoUsuario=='professor'){
				//Cria o filtro de consulta
				$filtro['login']=$login;
				$filtro['senha']=$senha;
				
				//Carrega a model
				$this->load->model('turma/professor_model');
				$professor = new Professor_model();
				
				//Consulta o usuario
				if(!empty($professor->select($filtro)->result())){
					$_SESSION['login']=$login;
					
					//Se o usuario for adminstrivo, seta o tipo como admin
					if($login=='admin@email.com')
						$_SESSION['tipoUsuario']='admin';
					else
						$_SESSION['tipoUsuario']='professor';
						redirect('/home/boasVindas', 'refresh');
				}else{
					redirect('/home/index/falha', 'refresh');
				}
			}
		}
	}
	
	#Realiza logoff do usuario
	public function logoff(){
		//Limpa a sessão
		unset($_SESSION['login']);
		unset($_SESSION['tipoUsuario']);
					
		//Redireciona para a pagina inicial 
		$url = base_url();
		redirect($url,'refresh');
	}	
	
	#Pagina de boas vindas
	public function boasVindas(){
		echo "Bem vindo";
	}
}
