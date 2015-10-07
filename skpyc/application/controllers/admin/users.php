<?php
class Users extends CI_Controller {

        public function __construct()
        {
                parent::__construct();


			if(!$this->session->userdata('logged_in'))
			   
			    {
					
					
					
			      //If no session, redirect to login page
			      redirect('admin/login', 'refresh');
				}


                $this->load->model('user_model');
				$this->load->library('pagination');
				$this->load->helper('url');


        }

        public function index()
        {
				$data['users'] = $this->user_model->get_users();
				
				/*echo '<pre>';
				var_dump($data["users"]);
				echo '</pre>';die;*/
					
				
      			$session_data = $this->session->userdata('logged_in');
      			$data['username'] = $session_data['username'];
				//$data['title'] = 'Users Details';
				
				/*
				$config = array();
				$config["base_url"] = $this->config->base_url().'admin/users/index';
				
				
				//$total_row = $this->user_model->record_count();
				// or 
				$total_row = $this->db->get('users')->num_rows();
								
				$config["total_rows"] = $total_row;
				$config["per_page"] = 1;
				$config['use_page_numbers'] = TRUE;
				$config['num_links'] = 2;
				$config['cur_tag_open'] = '&nbsp;<a class="current">';
				$config['cur_tag_close'] = '</a>';
				$config['next_link'] = 'Next';
				$config['prev_link'] = 'Previous';
				

			
				
				$this->pagination->initialize($config);
				if($this->uri->segment(4)){
				$page = ($this->uri->segment(4)) ;
				}
				else{
				$page = 1;
				}
				
				
				$data["results"] = $this->user_model->fetch_data($config["per_page"], $page); */
				
				//echo '<pre>';
				//var_dump($data["results"]);
				//echo '</pre>';die;
				// or 
				//$data["results"] =$this->db->get('users',$config["per_page"],$this->uri->segment(3));
				

				$this->load->view('admin/templates/header');
				$this->load->view('admin/users/index', $data);
				$this->load->view('admin/templates/footer');
        }
		
		public function create()
		{
			$this->load->helper('form');
			$this->load->helper('url');
			$this->load->library('form_validation');

			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			
			$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[10]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[10]');
			$this->form_validation->set_rules('role', 'Role', 'required');
			$this->form_validation->set_rules('is_active', 'Is Active', 'required');
			if ($this->form_validation->run() === FALSE)
			{
								
				$this->load->view('admin/templates/header');
				$this->load->view('admin/users/create');
				$this->load->view('admin/templates/footer');

			}
			else
			{
				
				
				
				//sendMail();
				
				$this->user_model->set_users();
				//$this->load->view('users/success');
				redirect('admin/users', 'refresh');
				
				
			}
		}
		
		
		

        public function view($id = NULL)
		{
			
				
				$data['users'] = $this->user_model->get_users($id);
				
				if (empty($data['users']))
				{
						show_404();
				}

				//$data['title'] = $data['users']['username'];

				$this->load->view('admin/templates/header');
				$this->load->view('admin/users/view', $data);
				$this->load->view('admin/templates/footer');
		}
		
		 public function edit($id = 0)
		{
			
				$this->load->helper('form');
				$this->load->helper('url');
				$this->load->library('form_validation');
				
				$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[10]|is_unique[users.username]');
				$this->form_validation->set_rules('role', 'Role', 'required');
				$this->form_validation->set_rules('is_active', 'Is Active', 'required');
				
				if( $this->input->post() ){ #if form submitted
				 
				 
				 
				 //print_r($data);die;
				 
					if ($this->form_validation->run() === FALSE)
					{
						$data['users']=$this->input->post();
						
		
						$this->load->view('admin/templates/header');
						$this->load->view('admin/users/edit', $data);
						$this->load->view('admin/templates/footer');

					}
					else
					{
						

					$id     = $this->input->post('id'); #to be used in the where clause for updation
					//var_dump($id);die;
					
					/*$data['id']         	= $id;
					$data['username']    	= $this->input->post('username');
					$data['password']     	= $this->input->post('password');*/
					
					 $data['users']=$this->input->post();
					
					//print_r($data);die;
					
					
					/*
						Retrieve all the post variables in the $data and send to model for updation
					*/
					$this->user_model->updateuser($id ,$data['users']);
					redirect('admin/users/');
					}
					
				}else{
				
					$data['users'] = $this->user_model->get_users($id);
					
					//var_dump($data);die;
					
					if (empty($data['users']))
					{
							show_404();
					}
					
					$data['title'] = 'Edit a user';
	
					$this->load->view('admin/templates/header');
					$this->load->view('admin/users/edit', $data);
					$this->load->view('admin/templates/footer');
				}
		}
		
		 public function delete($id = NULL)
		 {
			 $this->user_model->deleteuser( $id );
			 
					redirect('admin/users/');
		 }
		 
		 
		 
		  public function change_password()
		{
			
				$this->load->helper('form');
				$this->load->helper('url');
				$this->load->library('form_validation');
				
				$this->form_validation->set_rules('old_password', 'Old Password', 'required');
				$this->form_validation->set_rules('new_password', 'New Password', 'required|matches[confirm_password]');
				$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required');
				
				if( $this->input->post() ){ #if form submitted
				 
				// print_r($data);die;
				 
					if ($this->form_validation->run() === FALSE)
					{
						
						$data['passwords']=$this->input->post();
						
						//$data['title'] = 'Edit a user';
		
						$this->load->view('admin/templates/header');
						$this->load->view('admin/users/change_password', $data);
						$this->load->view('admin/templates/footer');

					}
					else
					{
						
						$session_data = $this->session->userdata('logged_in');
      					$id = $session_data['id'];
					
					/*$data['id']         	= $id;
					$data['username']    	= $this->input->post('username');
					$data['password']     	= $this->input->post('password');*/
					
					 $data['passwords']=$this->input->post();
					
					//print_r($data);die;
					
					
					/*
						Retrieve all the post variables in the $data and send to model for updation
					*/
					$this->user_model->updatepassword($id ,$data['passwords']);
					redirect('admin/users/');
					}
					
				}else{
	
					$this->load->view('admin/templates/header');
					$this->load->view('admin/users/change_password');
					$this->load->view('admin/templates/footer');
				}
		}
		 
		

		
}