<?php if(!defined('BASEPATH')) exit('no direct access is allowed');


class Carpool extends My_Admincontroller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->auth->admin_auth();

		$this->load->model('admin/carpool_model');
	}
	
	public function index()
	{
		redirect('admin/carpool/all_poolers');
	}
	
	
	public function all_poolers($type=NULL)
	{
		$data['title'] 	= 'Carpool Offers';
	
		$data['total']	= $this->carpool_model->get_total('offer', $type);
		
		$seg = ($this->uri->segment(4)?$this->uri->segment(4):'all');
		
		$config	= array(
						'base_url'		=> site_url('admin/carpool/all_poolers/'.$seg),
						'total_rows'	=> $data['total'],
						'per_page'		=> 20,
						'full_tag_open'	=> '<div id="page_link">',
						'full_tag_close'=> '</div>',
						'uri_segment'	=> 5						
						);
	
		$this->load->library('pagination');
		$this->pagination->initialize($config);
		
		$limit 				= $config['per_page'];
		$offset				= $this->uri->segment(5);
		$data['pagination']	= $this->pagination->create_links();
	
		$data['carpooler']	= $this->carpool_model->get_all_records($limit, $offset, $type, 'offer');
		
		$this->render_view('carpool_offers', $data);
	}
	
	
	public function all_carpool_request($type=NULL)
	{
		$data['title'] 	= 'Carpool Request';
	
		$data['total']	= $this->carpool_model->get_total('request', $type);
		
		$config	= array(
						'base_url'		=> site_url('admin/carpool/all_carpool_request'),
						'total_rows'	=> $data['total'],
						'per_page'		=> 20,
						'full_tag_open'	=> '<div id="page_link">',
						'full_tag_close'=> '</div>',
						'uri_segment'	=> 4						
						);
	
		$this->load->library('pagination');
		$this->pagination->initialize($config);
		
		$limit 				= $config['per_page'];
		$offset				= $this->uri->segment(4);
		$data['pagination']	= $this->pagination->create_links();
	
		$data['request']	= $this->carpool_model->get_all_records($limit, $offset, $type, 'request');
		
		$this->render_view('carpool_requests', $data);
	}
	
	
}
	