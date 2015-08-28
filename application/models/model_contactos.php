<?php 

class Model_Contactos extends CI_Model{

	function getAll(){
		$query = $this -> db ->get('contactos');	
		return $query -> result();
	}
}
?>
