<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Login_model');
        $this->load->database('default');

    }

  public function index()
  {
    switch ($this->session->userdata('perfil')) {
      case '':
        $data['token'] = $this->token();
        $data['titulo'] = 'Login | Gim Master';
        $data['main_contentLogin'] = 'Login/login_view';
        $this->load->view('Layout/templateLogin',$data);
        break;
      case 'administrador':
        redirect(base_url().'admin');
        break;
      case 'editor':
        redirect(base_url().'editor');
        break;
      case 'suscriptor':
        redirect(base_url().'suscriptor');
        break;
      default:
      $data['titulo'] = 'Login con roles de usuario en codeigniter';
      $data['main_contentLogin'] = 'Login/login_view';
      $this->load->view('Layout/templateLogin',$data);
        break;
    }
  }

public function new_user()

  {
    if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token'))
    {
      $this->form_validation->set_rules('username', 'nombre de usuario', 'required|trim|min_length[2]|max_length[150]');
      $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[5]|max_length[150]');

            //lanzamos mensajes de error si es que los hay

      if($this->form_validation->run() == FALSE)
      {
        $this->index();
      }else{
        $username = $this->input->post('username');
        $password = sha1($this->input->post('password'));
        $check_user = $this->Login_model->login_user($username,$password);
        if($check_user == TRUE)
        {
          $data = array(
                  'is_logued_in'  =>    TRUE,
                  'id_usuario'    =>    $check_user->id,
                  'perfil'        =>    $check_user->perfil,
                  'username'      =>    $check_user->username
                );
          $this->session->set_userdata($data);
          $this->index();
        }
      }
    }else{
      redirect(base_url().'login');
    }
  }

  public function token()
  {
    $token = md5(uniqid(rand(),true));
    $this->session->set_userdata('token',$token);
    return $token;
  }

  public function usuario(){

  $this->load->view('Login/usuario');
  }


	public function create(){

    if(!$this->input->is_ajax_request())
    {
      redirect('404');
    }else{

		$this->form_validation->set_rules('nombres', 'Nombre del usuario', 'required|trim|min_length[2]|max_length[150]|xss_clean');
		$this->form_validation->set_rules('apellidos', 'Apellidos de usuario', 'required|trim|min_length[2]|max_length[150]|xss_clean');
		$this->form_validation->set_rules('username', 'nombre de usuario', 'required|trim|valid_email|xss_clean');
    $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[6]|max_length[150]|xss_clean');
    $this->form_validation->set_rules('perfil', 'Perfil Usuario', 'required|trim|min_length[6]|max_length[150]|xss_clean');

        //lanzamos mensajes de error si es que los hay
        $this->form_validation->set_message('required', 'El %s es requerido');
        $this->form_validation->set_message('min_length', 'El %s debe tener al menos %s carácteres');
        $this->form_validation->set_message('max_length', 'El %s debe tener al menos %s carácteres');
if($this->form_validation == false)
{
  $titulo["titulo"] = "Personal | Registro";
  $this->load->view('Login/usuario', $titulo);
}else {

  $this->Login_model->add();
  echo "Se ingreso los datos correctamente";
}
}

	}

  public function logout_ci()
  {
    $this->session->sess_destroy();
    $this->index();
  }
}
