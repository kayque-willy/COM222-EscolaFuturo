<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index(){
		echo "Essa url acessa o controller home. Com não tem metodo ela vai direto pro metodo index!";
	}
	
	public function metodo_qualquer(){
		echo "Essa url acessa o metodo qualquer da controller home!";
	}
}
