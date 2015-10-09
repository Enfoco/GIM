<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->database();
}
	public function index()
	{
		$data['contar']= $this->db->count_all('ips');;
		$this->load->view('Welco/welcome_message', $data);
	}
}
