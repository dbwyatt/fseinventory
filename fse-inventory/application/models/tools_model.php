<?php class tools_model extends CI_Model {

	public function __construct() {
 		$this->load->database(); 
	}
	
	public function select_all_from_tools()
	{        
        
        $query = $this->db->select('*')
                          ->from('tools')
                          //->limit('30')
                          ->get();

        $data = $query->result_array();


       	return $data;
	}

}
