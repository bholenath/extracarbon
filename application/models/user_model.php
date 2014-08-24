<?php

class User_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
	}
	
	public function login()
	{
		$this->db->select('id, metro_card_no, name');
		$this->db->where('email', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('password')));
		$query = $this->db->get('users_info');
		if($query->num_rows()==1)
		{
			
			return $query->row();
		}
		else
			return false;
	}

	public function CheckEmail($email)
	{		
		$query = $this->db->select('id')
					  ->where('email', $email)
					  ->get('users_info');
					  
		if($query->num_rows() >= 1)				
			return true;		
		else 
			return false;		
	}
	
	public function CheckCoupon($coupon,$email)
	{		
		$data = array();
		//$data1 = array();
		
		$query = $this->db->select('cupon_id,rewards')
						  ->where('counpon', $coupon)
						  ->where('redeemed', 'Not')
		 				  ->get('cupons_rewards');
						  
		/*$query1 = $this->db->select('id, metro_card_no, name')
					  ->where('email', $email)
					  ->get('users_info'); */
						  
		if($query->num_rows() == 1)
		{			
			/*$data1 = $query->row_array();
			$this->session->set_userdata('username', $email);
			$this->session->set_userdata('userid', $data1['id']);
			$this->session->set_userdata('metro_card_no', $data1['metro_card_no']);
			$this->session->set_userdata('name', $data1['name']);*/
		
			$data = $query->row_array();
			$id = $data['cupon_id'];
			$this->db->where('cupon_id', $id);
			$val =$this->db->update('cupons_rewards', array('redeemed' =>'Used'));
			$reward = $data['rewards'];			
			
			if($val)
			{
				$query1 = $this->db->select('id')
						  ->where('email',$email)						  
		 				  ->get('users_info');
						  
				$user_id = $query1->row()->id;				
				
				$query2 = $this->db->select('coupon_points')
						  ->where('user_id', $user_id)						  
		 				  ->get('user_points');
				
				$coupon_points = ($reward + $query2->row()->coupon_points);
				
				$this->db->where('user_id', $user_id);				
				$val1 =$this->db->update('user_points', array('coupon_points' => $coupon_points));
				
				return true;				
			}				
		}
		else		
		return false;			
	}
	
	public function CheckCouponNew($coupon)
	{		
		//$data = array();
		//$data1 = array();
		
		$query = $this->db->select('cupon_id')
						  ->where('counpon', $coupon)
						  ->where('redeemed', 'Not')
		 				  ->get('cupons_rewards');
						  
		/*$query1 = $this->db->select('id, metro_card_no, name')
					  ->where('email', $email)
					  ->get('users_info'); */
						  
		if($query->num_rows() == 1)
		{			
			/*$data1 = $query->row_array();
			$this->session->set_userdata('username', $email);
			$this->session->set_userdata('userid', $data1['id']);
			$this->session->set_userdata('metro_card_no', $data1['metro_card_no']);
			$this->session->set_userdata('name', $data1['name']);
		
			$data = $query->row_array();
			$id = $data['cupon_id'];
			$this->db->where('cupon_id', $id);
			$val =$this->db->update('cupons_rewards', array('redeemed' =>'Used'));
			$reward = $data['rewards'];			
			
			if($val)
			{
				$query1 = $this->db->select('id')
						  ->where('email',$email)						  
		 				  ->get('users_info');
						  
				$user_id = $query1->row()->id;				
				
				$query2 = $this->db->select('coupon_points')
						  ->where('user_id', $user_id)						  
		 				  ->get('user_points');
				
				$coupon_points = ($reward + $query2->row()->coupon_points);
				
				$this->db->where('user_id', $user_id);				
				$val1 =$this->db->update('user_points', array('coupon_points' => $coupon_points));							
			}	*/
			return true;				
		}
		else		
		return false;			
	}

	public function get_email_pass($field)
	{	
		$query = $this->db	->select($field)
							->get('email_setting');
							
		if($query->num_rows())
			return $query->row()->$field;
	}
	
	public function signup()
	{
		$data = array(
						'name' => $this->input->post('name'),
						'email' => $this->input->post('email'),
						'password' => md5($this->input->post('password')),
						'metro_card_no' => $this->input->post('card_no'),
						'gender' => $this->input->post('gender'),
						'date' => date('Y-m-d')
						);

		
		
		if(	$this->db->insert('users_info', $data))
		{
			
			$uid = $this->get_userid($data['email'], $data['password']);

			
			$this->db->insert('user_points', array('user_id'=> $uid));
			
			/*		$this->db->insert('user_choice', array('user_id'=> '255'));					*/
		
			return true;
		}
	}
	
	public function signup_new()
	{
		$email = $this->input->post('email_new');
		if($email)
		{
			$data=array();
			$this->db->select('id, metro_card_no, name');
			$this->db->where('email', $email);
			$query = $this->db->get('users_info');
			if($query->num_rows()==1)
			{
				$data =  $query->row_array();
				$this->session->set_userdata('username', $this->input->post('username'));
				$this->session->set_userdata('userid', $data['id']);
				$this->session->set_userdata('metro_card_no',$data['metro_card_no']);
				$this->session->set_userdata('name', $data['name']);
				return true;
			}
			else {
				$data = array(
						'name' => $this->input->post('name_new'),
						'email' => $this->input->post('email_new'),
						'password' => md5($this->input->post('password_new')),
						'date' => date('Y-m-d')
						);

		
		
		if(	$this->db->insert('users_info', $data))
		{
			
			$uid = $this->get_userid($data['email'], $data['password']);

			
			$this->db->insert('user_points', array('user_id'=> $uid));
			
			/*		$this->db->insert('user_choice', array('user_id'=> '255'));					*/
		
			return true;
		}
			}
				
			
		}
		
		
	}
	
	public function get_userid($email)
	{
		$query = $this->db	->select('id')
							->where('email',$email)
							->get('users_info');
							
		if($query->num_rows())
		return $query->row()->id;		
	}
	
	public function user_id()
	{
		$this->db->select('id');
		$this->db->where('email', $this->input->post('email'));
		$this->db->where('password', md5($this->input->post('password')));
		$query = $this->db->get('users_info');
		if($query->num_rows()==1)
		{
			return $query->row()->id;
		}
		else
			return false;
	}
	
	
	public function get_data($model)
	{
		$query1 = mysql_query("SELECT DISTINCT company_image,company FROM ewaste_items WHERE type=$model");
		$d=0;
		$rows = mysql_num_rows($query1);
		if($rows == 0)
		{
		$array="";
		$model_data = json_encode($array);
		return $model_data;
		}
		else
		{
		while ($row1 = mysql_fetch_array($query1)) 
		{
  		$array[$d] = $row1;
		$d++;
		}
		$model_data = json_encode($array);
		return $model_data;
		}
	}	
	
	
	public function check_email($email)
	{
		$query = $this->db	->select('email')
							->where('email', $email)
							->get('users_info');
		if($query->num_rows())
			return 'true';
		else
			return 'false';
	}
	
	
	public function set_new_password($email, $pass)
	{
		$this->db->where('email', $email);
		$this->db->update('users_info', array('password' =>md5($pass)));
	}
	
	
	public function signup_with_item($password)
	{
		
		$data = array(
						'name' 			=> 'New User',
						'email' 		=> $this->input->post('email'),
						'password' 		=> $password,
						'metro_card_no' => '',
						'gender' 		=> '',
						'date' 			=> date('Y-m-d')
					);

		
		
		if(	$this->db->insert('users_info', $data))
		{
			
			$uid = $this->get_userid($data['email']);

			
			$this->db->insert('user_points', array('user_id'=> $uid));
			
			$data1 = array(
							'user_id'		=> $uid,
							'contact_no'	=> $this->input->post('phone'),
							'email'			=> $this->input->post('email'),
							'item_name'		=> $this->input->post('name'),
							'description'	=> $this->input->post('description'),
							'pic'			=> $uid.'_'.date('Y_m_d_gis').'.jpg'
						);
		
			if($this->db->insert('resale_items', $data1))
				return true;
		}
	}
	public function signup_with_item_new($password)
	{
		
		$data = array(
						'name' 			=> $this->input->post('name_new'),
						'email' 		=> $this->input->post('email_new'),
						'password' 		=> $password,
						'metro_card_no' => '',
						'gender' 		=> '',
						'date' 			=> date('Y-m-d')
					);

		
		
		if(	$this->db->insert('users_info', $data))
		{
			
			$uid = $this->db->insert_id();
			
			$data1 = array(
							'user_id'		=> $uid,
							'contact_no'	=> $this->input->post('phone_new'),
							'address'		=> $this->input->post('description_new'),
							'date_time' 	=> date('Y-m-d')
						);
			$aa = $this->db->insert('plant_address', $data1);
			if($aa)
			{
			$data2 = array(
							'user_id'		=> $uid,
							'request'		=> 1,
							'status'		=> 'new',
							'plant_point'	=> 2,
							'date_time' 	=> date('Y-m-d')
						);
			$this->db->insert('plant_request', $data2);
				return true;
				
			}
				
		}
	}
	public function login_new($email)
	{
		if($email) {
			$val = 2;
			$data = array();
			$data1 = array();
		$this->db->select('*');
		$this->db->where('email', $email);
		$query = $this->db->get('users_info');
		if($query->num_rows()==1)
		{	
			$data =  $query->row();
		}
		//echo '<pre>';print_r($data);die;
		$uid = $data->id;
		if($uid) {
			$data2 = array(
							'user_id'		=> $uid,
							'request'		=> 1,
							'status'		=> 'new',
							'plant_point'	=> 2,
							'date_time' 	=> date('Y-m-d')
						);
			$this->db->insert('plant_request', $data2);
				return true;
			
			
			return true;
		}
		}
	}

}
