<?php 

class Blog_Model extends CI_Model {
    
    function __construct() {
        parent::__Construct();
        
    }
    
 function get_all(){
        
    //$results = $this->db->query('SELECT * FROM entries ORDER BY create_time DESC');
    
    $this->db->order_by("title", "asc"); 
    $results = $this->db->get('entries');
    
    return $results->result();
    
 }    

 function get_categories($id){
    
          $this->db->select('*');
          $this->db->from('entries_categories');
          $this->db->where('entries_categories.entry_id ='.$id);
          $this->db->join('entries', 'entries.id = entries_categories.entry_id');
          $this->db->join('categories', 'categories.id = entries_categories.category_id');
          $this->db->order_by("category", "asc");          
   
    return $this->db->get()->result();                                
    
   }

}