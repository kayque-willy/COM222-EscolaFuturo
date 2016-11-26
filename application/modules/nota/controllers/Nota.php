<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nota extends CI_Controller {

	public function index(){
		$this->load->view('layout/header');
		$this->load->view('home/welcome_message');
		$this->load->view('layout/footer');
	}
}
