<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pages extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('page_model');
        $this->load->library(array(
            'form_validation',
            'pagination'
        ));
        $this->load->helper(array(
            'form',
            'url',
            'date'
        ));
    }
    public function index()
    {
		
		
		
        $data['Pages']            = $this; //$data['classname']=>$this is use to call controller method from view
		
		
		
        $data['banner']           = $this->db->select('*')
									->where('file_type', 'banner')
									->where('is_active', 1)
									->get('files')
									->result_array();
       

	   $data['body_top']         = $this->db->select('*')
									->where('type', 'body_top')
									->where('is_active', 1)
									->limit(1)
									->get('contents')
									->result_array();
		
		
		
        $data['body_main']        = $this->db->select('*')
									->where('type', 'body_main')
									->where('is_active', 1)
									->limit(3)
									->get('contents')
									->result_array();
        $data['body_bottom_left'] = $this->db->select('*')
									->where('is_active', 1)
									->limit(5)
									->get('testimonials')
									->result_array();
		$data['body_bottom_right']	  ="";
        $data['footer_left']      = $this->db->select('*')
									->where('type', 'footer')
									->where('sub_type', 'left')
									->where('is_active', 1)
									->limit(1)
									->get('contents')
									->result_array();
        $data['footer_mid']       = $this->db->select('*')
									->where('type', 'footer')
									->where('sub_type', 'middle')
									->where('is_active', 1)
									->limit(1)
									->get('contents')
									->result_array();
        /*echo '<pre>';
        print_r($data['body_bottom_left']);
        echo '</pre>';die;*/
		
		
		
		
        $this->load->view('templates/header', $data);
        $this->load->view('pages/home', $data);
        $this->load->view('templates/footer', $data);
    }
    public function menu_item($id = 0)
    {
        $result = $this->db->select('*')
					->where('type', 'header')
					->where('parent_id', $id)
					->order_by('content_order', 'asc')
					->get('contents')
					->result_array();
        //$this->db->query("Select * from contents where type='header' and parent_id='{$id}' order by content_order");
        //debug($result);die;
        /*echo '<pre>';
        print_r($result);
        echo '</pre>';die;*/
        if ($result) {
            foreach ($result as $results) {
                if ($results['sub_type'] == 'gallery') {
                    $submenu = $this->db->select('*')->where('type', 'header')->where('sub_type', $results['sub_type'])->where('parent_id', $results['id'])->order_by('content_order', 'asc')->get('contents')->result_array();
                    /*echo '<pre>';
                    print_r($submenu);
                    echo '</pre>';*/
                    //$data->query("Select * from contents where type='header' and sub_type='".$results['contents']['sub_type']."' and parent_id='{$results['contents']['id']}' order by content_order");
                    if (!empty($submenu)) {
                        echo "<li> <label for='drop-" . $results['id'] . "' class='toggle'>" . $results['title'] . "+</label><a href='" . $this->config->base_url() . 'image/' . $results['sub_type'] . '/' . $results['sub_type'] . "'>" . $results['title'] . "</a><input type='checkbox' id='drop-" . $results['id'] . "'/>";
                        echo "<ul>";
                        /*    echo '<pre>';
                        print_r($results);
                        echo '</pre>';die;*/
                        $this->menu_item($results['id']);
                        echo "</ul></li>";
                    } else {
                        echo "<li><a href='" . $this->config->base_url() . 'image/' . $results['sub_type'] . '/' . $results['sub_type'] . "'>" . $results['title'] . "</a></li>";
                    }
                } else {
                    $submenu = $this->db->select('*')->where('type', 'header')->where('parent_id', $results['id'])->order_by('content_order', 'asc')->get('contents')->result_array();
                    //$submenu=$data->query("Select * from contents where type='header' and parent_id='{$results['contents']['id']}' order by content_order");
                    if (!empty($submenu)) {
                        echo "<li> <label for='drop-" . $results['id'] . "' class='toggle'>" . $results['title'] . "+</label><a href='" . $this->config->base_url() . 'content/' . $results['alias_name'] . "'>" . $results['title'] . "</a><input type='checkbox' id='drop-" . $results['id'] . "'/>";
                        echo "<ul>";
                        $this->menu_item($results['id']);
                        echo "</ul></li>";
                    } else {
                        echo "<li><a href='" . $this->config->base_url() . 'content/' . $results['alias_name'] . "'>" . $results['title'] . "</a></li>";
                    }
                }
            }
        }
    }
	
	
		
		function get_category()
		{
			//$term = $this->input->post('search');
			
			if (isset($_GET['term'])){
			  $q = strtolower($_GET['term']);
			  $this->pages_model->get_autocomplete($q);
			}
			
		}
		
		
		 public function autocomplete() {
			 
						$search_data = $_POST['search_data'];
						
						//echo $search_data;die;
						
						$query = $this->pages_model->get_autocomplete($search_data);
						//print_r($query->result_array());die;

						foreach ($query->result_array() as $row):

							echo "<li><a href='" . base_url() . "pages/index/#"."'>" . $row['title'] . "</a></li>";
							
						endforeach;
				
    }
}

?>