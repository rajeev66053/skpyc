<?php
class music extends CI_Controller {

        public function __construct()
        {
                parent::__construct();


			if(!$this->session->userdata('logged_in'))
			   
			    {
			      //If no session, redirect to login page
			      redirect('admin/login', 'refresh');
				}

                $this->load->model('music_model');
				$this->load->library('pagination');
				$this->load->helper('url');
				
				
				
				$this->load->library('ckeditor');
				$this->load->library('ckfinder');
				
				
				$this->ckeditor->basePath = base_url().'asset/ckeditor/';
				$this->ckeditor->config['toolbar'] = array(
								array( 'Source', '-', 'Bold', 'Italic', 'Underline', '-','Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo','-','NumberedList','BulletedList' )
																	);
				$this->ckeditor->config['language'] = 'it';
				$this->ckeditor->config['width'] = '730px';
				$this->ckeditor->config['height'] = '300px';   


        }

        public function index()
        {
			
			
			
				$data['musics'] = $this->music_model->get_music();
				
      			//$session_data = $this->session->userdata('logged_in');
      			//$data['username'] = $session_data['username'];
				//$data['title'] = 'Users Details';
				
				
				/*$config = array();
				$config["base_url"] = $this->config->base_url().'admin/music/index';
				
				
				//$total_row = $this->users_model->record_count();
				// or 
				$total_row = $this->db->get('musics')->num_rows();
								
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
				
				$data["results"] = $this->music_model->fetch_data($config["per_page"], $page); 
				*/
				// or 
				//$data["results"] =$this->db->get('users',$config["per_page"],$this->uri->segment(3));
				
				

				
				
				$this->load->view('admin/templates/header');
				$this->load->view('admin/music/index', $data);
				$this->load->view('admin/templates/footer');
        }
		
		public function create()
		{
			$this->load->helper('form');
			$this->load->helper('url');
			$this->load->library('form_validation');

			//$data['title'] = 'Create a new user';

			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('link', 'Link', 'required');
			$this->form_validation->set_rules('type', 'Type', 'required');
			if ($this->form_validation->run() === FALSE)
			{
								
				$this->load->view('admin/templates/header');
				$this->load->view('admin/music/create');
				$this->load->view('admin/templates/footer');

			}
			else
			{
				$this->music_model->set_music();
				redirect('admin/music', 'refresh');

			}
		}
		
		
		

        public function view($id = NULL)
		{
			
				
				$data['music'] = $this->music_model->get_music($id);
				
				if (empty($data['music']))
				{
						show_404();
				}

				//$data['title'] = $data['users']['username'];

				$this->load->view('admin/templates/header');
				$this->load->view('admin/music/view', $data);
				$this->load->view('admin/templates/footer');
		}
		
		 public function edit($id = 0)
		{
			
				$this->load->helper('form');
				$this->load->helper('url');
				$this->load->library('form_validation');
				
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('link', 'Link', 'required');
			$this->form_validation->set_rules('type', 'Type', 'required');
				
				if( $this->input->post() ){ #if form submitted
				 
				 
				 
				 //print_r($data);die;
				 
					if ($this->form_validation->run() === FALSE)
					{
						$data['music']=$this->input->post();
						
						//$data['title'] = 'Edit a user';
		
						$this->load->view('admin/templates/header');
						$this->load->view('admin/music/edit', $data);
						$this->load->view('admin/templates/footer');

					}
					else
					{
							$id     = $this->input->post('id');
							
							$this->music_model->updatemusic($id);
							
							redirect('admin/music', 'refresh');
							
					
					}
					
				}else{
				
					$data['music'] = $this->music_model->get_music($id);
					
					//var_dump($data);die;
					
					if (empty($data['music']))
					{
							show_404();
					}
					
					//$data['title'] = 'Edit a user';
	
					$this->load->view('admin/templates/header');
					$this->load->view('admin/music/edit', $data);
					$this->load->view('admin/templates/footer');
				}
		}
		
		 public function delete($id = NULL)
		 {
			 $this->music_model->deletemusic( $id );
		 }
		 
		 
		
}