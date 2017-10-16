<?php

class Model_login extends CI_Model {

	function validate($user_name, $password){
		$this->db->where('user_name', $user_name);
		$this->db->where('pass_word', $password);
		$query = $this->db->get('membership');
		
		if($query->num_rows == 1) {
			return true;
		}		
	}

	function get_db_session_data() {
		$query = $this->db->select('user_data')->get('ci_sessions');
		$user = array(); 
		foreach ($query->result() as $row){
		    $udata = unserialize($row->user_data);
		    $user['user_name'] = $udata['user_name']; 
		    $user['is_logged_in'] = $udata['is_logged_in']; 
		}
		return $users;
	}
		
	function create_member() {
		$this->db->where('user_name', $this->input->post('username'));
		$query = $this->db->get('membership');

        if($query->num_rows > 0) {
        	echo '<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>';
			  echo "Username already taken";	
			echo '</strong></div>';
		} else {
			$new_member_insert_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email_addres' => $this->input->post('email_address'),			
				'user_name' => $this->input->post('username'),
				'pass_word' => md5($this->input->post('password'))						
			);
		$insert = $this->db->insert('membership', $new_member_insert_data);
		  return $insert;
		}
	      
	}
}

