<?php
class subscribe_for_newsletter_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		
		public function get_subscribe_for_newsletter($id = FALSE)
{
        if ($id === FALSE)
        {
                $query = $this->db->get('subscribe_for_newsletter');
                return $query->result_array();
        }

        $query = $this->db->get_where('subscribe_for_newsletter', array('id' => $id));
        return $query->row_array();
}

	public function set_subscribe_for_newsletter()
	{
		
		$data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'phone' =>$this->input->post('phone'),
			'message' => $this->input->post('message'),
			'date'=>date('Y-m-d')
			);
			
		//print_r($data);die;	

		return $this->db->insert('subscribe_for_newsletter', $data);
	}
	
	
	public function updatesubscribe_for_newsletter($id, $result)
	{
		
		 $this->db->where('id', $id);
		 
		 $data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'phone' =>$this->input->post('phone'),
			'message' => $this->input->post('message'),
			'date'=>date('Y-m-d')
			);
		 
		 
		 $this->db->update('subscribe_for_newsletter',$data);
		// echo $this->db->last_qeury();die;
	}
	
	
	
	
	public function deletesubscribe_for_newsletter( $id )
	{
		$this->db->where('id', $id);
		$this->db->delete('subscribe_for_newsletter');
	}
	
	
	// Count all record of table "contact_info" in database.
	public function record_count() {
	return $this->db->count_all("subscribe_for_newsletter");
	}

	// Fetch data according to per_page limit.
	public function fetch_data($limit, $start) {
	
		
	$this->db->limit($limit,$start);
	//$this->db->where('id', $id);
	$query = $this->db->get("subscribe_for_newsletter");
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