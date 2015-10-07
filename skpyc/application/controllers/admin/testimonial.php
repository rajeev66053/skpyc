<?php
class testimonial extends CI_Controller {

        public function __construct()
        {
                parent::__construct();


			if(!$this->session->userdata('logged_in'))
			   
			    {
			      //If no session, redirect to login page
			      redirect('admin/login', 'refresh');
				}

                $this->load->model('testimonial_model');
				$this->load->library('pagination');
				$this->load->helper('url');


        }

        public function index()
        {
			
			
			
				$data['testimonials'] = $this->testimonial_model->get_testimonial();
				
      			//$session_data = $this->session->userdata('logged_in');
      			//$data['username'] = $session_data['username'];
				//$data['title'] = 'Users Details';
				
				/*
				$config = array();
				$config["base_url"] = $this->config->base_url().'admin/testimonial/index';
				
				
				//$total_row = $this->users_model->record_count();
				// or 
				$total_row = $this->db->get('testimonials')->num_rows();
								
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
				
				$data["results"] = $this->testimonial_model->fetch_data($config["per_page"], $page); 
				*/
				// or 
				//$data["results"] =$this->db->get('users',$config["per_page"],$this->uri->segment(3));
				
				

				
				
				$this->load->view('admin/templates/header');
				$this->load->view('admin/testimonial/index', $data);
				$this->load->view('admin/templates/footer');
        }
		
		public function create()
		{
			$this->load->helper('form');
			$this->load->helper('url');
			$this->load->library('form_validation');

			//$data['title'] = 'Create a new user';

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('message', 'Message', 'required');
			//$this->form_validation->set_rules('img', 'Image', 'required');
			//$this->form_validation->set_rules('created_date', 'Created Date', 'required');
			$this->form_validation->set_rules('is_active', 'Is Active', 'required');
			if ($this->form_validation->run() === FALSE)
			{
								
				$this->load->view('admin/templates/header');
				$this->load->view('admin/testimonial/create');
				$this->load->view('admin/templates/footer');

			}
			else
			{
					
					$this->testimonial_model->set_testimonial();
					redirect('admin/testimonial', 'refresh');
			}
		}
		
		
		

        public function view($id = NULL)
		{
			
				
				$data['testimonial'] = $this->testimonial_model->get_testimonial($id);
				
				if (empty($data['testimonial']))
				{
						show_404();
				}

				//$data['title'] = $data['users']['username'];

				$this->load->view('admin/templates/header');
				$this->load->view('admin/testimonial/view', $data);
				$this->load->view('admin/templates/footer');
		}
		
		 public function edit($id = 0)
		{
			
				$this->load->helper('form');
				$this->load->helper('url');
				$this->load->library('form_validation');
				
				$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('message', 'Message', 'required');
			$this->form_validation->set_rules('is_active', 'Is Active', 'required');
				
				if( $this->input->post() ){ #if form submitted
				 
				 
				 
				 //print_r($data);die;
				 
					if ($this->form_validation->run() === FALSE)
					{
						$data['testimonial']=$this->input->post();
						
						//$data['title'] = 'Edit a user';
		
						$this->load->view('admin/templates/header');
						$this->load->view('admin/testimonial/edit', $data);
						$this->load->view('admin/templates/footer');

					}
					else
					{
						
						$id     = $this->input->post('id');
						
						$this->testimonial_model->updatetestimonial($id ,$data);
						redirect('admin/testimonial/');
							
							
						
					}
					
				}else{
				
					$data['testimonial'] = $this->testimonial_model->get_testimonial($id);
					
					//var_dump($data);die;
					
					if (empty($data['testimonial']))
					{
							show_404();
					}
					
					//$data['title'] = 'Edit a user';
	
					$this->load->view('admin/templates/header');
					$this->load->view('admin/testimonial/edit', $data);
					$this->load->view('admin/templates/footer');
				}
		}
		
		 public function delete($id = NULL)
		 {
			 $this->testimonial_model->deletetestimonial( $id );
		 }
		 
		 
		
}