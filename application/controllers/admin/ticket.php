<?php if (!defined('BASEPATH')) exit('no direct access to the scrip is allowed');


class Ticket extends MY_Admincontroller
{
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('ticket_model');
	}
	
	public function index()
	{
		$data['title'] = 'Verify Ticket';
		
		$this->render_view('home', $data);
	}
	
	public function verify_ticket()
	{
		$data['title'] = 'Verify Ticket';
		
		$this->render_view('verify_ticket', $data);
		
	}

}