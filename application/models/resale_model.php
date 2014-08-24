<?php

class Resale_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
	
	}
	
	public function save_item_info($pic)
	{
		$data = array(
						'user_id'		=> $this->session->userdata('userid'),
						'contact_no'	=> $this->input->post('phone'),
						'email'			=> $this->input->post('email'),
						'item_name'		=> $this->input->post('name'),
						'description'	=> $this->input->post('description'),
						'pic'			=> $pic
					);
		
		if($this->db->insert('resale_items', $data))
			return true;
	}
	
	public function get_userid($email)
	{

		$query = $this->db	->select('id')
							->where('email', $email)
							->get('users_info');
							
		if($query->num_rows())
			return $query->row()->id;
		
	}
	
	
}