<?php
class testimonial_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		
		public function get_testimonial($id = FALSE)
{
        if ($id === FALSE)
        {
                $query = $this->db->get('testimonials');
                return $query->result_array();
        }

        $query = $this->db->get_where('testimonials', array('id' => $id));
        return $query->row_array();
}

	public function set_testimonial($name=null)
	{
		
		$data = array(
			'name' => $this->input->post('name'),
			'message' => $this->input->post('message'),
			'is_active' => $this->input->post('is_active'),
			'testimonial_order'=>$this->input->post('testimonial_order'),
			'created_date'=>date('Y-m-d')
			);
			
		//print_r($data);die;	

		return $this->db->insert('testimonials', $data);
	}
	
	
	public function updatetestimonial($id, $result)
	{
		
		 $this->db->where('id', $id);
		 
		 $data = array(
			'name' => $this->input->post('name'),
			'message' => $this->input->post('message'),
			'is_active' => $this->input->post('is_active'),
			'testimonial_order'=>$this->input->post('testimonial_order'),
			'created_date' => date('Y-m-d')
			);
		 
		 
		 $this->db->update('testimonials',$data);
		// echo $this->db->last_qeury();die;
	}
	
	
	
	
	public function deletetestimonial( $id )
	{
		$this->db->where('id', $id);
		$this->db->delete('testimonials');
	}
	
	
	// Count all record of table "contact_info" in database.
	public function record_count() {
	return $this->db->count_all("testimonials");
	}

	// Fetch data according to per_page limit.
	public function fetch_data($limit, $start) {
	$this->db->limit($limit,$start);
	$query = $this->db->get("testimonials");
	if ($query->num_rows() > 0) {
	foreach ($query->result() as $row) {
	$data[] = $row;
	}

	return $data;
	}
	return false;
	}
	
}