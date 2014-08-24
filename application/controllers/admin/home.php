<?php if(!defined('BASEPATH')) exit('no direct access is allowed');


class Home extends My_Admincontroller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/admin_model');
		$this->auth->admin_auth();
	}
	
	public function index()
	{
		$data['title'] 		= 'Welcome to Admin Area';
		
		$data['total_user'] 	= $this->admin_model->count_users();
		$data['today_user'] 	= $this->admin_model->count_users_today();
		
		$data['total_collection'] = $this->admin_model->count_collection();
		$data['amount_to_feriwala'] = $this->admin_model->count_collection_feriwala();
		$data['waste_collected'] = $this->admin_model->count_waste();
		
		//$data['plant_req']		= $this->admin_model->total_plant_req();
		//$data['waste_req']		= $this->admin_model->total_waste_req();
		//$data['bag_req']		= $this->admin_model->total_bag_req();
		
		//$data['car_offer']		= $this->admin_model->available_car_offer();
		//$data['coupons']		= $this->admin_model->get_coupon_info();
		
		$this->render_view('home', $data);
		
	}
	
	public function view_users()
	{
		
		$data['title'] = 'Uers List';
		
		
		$count = $this->admin_model->count_users();
		
		$this->load->library('pagination');
		
		$config = array(
						'base_url' => site_url('admin/home/view_users'),
						'full_tag_open' => '<div id="page_link">',
						'full_tag_close' =>'</div>',
						'total_rows' => $count,
						'per_page' => 20,
						'uri_segment' => 4
						);
		
		$this->pagination->initialize($config);
		
		$limit 	= $config['per_page'];
		$offset = $this->uri->segment(4);
		$data['pagination'] = $this->pagination->create_links();
		
		
		$data['users'] = $this->admin_model->view_users($limit, $offset);
		$this->render_view('view_users', $data);
	}
	
	
	public function today_users()
	{
		$data['title'] = 'Today\'s Uers List';
		
		$count = $this->admin_model->count_users_today();
		
		$this->load->library('pagination');
		
		$config = array(
						'base_url' => site_url('admin/home/today_users'),
						'full_tag_open' => '<div id="page_link">',
						'full_tag_close' =>'</div>',
						'total_rows' => $count,
						'per_page' => 20,
						'uri_segment' => 4
						);
		
		$this->pagination->initialize($config);
		
		$limit 	= $config['per_page'];
		$offset = $this->uri->segment(4);
		$data['pagination'] = $this->pagination->create_links();
		
		
		$data['users'] = $this->admin_model->today_users($limit, $offset);
		$this->render_view('today_users', $data);
		
	}
	
	public function waste()
	{
		$data['title'] = 'Total Waste Quantity Collection';
		
		$count = $this->admin_model->count_societies();
		
		$this->load->library('pagination');
		
		$config = array(
						'base_url' => site_url('admin/home/waste'),
						'full_tag_open' => '<div id="page_link">',
						'full_tag_close' =>'</div>',
						'total_rows' => $count,
						'per_page' => 20,
						'uri_segment' => 4
						);
		
		$this->pagination->initialize($config);
		
		$limit 	= $config['per_page'];
		$offset = $this->uri->segment(4);
		$data['pagination'] = $this->pagination->create_links();		
		
		$data['waste_collection'] = $this->admin_model->waste_collection($limit, $offset);
		$this->render_view('waste', $data);
		
	}
	
	public function society_collection()
	{
		$data['title'] = 'Total Society Amount Collection';
		
		$count = $this->admin_model->count_societies();
		
		$this->load->library('pagination');
		
		$config = array(
						'base_url' => site_url('admin/home/society_collection'),
						'full_tag_open' => '<div id="page_link">',
						'full_tag_close' =>'</div>',
						'total_rows' => $count,
						'per_page' => 20,
						'uri_segment' => 4
						);
		
		$this->pagination->initialize($config);
		
		$limit 	= $config['per_page'];
		$offset = $this->uri->segment(4);
		$data['pagination'] = $this->pagination->create_links();
		
		
		$data['collection'] = $this->admin_model->amount_collection($limit, $offset);
		$this->render_view('society_collection', $data);
		
	}
	
	public function feriwala_amount()
	{
		$data['title'] = 'Total Money given to Feriwala';
		
		$count = $this->admin_model->count_societies();
		
		$this->load->library('pagination');
		
		$config = array(
						'base_url' => site_url('admin/home/feriwala_amount'),
						'full_tag_open' => '<div id="page_link">',
						'full_tag_close' =>'</div>',
						'total_rows' => $count,
						'per_page' => 20,
						'uri_segment' => 4
						);
		
		$this->pagination->initialize($config);
		
		$limit 	= $config['per_page'];
		$offset = $this->uri->segment(4);
		$data['pagination'] = $this->pagination->create_links();
		
		
		$data['feriwala_collection'] = $this->admin_model->feriwala_collection($limit, $offset);
		$this->render_view('feriwala_amount', $data);
		
	}
	
	
	public function del_user($id)
	{
		if($this->admin_model->del_user($id))
			redirect('admin/home/view_users');
	}
	
	
	public function verify_ticket($uid, $slug=Null)
	{
				
		$data['title'] 	= 'Verify Ticket';
		
		
		$data['total']	= $this->admin_model->count_tickets($uid, $slug);
		
		$this->load->library('pagination');
		
		$uid	= $this->uri->segment(4);
		$slug	= $this->uri->segment(5)?$this->uri->segment(5):'all';
		
		$config = array(
						'base_url' 			=> site_url('admin/home/verify_ticket/'.$uid.'/'.$slug),
						'full_tag_open' 	=> '<div id="page_link">',
						'full_tag_close' 	=>'</div>',
						'total_rows'		=> $data['total'],
						'per_page' 			=> 20,
						'uri_segment' 		=> 6
						);
		
		$this->pagination->initialize($config);
		
		$limit 		= $config['per_page'];
		$offset 	= $this->uri->segment(6)?$this->uri->segment(6):'';
		
		$data['pagination'] = $this->pagination->create_links();
				
		$data['tickets'] = $this->admin_model->get_ticket($limit, $offset, $uid, $slug);
	
		$this->render_view('verify_ticket', $data);
	}
	
	public function set_ticket_status($id)
	{
		if($this->admin_model->set_ticket_status($id))
		{
			
			$this->admin_model->save_point($this->uri->segment(5), $id);
			header("location:".$_SERVER['HTTP_REFERER']);
		}
	}
	
	
	public function details($id)
	{
		$data['title'] = 'Details of User';
		
		$data['dtl']		=	$this->admin_model->get_other_details($id);
	
		$data['user_data'] 	= $this->admin_model->user_details($id);
		
		//$data['tickets'] = $this->admin_model->get_ticket($id);
		
		$data['summary'] = $this->admin_model->get_user_summary($id);
		
		$this->render_view('user_detail', $data);
	}
}