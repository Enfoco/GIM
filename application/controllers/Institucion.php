<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Institucion extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('Institucion_model', 'institucion');
	}

  public function index()
  {
    if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
    {
      redirect(base_url().'login');
    }

		//$data['ciudad'] = $this->Institucion_model->getalCiudad();
    $data['titulo'] = 'Registro de Institución | Gim Master';
    $data['main_content'] = 'Institucion/index';
    $this->load->view('Layout/template',$data);
  }


  public function ajax_list()
    {
        $list = $this->institucion->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $institucion) {
            $no++;
            $row = array();
            $row[] = $institucion->nit;
            $row[] = $institucion->nombreInstitucion;
						$row[] = $institucion->ciudad;
					  $row[] = $institucion->direccion;
            $row[] = $institucion->telefono1;
            $row[] = $institucion->correo;
          //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Editar" onclick="edit_institucion('."'".$institucion->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Eliminar" onclick="delete_institucion('."'".$institucion->id."'".')"><i class="glyphicon glyphicon-trash"></i> </a>';

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->institucion->count_all(),
                        "recordsFiltered" => $this->institucion->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id)
   {

       $data = $this->institucion->get_by_id($id);
       echo json_encode($data);
   }

   public function ajax_add()
   {

     $this->form_validation->set_rules('nit', 'Nit', 'required');
     if ($this->form_validation->run() == FALSE) {
/*
       $data['titulnito'] = 'Nueva institucion | Gim Master';
       $data['main_content'] = 'institucion/index';
       $this->load->view('Layout/template',$data);*/
       echojson_encode(array("status" => FALSE));
    }else{

       $data = array(
              'nit' => $this->input->post('nit'),
              'ciudad' => $this->input->post('ciudad'),
              'nombreInstitucion' => $this->input->post('nombreInstitucion'),
              'telefono1' => $this->input->post('telefono1'),
              'telefono2' => $this->input->post('telefono2'),
              'direccion' => $this->input->post('direccion'),
              'correo' => $this->input->post('correo'),
              'url' => $this->input->post('url'),
              'dane' => $this->input->post('dane'),
              'icfes' => $this->input->post('icfes'),
            );
       $insert = $this->institucion->save($data);
       echo json_encode(array("status" => TRUE));
   }

 }


   public function ajax_update()
   {
       $data = array(
         'nit' => $this->input->post('nit'),
         'ciudad' => $this->input->post('ciudad'),
         'nombreInstitucion' => $this->input->post('nombreInstitucion'),
         'telefono1' => $this->input->post('telefono1'),
         'telefono2' => $this->input->post('telefono2'),
         'direccion' => $this->input->post('direccion'),
         'correo' => $this->input->post('correo'),
         'url' => $this->input->post('url'),
         'dane' => $this->input->post('dane'),
         'icfes' => $this->input->post('icfes'),

           );
       $this->institucion->update(array('id' => $this->input->post('id')), $data);
       echo json_encode(array("status" => TRUE));
   }

   public function ajax_delete($id)
   {
       $this->institucion->delete_by_id($id);
       echo json_encode(array("status" => TRUE));
   }

}
