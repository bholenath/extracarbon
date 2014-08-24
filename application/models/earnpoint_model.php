<?php

class earnpoint_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
	}
	
	
	public function save_contact($contact_add, $contact_no)
	{
		$contact_data = array(
								'contact_add' => $contact_add,
								'contact_no' => $contact_no
							);
							
		
		$this->db->where('email', $this->session->userdata('username'));		
		$this->db->update('users_info', $contact_data);

	}
	
	
	public function get_email_pass($field)
	{	
		$query = $this->db	->select($field)
							->get('email_setting');
							
		if($query->num_rows())
			return $query->row()->$field;
	}
	
	public function save_user_choice($car_no, $trvl_choice, $trvl_choice_2)
	{
		
		$choice_data = array(
								'user_id'=>$this->session->userdata('userid'),
								'car_own'=> ($car_no=='0'?'no':'yes'),
								'car_no'=>$car_no,
								'travel_choice'=>$trvl_choice,
								'travel_choice_2'=>$trvl_choice_2,
								'status'=>'1'	
							);
		
		$this->db->where('user_id', $this->session->userdata('userid'));		
		$this->db->update('user_choice', $choice_data);
		{
			return 'success';
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
	
	public function save_ticket()
	{
		$data = array(
						'user_id' 	=> $this->session->userdata('userid'),
						'title'		=> $this->session->userdata('userid').'_'.date('Y_m_d_gis').'.jpg',
						'amount'	=> $this->input->post('amount'),
						'bill_no'	=> $this->input->post('bill_no'),
						'date_time' => date('Y-m-d g:i:s'),
						'status'	=> 'new'
					);
		
		if($this->db->insert('user_tickets', $data))
			return true;
	}
	
	public function change_password()
	{
		$data = array(
						'old_password' => md5($this->input->post('old_pss')),
						'new_password' => $this->input->post('new_pss'),
						'c_password' => $this->input->post('re_pss')
					);
		
		$query = $this->db	->select('password')
							->where('password', $data['old_password'])
							->get('users_info');

		if($query->num_rows()>0)
		{
			
			if($data['new_password']==$data['c_password'])
			{
				
				$this->db->where('id', $this->session->userdata('userid'));
				$this->db->update('users_info', array('password'=>md5($data['c_password'])));
				return true;
			}
			else
				return 'New Password and Confirm Password does not match.';
		}
		else
			return 'Wrong Old Password';
		
	}
	
	/*
	public function process_request($type)
	{
	
		if($type=='waste')
		{
			$op = 'waste_pick';
		}
		else if($type=='bag')
		{
			$op = 'recycle_bag';
		}
		else if($type=='plant')
		{
			$op = 'plant';
		}
		
		$this->db->where('date', date('Y-m-d'));
		$this->db->where('user_id', $this->session->userdata('userid'));
		$this->db->from('user_requests');
		
		
		if($this->db->count_all_results()==0)
		{
			
			$req_data = array(
								'user_id'		=> $this->session->userdata('userid'),
								"$op" 			=> 1,
								'date'			=> date('Y-m-d'),
								"$op"."_status"	=> 'new'
							);
			
			if($this->db->insert('user_requests', $req_data))
				return true;
		
		}
		else
		{
			
			
			$where =  array('date'=>date('Y-m-d'), 'user_id'=>$this->session->userdata('userid'));
			
			if($this->db->update('user_requests', array("$op" => 1, "$op"."_status"=>'new'), $where))
				return true;
		
		}
	}
	
	*/
	
	public function save_address($type, $phone, $address)
	{
		$req_data = array(
							'user_id'	=> $this->session->userdata('userid'),
							'contact_no'=> $phone,
							'address'	=> $address,
							'date_time' => date('Y-m-d g:i:s')
						);
			
		if($this->db->insert($type.'_address', $req_data))
			return true;
		
	}
	
	public function _request($type)
	{
		$req_data = array(
							'user_id'		=> $this->session->userdata('userid'),
							'request'		=> 1,
							'date_time'		=> date('Y-m-d g:i:s'),
							'status'		=> 'new'
							);
			
		if($this->db->insert($type.'_request', $req_data))
			return true;
	}
	
	
	public function get_last_address($type, $user_id)
	{
		$query = $this->db	->select('id, user_id, contact_no, address')
							->where('user_id', $user_id)
							->order_by('id', 'DESC')
							->limit('1')
							->get($type.'_address');
		
		if($query->num_rows())
		{
			return $query->row();
		}
	}
	
	
	public function check_bill_no($bill_no)
	{
		$query = $this->db	->select('id')
							->where('bill_no', $bill_no)
							->get('user_tickets');
							
		if($query->num_rows()>0)
		{
			return 'false';
		}
		else
			return 'true';
	}
	
}