<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('user_model','',TRUE);
  }

  function index()
  {
	  
    //This method will have the credentials validation
    $this->load->library('form_validation');

  $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required|callback_check_database');
	
    if($this->form_validation->run() == FALSE)
    {
		
		//echo '<pre>';
		//var_dump('a');
		//echo '<pre>';die;
		
      //Field validation failed.  User redirected to login page
      $this->load->view('admin/login_view');
    }
    else
    {
		//echo '<pre>';
		//var_dump('c');
		//echo '<pre>';die;
		
      //Go to private area
      redirect('admin/home', 'refresh');
    }
    
  }
  
  function check_database($password)
  {
	  
    //Field validation succeeded.  Validate against database
    $username = $this->input->post('username');
    
    //query the database
    $result = $this->user_model->login($username, $password);
	
	//var_dump($result);die;
    
    if($result)
    {
      $sess_array = array();
      foreach($result as $row)
      {
        $sess_array = array(
          'id' => $row->id,
          'username' => $row->username
        );
        $this->session->set_userdata('logged_in', $sess_array);
      }
      return TRUE;
    }
    else
    {
      $this->form_validation->set_message('check_database', 'Invalid username or password');
      return false;
    }
  }
}
?>