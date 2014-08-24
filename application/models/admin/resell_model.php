<?php

class Resell_Model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function count_rows($table)
	{
		$query = $this->db	->select('count(*) as total')
							->get($table);
		
		if($query->num_rows())
		{
			return $query->row()->total;
		}
	}
	
	public function get_users($limit, $offset)
	{
		$query = $this->db	->limit($limit, $offset)
							->select('*')
							->order_by('datetime desc')
							->get('resale_items');
		if($query->num_rows())
		{
			return $query->result();
		}
						
	}
	

}