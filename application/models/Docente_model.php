<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Docente_model extends CI_Model {

    public function fillgrid(){
        $this->db->order_by("id", "desc");
        $data = $this->db->get('profesores');
        foreach ($data->result() as $row){
            $edit = base_url().'docente/edit/';
            $delete = base_url().'docente/delete/';
            echo "<tr>
                        <td>$row->nombre</td>
                        <td>$row->apellidos</td>
                        <td>$row->genero</td>
                        <td>$row->tipoIdentificacion</td>
                        <td>$row->nIdentificacion</td>
                        <td>$row->ciudad</td>
                        <td>$row->direccion</td>
                        <td>$row->telefono1</td>

                        <td>$row->created</td>
                        <td><a href='$edit' data-id='$row->id' class='btnedit' title='edit'><i class='glyphicon glyphicon-pencil' title='edit'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='$delete' data-id='$row->id' class='btndelete' title='delete'><i class='glyphicon glyphicon-remove'></i></a></td>
                    </tr>";

        }
        exit;
    }

    public function create(){
        $data = array('nombre'=>  $this->input->post('nombre'),
                'apellidos'=>$this->input->post('apellidos'),
                'genero'=>$this->input->post('genero'),
                'tipoIdentificacion'=>$this->input->post('tipoIdentificacion'),
                'nIdentificacion'=>$this->input->post('nIdentificacion'),
                'ciudad'=>$this->input->post('ciudad'),
                'direccion'=>$this->input->post('direccion'),
                'telefono1'=>$this->input->post('telefono1'),
                'telefono2'=>$this->input->post('telefono2'),
                'correo'=>$this->input->post('correo'),
                'genero'=>$this->input->post('genero'),
                'create_at'=>date('d/m/y'));
            $this->db->insert('docente', $data);
            echo'<div class="alert alert-success">One record inserted Successfully</div>';
            exit;
    }

}

?>
