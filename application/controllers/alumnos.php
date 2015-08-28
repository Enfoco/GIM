<?php
//Creacion de la clase Controlador Alumnos
class Alumnos extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('model_alumnos');  //Cargamos el la Clase Modelo
    }
// Creamos la Funcion Index del modulo Alumnos
    public function Index() {
        $data['titulo'] = 'Alumnos';  // Asignamos nombre a la pagina
        $this->load->view('Plantilla/header', $data);  //Enviamos a la vista la cabecera
        $datos['alumnos'] = $this->model_alumnos->getAll();  //Recuperamos Todos los alumnos regstrados en la Tabla Alumnos
        $this->load->view('Alumnos/index', $datos); //Pasomos a la Vista - Alumnos, todos los alumnos consultados mediante un array
        $this->load->view('Plantilla/footer');  // Enviamos a la vista index el footer de la pagina
    }

      public function llena_localidades()
    {
        $options = "";
        if($this->input->post('provincia'))
        {
            $provincia = $this->input->post('provincia');
            $localidades = $this->model_alumnos->localidades($provincia);
            foreach($localidades as $fila)
            {
            ?>
                <option value="<?=$fila ->detalleDepartamento ?>"><?=$fila ->poblacion ?></option>
            <?php
            }
        }
    }


    public function Create() {
        $data['titulo'] = 'Registro Alumnos';
        $this->load->view('Plantilla/header', $data);
        $datos['eps'] = $this->model_alumnos->get_eps();
        $datos['ips'] = $this->model_alumnos->get_ips();
        $datos['rh'] = $this->model_alumnos->get_rh();
        $datos['genero'] = $this->model_alumnos->get_genero();
        $datos['estado'] = $this->model_alumnos->get_estado();
        $datos['provincia'] = $this->model_alumnos->provincias();
        $datos['tidentificacion'] = $this->model_alumnos->get_tidentificacion();
        // cargamos  la interfaz y le enviamos los datos
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nombres', 'Nombre', 'required');
        $this->form_validation->set_rules('apellidoPaterno', 'ApellidoP', 'required');
        $this->form_validation->set_rules('apellidoMaterno', 'ApellidoM', 'required');
        $this->form_validation->set_rules('nidentificacion', 'No. IdentificaciÃ³n', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Alumnos/create', $datos);
        } else {
            $nombres = $this->input->post('nombres');
            $apellidoPaterno = $this->input->post('apellidoPaterno');
            $apellidoMaterno = $this->input->post('apellidoMaterno');
            $identificacion = $this->input->post('nidentificacion');
            $direccion = $this->input->post('direccion');
            $telefono = $this->input->post('telefono');
            $celular = $this->input->post('celular');
            $convive = $this->input->post('convive');
            $ianterior = $this->input->post('ianterior');
            $correo = $this->input->post('correo');
            $fechaNacimiento = $this->input->post('fechaNacimiento');
            $eps = $this->input->post('eps');
            $ips = $this->input->post('ips');
            $tipoIdentificacion = $this->input->post('tipoIdentificacion');
            $nombrea = $this->input->post('nombrea');
            $apellidoPaternoa = $this->input->post('apellidoPaternoa');
            $apellidoMaternoa = $this->input->post('apellidoMaternoa');
            $direcciona = $this->input->post('direcciona');
            $telefonoa = $this->input->post('telefonoa');
            $empresaa = $this->input->post('empresaa');
            $cargoa = $this->input->post('cargoa');
            $tituloa = $this->input->post('tituloa');
            $celulara = $this->input->post('celulara');
            $correoa = $this->input->post('correoa');
            $identificaciona = $this->input->post('identificaciona');
            $fechaNacimientoa = $this->input->post('fechaNacimientoa');
            $tipodocumentoa = $this->input->post('tipodocumentoa');
            $this->load->model('model_alumnos');
            $this->model_alumnos->crearAlumnos($nombres, $apellidoPaterno, $apellidoMaterno, $identificacion, $direccion, $telefono, $celular, $convive, $ianterior, $correo, $fechaNacimiento, $eps, $ips, $tipoIdentificacion, $nombrea, $apellidoPaternoa, $apellidoMaternoa, $direcciona, $telefonoa, $empresaa, $cargoa, $tituloa, $celulara, $correoa, $identificaciona, $fechaNacimientoa, $tipodocumentoa);
            echo 'registro insertado';
        }
        $this->load->view('Plantilla/footer');
    }
}