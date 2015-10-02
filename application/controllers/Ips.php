<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Ips extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->library('session');
		$this->load->database();
		$this->load->model('Ips_model','ips');

	}

	public function index()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
		{
			redirect(base_url().'login');
		}
    $data['titulo'] = 'Nueva Ips | Gim Master';
    $data['main_content'] = 'Ips/index';
    $this->load->view('Layout/template',$data);
	}


	public function Ajax_list()
    {
        $list = $this->ips->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $ips) {
            $no++;
            $row = array();
            $row[] = $ips->detalleIps;
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Editar" onclick="edit_ips('."'".$ips->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Eliminar" onclick="delete_ips('."'".$ips->id."'".')"><i class="glyphicon glyphicon-trash"></i> </a>';

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->ips->count_all(),
                        "recordsFiltered" => $this->ips->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

		public function ajax_edit($id)
	 {
			 $data = $this->ips->get_by_id($id);
			 echo json_encode($data);
	 }

	 public function ajax_add()
	 {

		 $this->form_validation->set_rules('name', 'Name', 'required');
		 if ($this->form_validation->run() == FALSE) {
/*
			 $data['titulo'] = 'Nueva Ips | Gim Master';
			 $data['main_content'] = 'Ips/index';
			 $this->load->view('Layout/template',$data);*/
			 echojson_encode(array("status" => FALSE));
    }else{

			 $data = array(
							 'detalleIps' => $this->input->post('name'),
								);
			 $insert = $this->ips->save($data);
			 echo json_encode(array("status" => TRUE));
	 }

 }


	 public function ajax_update()
	 {
			 $data = array(
							'detalleIps' => $this->input->post('name'),

					 );
			 $this->ips->update(array('id' => $this->input->post('id')), $data);
			 echo json_encode(array("status" => TRUE));
	 }

	 public function ajax_delete($id)
	 {
			 $this->ips->delete_by_id($id);
			 echo json_encode(array("status" => TRUE));
	 }

}
