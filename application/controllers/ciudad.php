<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Ciudad extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Ciudad_model','ciudad');
		$this->load->library('session');
		$this->load->database();


	}

	public function index()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
		{
			redirect(base_url().'login');
		}


    $data['titulo'] = 'Registro de Ciudades | Gim Master';
    $data['main_content'] = 'Ciudad/index';
    $this->load->view('Layout/template',$data);
	}


	public function ajax_list()
    {
        $list = $this->ciudad->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $ciudad) {
            $no++;
            $row = array();
            $row[] = $ciudad->detalleCiudad;
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Editar" onclick="edit_ciudad('."'".$ciudad->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Eliminar" onclick="delete_ciudad('."'".$ciudad->id."'".')"><i class="glyphicon glyphicon-trash"></i> </a>';

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->ciudad->count_all(),
                        "recordsFiltered" => $this->ciudad->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

		public function ajax_edit($id)
	 {

			 $data = $this->ciudad->get_by_id($id);
			 echo json_encode($data);
	 }

	 public function ajax_add()
	 {

		 $this->form_validation->set_rules('name', 'Name', 'required');
		 if ($this->form_validation->run() == FALSE) {
/*
			 $data['titulo'] = 'Nueva ciudad | Gim Master';
			 $data['main_content'] = 'ciudad/index';
			 $this->load->view('Layout/template',$data);*/
			 echojson_encode(array("status" => FALSE));
    }else{

			 $data = array(
							 'detalleciudad' => $this->input->post('name'),
								);
			 $insert = $this->ciudad->save($data);
			 echo json_encode(array("status" => TRUE));
	 }

 }


	 public function ajax_update()
	 {
			 $data = array(
							'detalleciudad' => $this->input->post('name'),

					 );
			 $this->ciudad->update(array('id' => $this->input->post('id')), $data);
			 echo json_encode(array("status" => TRUE));
	 }

	 public function ajax_delete($id)
	 {
			 $this->ciudad->delete_by_id($id);
			 echo json_encode(array("status" => TRUE));
	 }

}
