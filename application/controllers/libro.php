<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Libro extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Libro_model','libro');
		$this->load->library('session');
		$this->load->database();


	}

	public function index()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
		{
			redirect(base_url().'login');
		}
    $data['titulo'] = 'Registro de Libro | Gim Master';
    $data['main_content'] = 'Libro/index';
    $this->load->view('Layout/template',$data);
	}


	public function ajax_list()
    {
        $list = $this->libro->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $libro) {
            $no++;
            $row = array();
            $row[] = $libro->numeroLibro;
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Editar" onclick="edit_libro('."'".$libro->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Eliminar" onclick="delete_libro('."'".$libro->id."'".')"><i class="glyphicon glyphicon-trash"></i> </a>';

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->libro->count_all(),
                        "recordsFiltered" => $this->libro->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

		public function ajax_edit($id)
	 {

			 $data = $this->libro->get_by_id($id);
			 echo json_encode($data);
	 }

	 public function ajax_add()
	 {

		 $this->form_validation->set_rules('name', 'Name', 'required');
		 if ($this->form_validation->run() == FALSE) {
/*
			 $data['titulo'] = 'Nueva libro | Gim Master';
			 $data['main_content'] = 'libro/index';
			 $this->load->view('Layout/template',$data);*/
			 echojson_encode(array("status" => FALSE));
    }else{

			 $data = array(
							 'numero' => $this->input->post('name'),
								);
			 $insert = $this->libro->save($data);
			 echo json_encode(array("status" => TRUE));
	 }

 }


	 public function ajax_update()
	 {
			 $data = array(
							'numero' => $this->input->post('name'),

					 );
			 $this->libro->update(array('id' => $this->input->post('id')), $data);
			 echo json_encode(array("status" => TRUE));
	 }

	 public function ajax_delete($id)
	 {
			 $this->libro->delete_by_id($id);
			 echo json_encode(array("status" => TRUE));
	 }

}
