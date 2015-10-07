<?php
class feedback_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		
		public function get_feedback($id = FALSE)
{
        if ($id === FALSE)
        {
                $query = $this->db->get('feedbacks');
                return $query->result_array();
        }

        $query = $this->db->get_where('feedbacks', array('id' => $id));
        return $query->row_array();
}

	public function set_feedback()
	{
		
		$data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'phone' =>$this->input->post('phone'),
			'message' => $this->input->post('message'),
			'feedback_date'=>date('Y-m-d')
			);
			
		//print_r($data);die;	

		return $this->db->insert('feedbacks', $data);
	}
	
	
	public function updatefeedback($id, $result)
	{
		
		 $this->db->where('id', $id);
		 
		 $data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'phone' =>$this->input->post('phone'),
			'message' => $this->input->post('message'),
			'feedback_date'=>date('Y-m-d')
			);
		 
		 
		 $this->db->update('feedbacks',$data);
		// echo $this->db->last_qeury();die;
	}
	
	
	
	
	public function deletefeedback( $id )
	{
		$this->db->where('id', $id);
		$this->db->delete('feedbacks');
	}
	
	
	// Count all record of table "contact_info" in database.
	public function record_count() {
	return $this->db->count_all("feedbacks");
	}

	// Fetch data according to per_page limit.
	public function fetch_data($limit, $start) {
	
		
	$this->db->limit($limit,$start);
	//$this->db->where('id', $id);
	$query = $this->db->get("feedbacks");
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