<?php

class My_Controller extends CI_Controller
{
	
	protected $data = array();
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function render_view($view, $data)
	{
		$this->load->view('templates/header', $data);
		
		$this->load->view($view, $data);
		
		$this->load->view('templates/footer', $data);
		
	}
	
}


class My_Admincontroller extends CI_Controller
{
	protected $data = array();
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function render_view($view, $data)
	{
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/'.$view, $data);
		$this->load->view('admin/templates/footer', $data);
	}	
	
	public function render_view1($view, $data)
	{
		$this->load->view('admin/templates/header1', $data);
		$this->load->view('admin/'.$view, $data);
		$this->load->view('admin/templates/footer', $data);
	}	
	
}