<?php

class Dashboard extends My_Controller
{
	var $menu;
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('dashboard_menu');
		
		$this->load->model('dashboard_model');
		$this->load->model('redeempoints_model');


		$menu = new dashboard_menu();
		
		$this->menu = $menu->menu();
	
		$this->auth->clear_cache();
		
		$this->auth->is_logged_in();
			
		$this->load->helper('date');
		$this->load->helper('custom');
		
		//$this->load->model('home_model');
	}
	
	public function index()
	{
		$data['title'] 			= 'Welcome '. $this->session->userdata('username');
		
		$data['menu'] 			= $this->menu;
		$data['user_data'] 		= $this->dashboard_model->get_user_data($this->session->userdata('username'));
		
		$data['metro_total'] 	= $this->dashboard_model->get_metro_total();
		$data['waste_total'] 	= $this->dashboard_model->get_waste_total();
		$data['coupon_total'] 	= $this->dashboard_model->get_coupon_total();
		
		$data['carpool'] 		= $this->dashboard_model->get_recent_carpool_offer(5);
		
		$data['m_data']			= $this->dashboard_model->get_metro_details();
		$data['w_data']			= $this->dashboard_model->get_waste_details();
		$data['o_data']			= $this->dashboard_model->get_bag_plant_details();
		
		$data['coupon'] 		= $this->dashboard_model->get_active_coupon();
		
		$this->redeempoints_model->generate_coupon();
		
		$this->render_view('dashboard', $data);
		
	}
	
	public function profile()
	{
		$data['title'] 			= 'Profile Setting';
		
		$data['menu'] 			= $this->menu;
		$data['user_data'] 		= $this->dashboard_model->get_user_data($this->session->userdata('username'));
		
		$data['pool_data']		= $this->dashboard_model->get_user_pool_data();
		$data['req_data']		= $this->dashboard_model->get_user_request_data();
		
		
		$this->render_view('profile', $data);
		
	}
	
	public function change_password()
	{
		$data['title'] = 'Change your Password';	
		/*$data['type'] = $this->uri->segment(3);
		$data['name'] = $this->uri->segment(4);*/
		
		$data['menu'] 			= $this->menu;
		$data['user_data'] 		= $this->dashboard_model->get_user_data($this->session->userdata('username'));
		//$data['user_detail'] = $this->user_detail();
		
		$this->render_view('change_password', $data);		
	}
	
	public function save_changed_password()
	{
		$data['title'] = 'Change Password';
		
		/*$data['menu'] = $this->menu;
		$data['user_data'] = $this->earnpoint_model->get_user_data($this->session->userdata('username'));*/		
		
		$this->load->library('form_validation');
		$this->load->helper('form');		
		
			$this->form_validation->set_rules('old_pss', 'Old Password', 'required');
			$this->form_validation->set_rules('new_pss','New Password', 'trim|required');
			$this->form_validation->set_rules('re_pss','Confirm Password', 'trim|required');
	
			if($this->form_validation->run()===false)
			{
			echo validation_errors();
			}
			else
			{
			echo $this->dashboard_model->save_changed_password(mysql_real_escape_string($_POST['new_pss']), 
			mysql_real_escape_string($_POST['old_pss']), $_POST['id']);
			}		
		
	}
	
	public function save_basic_info()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules("name", 'Name', 'required');
		$this->form_validation->set_rules("metro_no", 'Metro Card No.', 'required');
		
		if($this->form_validation->run()===false)
		{
			echo validation_errors();
		}
		else
			echo $this->dashboard_model->save_basic_info($_POST['name'], $_POST['metro_no'], $_POST['gender'], $_POST['id']);
	}

	public function save_pool_info()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules("email", 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules("contact_no", 'Contact No.', 'trim|required|numeric|min_length[10]');
		$this->form_validation->set_rules("address", 'Address', 'trim|required|min_length[10]');
		$this->form_validation->set_rules("pincode", 'PinCode', 'trim|required|numeric|exact_length[6]');
		$this->form_validation->set_rules("car_rc", 'Car RC', 'trim|required|min_length[10]');
		
		if($this->form_validation->run()===false)
		{
			echo validation_errors();
		}
		else
			echo $this->dashboard_model->save_pool_info($_POST['email'], $_POST['contact_no'], $_POST['address'],$_POST['pincode'], $_POST['car_rc'], $_POST['id']);
	}
	
	public function save_req_info()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules("email", 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules("contact_no", 'Contact No.', 'trim|required|numeric|min_length[10]');
		$this->form_validation->set_rules("address", 'Address', 'trim|required|min_length[10]');
		$this->form_validation->set_rules("pincode", 'PinCode', 'trim|required|numeric|exact_length[6]');
		$this->form_validation->set_rules("id_proof", 'Id Proof', 'trim|required');
		
		if($this->form_validation->run()===false)
		{
			echo validation_errors();
		}
		else
		echo $this->dashboard_model->save_req_info($_POST['email'], $_POST['contact_no'], $_POST['address'],$_POST['pincode'], $_POST['id_proof'], $_POST['id']);
	}
	

}