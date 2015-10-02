<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Folio extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Folio_model','folio');
		$this->load->library('session');
		$this->load->database();
		

	}

	public function index()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
		{
			redirect(base_url().'login');
		}
    $data['titulo'] = 'Registro de Folio | Gim Master';
    $data['main_content'] = 'Folio/index';
    $this->load->view('Layout/template',$data);
	}


	public function ajax_list()
    {
        $list = $this->folio->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $folio) {
            $no++;
            $row = array();
            $row[] = $folio->numero;
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Editar" onclick="edit_folio('."'".$folio->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Eliminar" onclick="delete_folio('."'".$folio->id."'".')"><i class="glyphicon glyphicon-trash"></i> </a>';

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->folio->count_all(),
                        "recordsFiltered" => $this->folio->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

		public function ajax_edit($id)
	 {

			 $data = $this->folio->get_by_id($id);
			 echo json_encode($data);
	 }

	 public function ajax_add()
	 {

		 $this->form_validation->set_rules('name', 'Name', 'required');
		 if ($this->form_validation->run() == FALSE) {
/*
			 $data['titulo'] = 'Nueva folio | Gim Master';
			 $data['main_content'] = 'folio/index';
			 $this->load->view('Layout/template',$data);*/
			 echojson_encode(array("status" => FALSE));
    }else{

			 $data = array(
							 'numero' => $this->input->post('name'),
								);
			 $insert = $this->folio->save($data);
			 echo json_encode(array("status" => TRUE));
	 }

 }


	 public function ajax_update()
	 {
			 $data = array(
							'numero' => $this->input->post('name'),

					 );
			 $this->folio->update(array('id' => $this->input->post('id')), $data);
			 echo json_encode(array("status" => TRUE));
	 }

	 public function ajax_delete($id)
	 {
			 $this->folio->delete_by_id($id);
			 echo json_encode(array("status" => TRUE));
	 }

}
