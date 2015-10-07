<?php
class subscribe_for_newsletter extends CI_Controller {

        public function __construct()
        {
                parent::__construct();


			if(!$this->session->userdata('logged_in'))
			   
			    {
			      //If no session, redirect to login page
			      redirect('admin/login', 'refresh');
				}




                $this->load->model('subscribe_for_newsletter_model');
				$this->load->library('pagination');
				$this->load->helper('url');


        }

        public function index()
        {
				$data['subscribe_for_newsletter'] = $this->subscribe_for_newsletter_model->get_subscribe_for_newsletter();
				
				
				
      			$session_data = $this->session->userdata('logged_in');
      			$data['username'] = $session_data['username'];
				//$data['title'] = 'subscribe_for_newsletter Details';
				
				
				$config = array();
				$config["base_url"] = $this->config->base_url().'admin/subscribe_for_newsletter/index';
				
				
				//$total_row = $this->subscribe_for_newsletter_model->record_count();
				// or 
				$total_row = $this->db->get('subscribe_for_newsletter')->num_rows();
								
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
				
				
				$data["results"] = $this->subscribe_for_newsletter_model->fetch_data($config["per_page"], $page); 
				
				//echo '<pre>';
				//var_dump($data["results"]);
				//echo '</pre>';die;
				// or 
				//$data["results"] =$this->db->get('subscribe_for_newsletter',$config["per_page"],$this->uri->segment(3));
				

				$this->load->view('admin/templates/header');
				$this->load->view('admin/subscribe_for_newsletter/index', $data);
				$this->load->view('admin/templates/footer');
        }
		
		public function create()
		{
			$this->load->helper('form');
			$this->load->helper('url');
			$this->load->library('form_validation');

			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			if ($this->form_validation->run() === FALSE)
			{
								
				$this->load->view('admin/templates/header');
				$this->load->view('admin/subscribe_for_newsletter/create');
				$this->load->view('admin/templates/footer');

			}
			else
			{
				
				
				
				//sendMail();
				
				$this->subscribe_for_newsletter_model->set_subscribe_for_newsletter();
				//$this->load->view('subscribe_for_newsletter/success');
				redirect('admin/subscribe_for_newsletter', 'refresh');
				
				
			}
		}
		
		
		

        public function view($id = NULL)
		{
			
				
				$data['subscribe_for_newsletter'] = $this->subscribe_for_newsletter_model->get_subscribe_for_newsletter($id);
				
				if (empty($data['subscribe_for_newsletter']))
				{
						show_404();
				}

				//$data['title'] = $data['subscribe_for_newsletter']['username'];

				$this->load->view('admin/templates/header');
				$this->load->view('admin/subscribe_for_newsletter/view', $data);
				$this->load->view('admin/templates/footer');
		}
		
		 public function edit($id = 0)
		{
			
				$this->load->helper('form');
				$this->load->helper('url');
				$this->load->library('form_validation');
				
				$this->form_validation->set_rules('email', 'Email', 'required');
				
				if( $this->input->post() ){ #if form submitted
				 
				 
				 
				 //print_r($data);die;
				 
					if ($this->form_validation->run() === FALSE)
					{
						$data['subscribe_for_newsletter']=$this->input->post();
						
		
						$this->load->view('admin/templates/header');
						$this->load->view('admin/subscribe_for_newsletter/edit', $data);
						$this->load->view('admin/templates/footer');

					}
					else
					{
						

					$id     = $this->input->post('id'); #to be used in the where clause for updation
					//var_dump($id);die;
					
					/*$data['id']         	= $id;
					$data['username']    	= $this->input->post('username');
					$data['password']     	= $this->input->post('password');*/
					
					 $data['subscribe_for_newsletter']=$this->input->post();
					
					//print_r($data);die;
					
					
					/*
						Retrieve all the post variables in the $data and send to model for updation
					*/
					$this->subscribe_for_newsletter_model->updatesubscribe($id ,$data);
					redirect('admin/subscribe_for_newsletter/');
					}
					
				}else{
				
					$data['subscribe_for_newsletter'] = $this->subscribe_for_newsletter_model->get_subscribe_for_newsletter($id);
					
					//var_dump($data);die;
					
					if (empty($data['subscribe_for_newsletter']))
					{
							show_404();
					}
					
					$data['title'] = 'Edit a user';
	
					$this->load->view('admin/templates/header');
					$this->load->view('admin/subscribe_for_newsletter/edit', $data);
					$this->load->view('admin/templates/footer');
				}
		}
		
		 public function delete($id = NULL)
		 {
			 $this->subscribe_for_newsletter_model->deletesubscribe( $id );
			 
					redirect('admin/subscribe_for_newsletter/');
		 }
		 
		
		
}