<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Docente extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('Docente_model');
    $this->load->library('form_validation');
	}

  public function index(){

    if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
    {
      redirect(base_url().'login');
    }


    $data['titulo'] = 'Registro de Docentes | Gim Master';
    $data['main_content'] = 'Docente/index';
    $this->load->view('Layout/template',$data);
  }

public function create(){
           $this->form_validation->set_rules('nombre', 'Nombres', 'required');
           $this->form_validation->set_rules('apellido', 'Apellidos', 'required');
           $this->form_validation->set_rules('nIdentificacion', 'Numero Identificacion');
           $this->form_validation->set_rules('direccion', 'Direccion');
           $this->form_validation->set_rules('telefono1', 'Telefono', 'required');
           $this->form_validation->set_rules('telefono2', 'Celular');
           $this->form_validation->set_rules('correo', 'Email', 'required|valid_email');

           if ($this->form_validation->run() == FALSE){
              echo'<div class="alert alert-danger">'.validation_errors().'</div>';
              exit;
           }
           else{
               $this->Docente_model->create();
           }
       }

       public function edit(){
               $id =  $this->uri->segment(3);
               $this->db->where('id',$id);
               $data['query'] = $this->db->get('curd');
               $data['id'] = $id;
               $this->load->view('edit', $data);
               }

           public function update(){
                   $res['error']="";
                   $res['success']="";
                   $this->form_validation->set_rules('nombre', 'Nombres', 'required');
                   $this->form_validation->set_rules('apellido', 'Apellidos', 'required');
                   $this->form_validation->set_rules('nIdentificacion', 'Numero Identificacion');
                   $this->form_validation->set_rules('direccion', 'Direccion');
                   $this->form_validation->set_rules('telefono1', 'Telefono', 'required');
                   $this->form_validation->set_rules('telefono2', 'Celular');
                   $this->form_validation->set_rules('correo', 'Email', 'required|valid_email');
                  
                   if ($this->form_validation->run() == FALSE){
                   $res['error']='<div class="alert alert-danger">'.validation_errors().'</div>';
                   }
               else{
                   $data = array('nombre'=>  $this->input->post('nombre'),
                   'apellido'=>$this->input->post('apellido'),
                   'nIdentificacion'=>$this->input->post('nIdentificacion'),
                   'direccion'=>$this->input->post('direccion'),
                   'telefono1'=>$this->input->post('telefono1'),
                   'telefono2'=>$this->input->post('telefono2'),
                   'correo'=>$this->input->post('correo')
                 );
                   $this->db->where('id', $this->input->post('hidden'));
                   $this->db->update('profesores', $data);
                   $data['success'] = '<div class="alert alert-success">One record inserted Successfully</div>';
               }
               header('Content-Type: application/json');
               echo json_encode($res);
               exit;
           }


           public function delete(){
               $id =  $this->input->POST('id');
               $this->db->where('id', $id);
               $this->db->delete('curd');
               echo'<div class="alert alert-success">One record deleted Successfully</div>';
               exit;
           }

     }
