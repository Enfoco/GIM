<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Alumno extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('Alumno_model');
	}

	public function index()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
		{
			redirect(base_url().'login');
		}

		$data['rh'] = $this->Alumno_model->getalRh();
		$data['ips'] = $this->Alumno_model->getalIps();
		$data['eps'] = $this->Alumno_model->getalEps();
    $data['titulo'] = 'Registro de Alumnos | Gim Master';
    $data['main_content'] = 'Alumno/index';
    $this->load->view('Layout/template',$data);
	}


	public function ajax_list()
    {
        $list = $this->alumnos->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $alumno) {
            $no++;
            $row = array();
            $row[] = $alumno->nombres;
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Editar" onclick="edit_alumnos('."'".$alumno->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Eliminar" onclick="delete_alumnos('."'".$alumno->id."'".')"><i class="glyphicon glyphicon-trash"></i> </a>';

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->alumnos->count_all(),
                        "recordsFiltered" => $this->alumnos->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

		public function ajax_edit($id)
	 {

			 $data = $this->alumnos->get_by_id($id);
			 echo json_encode($data);
	 }

	 public function ajax_add()
	 {

		 $this->form_validation->set_rules('nombres', 'Nombres', 'required');
		 if ($this->form_validation->run() == FALSE) {
/*
			 $data['titulo'] = 'Nueva alumnos | Gim Master';
			 $data['main_content'] = 'alumnos/index';
			 $this->load->view('Layout/template',$data);*/
			 echojson_encode(array("status" => FALSE));
    }else{

			 $data = array(
							'tipoIdentificacion' => $this->input->post('tipoIdentificacion'),
							'eps' => $this->input->post('eps'),
							'ips' => $this->input->post('ips'),
							'estado' => $this->input->post('estado'),
							'rh' => $this->input->post('rh'),
							'genero' => $this->input->post('genero'),
							'nombres' => $this->input->post('nombres'),
							'apellidoPaterno' => $this->input->post('apellidoPaterno'),
						  'apellidoMaterno' => $this->input->post('apellidoMaterno'),
							'identificacion' => $this->input->post('identificacion'),
							'direccion' => $this->input->post('direccion'),
							'telefono' => $this->input->post('telefono'),
							'celular' => $this->input->post('celular'),
							'convive' => $this->input->post('convive'),
							'ianterior' => $this->input->post('ianterior'),
							'correo' => $this->input->post('correo'),
							'fechaNacimiento' => $this->input->post('fechaNacimiento'),
							'fechaRegistro' => $this->input->post('fechaRegistro'),
							'ciudad' => $this->input->post('ciudad'),

										 								);
			 $insert = $this->alumnos->save($data);
			 echo json_encode(array("status" => TRUE));
	 }

 }


	 public function ajax_update()
	 {
			 $data = array(
				 'tipoIdentificacion' => $this->input->post('tipoIdentificacion'),
				 'eps' => $this->input->post('eps'),
				 'ips' => $this->input->post('ips'),
				 'estado' => $this->input->post('estado'),
				 'rh' => $this->input->post('rh'),
				 'genero' => $this->input->post('genero'),
				 'nombres' => $this->input->post('nombres'),
				 'apellidoPaterno' => $this->input->post('apellidoPaterno'),
				 'apellidoMaterno' => $this->input->post('apellidoMaterno'),
				 'identificacion' => $this->input->post('identificacion'),
				 'direccion' => $this->input->post('direccion'),
				 'telefono' => $this->input->post('telefono'),
				 'celular' => $this->input->post('celular'),
				 'convive' => $this->input->post('convive'),
				 'ianterior' => $this->input->post('ianterior'),
				 'correo' => $this->input->post('correo'),
				 'fechaNacimiento' => $this->input->post('fechaNacimiento'),
				 'fechaRegistro' => $this->input->post('fechaRegistro'),
				 'ciudad' => $this->input->post('ciudad'),

					 );
			 $this->alumnos->update(array('id' => $this->input->post('id')), $data);
			 echo json_encode(array("status" => TRUE));
	 }

	 public function ajax_delete($id)
	 {
			 $this->alumnos->delete_by_id($id);
			 echo json_encode(array("status" => TRUE));
	 }

}
