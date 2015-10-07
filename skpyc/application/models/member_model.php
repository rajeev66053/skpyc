<?php
class member_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		
		public function get_member($id = FALSE)
{
        if ($id === FALSE)
        {
                $query = $this->db->get('members');
                return $query->result_array();
        }

        $query = $this->db->get_where('members', array('id' => $id));
        return $query->row_array();
}

	public function set_member($name)
	{
				
		$data = array(
			
			'name' => $this->input->post('name'),
			'designation' => $this->input->post('designation'),
			'profile_image'=>$name['profile_image'],
			'is_active' => $this->input->post('is_active'),
			'created_date' =>date('Y-m-d')
			);
			
		//print_r($data);die;	

		return $this->db->insert('members', $data);
	}
	
	
	public function updatemember($id, $name)
	{
		
		 $this->db->where('id', $id);
		 
		$data = array(
			'name' => $this->input->post('name'),
			'designation' => $this->input->post('designation'),
			'profile_image' =>$name['profile_image'],
			'is_active' => $this->input->post('is_active'),
			'created_date' =>date('Y-m-d')
			);
		 
		 
		 $this->db->update('members',$data);
		// echo $this->db->last_qeury();die;
	}
	
	
	
	
	public function deletemember( $id )
	{
		$this->db->where('id', $id);
		$this->db->delete('members');
	}

	// Count all record of table "contact_info" in database.
	public function record_count() {
	return $this->db->count_all("members");
	}

	// Fetch data according to per_page limit.
	public function fetch_data($limit, $start) {
	$this->db->limit($limit, $start);
	$query = $this->db->get("members");
	if ($query->num_rows() > 0) {
	foreach ($query->result() as $row) {
	$data[] = $row;
	}

	
				
				
	return $data;
	}
	return false;
	}
	
	
	
	
}