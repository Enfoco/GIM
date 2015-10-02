<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Periodo extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Periodo_model','periodos');
		$this->load->library('session');
		$this->load->database();


	}

	public function index()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
		{
			redirect(base_url().'login');
		}
    $data['titulo'] = 'Nuevo Perido | Gim Master';
    $data['main_content'] = 'Periodo/index';
    $this->load->view('Layout/template',$data);
	}


	public function ajax_list()
    {
        $list = $this->periodos->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $periodo) {
            $no++;
            $row = array();
            $row[] = $periodo->nombre;
            $row[] = $periodo->anio;
            $row[] = $periodo->estado;
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Editar" onclick="edit_periodo('."'".$periodo->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Eliminar" onclick="delete_periodo('."'".$periodo->id."'".')"><i class="glyphicon glyphicon-trash"></i> </a>';

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->periodos->count_all(),
                        "recordsFiltered" => $this->periodos->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

		public function ajax_edit($id)
	 {
			 $data = $this->periodos->get_by_id($id);
					 echo json_encode($data);
	 }

	 public function ajax_add()
	 {

		 $this->form_validation->set_rules('name', 'Name', 'required');
     $this->form_validation->set_rules('anio', 'Año', 'required');
     $this->form_validation->set_rules('estado', 'Estado', 'required');
		 if ($this->form_validation->run() == FALSE) {

			 echojson_encode(array("status" => FALSE));
    }else{

			 $data = array(
							 'nombre' => $this->input->post('name'),
               'anio' => $this->input->post('anio'),
               'estado' => $this->input->post('estado'),
								);
			 $insert = $this->periodos->save($data);
			 echo json_encode(array("status" => TRUE));
	 }

 }


	 public function ajax_update()
	 {
			 $data = array(
							'nombre' => $this->input->post('name'),
              'anio' => $this->input->post('anio'),
              'estado' => $this->input->post('estado'),

					 );
			 $this->periodos->update(array('id' => $this->input->post('id')), $data);
			 echo json_encode(array("status" => TRUE));
	 }

	 public function ajax_delete($id)
	 {
			 $this->periodos->delete_by_id($id);
			 echo json_encode(array("status" => TRUE));
	 }

}
