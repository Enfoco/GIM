<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Eps extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Eps_model','eps');
		$this->load->library('session');
		$this->load->model('Eps_model','eps');

	}

	public function index()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
		{
			redirect(base_url().'login');
		}
    $data['titulo'] = 'Nueva Eps | Gim Master';
    $data['main_content'] = 'Eps/index';
    $this->load->view('Layout/template',$data);
	}


	public function ajax_list()
    {
        $list = $this->eps->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $eps) {
            $no++;
            $row = array();
            $row[] = $eps->detalleEps;
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Editar" onclick="edit_Eps('."'".$eps->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Eliminar" onclick="delete_Eps('."'".$eps->id."'".')"><i class="glyphicon glyphicon-trash"></i> </a>';

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->eps->count_all(),
                        "recordsFiltered" => $this->eps->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

		public function ajax_edit($id)
	 {

			 $data = $this->eps->get_by_id($id);
			 echo json_encode($data);
	 }

	 public function ajax_add()
	 {

		 $this->form_validation->set_rules('name', 'Name', 'required');
		 if ($this->form_validation->run() == FALSE) {
/*
			 $data['titulo'] = 'Nueva Eps | Gim Master';
			 $data['main_content'] = 'Eps/index';
			 $this->load->view('Layout/template',$data);*/
			 echojson_encode(array("status" => FALSE));
    }else{

			 $data = array(
							 'detalleEps' => $this->input->post('name'),
								);
			 $insert = $this->eps->save($data);
			 echo json_encode(array("status" => TRUE));
	 }

 }


	 public function ajax_update()
	 {
			 $data = array(
							'detalleEps' => $this->input->post('name'),

					 );
			 $this->eps->update(array('id' => $this->input->post('id')), $data);
			 echo json_encode(array("status" => TRUE));
	 }

	 public function ajax_delete($id)
	 {
			 $this->eps->delete_by_id($id);
			 echo json_encode(array("status" => TRUE));
	 }

}
