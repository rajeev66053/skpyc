<?php
class member extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('member_model');
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
				$data['members'] = $this->member_model->get_member();
				
      			
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

				
				
				$data["results"] = $this->member_model->fetch_data($config["per_page"], $page); 
				
				
				*/
				
				// or 




				//$data["results"] =$this->db->get('users',$config["per_page"],$this->uri->segment(3));
				

				$this->load->view('admin/templates/header');
				$this->load->view('admin/member/index', $data);
				$this->load->view('admin/templates/footer');
        }
		
		public function create()
		{
			$this->load->helper('form');
			$this->load->helper('url');
			$this->load->library('form_validation');

			//$data['title'] = 'Create a new user';

			//$this->form_validation->set_rules('profile_image', 'profile_image', 'required');
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('designation', 'Designation', 'required');
			if ($this->form_validation->run() === FALSE)
			{
				
								
				$this->load->view('admin/templates/header');
				$this->load->view('admin/member/create');
				$this->load->view('admin/templates/footer');

			}
			else
			{
				if($_FILES['profile_image']['error']==0){
				
					$config['upload_path'] = './img/profile_image';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size']	= '1000';
					$config['max_width']  = '1024';
					$config['max_height']  = '768';
					$this->load->library('upload', $config);
					
					
					if ( ! $this->upload->do_upload('profile_image'))
					{
						
			
						$error = array('error' => $this->upload->display_errors());
						
			
						$this->load->view('admin/templates/header');
						$this->load->view('admin/member/create', $error);
						$this->load->view('admin/templates/footer');
					}
					else
					{
						/*echo '<pre>';
						var_dump($_FILES);
						echo '</pre>';*/
						
						//$data = array('upload_data' => $this->upload->data('profile_image'));
						$data['profile_image']=$_FILES['profile_image']['name'];
						
						/*echo '<pre>';
						var_dump($data);
						echo '</pre>';*/
						
						
						$this->member_model->set_member($data);
						
						redirect('admin/member', 'refresh');
			
					}
				}else{
					
					$data['profile_image']="";
					
					$this->member_model->set_member($data);
					
				}
				
			}
		}
		
		
		

        public function view($id = NULL)
		{
			
				
				$data['member'] = $this->member_model->get_member($id);
				
				if (empty($data['member']))
				{
						show_404();
				}

				//$data['title'] = $data['users']['username'];

				$this->load->view('admin/templates/header');
				$this->load->view('admin/member/view', $data);
				$this->load->view('admin/templates/footer');
		}
		
		 public function edit($id = 0)
		{
			
				$this->load->helper('form');
				$this->load->helper('url');
				$this->load->library('form_validation');
				
				//$this->form_validation->set_rules('profile_image', 'profile_image', 'required');
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('designation', 'Designation', 'required');
				
				if( $this->input->post() ){ #if form submitted
				 
				 
				 
				 //print_r($data);die;
				 
					if ($this->form_validation->run() === FALSE)
					{
						$data['member']=$this->input->post();
						
						//s$data['title'] = 'Edit a user';
		
						$this->load->view('admin/templates/header');
						$this->load->view('admin/member/edit', $data);
						$this->load->view('admin/templates/footer');

					}
					else
					{
						
						
						
						if($_FILES['profile_image']['error']==0){
						
								$config['upload_path'] = './img/profile_image';
								$config['allowed_types'] = 'gif|jpg|png|jpeg';
								$config['max_size']	= '1000';
								$config['max_width']  = '1024';
								$config['max_height']  = '768';
								$this->load->library('upload', $config);
								
								
								if ( ! $this->upload->do_upload('profile_image'))
								{
									
						
									//$error = array('error' => $this->upload->display_errors());
									
									$this->session->set_flashdata('message', $this->upload->display_errors());
									
									$id     = $this->input->post('id'); 
									
									redirect('admin/member/edit/'.$id);
								}
								else
								{
									$data['profile_image']=$_FILES['profile_image']['name'];
									
									$id     = $this->input->post('id'); 
									$previous_image=$this->input->post('prev_image');
									
									
									
									unlink('/img/member/'.$previous_image);
									
									$this->member_model->updatemember($id ,$data);
									redirect('admin/member/');
								}
						}else{
							
							
						
						$data['profile_image']=$this->input->post('prev_image');
						$id     = $this->input->post('id');
						
						$this->member_model->updatemember($id ,$data);
						redirect('admin/member/');
							
							
						}
					
					}
					
				}else{
				
					$data['member'] = $this->member_model->get_member($id);
					
					//var_dump($data);die;
					
					if (empty($data['member']))
					{
							show_404();
					}
					
					//$data['title'] = 'Edit a user';
	
					$this->load->view('admin/templates/header');
					$this->load->view('admin/member/edit', $data);
					$this->load->view('admin/templates/footer');
				}
		}
		
		 public function delete($id = NULL)
		 {
			 $this->member_model->deletemember( $id );
		 }
}