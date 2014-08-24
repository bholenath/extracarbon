<?php if(!defined('BASEPATH')) exit('no direct access to the script is allowed');


class Other extends My_Admincontroller
{
	
	public function __construct()
	{
		parent::__construct();
		
		$this->auth->admin_auth();

		date_default_timezone_set('Asia/Kolkata');
	
		$this->load->model('admin/other_model');
		
	}
	
	public function change_password()
	{
		$data['title'] = 'Change Password';
		
		$this->load->library('form_validation');
		$this->load->helper('form');
		
		$this->form_validation->set_rules('old_pass', 'Old Password', 'trim|required');
		$this->form_validation->set_rules('new_pass', 'New Password', 'trim|required');
		$this->form_validation->set_rules('re_pass', 'Retype Password', 'trim|required|matches[new_pass]');
		
		if($this->form_validation->run()===false)
		{
			$this->render_view('change_pass', $data);
		}
		else
		{
			if($this->other_model->change_password())
			{
				$this->session->set_flashdata('msg', 'Your Password has been changed.');
				redirect('admin/other/change_password');
			}
			else
			{
				$this->session->set_flashdata('msg', 'Wrong Old Password');
				redirect('admin/other/change_password');
			}
			
		}
			
	}
	
	public function email_settings()
	{
		$data['title'] = 'Email Settings';
		
		$this->render_view('email_setting', $data);
	}
	
	public function email_setting_in()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');
		
		$this->form_validation->set_rules('old_pass', 'Old Password', 'trim|required');
		$this->form_validation->set_rules('new_pass', 'New Password', 'trim|required');
		$this->form_validation->set_rules('re_pass', 'Retype Password', 'trim|required|matches[new_pass]');
		
		if($this->form_validation->run()===false)
		{
			$this->session->set_flashdata('success_in_err', 'new password does not match old password.');
			redirect('admin/other/email_settings');
		}
		else
		{
			if($this->other_model->email_pass_in()=='wrong')
			{
				$this->session->set_flashdata('success_in_err', 'Wrong old password');
				redirect('admin/other/email_settings');
			}
			else
			{
				
				$this->session->set_flashdata('success_in', 'password for info@extarcarbon.com has been changed successfully.');
				redirect('admin/other/email_settings');
				
			}
			
			
		}
		
	}
	
	public function email_setting_out()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');
		
		$this->form_validation->set_rules('old_pass', 'Old Password', 'trim|required');
		$this->form_validation->set_rules('new_pass', 'New Password', 'trim|required');
		$this->form_validation->set_rules('re_pass', 'Retype Password', 'trim|required|matches[new_pass]');
		
		if($this->form_validation->run()===false)
		{
			$this->session->set_flashdata('success_out_err', 'new password does not match old password.');
			redirect('admin/other/email_settings');
		}
		else
		{
			if($this->other_model->email_pass_out()=='wrong')
			{
				$this->session->set_flashdata('success_out_err', 'Wrong old password');
				redirect('admin/other/email_settings');
			}
			else
			{
				
				$this->session->set_flashdata('success_out', 'password for admin@extarcarbon.com has been changed successfully.');
				redirect('admin/other/email_settings');
				
			}
		}
		
	}
	
	
}