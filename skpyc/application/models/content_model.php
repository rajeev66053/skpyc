<?php
class content_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		
		public function get_content($id = FALSE)
{
        if ($id === FALSE)
        {
                $query = $this->db->get('contents');
                return $query->result_array();
        }

        $query = $this->db->get_where('contents', array('id' => $id));
        return $query->row_array();
}

	public function set_content($name)
	{
	
		$session_data = $this->session->userdata('logged_in'); 
		$data = array(
			'title' => $this->input->post('title'),
			'type' => $this->input->post('type'),
			'sub_type' => $this->input->post('sub_type'),
			'alias_name' => $this->input->post('alias_name'),
			'parent_id' => $this->input->post('parent_id'),
			'content_order' => $this->input->post('content_order'),
			'short_content' => $this->input->post('short_content'),
			'full_content' => $this->input->post('full_content'),
			'img' => $name['img'],
			'is_active' => $this->input->post('is_active'),
			'created_date' => date('Y-m-d'),
			'created_by' => $session_data['username'],
			'page_title' => $this->input->post('page_title'),
			'page_description' => $this->input->post('page_description')
			);
		/*echo '<pre>';	
		print_r($data);
		echo '</pre>';die;*/

		return $this->db->insert('contents', $data);
	}
	
	
	public function updatecontent($id, $result)
	{
		
		 $this->db->where('id', $id);
		 
		 $data = array(
			'title' => $this->input->post('title'),
			'type' => $this->input->post('type'),
			'sub_type' => $this->input->post('sub_type'),
			'alias_name' => $this->input->post('alias_name'),
			'parent_id' => $this->input->post('parent_id'),
			'content_order' => $this->input->post('content_order'),
			'short_content' => $this->input->post('short_content'),
			'full_content' => $this->input->post('full_content'),
			'img' => $result['img'],
			'is_active' => $this->input->post('is_active'),
			'created_date' => date('Y-m-d'),
			'created_by' => $session_data['username'],
			'page_title' => $this->input->post('page_title'),
			'page_description' => $this->input->post('page_description')
			);
		 
		 
		 $this->db->update('contents',$data);
		// echo $this->db->last_qeury();die;
	}
	
	
	
	
	public function deletecontent( $id )
	{
		$this->db->where('id', $id);
		$this->db->delete('contents');
	}
	
	
	// Count all record of table "contact_info" in database.
	public function record_count() {
	return $this->db->count_all("contents");
	}

	// Fetch data according to per_page limit.
	public function fetch_data($limit, $start) {
	$this->db->limit($limit,$start);
	//$this->db->where('id', $id);
	$query = $this->db->get("contents");
	if ($query->num_rows() > 0) {
	foreach ($query->result() as $row) {
	$data[] = $row;
	}

	return $data;
	}
	return false;
	}
	
}