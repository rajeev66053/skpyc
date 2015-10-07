<?php
class file_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		
		public function get_file($id = FALSE)
{
        if ($id === FALSE)
        {
                $query = $this->db->get('files');
                return $query->result_array();
        }

        $query = $this->db->get_where('files', array('id' => $id));
        return $query->row_array();
}

	public function set_file($name)
	{
		
		$data = array(
			'file_name' => $name['file_name'],
			'file_type' => $this->input->post('file_type'),
			'caption' => $this->input->post('caption'),
			'is_active' => $this->input->post('is_active'),
			'created_date' => date('Y-m-d')
			);
			
		//print_r($data);die;	

		return $this->db->insert('files', $data);
	}
	
	
	public function updatefile($id, $result)
	{
		
		 $this->db->where('id', $id);
		 
		$data = array(
			'file_name' => $result['file_name'],
			'file_type' => $this->input->post('file_type'),
			'caption' => $this->input->post('caption'),
			'is_active' => $this->input->post('is_active'),
			'created_date' => date('Y-m-d')
			);
			
		 
		 
		 $this->db->update('files',$data);
		// echo $this->db->last_qeury();die;
	}
	
	
	
	
	public function deletefile( $id )
	{
		$this->db->where('id', $id);
		$this->db->delete('files');
	}
	
	
	// Count all record of table "contact_info" in database.
	public function record_count() {
	return $this->db->count_all("files");
	}

	// Fetch data according to per_page limit.
	public function fetch_data($limit, $start) {
	$this->db->limit($limit, $start);
	$query = $this->db->get("files");
	if ($query->num_rows() > 0) {
	foreach ($query->result() as $row) {
	$data[] = $row;
	}

	return $data;
	}
	return false;
	}
	
}