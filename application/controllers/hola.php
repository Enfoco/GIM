<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hola extends CI_Controller {

	public function index()
	{
		$this->load->view('Hola/index');
	}
}
