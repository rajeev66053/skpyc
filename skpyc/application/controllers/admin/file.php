<?php
class file extends CI_Controller {

        public function __construct()
        {
                parent::__construct();


			if(!$this->session->userdata('logged_in'))
			   
			    {
			      //If no session, redirect to login page
			      redirect('admin/login', 'refresh');
				}

                $this->load->model('file_model');
				$this->load->library('pagination');
				$this->load->helper('url');


        }

        public function index()
        {
			
			
			
				$data['files'] = $this->file_model->get_file();
				
      			//$session_data = $this->session->userdata('logged_in');
      			//$data['username'] = $session_data['username'];
				//$data['title'] = 'Users Details';
				
				
				/*$config = array();
				$config["base_url"] = $this->config->base_url().'admin/file/index';
				
				
				//$total_row = $this->users_model->record_count();
				// or 
				$total_row = $this->db->get('files')->num_rows();
								
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
				
				$data["results"] = $this->file_model->fetch_data($config["per_page"], $page); 
				*/
				// or 
				//$data["results"] =$this->db->get('users',$config["per_page"],$this->uri->segment(3));
				
				

				
				
				$this->load->view('admin/templates/header');
				$this->load->view('admin/file/index', $data);
				$this->load->view('admin/templates/footer');
        }
		
		public function create()
		{
			$this->load->helper('form');
			$this->load->helper('url');
			$this->load->library('form_validation');

			//$data['title'] = 'Create a new user';

			//$this->form_validation->set_rules('file_name', 'File Name', 'required');
			$this->form_validation->set_rules('file_type', 'File Type', 'required');
			$this->form_validation->set_rules('is_active', 'Is Active', 'required');
			if ($this->form_validation->run() === FALSE)
			{
								
				$this->load->view('admin/templates/header');
				$this->load->view('admin/file/create');
				$this->load->view('admin/templates/footer');

			}
			else
			{
				if($_FILES['file_name']['error']==0){
					
					$file_type=$this->input->post('file_type');
				
						$config['upload_path'] = './img/'.$file_type;
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
						$config['max_size']	= '1000';
						$config['max_width']  = '1024';
						$config['max_height']  = '768';
						$this->load->library('upload', $config);
						
						
						
						if ( ! $this->upload->do_upload('file_name'))
						{
							//var_dump($this->upload->display_errors());die;
				
							$error = array('error' => $this->upload->display_errors());
							
				
							$this->load->view('admin/templates/header');
							$this->load->view('admin/file/create', $error);
							$this->load->view('admin/templates/footer');
						}
						else
						{
							/*echo '<pre>';
							var_dump($_FILES);
							echo '</pre>';*/
							
							//$data = array('upload_data' => $this->upload->data('logo'));
							$data['file_name']=$_FILES['file_name']['name'];
							
							$this->file_model->set_file($data);
							
							redirect('admin/file', 'refresh');
				
						}
					}else{
						
						$data['file_name']="";
						
						$this->file_model->set_file($data);
						
						redirect('admin/file', 'refresh');
						
					}

			}
		}
		
		
		

        public function view($id = NULL)
		{
			
				
				$data['file'] = $this->file_model->get_file($id);
				
				if (empty($data['file']))
				{
						show_404();
				}

				//$data['title'] = $data['users']['username'];

				$this->load->view('admin/templates/header');
				$this->load->view('admin/file/view', $data);
				$this->load->view('admin/templates/footer');
		}
		
		 public function edit($id = 0)
		{
			
				$this->load->helper('form');
				$this->load->helper('url');
				$this->load->library('form_validation');
				
				//$this->form_validation->set_rules('file_name', 'File Name', 'required');
			$this->form_validation->set_rules('file_type', 'File Type', 'required');
			$this->form_validation->set_rules('is_active', 'Is Active', 'required');
				
				if( $this->input->post() ){ #if form submitted
				 
				 
				 
				 //print_r($data);die;
				 
					if ($this->form_validation->run() === FALSE)
					{
						$data['file']=$this->input->post();
						
						//$data['title'] = 'Edit a user';
		
						$this->load->view('admin/templates/header');
						$this->load->view('admin/file/edit', $data);
						$this->load->view('admin/templates/footer');

					}
					else
					{
						if($_FILES['file_name']['error']==0){
						
							$file_type=$this->input->post('file_type');
					
							$config['upload_path'] = './img/'.$file_type;
							$config['allowed_types'] = 'gif|jpg|png|jpeg';
							$config['max_size']	= '1000';
							$config['max_width']  = '1024';
							$config['max_height']  = '768';
							$this->load->library('upload', $config);
							
							
							
							if ( ! $this->upload->do_upload('file_name'))
							{
					
								//$error = array('error' => $this->upload->display_errors());
									
									$this->session->set_flashdata('message', $this->upload->display_errors());
									
									$id     = $this->input->post('id'); 
									
									redirect('admin/file/edit/'.$id);
							}
							else
							{
								$data['file_name']=$_FILES['file_name']['name'];
								
								$id     = $this->input->post('id');
								
								$previous_image=$this->input->post('prev_image');
								
								$this->file_model->updatefile($id ,$data);
								
								redirect('admin/file', 'refresh');
					
							}
						}else{
							
							
							$id     = $this->input->post('id');
							$data['file_name']=$this->input->post('prev_image');
							
							$this->file_model->updatefile($id ,$data);
							
							redirect('admin/file', 'refresh');
							
						}
					
					}
					
				}else{
				
					$data['file'] = $this->file_model->get_file($id);
					
					//var_dump($data);die;
					
					if (empty($data['file']))
					{
							show_404();
					}
					
					//$data['title'] = 'Edit a user';
	
					$this->load->view('admin/templates/header');
					$this->load->view('admin/file/edit', $data);
					$this->load->view('admin/templates/footer');
				}
		}
		
		 public function delete($id = NULL)
		 {
			 $this->file_model->deletefile( $id );
		 }
		 
		 
		
}