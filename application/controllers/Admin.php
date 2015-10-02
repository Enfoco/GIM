<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
	}

	public function index()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
		{
			redirect(base_url().'login');
		}
		  $data['titulo'] = 'Registro de Ciudades | Gim Master';
		  $data['main_content'] = 'Admin/admin_view';
		  $this->load->view('Layout/template',$data);	

	}


	}
