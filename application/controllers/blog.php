<?php

/**
 * 
 */
class Blog extends CI_Controller {
    
function __construct() {
        parent::__Construct();
        $this ->load->model('Blog_Model');
        $this->load->library('form_validation');
        $this->load->helper(array('date','url'));
    
}
    
function index(){
    
    $data['title']='Consulta multitabla';
    $data['results']=$this->Blog_Model->get_all();
    
    $this->load->view('posts',$data);    

    
}    

function post_category(){
          
          $id = $this->input->get('id', TRUE);
          
          $data['title']='Consulta multitabla';
          $data['results'] =  $this->Blog_Model->get_categories($id);    
       
          $this->load->view('post', $data);
    
}

}