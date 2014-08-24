<?php

class Other_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
	}
	
	public function get_email_pass($field)
	{	
		$query = $this->db	->select($field)
							->get('email_setting');
							
		if($query->num_rows())
			return $query->row()->$field;
	}

}