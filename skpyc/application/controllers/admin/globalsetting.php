<?php
class globalsetting extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('globalsetting_model');
				$this->load->library('pagination');
				$this->load->helper('url');

		 if(!$this->session->userdata('logged_in'))
					   
			 {
					      //If no session, redirect to login page
				redirect('admin/login', 'refresh');
			}




		}

        public function index()
        {
				$data['globalsettings'] = $this->globalsetting_model->get_setting();
				
      			
			/*	$config = array();
				$config["base_url"] = $this->config->base_url().'admin/globalsetting/index';
				
				
				//$total_row = $this->users_model->record_count();
				// or 
				$total_row = $this->db->get('global_settings')->num_rows();
								
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

				
				
				$data["results"] = $this->globalsetting_model->fetch_data($config["per_page"], $page); 
				
				
				*/
				
				// or 




				//$data["results"] =$this->db->get('users',$config["per_page"],$this->uri->segment(3));
				

				$this->load->view('admin/templates/header');
				$this->load->view('admin/globalsetting/index', $data);
				$this->load->view('admin/templates/footer');
        }
		
		public function create()
		{
			$this->load->helper('form');
			$this->load->helper('url');
			$this->load->library('form_validation');

			//$data['title'] = 'Create a new user';

			//$this->form_validation->set_rules('logo', 'Logo', 'required');
			$this->form_validation->set_rules('mail_to', 'Mail To', 'required');
			if ($this->form_validation->run() === FALSE)
			{
				
								
				$this->load->view('admin/templates/header');
				$this->load->view('admin/globalsetting/create');
				$this->load->view('admin/templates/footer');

			}
			else
			{
				if($_FILES['logo']['error']==0){
				
					$config['upload_path'] = './img/logo';
					$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|xml';
					$config['max_size']	= '1000';
					$config['max_width']  = '1024';
					$config['max_height']  = '768';
					$this->load->library('upload', $config);
					
					
					if ( ! $this->upload->do_upload('logo'))
					{
						
			
						$error = array('error' => $this->upload->display_errors());
						
			
						$this->load->view('admin/templates/header');
						$this->load->view('admin/globalsetting/create', $error);
						$this->load->view('admin/templates/footer');
					}
					else
					{
						/*echo '<pre>';
						var_dump($_FILES);
						echo '</pre>';*/
						
						//$data = array('upload_data' => $this->upload->data('logo'));
						$data['logo']=$_FILES['logo']['name'];
						
						/*echo '<pre>';
						var_dump($data);
						echo '</pre>';*/
						
						
						$this->globalsetting_model->set_setting($data);
						
						redirect('admin/globalsetting', 'refresh');
			
					}
				}else{
					
					$data['logo']="";
					
					$this->globalsetting_model->set_setting($data);
					
				}
				
			}
		}
		
		
		

        public function view($id = NULL)
		{
			
				
				$data['globalsetting'] = $this->globalsetting_model->get_setting($id);
				
				if (empty($data['globalsetting']))
				{
						show_404();
				}

				//$data['title'] = $data['users']['username'];

				$this->load->view('admin/templates/header');
				$this->load->view('admin/globalsetting/view', $data);
				$this->load->view('admin/templates/footer');
		}
		
		 public function edit($id = 0)
		{
			
				$this->load->helper('form');
				$this->load->helper('url');
				$this->load->library('form_validation');
				
				//$this->form_validation->set_rules('logo', 'Logo', 'required');
				$this->form_validation->set_rules('mail_to', 'Mail To', 'required');
				
				if( $this->input->post() ){ #if form submitted
				 
				 
				 
				 //print_r($data);die;
				 
					if ($this->form_validation->run() === FALSE)
					{
						$data['globalsetting']=$this->input->post();
						
						//s$data['title'] = 'Edit a user';
		
						$this->load->view('admin/templates/header');
						$this->load->view('admin/globalsetting/edit', $data);
						$this->load->view('admin/templates/footer');

					}
					else
					{
						
						
						
						if($_FILES['logo']['error']==0){
						
								$config['upload_path'] = './img/logo';
								$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|xml';
								$config['max_size']	= '1000';
								$config['max_width']  = '1024';
								$config['max_height']  = '768';
								$this->load->library('upload', $config);
								
								
								if ( ! $this->upload->do_upload('logo'))
								{
									
						
									//$error = array('error' => $this->upload->display_errors());
									
									$this->session->set_flashdata('message', $this->upload->display_errors());
									
									$id     = $this->input->post('id'); 
									
									redirect('admin/globalsetting/edit/'.$id);
								}
								else
								{
									$data['logo']=$_FILES['logo']['name'];
									
									$id     = $this->input->post('id'); 
									$previous_image=$this->input->post('prev_image');
									
									
									
									unlink('/img/logo/'.$previous_image);
									
									$this->globalsetting_model->updatesetting($id ,$data);
									redirect('admin/globalsetting/');
								}
						}else{
							
							
						
						$data['logo']=$this->input->post('prev_image');
						$id     = $this->input->post('id');
						
						$this->globalsetting_model->updatesetting($id ,$data);
						redirect('admin/globalsetting/');
							
							
						}
					
					}
					
				}else{
				
					$data['globalsetting'] = $this->globalsetting_model->get_setting($id);
					
					//var_dump($data);die;
					
					if (empty($data['globalsetting']))
					{
							show_404();
					}
					
					//$data['title'] = 'Edit a user';
	
					$this->load->view('admin/templates/header');
					$this->load->view('admin/globalsetting/edit', $data);
					$this->load->view('admin/templates/footer');
				}
		}
		
		 public function delete($id = NULL)
		 {
			 $this->globalsetting_model->deletesetting( $id );
		 }
}