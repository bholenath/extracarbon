<?php

class Showpoint_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
	
	}
	
	public function get_metro_points($limit, $segment)
	{
		$query = $this->db	->limit($limit, $segment)
							->select('id, user_id, title, amount, bill_no, date_time, status')
							->where('user_id', $this->session->userdata('userid'))
							->order_by('id', 'Desc')
							->get('user_tickets');
							
		if($query->num_rows()>0)
		{
			return $query->result();
		}
	}
	
	
	public function get_metro_total()
	{
		$query = $this->db	->select('id, user_id, metro_point')
							->where('user_id', $this->session->userdata('userid'))
							->get('user_points');
							
		if($query->num_rows()>0)
		{
			return $query->row();
		}
	}
	
	public function get_total_rows($table)
	{
		$query= $this->db	->select('count(id) as cnt')
							->where('user_id', $this->session->userdata('userid'))
							->get($table);
		if($query->num_rows()>0)
		{
			return $query->row()->cnt;
		}
	}
	
	
	public function get_waste_points($limit, $segment)
	{
		$query = $this->db	->limit($limit, $segment)
							->select('id, user_id, point, date_time, status')
							->where('user_id', $this->session->userdata('userid'))
							->order_by('id', 'Desc')
							->get('waste_request');
							
		if($query->num_rows()>0)
		{
			return $query->result();
		}
	}
	
	public function get_waste_total()
	{
		$query = $this->db	->select('waste_pick_point')
							->where('user_id', $this->session->userdata('userid'))
							->get('user_points');
							
		if($query->num_rows()>0)
		{
			return $query->row()->waste_pick_point;
		}
	}
	
	public function get_coupon_total()
	{
		$query = $this->db	->select('coupon_points')
							->where('user_id', $this->session->userdata('userid'))
							->get('user_points');
							
		if($query->num_rows()>0)
		{
			return $query->row()->coupon_points;
		}
	}
	
	public function get_ticket($id)
	{
		$query = $this->db	->select('id, user_id, title, amount, bill_no')
							->where('id', $id)
							->get('user_tickets');
							
		if($query->num_rows()>0)
		{
			return $query->row();
		}
	}
	
}
	