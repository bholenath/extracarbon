<?php if(!defined('BASEPATH')) exit('no direct access is allowed');


class Request extends My_Admincontroller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->auth->admin_auth();

		$this->load->model('admin/request_model');
		date_default_timezone_set('Asia/Kolkata');
	}
	
	public function index()
	{
		$data['title'] 		= 'Today\'s Total Requests';
	
		$data['today_req'] 	= $this->request_model->get_today_total_request();
		
		$this->render_view('today_total_request', $data);
		
	}
	
	public function today_request($type)
	{
		$data['title'] 		= 'Today\'s Requests Details';
	
		$total = $this->request_model->get_today_total($type);
	
		$this->load->library('pagination');
		$config = array(
						'base_url' 		=> site_url("admin/request/today_request/".$this->uri->segment(4)),
						'full_tag_open' => '<div id="page_link">',
						'full_tag_close'=>'</div>',
						'total_rows'	=> $total,
						'per_page'		=> 20,
						'uri_segment'	=> 5
						);
		$this->pagination->initialize($config);
		$limit 	= $config['per_page'];
		$offset	= ($this->uri->segment(5)?$this->uri->segment(5):0);
		$data['pagination'] = $this->pagination->create_links();
			
		$data['request'] 	= $this->request_model->get_today_request($limit, $offset, $type);
		
		$this->render_view('today_request', $data);
	}
	
	
	public function all_request($type = NULL)
	{
		$sort ='';
		
		(!$type?$type = 'bag':$type=$type);
		
		(isset($_GET['sort'])?$sort = $_GET['sort']:$sort='');		
			
	
		$data['title'] 	= 'All Requests ';
	
		$total 			= $this->request_model->get_all_total($type, $sort);
		
		$data['total'] 	= $total;		
		
		if(isset($_GET['sort']))
			$suffix = '?sort='.$_GET['sort'];
		else
			$suffix ='';
		
		$this->load->library('pagination');
		$config = array(
						'base_url' 		=> site_url("admin/request/all_request/".$this->uri->segment(4)),
						'full_tag_open' => '<div id="page_link">',
						'full_tag_close'=>'</div>',
						'total_rows'	=> $total,
						'suffix'		=> $suffix,
						'per_page'		=> 20,
						'uri_segment'	=> 5
						);
		$this->pagination->initialize($config);
		
		$limit 				= $config['per_page'];
		$offset				= ($this->uri->segment(5)?$this->uri->segment(5):0);
		$data['pagination'] = $this->pagination->create_links();
			
		$data['request'] 	= $this->request_model->get_all_request($limit, $offset, $type, $sort);
		
		$this->render_view('all_request', $data);
	}
	
	
	/**
	*	ajax function 
	*
	*
	*/
	
	public function change_status()
	{
		//echo "$_POST[status], $_POST[id], $_POST[type]";
		if(isset($_POST['point']))
		{
			$point = $_POST['point'];
		}
		else
			$point = NULL;
			
			
		if(isset($_POST['uid']))
		{
			$uid = $_POST['uid'];
		}
		else
			$uid = NULL;	
		
		
	
		$this->request_model->change_status($_POST['status'], $_POST['id'], $_POST['type'], $point);
		
		if(isset($_POST['uid']))
		{
			echo $this->request_model->update_waste_point($uid);
		}
		
	}
	

}