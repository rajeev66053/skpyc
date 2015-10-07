<?php
class globalsetting_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		
		public function get_setting($id = FALSE)
{
        if ($id === FALSE)
        {
                $query = $this->db->get('global_settings');
                return $query->result_array();
        }

        $query = $this->db->get_where('global_settings', array('id' => $id));
        return $query->row_array();
}

	public function set_setting($name)
	{
				
		$data = array(
			'logo' =>$name['logo'],
			'mail_to' => $this->input->post('mail_to')
			);
			
		//print_r($data);die;	

		return $this->db->insert('global_settings', $data);
	}
	
	
	public function updatesetting($id, $name)
	{
		
		
		
		 $this->db->where('id', $id);
		 
		 $data = array(
			'logo' => $name['logo'],
			'mail_to' => $this->input->post('mail_to')
			);
		 
		 
		 $this->db->update('global_settings',$data);
		// echo $this->db->last_qeury();die;
	}
	
	
	
	
	public function deletesetting( $id )
	{
		$this->db->where('id', $id);
		$this->db->delete('global_settings');
	}

	// Count all record of table "contact_info" in database.
	public function record_count() {
	return $this->db->count_all("global_settings");
	}

	// Fetch data according to per_page limit.
	public function fetch_data($limit, $start) {
	$this->db->limit($limit, $start);
	$query = $this->db->get("global_settings");
	if ($query->num_rows() > 0) {
	foreach ($query->result() as $row) {
	$data[] = $row;
	}

	
				
				
	return $data;
	}
	return false;
	}
	
	
	
	
}