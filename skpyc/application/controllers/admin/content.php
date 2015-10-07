<?php
class content extends CI_Controller {

        public function __construct()
        {
                parent::__construct();

			if(!$this->session->userdata('logged_in'))
			   
			    {
			      //If no session, redirect to login page
			      redirect('admin/login', 'refresh');
				}

                $this->load->model('content_model');
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
				
				//Add Ckfinder to Ckeditor
				//$this->ckfinder->SetupCKEditor($this->ckeditor,'../../asset/ckfinder/');
				
			


        }

        public function index()
        {
			
			
			
				$data['contents'] = $this->content_model->get_content();
				
				//echo '<pre>';
				//print_r($data['content']);
				//echo '</pre>';die;
				
				
      			//$session_data = $this->session->userdata('logged_in');
      			//$data['username'] = $session_data['username'];
				//$data['title'] = 'Users Details';
				
				
			/*	$config = array();
				$config["base_url"] = $this->config->base_url().'admin/content/index';
				
				
				//$total_row = $this->users_model->record_count();
				// or 
				$total_row = $this->db->get('contents')->num_rows();
								
				$config["total_rows"] = $total_row;
				$config["per_page"] = 1;
				$config['use_page_numbers'] = TRUE;
				$config['num_links'] = 5;
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
				
				$data["results"] = $this->content_model->fetch_data($config["per_page"], $page); 
				*/
				// or 
				//$data["results"] =$this->db->get('users',$config["per_page"],$this->uri->segment(3));
				
				

				
				
				$this->load->view('admin/templates/header');
				$this->load->view('admin/content/index', $data);
				$this->load->view('admin/templates/footer');
        }
		
		public function create()
		{
			$this->load->helper('form');
			$this->load->helper('url');
			$this->load->library('form_validation');

			//$data['title'] = 'Create a new user';

			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('type', 'Type', 'required');
			$this->form_validation->set_rules('alias_name', 'Alias Name', 'required');
			$this->form_validation->set_rules('position', 'Position', 'required');
			$this->form_validation->set_rules('is_active', 'Is Active', 'required');
			if ($this->form_validation->run() === FALSE)
			{
								
				$this->load->view('admin/templates/header');
				$this->load->view('admin/content/create');
				$this->load->view('admin/templates/footer');

			}
			else
			{
				if($_FILES['img']['error']==0){
					
					
				
						$config['upload_path'] = './img';
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
						$config['max_size']	= '1000';
						$config['max_width']  = '1024';
						$config['max_height']  = '768';
						$this->load->library('upload', $config);
						
						
						
						if ( ! $this->upload->do_upload('img'))
						{
							//var_dump($this->upload->display_errors());die;
				
							$error = array('error' => $this->upload->display_errors());
							
				
							$this->load->view('admin/templates/header');
							$this->load->view('admin/content/create', $error);
							$this->load->view('admin/templates/footer');
						}
						else
						{
							/*echo '<pre>';
							var_dump($_FILES);
							echo '</pre>';*/
							
							//$data = array('upload_data' => $this->upload->data('logo'));
							$data['img']=$_FILES['img']['name'];
							
							$this->content_model->set_content($data);
							
							redirect('admin/content', 'refresh');
				
						}
					}else{
						
						$data['img']="";
						
						$this->content_model->set_content($data);
						
						redirect('admin/content', 'refresh');
						
					}
				
				
				}
		}
		
		
		

        public function view($id = NULL)
		{
			
				
				$data['content'] = $this->content_model->get_content($id);
				
				if (empty($data['content']))
				{
						show_404();
				}

				//$data['title'] = $data['users']['username'];

				$this->load->view('admin/templates/header');
				$this->load->view('admin/content/view', $data);
				$this->load->view('admin/templates/footer');
		}
		
		 public function edit($id = 0)
		{
			
				$this->load->helper('form');
				$this->load->helper('url');
				$this->load->library('form_validation');
				
				$this->form_validation->set_rules('title', 'Title', 'required');
				$this->form_validation->set_rules('type', 'Type', 'required');
				$this->form_validation->set_rules('alias_name', 'Alias Name', 'required');
				$this->form_validation->set_rules('content_order', 'Content Order', 'required');
				$this->form_validation->set_rules('is_active', 'Is Active', 'required');
				
				if( $this->input->post() ){ #if form submitted
				 
				 
					if ($this->form_validation->run() === FALSE)
					{
						$data['content']=$this->input->post();
		
						$this->load->view('admin/templates/header');
						$this->load->view('admin/content/edit', $data);
						$this->load->view('admin/templates/footer');

					}
					else
					{
						
						if($_FILES['img']['error']==0){
					
							$config['upload_path'] = './img';
							$config['allowed_types'] = 'gif|jpg|png|jpeg';
							$config['max_size']	= '1000';
							$config['max_width']  = '1024';
							$config['max_height']  = '768';
							$this->load->library('upload', $config);
							
							
							
							if ( ! $this->upload->do_upload('img'))
							{
								
					
								//$error = array('error' => $this->upload->display_errors());
								
								$this->session->set_flashdata('message', $this->upload->display_errors());
									
									$id     = $this->input->post('id'); 
									
									redirect('admin/content/edit/'.$id);
							}
							else
							{
								//$data = array('upload_data' => $this->upload->data('logo'));
								$data['img']=$_FILES['img']['name'];
								$id     = $this->input->post('id');
								
								$previous_image=$this->input->post('prev_image');
								
								unlink('/img/'.$previous_image);
								
								$this->content_model->updatecontent($id ,$data);
								
								redirect('admin/content', 'refresh');
					
							}
						}else{
							
							$id     = $this->input->post('id');
							$data['img']=$this->input->post('prev_image');
							
							$this->content_model->updatecontent($id ,$data);
							redirect('admin/content/');
							
						}
						
					
					}
					
				}else{
				
					$data['content'] = $this->content_model->get_content($id);
					
					//var_dump($data);die;
					
					if (empty($data['content']))
					{
							show_404();
					}
					
					//$data['title'] = 'Edit a user';
	
					$this->load->view('admin/templates/header');
					$this->load->view('admin/content/edit', $data);
					$this->load->view('admin/templates/footer');
				}
		}
		
		 public function delete($id = NULL)
		 {
			 $this->content_model->deletecontent( $id );
		 }
		 
		 
		
}