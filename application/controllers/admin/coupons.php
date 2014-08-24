<?php if(!defined('BASEPATH')) exit('no direct access is allowed');


class Coupons extends My_Admincontroller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->auth->admin_auth();

		$this->load->model('admin/coupon_model');
	}
	
	public function index($type=NULL)
	{
	
		redirect('admin/coupons/all_coupons');
		
	}
	
	public function all_coupons($type=NULL)
	{
		$data['title'] 	= 'Coupons';
	
		$data['total']	= $this->coupon_model->get_total('coupons', $type);
		
		$seg = ($this->uri->segment(4)?$this->uri->segment(4):'all');
		
		$config	= array(
						'base_url'		=> site_url('admin/coupons/all_coupons/'.$seg),
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
	
		$data['data']		= $this->coupon_model->get_all_records($limit, $offset, $type, 'coupons');
		
		$this->render_view('all_coupons', $data);
	}
	
	
	public function details($id, $type=NULL)
	{
		$data['title'] 	= 'Coupon Details';
	
		$data['total']	= $this->coupon_model->get_total_coupons($id, $type);
		
		$seg 			= ($this->uri->segment(5)?$this->uri->segment(5):'all');
		$id 			= ($this->uri->segment(4)?$this->uri->segment(4):'');
		
		$config	= array(
						'base_url'		=> site_url('admin/coupons/details/'.$id.'/'.$seg),
						'total_rows'	=> $data['total'],
						'per_page'		=> 20,
						'full_tag_open'	=> '<div id="page_link">',
						'full_tag_close'=> '</div>',
						'uri_segment'	=> 6						
						);
	
		$this->load->library('pagination');
		$this->pagination->initialize($config);
		
		$limit 				= $config['per_page'];
		$offset				= $this->uri->segment(6);
		$data['pagination']	= $this->pagination->create_links();
	
		$data['data']		= $this->coupon_model->get_coupon_detail($limit, $offset, $id, $type);
		
		$this->render_view('coupon_details', $data);
	}
	
	
}
	
	
	