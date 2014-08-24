<?php

class Carpool_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
	}
	
	
	public function get_total($table, $con)
	{
		if($con=='' || $con==NULL || $con=='all')
			$param = array('1', '0');
		if($con=='cn')
			$param = 1;
		if($con=='un')
			$param = 0;
			
		$query = $this->db	->select('count(id) as total')
							->where_in('status ', $param)
							->get($table.'_reg');
		if($query->num_rows())
			return $query->row()->total;
			
	}
	
	
	public function get_all_records($limit, $offset, $con, $table)
	{
		
		if($con=='' || $con==NULL || $con=='all')
			$param = array('1', '0');
		if($con=='cn')
			$param = 1;
		if($con=='un')
			$param = 0;
			
		$fld = $table=='offer'?'car_rc':'id_proof';
		$query = $this->db	->limit($limit, $offset)
							->select('user_id, name, '.$table.'_reg.email, contact_no, address, pincode, '.$fld.', status')
							->where_in('status ', $param)
							->from($table.'_reg')
							->join('users_info', 'users_info.id = '.$table.'_reg.user_id')
							->order_by(''.$table.'_reg.date_time', 'desc')
							->get();
		
		if($query->num_rows())
		{	
			return $query->result();
		}
	}
	
	
	
	
	
}