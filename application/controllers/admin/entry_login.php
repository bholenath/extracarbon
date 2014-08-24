<?php //if(!defined('BASEPATH')) exit('no direct access is allowed');

class Entry_Login extends My_Admincontroller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/admin_model');
	}
	
	public function index()
	{
		
		$data['title'] = 'Entry User: Login';
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'User Name', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		if($this->form_validation->run()===false)
		{
			$this->load->view('admin/entry_login', $data);
		}
		else
		{
			if($this->admin_model->entry_login())
			{
				$this->session->set_userdata('admin_username', $this->input->post('username'));
				redirect('admin/entry_home');
			}
			else
			{
				$this->session->set_flashdata('entry_err', 'Invalid Login Details');
				redirect('admin/entry_login');
			}
		}
		
	}

	public function logout()
	{
		$this->session->unset_userdata('admin_username');
		$this->session->sess_destroy();
		redirect('admin/entry_login');
	}
	
	
}