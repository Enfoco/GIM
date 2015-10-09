<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tutor extends CI_Controller {

	public function __construct() {
		parent::__construct();

	}

	public function index()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') == 'suscriptor')
		{
			redirect(base_url().'login');
		}
		$data['titulo'] = 'Bienvenido de nuevo ' .$this->session->userdata('perfil');
		$this->load->view('Tutor/editor_view',$data);
	}
}
