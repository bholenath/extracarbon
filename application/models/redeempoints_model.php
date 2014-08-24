<?php

class Redeempoints_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
	
	}
	
	public function active_coupon_exists()
	{
		$query = $this->db	->select('id')
							->where('user_id', $this->session->userdata('userid'))
							->where('status', 1)
							->get('coupons');
							
		if($query->num_rows())
		{
			return $query->row()->id;
		}
	}
	
	
	public function get_used_coupon_amount()
	{
	
		$sum = 0;
		
		$query = $this->db	->select('id, user_id, amount')
							->where('user_id', $this->session->userdata('userid'))
							->where('status', 0)
							->get('coupons');
							
		if($query->num_rows())
		{
			foreach($query->result() as $cpn)
			{
				$sum += $cpn->amount;
				
			}
			
			return $sum;
		}
		
	}
	
	
	public function get_new_coupon_amount()
	{
	
		$sum = 0;
		
		$query = $this->db	->select('id, user_id, amount')
							->where('user_id', $this->session->userdata('userid'))
							->where('status', 1)
							->get('coupons');
							
		if($query->num_rows())
		{
			return $query->row()->amount;
		}
			
	
	}
	
	public function insert_coupon($code, $amount)
	{
		$data = array (
						'user_id'		=> $this->session->userdata('userid'),
						'coupon_code'	=> $code,
						'amount'		=> $amount,
						'status'		=> 1
					);


					
		$this->db->insert('coupons', $data);

		}	
	
	
	public function update_coupon($id, $code, $amount)
	{
		$data = array (
						'coupon_code'	=> $code,
						'amount'		=> $amount,
					);
					
		$this->db->where('id', $id);
		$this->db->update('coupons', $data);
		
	}	
	
	
	public function generate_coupon()
	{
	
		$query = $this->db	->select('id, user_id, metro_point, waste_pick_point')
							->where('user_id', $this->session->userdata('userid'))
							->get('user_points');
							
		if($query->num_rows())
		{
			$sum 	= ($query->row()->metro_point + $query->row()->waste_pick_point);
			
			$code 	= $query->row()->id.'_'.$query->row()->user_id.'_'.date('Y-m-d_gis');
			
			$diff	= $this->get_used_coupon_amount();
			
			if($sum>=100)
			{
				if($id = $this->active_coupon_exists())
				{
					$old_amount = $this->get_new_coupon_amount();
					
					if(($sum - $diff) > $old_amount )
					{
						$new_amount = $sum - $diff;
					
						$this->update_coupon($id, $code, $new_amount);
					}
					
				}
				else
				{
					$new_amount = $sum - $diff;
					
					if($sum > $diff && $new_amount>100)
					{
						
						$this->insert_coupon($code, $new_amount);
					}
				}
				
			}
		}
							
	}
	
	public function get_coupon()
	{
		$query = $this->db	->select('id, user_id, coupon_code, amount, status')
							->where('user_id', $this->session->userdata('userid'))
							->where('status', 1)
							->get('coupons');
							
		if($query->num_rows())
		{
			return $query->row();
		}
	
			
	}
	
	
	
	public function get_all_coupons()
	{
		$query = $this->db	->select('id, user_id, coupon_code, amount, used_date, status')
							->where('user_id', $this->session->userdata('userid'))
							->get('coupons');
							
		if($query->num_rows())
		{
			return $query->result();
		}
	}
	
}
	