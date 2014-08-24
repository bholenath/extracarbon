<?php if(!defined('BASEPATH')) exit('no direct access to the script is allowed');

class Showpoint extends My_Controller
{

	var $menu;
	var $uploadpath;

	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('dashboard_menu');
		
		$this->load->model('earnpoint_model');
		$this->load->model('showpoint_model');
		
		$this->uploadpath = realpath(APPPATH.'../assets/images/uploads');
		
		$menu = new dashboard_menu();
		
		$this->load->helper('date');
		
		$this->menu = $menu->menu();
		
		$this->auth->is_logged_in();
		
		$this->auth->clear_cache();
		
	}
	
	/*
	*-------------- User Detail view on Right Side -------------
	*/
	
	
	public function user_detail()
	{
		$data['user_data'] 	= $this->earnpoint_model->get_user_data($this->session->userdata('username'));
		
		return $this->load->view('right_view', $data, true);
	}
	
	
	/*
	*-------------- Show User Points -------------
	*/
	
	public function metro()
	{
		$data['title'] = 'Show Points';
		
		$data['menu'] = $this->menu;
		
		$data['user_data'] = $this->earnpoint_model->get_user_data($this->session->userdata('username'));
	
		
		$data['totalpoints'] = $this->showpoint_model->get_metro_total();
		
		
		$data['total'] = $this->showpoint_model->get_total_rows('user_tickets');
	
		$config = array(
						'base_url'		=> site_url('showpoint/metro'),
						'full_tag_open' => '<div id="page_link">',
						'full_tag_close'=> '</div>',
						'total_rows' 	=> $data['total'],
						'per_page'		=> 9,
						'uri_segment'	=> 3
						);
		
		$this->load->library('pagination');
		$this->pagination->initialize($config);
		
		$limit	 = $config['per_page'];
		$segment = $this->uri->segment(3);
		
		$data['points'] = $this->showpoint_model->get_metro_points($limit, $segment);
		
		$data['pagination'] = $this->pagination->create_links();
		
		$data['user_detail'] = $this->user_detail();
		
		$this->render_view('show_metro_points', $data);
		
	}
	
	public function waste_pick()
	{
		$data['title'] = 'Show Points';
		
		$data['menu'] = $this->menu;
		
		$data['user_data'] = $this->earnpoint_model->get_user_data($this->session->userdata('username'));
	
		
		$data['totalpoints'] = $this->showpoint_model->get_waste_total();
		
		
		$data['total'] = $this->showpoint_model->get_total_rows('waste_request');
	
		$config = array(
						'base_url'		=> site_url('showpoint/waste_pick'),
						'full_tag_open' => '<div id="page_link">',
						'full_tag_close'=> '</div>',
						'total_rows' 	=> $data['total'],
						'per_page'		=> 9,
						'uri_segment'	=> 3
						);
		
		$this->load->library('pagination');
		$this->pagination->initialize($config);
		
		$limit	 = $config['per_page'];
		$segment = $this->uri->segment(3);
		
		$data['points'] = $this->showpoint_model->get_waste_points($limit, $segment);
		
		$data['pagination'] = $this->pagination->create_links();
		
		$data['user_detail'] = $this->user_detail();
		
		$this->render_view('show_waste_points', $data);
		
		
	}
	
	public function view_ticket()
	{
		
		$data['ticket'] = $this->showpoint_model->get_ticket($_POST['id']);
		echo $this->load->view('show_ticket', $data, true);
	}

	
	
}