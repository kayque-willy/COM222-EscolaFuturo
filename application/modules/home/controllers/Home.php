<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index(){
		//Tela de login
		$this->load->view('home/login');
	}
	
	public function login(){
		//Tela de login
		var_dump($_POST);
	}
}
