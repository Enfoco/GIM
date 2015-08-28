<?php
class Model_alumnos extends CI_Model {
    function getAll() {
        $query = $this->db->get('alumnos');
        return $query->result();
    }
    function crearAlumnos($nombres, $apellidoPaterno, $apellidoMaterno, $identificacion, $direccion, $telefono, $celular, $convive, $ianterior, $correo, $fechaNacimiento, $eps, $ips, $tipoIdentificacion) {
        $data = array('nombres' => $nombres, 'apellidoPaterno' => $apellidoPaterno, 'apellidoMaterno' => $apellidoMaterno, 'identificacion' => $identificacion, 'direccion' => $direccion, 'telefono' => $telefono, 'celular' => $celular, 'convive' => $convive, 'ianterior' => $ianterior, 'correo' => $correo, 'fechaNacimiento' => $fechaNacimiento, 'eps' => $eps, 'ips' => $ips, 'tipoIdentificacion' => $tipoIdentificacion);
        $this->db->insert('alumnos', $data);
        return $idAlmun = $this->db->insert_id();
    }
    function get_eps() {
        // armamos la consulta
        $this->db->order_by('detalleEps', 'asc');
        $eps = $this->db->get('eps');
        if ($eps->num_rows() > 0) {
            return $eps->result();
        }
    }
    function get_ips() {
        // armamos la consulta
        $this->db->order_by('detalleIps', 'asc');
        $ips = $this->db->get('ips');
        if ($ips->num_rows() > 0) {
            return $ips->result();
        }
    }
    function get_rh() {
        // armamos la consulta
        $this->db->order_by('detalleRh', 'asc');
        $rh = $this->db->get('rh');
        if ($rh->num_rows() > 0) {
            return $rh->result();
        }
    }
    function get_genero() {
        // armamos la consulta
        $this->db->order_by('detalleGenero', 'asc');
        $genero = $this->db->get('genero');
        if ($genero->num_rows() > 0) {
            return $genero->result();
        }
    }
    function get_estado() {
        // armamos la consulta
        $this->db->order_by('detalleEstado', 'asc');
        $estado = $this->db->get('estado');
        if ($estado->num_rows() > 0) {
            return $estado->result();
        }
    }
    function get_tidentificacion() {
        // armamos la consulta
        $this->db->order_by('detalleTipoIdentificacion', 'asc');
        $tidentificacion = $this->db->get('tipoIdentificacion');
        if ($tidentificacion->num_rows() > 0) {
            return $tidentificacion->result();
        }
    }

      public function provincias() {
        // armamos la consulta
        $this->db->order_by('detalleMunicipio', 'asc');
        $provincia = $this->db->get('provincia');
        if ($provincia->num_rows() > 0) {
            return $provincia->result();
        }
    }

        public function localidades($provincia) {
        // armamos la consulta
        $this->db->where('idprovincia', $provincia);
        $this->db->order_by('detalleMunicipio', 'asc');
        $localidades = $this->db->get('poblacion');
       
        if ($localidades->num_rows() > 0) {
            return $localidades->result();
        }
    }


}