<?php 

class Contactos extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this -> load ->model('model_contactos');
	}

	public function Index(){

		$data['titulo'] = 'Pagina principal';

		


		$this ->load -> view('Plantilla/header', $data);
		$datos['contactos'] = $this->model_contactos->getAll();
		$this ->load ->view('Contactos/index', $datos);
		$this ->load -> view('Plantilla/footer');
	}

	public function agregar(){
		$data['titulo'] = 'Agregar Contactos';

		$this ->load -> view('Plantilla/header', $data);
		$this ->load ->view('Contactos/agregar');
		$this ->load -> view('Plantilla/footer');
	}

/*
	public function AgregarContacto(){
		$this -> form_validation -> set_rules('nnombre','Nombre', 'required');
		$this -> form_validation -> set_rules('ndireccion','Direccion', 'required');
		$this -> form_validation -> set_rules('ntelefono','Telefono', 'required');


		if($this->form_validation->run() == FALSE){
				//ERROR

		$data['titulo'] = 'Agregar Contactos';

		$this ->load -> view('Plantilla/header', $data);
		$this ->load ->view('Contactos/agregar');
		$this ->load -> view('Plantilla/footer');

		}else{
			 //OK

		$data = array(
				'nombre' -> $this -> input -> post('nnombre'),
				'direccion' -> $this -> input -> post('ndireccion'),
				'telefono' -> $this -> input -> post('ntelefono')

			);

		$this-> model_contactos -> insertar($data),

		redirect( base_url(). 'Contactos/');

		}
	}
*/

} 

