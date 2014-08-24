<?php if(!defined('BASEPATH')) exit('no direct access to the script is allowed');

class Redeempoints extends My_Controller
{

	var $menu;
	var $uploadpath;

	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('dashboard_menu');
		
		$this->load->model('earnpoint_model');
		$this->load->model('showpoint_model');
		$this->load->model('redeempoints_model');
		
		$this->uploadpath = realpath(APPPATH.'../assets/images/uploads');
		
		$menu = new dashboard_menu();
		
		$this->load->helper('date');
		
		$this->menu = $menu->menu();
		
		$this->auth->is_logged_in();
		
		$this->auth->clear_cache();
		
	}
	
	public function index()
	{
		$data['title'] 		= 'Redeem Points';
		
		$data['menu'] 		= $this->menu;
		
		$data['user_data'] 	= $this->earnpoint_model->get_user_data($this->session->userdata('username'));
		
		$data['metro_total']	= $this->showpoint_model->get_metro_total();
		$data['waste_total']	= $this->showpoint_model->get_waste_total();
		$data['coupon_total']	= $this->showpoint_model->get_coupon_total();
		
		$this->redeempoints_model->generate_coupon();
		
		$data['code']	= $this->redeempoints_model->get_coupon();
		$data['amount']	= $this->redeempoints_model->get_coupon();
	
		$this->render_view('redeem_points', $data);
		
	}
	
	
	public function coupon_details()
	{
		
		$data['title'] 		= 'Coupon Details';
		
		$data['menu'] 		= $this->menu;
		
		$data['user_data'] 	= $this->earnpoint_model->get_user_data($this->session->userdata('username'));
		
		$data['metro_total']	= $this->showpoint_model->get_metro_total();
		$data['waste_total']	= $this->showpoint_model->get_waste_total();
		
		$data['details']		= $this->redeempoints_model->get_all_coupons();
	
		$this->render_view('coupon_details', $data);
	}
	
	
}
	