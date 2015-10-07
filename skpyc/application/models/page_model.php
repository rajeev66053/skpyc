<?php
class page_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		
		
		public function get_contents()
		{
			
			
				//$query ="select * from contents where type='header' and is_active=1";
				/*$query =$this->db
						->select('*')
						->where('type', 'header')
						->order_by('position','asc')
						->get('contents')
						->result_array();*/
						
				$query['banner'] =$this->db
						->select('*')
						->where('image_type', 'banner')
						->where('is_active', 1)
						->get('images')
						->result_array();
						
				$query['body_top'] =$this->db
						->select('*')
						->where('type', 'body_top')
						->where('is_active', 1)
						->get('contents')
						->result_array();
						
				$query['body_main'] =$this->db
						->select('*')
						->where('type', 'body_main')
						->where('is_active', 1)
						->order_by('position','asc')
						->get('contents')
						->result_array();
						
				$query['body_bottom'] =$this->db
						->select('*')
						->where('type', 'body_bottom')
						->where('is_active', 1)
						->order_by('position','asc')
						->get('contents')
						->result_array();
						
				$query['footer_left'] =$this->db
						->select('*')
						->where('type', 'footer')
						->where('sub_type', 'left')
						->where('is_active', 1)
						->order_by('position','asc')
						->get('contents')
						->result_array();
						
				$query['footer_mid'] =$this->db
						->select('*')
						->where('type', 'footer')
						->where('sub_type', 'middle')
						->where('is_active', 1)
						->order_by('position','asc')
						->get('contents')
						->result_array();
						
				//$this->db->get('users');
				/*$query['banner'] = $this->db->get_where('images', array('image_type' =>'banner','is_active'=>1));
				$query['body_top'] = $this->db->get_where('contents', array('type' =>'body_top','is_active'=>1));
				$query['body_main'] = $this->db->get_where('contents', array('type' =>'body_main','is_active'=>1));
				$query['body_bottom'] = $this->db->get_where('contents', array('type' =>'body_bottom','is_active'=>1));
				$query['footer'] = $this->db->get_where('contents', array('type' =>'footer','is_active'=>1));*/
				
				
		}

		

	public function set_users()
	{
		
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'active' => 1);
			
		//print_r($data);die;	

		return $this->db->insert('users', $data);
	}
	
	
	public function updateuser($id, $result)
	{
		//print_r($result);die;
		
		 $this->db->where('id', $id);
		 
		 $data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'active' => 1);
		 
		 
		 $this->db->update('users',$data);
		// echo $this->db->last_qeury();die;
	}
	
	public function deleteuser( $id )
	{
		$this->db->where('id', $id);
		$this->db->delete('users');
	}
	
	
	/*function GetAutocomplete($options = array())
    {
        $this->db->select('title')
				->where('is_active', 1)
				->order_by('position','asc');
        $this->db->like('title', $options['keyword'], 'both'); // Produces: WHERE title LIKE '%match%'
        $query = $this->db->get('contents');
        return $query->result();
		
		
    }*/
	
	function get_autocomplete($search_data){
		
        $this->db->select('title')
				->where('is_active', 1)
				->like('title',$search_data, 'both')
				->order_by('position','asc');// Produces: WHERE title LIKE '%match%'
		 return $this->db->get('contents',10);
		//print_r($query->num_rows());die;
		
		/*if($query->num_rows() > 0){
		  foreach ($query->result_array() as $row){
			 $row_set[] = htmlentities(stripslashes($row['title']));
		  }
		  
		  echo json_encode($row_set); //format the array into json data
		}*/
  }
	
	
	// Count all record of table "contact_info" in database.
	public function record_count() {
	return $this->db->count_all("users");
	}

	// Fetch data according to per_page limit.
	public function fetch_data($limit, $id) {
	$this->db->limit($limit);
	$this->db->where('id', $id);
	$query = $this->db->get("users");
	if ($query->num_rows() > 0) {
	foreach ($query->result() as $row) {
	$data[] = $row;
	}

	return $data;
	}
	return false;
	}
	
}