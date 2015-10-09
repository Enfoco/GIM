<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }
    public function  count_results($table){
        return $this->db->count_all_results($table);

    }

  }
