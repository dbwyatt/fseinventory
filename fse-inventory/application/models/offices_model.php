<?php class offices_model extends CI_Model {

	public function __construct() {
 		$this->load->database(); 
	}
	
	public function get_columns() {
		$result = $this->db->list_fields('office');
		foreach($result as $field) {
			$data[] = ucwords(str_replace('_', ' ', $field));
		}
		return $data;
	}

	public function select_all_from_office()
	{        
        
        $query = $this->db->select('*')
                          ->from('office')
                          ->get();

        $data = $query->result_array();


       	return $data;
	}

}
