<?php

class Dashboard_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
	
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
	
	public function get_metro_total()
	{
		$query = $this->db	->select('id, user_id, metro_point')
							->where('user_id', $this->session->userdata('userid'))
							->get('user_points');
							
		if($query->num_rows()>0)
		{
			return $query->row()->metro_point;
		}
	}
	
	
	public function get_user_data($email)
	{
		$query = $this->db	->select('	users_info.id, name, email, gender, 
										metro_card_no, metro_point, waste_pick_point, coupon_points'
									)
							->from('users_info')
							->join('user_points', 'user_points.user_id = users_info.id', 'left')
							->where('email', $email)
							->get();
							
		if($query->num_rows())
			return $query->row();
			
	}
	
	
	public function get_user_pool_data()
	{
		$query = $this->db	->select('id, email, contact_no, address, pincode, car_rc')
							->where('user_id', $this->session->userdata('userid'))
							->get('offer_reg');
							
		if($query->num_rows())
			return $query->row();
	}
	
	
	public function get_user_request_data()
	{
		$query = $this->db	->select('id, email, contact_no, address, pincode, id_proof')
							->where('user_id', $this->session->userdata('userid'))
							->get('request_reg');
							
		if($query->num_rows())
			return $query->row();
	}
	
	public function save_basic_info($name, $metro, $gender, $id)
	{
		$data = array (
						'name'			=> $name,
						'metro_card_no'	=> $metro,
						'gender'		=> $gender
					);
						
		$this->db->where('id', $id);
		if($this->db->update('users_info', $data))
			return 'Successfully Updated';
		else
			return 'Not updated';
			
	}
	
	public function save_changed_password($new_pss,$old_pss,$id1)
	{
		$data = array (
						'password'	=> md5($new_pss)
						//'metro_card_no'	=> $metro,
						//'old_password'	=> $old_pss
					);
					
		$query = $this->db	->select('name')							
							->where('id', $id1)
							->where('password', md5($old_pss))
							->get('users_info');	
							
		if($query->num_rows() == 0)
		{		
		return 'Wrong Old Password. Try Again.'	;				
		}
		else
		{				
		$this->db->where('id', $id1);
		
		if($this->db->update('users_info', $data))		
			return 'Password Successfully Changed.';
			
		else
			return 'Password Not Changed. Try Again.';
		}			
			
	}
		
	public function save_pool_info($email, $contact, $address, $pincode, $car_rc, $id)
	{
		$data = array (
						'email'			=> $email,
						'contact_no'	=> $contact,
						'address'		=> $address,
						'pincode'		=> $pincode,
						'car_rc'		=> $car_rc
					);
						
		$this->db->where('id', $id);
		if($this->db->update('offer_reg', $data))
			return 'Successfully Updated';
		else
			return 'Not updated';
			
	}
	
	public function save_req_info($email, $contact, $address, $pincode, $id_proof, $id)
	{
		$data = array (
						'email'			=> $email,
						'contact_no'	=> $contact,
						'address'		=> $address,
						'pincode'		=> $pincode,
						'id_proof'		=> $id_proof
					);
						
		$this->db->where('id', $id);
		if($this->db->update('request_reg', $data))
			return 'Successfully Updated';
		else
			return 'Not updated';
			
	}
	
	
	/*
	*	Dashboard Data Mothods  
	*/
	
	
	
	public function get_recent_carpool_offer($limit)
	{
		$query = $this->db	->limit($limit)
							->select('src, dest, offer_date, offer_time, date_time')
							->order_by('date_time','desc')
							->get('car_offer');
		
		if($query->num_rows())
		{
			return $query->result();
		}
	}
	
	public function get_metro_details()
	{
		$id = $this->session->userdata('userid');
		
		$query = "select * from
					(
						select count(id)as ticket from user_tickets
						where user_id=$id 
					) as t1
					join 
					(
						select sum(amount) as total from user_tickets 
						where user_id=$id and status='verified'
					)as t2

					join
					(
						select count(id)as new_ticket from user_tickets
						where user_id=$id and status='new'
					) as t3
					join 
					(
						select sum(amount) as unpaid from user_tickets 
						where user_id=$id and status='new'
					)as t4
				";
				
		$rs = $this->db->query($query);
		
		if($rs->num_rows())
		{
			return $rs->row();
		}
	}
	
	
	public function get_waste_details()
	{
		$id = $this->session->userdata('userid');
		
		$query = "	select * from
					(
						select count(id) as request from waste_request
						where user_id=$id
					) as t1
					join 
					(
						select count(id) as uncomplete from waste_request 
						where user_id=$id and status<>'completed'
					) as t2
					join
					(
						select sum(point) as total from waste_request
						where user_id=$id and status='completed'
					) as t3
				";
				
		$rs = $this->db->query($query);
		
		if($rs->num_rows())
		{
			return $rs->row();
		}
	}
	
	
	
	public function get_bag_plant_details()
	{
		$id = $this->session->userdata('userid');
		
		$query = "	select * from
					(
						select count(id) as bag_req from bag_request
						where user_id=$id
					) as t1
					join
					(
						select count(id) as bag_req_uc from bag_request
						where user_id=$id and status <>'completed'
					)as t11
					join 
					(
						select count(id) as plant_req from plant_request
						where user_id=$id
					) as t2
					join
					(
						select count(id) as plant_req_uc from plant_request
						where user_id=$id and status <>'completed'
					)as t21

				";
				
		$rs = $this->db->query($query);
		
		if($rs->num_rows())
		{
			return $rs->row();
		}
	}
	
	
	public function get_active_coupon()
	{
		$query = $this->db	->select('user_id, coupon_code, amount, status')
							->where('user_id', $this->session->userdata('userid'))
							->where('status', 1)
							->get('coupons');
		if($query->num_rows())
			return $query->row();
			
	}
	
	
	
}