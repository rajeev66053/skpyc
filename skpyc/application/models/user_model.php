<?php
class user_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		
		function login($username, $password)
		{
			$this -> db -> select('id, username, password');
			$this -> db -> from('users');
			$this -> db -> where('username = ' . "'" . $username . "'"); 
			$this -> db -> where('password = ' . "'" . MD5($password) . "'"); 
			$this -> db -> limit(1);

			$query = $this -> db -> get();
			
			
			//echo '<pre>';
			//var_dump($query->result());
			//echo '<pre>';die;

			if($query -> num_rows() == 1)
			{
				return $query->result();
			}
			else
			{
				return false;
			}

		}
		
		
		public function get_users($id = FALSE)
		{
				if ($id === FALSE)
				{
						$query = $this->db->get('users');
						return $query->result_array();
				}

				$query = $this->db->get_where('users', array('id' => $id));
				return $query->row_array();
		}

	public function set_users()
	{
		
		$data = array(
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password' =>MD5($this->input->post('password')),
			'role' => $this->input->post('role'),
			'is_active' => $this->input->post('is_active'),
			'created_date'=>date('Y-m-d')
			);
			
		//print_r($data);die;	

		return $this->db->insert('users', $data);
	}
	
	
	public function updateuser($id, $result)
	{
		
		 $this->db->where('id', $id);
		 
		$data = array(
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password' =>MD5($this->input->post('password')),
			'role' => $this->input->post('role'),
			'is_active' => $this->input->post('is_active'),
			'created_date'=>date('Y-m-d')
			);
		 
		 
		 $this->db->update('users',$data);
		// echo $this->db->last_qeury();die;
	}
	
	
	public function updatepassword($id, $result)
	{
		//echo '<pre>';
		//var_dump($result);
		//echo '<pre>';die;
		
		 $this->db->where('id', $id);
		 
		 $data = array(
			'password' =>MD5($result['new_password'])
			);
		 
		 
		 $this->db->update('users',$data);
		// echo $this->db->last_qeury();die;
	}
	
	public function deleteuser( $id )
	{
		$this->db->where('id', $id);
		$this->db->delete('users');
	}
	
	
	// Count all record of table "contact_info" in database.
	public function record_count() {
	return $this->db->count_all("users");
	}

	// Fetch data according to per_page limit.
	public function fetch_data($limit, $start) {
	
		
	$this->db->limit($limit,$start);
	//$this->db->where('id', $id);
	$query = $this->db->get("users");
	//echo '<pre>';
	//var_dump($query->result_array());die;
	//echo '</pre>';
	if ($query->num_rows() > 0) {
	foreach ($query->result() as $row) {
	$data[] = $row;
	}

	return $data;
	}
	return false;
	}
	
}