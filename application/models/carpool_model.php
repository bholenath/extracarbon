<?php

class Carpool_model extends CI_Model
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
	
	public function get_total_result()
	{
		if($this->input->get('date'))
		{
			$date 	= date('Y-m-d', strtotime($this->input->get('date')));
		}
		else
			$date	= '';
		
		
		if($this->input->get('time1'))
		{
			$time	= $this->input->get('time1').':'.$this->input->get('time2').' '.$this->input->get('time3');
		}
		else 
			$time = '';
			
		
		$query = $this->db	->select('count(id) as cnt')
							->like('dest', $this->input->get('to'))
							->like('src' , $this->input->get('from'))
							->like('offer_date', $date)
							->like('offer_time', $time)
							->get('car_offer');
		if($query->num_rows())
		{
			return $query->row()->cnt;
		}
	}
	
	public function search_pool_offer($limit, $offset)
	{
		if($this->input->get('date'))
		{
			$date 	= date('Y-m-d', strtotime($this->input->get('date')));
		}
		else
			$date	= '';
		
		
		if($this->input->get('time1'))
		{
			$time	= $this->input->get('time1').':'.$this->input->get('time2').' '.$this->input->get('time3');
		}
		else 
			$time = '';
			
		$query = $this->db	->limit($limit, $offset)
							->select('*')
							->like('dest', $this->input->get('to'))
							->like('src' , $this->input->get('from'))
							->like('offer_date', $date)
							->like('offer_time', $time)
							->get('car_offer');
		
		/*
		$sql = 'select * from car_offer 
				where offer_date >'.date('Y-m-d').' 
				and dest LIKE "%'.$this->input->get('to').'%" 
				and src LIKE "%'.$this->input->get('from').'%" 
				and offer_date LIKE "%'.$this->input->get('date').'%" 
				and minute(offer_time) > minute('.$this->input->get('time').')-30 and minute(offer_time) < minute ( '.$this->input->get('time').')+30 b';
		
		$query = $this->db->query($sql);
		
		*/
		
		if($query->num_rows())
		{
			return $query->result();
		}
		
		
	}
	
	
	
	public function check_status($type)
	{
		$query = $this->db	->select('status')
							->where('user_id', $this->session->userdata('userid'))
							->get($type.'_reg');
		
		if($query->num_rows())
		{
			if($query->row()->status==1)
			{
				return true;
			}
			else
				return false;
		}
		else
			return false;
	}
	
	
	
	public function register_offer_details()
	{
		
		$data = array(
						'user_id'		=> $this->session->userdata('userid'),
						'email'			=> $this->input->post('email'),
						'contact_no'	=> $this->input->post('contact_no'),
						'address'		=> $this->input->post('address'),
						'pincode'		=> $this->input->post('pincode'),
						'car_rc'		=> $this->input->post('car_rc'),
						'date_time'		=> date('Y-m-d g:i:s'),
						'status'		=> 0
					);
						
						
		if($this->db->insert('offer_reg', $data))
			return true;
	}
	
	
	
	public function confirm_details($type)
	{
		$data = array('status' =>1);
		
		$this->db->where('user_id', $this->session->userdata('userid'));
		
		if($this->db->update($type.'_reg', $data))
			return true;
		
	}
		
		
		
	public function save_offer()
	{
		if($this->input->post('time1'))
		{
			$time	= $this->input->post('time1').':'.$this->input->post('time2').' '.$this->input->post('time3');
		}
		else 
			$time = '';
			
			
		if($this->input->post('date'))
		{
			$date 	= date('Y-m-d', strtotime($this->input->post('date')));
		}
		else
			$date	= '';
			
		$data = array(
						'user_id'		=> $this->session->userdata('userid'),
						'src'			=> $this->input->post('src'),
						'dest'			=> $this->input->post('dest'),
						'offer_date'	=> $date,
						'offer_time'	=> $time,
						'date_time'		=> date('Y-m-d g:i:s'),
						'contact_mode'	=> $this->input->post('contact_mode'),
						'payment_mode'	=> $this->input->post('payment_mode')
					);
						
						
		if($this->db->insert('car_offer', $data))
			return true;
	}
	
	
	public function request_register()
	{
		$data = array(
						'user_id' 	=> $this->session->userdata('userid'),
						'email'		=> $_POST['email'],
						'contact_no'=> $_POST['contact_no'],
						'address'	=> $_POST['address'],
						'pincode'	=> $_POST['pin'],
						'id_proof'	=> $_POST['proof_op'].': '.$_POST['proof_val'],
						'date_time'	=> date('Y-m-d g:i:s'),
						'status'	=> 0
						
					);
					
		if($this->db->insert('request_reg', $data))
			return true;
	}
	
	public function get_pooler_detail($id)
	{
		
		$query = $this->db	->select('users_info.id, name, gender, src, dest, offer_date, offer_time, offer_reg.email, offer_reg.contact_no, car_rc, contact_mode, payment_mode')
							->from('users_info')
							->join('offer_reg', 'offer_reg.user_id = users_info.id', 'left')
							->join('car_offer', 'car_offer.user_id = users_info.id', 'left')
							->where('car_offer.id', $id)
							->get();
		
		if($query->num_rows())
			return $query->row();
		else 
			return false;
	}
	
	
	public function get_my_offers($limit, $segment)
	{
		$query = $this->db	->limit($limit, $segment)
							->select('*')
							->where('user_id', $this->session->userdata('userid'))
							->order_by('date_time', 'desc')
							->get('car_offer');
		
		if($query->num_rows())
			return $query->result();
	}
	
	public function delete_my_offer($id)
	{
		$query = $this->db	->where('id',$id)
							->delete('car_offer');
							
		if($query)
			return true;
	}
	
	public function get_total_rows($table)
	{
		$query = $this->db	->select('count(id) as total')
							->where('user_id',  $this->session->userdata('userid'))
							->get($table);
		if($query->num_rows())
			return $query->row()->total;
	}	
	
	
	public function save_user_search()
	{
		if($this->input->get('date'))
		{
			$date 	= date('Y-m-d', strtotime($this->input->get('date')));
		}
		else
			$date	= '';
		
		
		if($this->input->get('time1'))
		{
			$time	= $this->input->get('time1').':'.$this->input->get('time2').' '.$this->input->get('time3');
		}
		else 
			$time = '';
		
		$result = 0;
		
		
		
		$query1 = $this->db	->select('id')
							->like('dest', $this->input->get('to'))
							->like('src' , $this->input->get('from'))
							->like('offer_date', $date)
							->like('offer_time', $time)
							->get('car_offer');
		if($query1->num_rows())
			$result = 1;
		else
			$result = 0;
		
		
		$data = array (	
						'user_id'	=> $this->session->userdata('userid'),
						'src'		=> $this->input->get('from'),
						'dest'		=> $this->input->get('to'),
						'time'		=> $time,
						'date_time'	=> date('Y-m-d g:i:s'),
						'status'	=> $result
						);
		
		
		$this->db->insert('search_list', $data);
		
	}
	

}