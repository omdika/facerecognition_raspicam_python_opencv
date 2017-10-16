<?php
class Model_users extends CI_Model {
 
    public function __construct() {
        $this->load->database();
    }

    public function get_users_by_id($id) {
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id_users', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    }

    public function get_user($search_string=null, $order=null, $order_type='Asc', $limit_start, $limit_end) {
		$this->db->select('*');
		$this->db->from('users');
		$this->db->order_by('id_users', $order_type);
		$query = $this->db->get();
		return $query->result_array(); 	
    }

    function getUserData($search_string=null, $order=null) {
		$this->db->select('*');
		$this->db->from('users');
		$this->db->like('name', $search_string);
		if($order) {
			$this->db->order_by($order, 'Asc');
		} else {
		    $this->db->order_by('id_users', 'Asc');
		}
		$query = $this->db->get();
		return $query->num_rows();        
    }

    function insert_users($data) {
		$insert = $this->db->insert('users', $data);
	    return $insert;
	}

   
    function update_users($id, $data) {
		$this->db->where('id_users', $id);
		$this->db->update('users', $data);
		$report = array();
		$report['error'] = $this->db->_error_number();
		$report['message'] = $this->db->_error_message();
		if($report !== 0) {
			return true;
		} else {
			return false;
		}
	}

  
	function hapus_data($where,$table) {
      $this->db->where($where);
      $this->db->delete($table);
    }
 
}	
