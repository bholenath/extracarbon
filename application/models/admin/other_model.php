<?php


class Other_Model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		
	}
	
	public function get_password($username)
	{
		$query = 	$this->db	->select('password')
								->where('username', $username)
								->get('admin_login');
		if($query->num_rows())
			return $query->row()->password;
			
	}
	
	public function change_password()
	{
		if($this->get_password('admin')==$this->input->post('old_pass'))
		{
			$data = array('password' => $this->input->post('new_pass'));
			
			$this->db->where('username', 'admin');
			$this->db->update('admin_login', $data);
			return true;
		}
		return false;
	}
	
	public function email_pass_in()
	{
		$query = $this->db	->select('pass_in')
							->get('email_setting');
							
		if($query->num_rows())
		{
			
			if($this->input->post('old_pass')==$query->row()->pass_in)
			{
				$data = array('pass_in' => $this->input->post('re_pass'));
				
				$this->db->where('pass_in', $this->input->post('old_pass'));
				$this->db->update('email_setting', $data);
				return 'true';
			}
			else
				return 'wrong';
		}
	}
	
	public function email_pass_out()
	{
		$query = $this->db	->select('pass_out')
							->get('email_setting');
							
		if($query->num_rows())
		{
			//exit( $this->input->post('old_pass'). $query->row()->pass_out);
			if($this->input->post('old_pass')==$query->row()->pass_out)
			{
				$data = array('pass_out' => $this->input->post('re_pass'));
				
				$this->db->where('pass_out', $this->input->post('old_pass'));
				$this->db->update('email_setting', $data);
				return 'true';
			}
			else
				return 'wrong';
		}
	}
	
	
}