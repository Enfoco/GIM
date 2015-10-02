<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Grupo extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Grupo_model','grupo');
		$this->load->library('session');
		$this->load->database();


	}

	public function index()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
		{
			redirect(base_url().'login');
		}
    $data['titulo'] = 'Nuevo Grupo | Gim Master';
    $data['main_content'] = 'Grupo/index';
    $this->load->view('Layout/template',$data);
	}


	public function ajax_list()
    {
        $list = $this->grupo->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $grupo) {
            $no++;
            $row = array();
            $row[] = $grupo->nombreGrupo;
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Editar" onclick="edit_grupo('."'".$grupo->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Eliminar" onclick="delete_grupo('."'".$grupo->id."'".')"><i class="glyphicon glyphicon-trash"></i> </a>';

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->grupo->count_all(),
                        "recordsFiltered" => $this->grupo->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

		public function ajax_edit($id)
	 {
			 $data = $this->grupo->get_by_id($id);
			 echo json_encode($data);
	 }

	 public function ajax_add()
	 {

		 $this->form_validation->set_rules('name', 'Name', 'required');
		 if ($this->form_validation->run() == FALSE) {
/*
			 $data['titulo'] = 'Nueva grupo | Gim Master';
			 $data['main_content'] = 'grupo/index';
			 $this->load->view('Layout/template',$data);*/
			 echojson_encode(array("status" => FALSE));
    }else{

			 $data = array(
							 'nombreGrupo' => $this->input->post('name'),
								);
			 $insert = $this->grupo->save($data);
			 echo json_encode(array("status" => TRUE));
	 }

 }


	 public function ajax_update()
	 {
			 $data = array(
							'nombreGrupo' => $this->input->post('name'),

					 );
			 $this->grupo->update(array('id' => $this->input->post('id')), $data);
			 echo json_encode(array("status" => TRUE));
	 }

	 public function ajax_delete($id)
	 {
			 $this->grupo->delete_by_id($id);
			 echo json_encode(array("status" => TRUE));
	 }

}
