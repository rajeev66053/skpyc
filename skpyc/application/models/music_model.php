<?php
class music_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		
		public function get_music($id = FALSE)
{
        if ($id === FALSE)
        {
                $query = $this->db->get('musics');
                return $query->result_array();
        }

        $query = $this->db->get_where('musics', array('id' => $id));
        return $query->row_array();
}

	public function set_music()
	{
		
		$data = array(
			'title' => $this->input->post('title'),
			'link' => $this->input->post('link'),
			'type' => $this->input->post('type'),
			'lyrics' => $this->input->post('lyrics'),
			'is_active' => $this->input->post('is_active')
			);
			
		//print_r($data);die;	

		return $this->db->insert('musics', $data);
	}
	
	
	public function updatemusic($id)
	{
		
		 $this->db->where('id', $id);
		 
		$data = array(
			'title' =>$this->input->post('title'),
			'link' => $this->input->post('link'),
			'type' => $this->input->post('type'),
			'lyrics' => $this->input->post('lyrics'),
			'is_active' => $this->input->post('is_active')
			);
			
		 
		 
		 $this->db->update('musics',$data);
		// echo $this->db->last_qeury();die;
	}
	
	
	
	
	public function deletemusic( $id )
	{
		$this->db->where('id', $id);
		$this->db->delete('musics');
	}
	
	
	// Count all record of table "contact_info" in database.
	public function record_count() {
	return $this->db->count_all("musics");
	}

	// Fetch data according to per_page limit.
	public function fetch_data($limit, $start) {
	$this->db->limit($limit, $start);
	$query = $this->db->get("musics");
	if ($query->num_rows() > 0) {
	foreach ($query->result() as $row) {
	$data[] = $row;
	}

	return $data;
	}
	return false;
	}
	
}