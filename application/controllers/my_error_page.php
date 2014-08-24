<?php if(!defined('BASEPATH'))exit('no directe access to the script is allowed');


class My_error_page extends My_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
	
	//	$this->output->set_status_header('404');
	//	$data['title'] = 'Page not found';
	//	$this->render_view('404_view', $data);
		redirect('home');
	}

}