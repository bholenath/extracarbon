<?php

class Coupon_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
	}
	
	public function get_total($table, $type)
	{
		if($type==NULL || $type=='all')
			$con = array('1', '0');
		if($type=='active')
			$con = '1';
		if($type=='used')
			$con = '0';
		
		$query = $this->db	->select('count('.$table.'.id) as total')
							->from($table)
							->where_in($table.'.status', $con)
							->get();
		if($query->num_rows())
		{
			return $query->row()->total;
		}
		
	}
	
	
	public function get_all_records($limit, $offset, $type, $table)
	{
		if($type==NULL || $type=='all')
			$con = array('1', '0');
		if($type=='active')
			$con = '1';
		if($type=='used')
			$con = '0';
	
		$query = $this->db	->limit($limit, $offset)
							->select($table.'.id, user_id, coupon_code, amount, used_date, status, email, name, count(user_id) as count')
							->from($table)
							->join('users_info', 'users_info.id = '.$table.'.user_id','left')
							->where_in($table.'.status', $con)
							->order_by($table.'.id','desc')
							->group_by($table.'.user_id')
							->get();
							
		if($query->num_rows())
		{
			return $query->result();
		}
	}
	
	public function get_coupon_detail($limit, $offset, $id, $type)
	{
		if($type==NULL || $type=='all')
			$con = array('1', '0');
		if($type=='active')
			$con = '1';
		if($type=='used')
			$con = '0';
	
		$query = $this->db	->limit($limit, $offset)
							->select('coupons.id, user_id, coupon_code, amount, used_date, status, email, name ')
							->from('coupons')
							->join('users_info', 'users_info.id = coupons.user_id','left')
							->where('coupons.user_id', $id)
							->where_in('coupons.status', $con)
							->order_by('coupons.id','desc')
							->get();
							
		if($query->num_rows())
		{
			return $query->result();
		}
	}
	
	
	public function get_total_coupons($id, $type)
	{
		if($type==NULL || $type=='all')
			$con = array('1', '0');
		if($type=='active')
			$con = '1';
		if($type=='used')
			$con = '0';
		
		$query = $this->db	->select('count(coupons.id) as total')
							->from('coupons')
							->where('user_id', $id)
							->where_in('coupons.status', $con)
							->get();
		if($query->num_rows())
		{
			return $query->row()->total;
		}
		
	}
	
}
	