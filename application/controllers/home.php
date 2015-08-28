<?php 

class Home extends CI_Controller{

	public function Index(){



	$data['titulo'] = 'Inicio';

		$this ->load -> view('Plantilla/header', $data);
		$this ->load ->view('Home/index');
		$this ->load -> view('Plantilla/footer');

		}
}

 ?>