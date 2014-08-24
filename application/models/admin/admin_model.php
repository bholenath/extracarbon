<?php 

class Admin_Model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function login()
	{
		$query = $this->db	->select('username')
							->where('username', $this->input->post('username'))
							->where('password', $this->input->post('password'))
							->get('admin_login');
		if($query->num_rows())
		{
			return true;
		}
		else
			return false;
	}
	
	public function entry_login()
	{
		$query = $this->db	->select('username')
							->where('username', $this->input->post('username'))
							->where('password', $this->input->post('password'))
							->get('entry_login');
		if($query->num_rows())
		{
			return true;
		}
		else
			return false;
	}
	
	public function get_rate($item,$society)
	{
		$query = $this->db	->select('item_rate')
							->where('item_name', $item)
							->get('waste_items');
							
		$query1 = $this->db	->select('multi_factor,feriwala_name')
							->where('society_name', $society)
							->get('societies');
							
		$row = $query->row();
		$row1 = $query1->row();
		$rate = ($row->item_rate * $row1->multi_factor);
		$name = $row1->feriwala_name;
		$data = array($rate,$name);
		$data_array = json_encode($data);		
		return $data_array;
	}
	
	public function view_users($limit, $offset)
	{
	
		$query = $this->db	->limit($limit, $offset)
							->select('users_info.id, name, email, metro_point, date, waste_pick_point, metro_card_no, gender')
							->from('users_info')
							->join('user_points', 'user_points.user_id = users_info.id','left')
							->order_by('users_info.id', 'desc')
							->get();
							
		if($query->num_rows())
		{
			return $query->result();
		}
	}
	
	
	public function today_users($limit, $offset)
	{
	
		$query = $this->db	->limit($limit, $offset)
							->select('users_info.id, name, email, metro_point, date, waste_pick_point, metro_card_no, gender')
							->from('users_info')
							->join('user_points', 'user_points.user_id = users_info.id','left')
							->where('date = date(now())')
							->order_by('users_info.id', 'desc')
							->get();
							
		if($query->num_rows())
		{
			return $query->result();
		}
	}
	
	public function amount_collection($limit, $offset)
	{
	
		$query = $this->db	->limit($limit, $offset)
							->select('id,society_name, feriwala_name, sum(amount_self) as total_amount, sum(quantity) as total_waste')
							->from('society_collection')							
							->group_by('society_name')
							->get();
							
		if($query->num_rows())
		{
			return $query->result();
		}
	}
	
	public function waste_collection($limit, $offset)
	{
	
		$query = $this->db	->limit($limit, $offset)
							->select('id, item_name, sum(amount_self) as amount_for_waste, sum(quantity) as waste_collected')
							->from('society_collection')							
							->group_by('item_name')
							->get();
							
		if($query->num_rows())
		{
			return $query->result();
		}
	}
	
	public function feriwala_collection($limit, $offset)
	{
	
		$query = $this->db	->limit($limit, $offset)
							->select('id, society_name, feriwala_name, sum(amount_feriwala) as amount_to_feriwala, 
							sum(quantity) as waste_collected_by_feriwala')
							->from('society_collection')							
							->group_by('feriwala_name')
							->get();
							
		if($query->num_rows())
		{
			return $query->result();
		}
	}
	
	public function count_users()
	{
		
		$query = $this->db	->select('id')
							->get('users_info');
		if($query->num_rows())
			return $query->num_rows();
	}
	
	
	public function count_collection()
	{
		$query = $this->db->query('select sum(amount_self) as a from society_collection');
		$row = $query->row();
		return $row->a;
	}
	
	public function count_collection_feriwala()
	{
		
		$query = $this->db->query('select sum(amount_feriwala) as b from society_collection');
		$row = $query->row();
		return $row->b;
	}
	
	public function count_waste()
	{
		
		$query = $this->db->query('select sum(quantity) as c from society_collection');
		$row = $query->row();
		return $row->c;
	}
	
	public function count_societies()
	{
		
		$query = $this->db->query('select distinct society_name from society_collection');
		$row = $query->num_rows();
		return $row;
	}
	
	
	public function count_users_today()
	{
		
		$query = $this->db	->select('id')
							->where('date = date(now())')
							->get('users_info');
		if($query->num_rows())
			return $query->num_rows();
	}
	
	
	public function del_user($id)
	{
		$data = array('id' => $id);
		
		if($this->db->delete('users_info', $data))
			return true;
	
	}
	
	
	/* ---------- User Details and Verify Ticket -----------*/
	
	
	public function count_tickets($uid, $slug)
	{
		if($slug==Null || $slug=='all')
			$con = array('verified', 'new');
		if($slug=='new')
			$con='new';
		if($slug=='verified')
			$con='verified';
		
		$query = $this->db	->select('count(id) as total')
							->where('user_id', $uid)
							->where_in('status', $con)
							->get('user_tickets');
		if($query->num_rows())
			return $query->row()->total;
		
	}
	
	
	
	public function get_ticket($limit, $offset, $user_id, $slug)
	{
				
		if($slug==Null || $slug=='all')
			$con = array('verified', 'new');
		if($slug=='new')
			$con='new';
		if($slug=='verified')
			$con='verified';
		
		$query = $this->db	->limit($limit, $offset)
							->select('	users_info.id as id, user_tickets.id as ticket_id, bill_no,
										name, email, title, amount, user_tickets.date_time, status')
							->from('user_tickets')
							->join('users_info', 'users_info.id = user_tickets.user_id', 'left')
							->where('user_id', $user_id)
							->where_in('status',$con)
							->order_by('ticket_id','DESC')
							->get();
							
		if($query->num_rows())
			return $query->result();
							
	}
	
	public function set_ticket_status($id)
	{
		$data = array('status' => 'verified');
		
		$this->db->where('id' ,$id);
		if($this->db->update('user_tickets', $data))
			return true;
	}
	
	
	public function get_user_amount($id)
	{
		$query = $this->db	->select('amount')
							->where('id', $id)
							->get('user_tickets');
		if($query->num_rows())
			return $query->row()->amount;
	}
	
	
	public function save_point($user_id, $id)
	{
		$point = (($this->get_user_amount($id)*1)/100);	
		
	
	 if($this->db->query('update user_points set metro_point = `metro_point`+'.$point.' where user_id='.$user_id))
		return true;
	}
	
	public function user_details($id)
	{
		$query = $this->db	->select('*')
							->from('users_info')
							->join('user_tickets', 'user_tickets.user_id=users_info.id', 'left')
							->join('user_points', 'user_points.user_id=users_info.id', 'left')
							->where('users_info.id', $id)
							->get();
							
		if($query->num_rows())
		{
			return $query->row();
		}
		
	}
	
	public function get_user_summary($id)
	{
		$id = (int)$id;
		
		$sql = 'SELECT count( id ) AS total_metro_tkt, a.new_metro_tkt, b.verified_metro_tkt,
				plant.total_plant_rqst, plant_a.new_plant_rqst, plant_b.verified_plant_rqst, plant_c.dispatched_plant_rqst, 
				waste.total_waste_rqst, waste_a.new_waste_rqst, waste_b.verified_waste_rqst, waste_c.dispatched_waste_rqst,
				bag.total_bag_rqst, bag_a.new_bag_rqst, bag_b.verified_bag_rqst, bag_c.dispatched_bag_rqst 
				FROM user_tickets 
				LEFT JOIN (
					SELECT count( id ) AS new_metro_tkt, user_id
					FROM user_tickets
					WHERE user_id ='.$id.'
					AND STATUS = "new"
					) AS a ON a.user_id = user_tickets.user_id
				LEFT JOIN (
					SELECT count( id ) AS verified_metro_tkt, user_id
					FROM user_tickets
					WHERE user_id ='.$id.'
					AND STATUS = "verified"
					) AS b ON b.user_id = user_tickets.user_id

				left join(

					select count(id) as total_plant_rqst, user_id
					from plant_request
					where user_id='.$id.'
					)as plant on plant.user_id = user_tickets.user_id

				left join(
					select count(id) as new_plant_rqst, user_id
					from plant_request
					where user_id='.$id.' and status="new"
					)as plant_a on plant_a.user_id = user_tickets.user_id
					
				left join(
					select count(id) as dispatched_plant_rqst, user_id
					from plant_request
					where user_id='.$id.' and status="dispatched"
					)as plant_c on plant_c.user_id = user_tickets.user_id

				left join(
					select count(id) as verified_plant_rqst, user_id
					from plant_request
					where user_id='.$id.' and status="completed"
					)as plant_b on plant_a.user_id = user_tickets.user_id

				left join(

					select count(id) as total_waste_rqst, user_id
					from waste_request
					where user_id='.$id.'
					)as waste on waste.user_id = user_tickets.user_id

				left join(
					select count(id) as new_waste_rqst, user_id
					from waste_request
					where user_id='.$id.' and status="new"
					)as waste_a on plant_a.user_id = user_tickets.user_id
					
				left join(
					select count(id) as dispatched_waste_rqst, user_id
					from waste_request
					where user_id='.$id.' and status="dispatched"
					)as waste_c on plant_a.user_id = user_tickets.user_id	

				left join(
					select count(id) as verified_waste_rqst, user_id
					from waste_request
					where user_id='.$id.' and status="completed"
					)as waste_b on plant_a.user_id = user_tickets.user_id
					
					
				left join(

					select count(id) as total_bag_rqst, user_id
					from bag_request
					where user_id='.$id.'
					)as bag on bag.user_id = user_tickets.user_id

				left join(
					select count(id) as new_bag_rqst, user_id
					from bag_request
					where user_id='.$id.' and status="new"
					)as bag_a on bag_a.user_id = user_tickets.user_id
				
				left join(
					select count(id) as dispatched_bag_rqst, user_id
					from bag_request
					where user_id='.$id.' and status="dispatched"
					)as bag_c on bag_a.user_id = user_tickets.user_id

				left join(
					select count(id) as verified_bag_rqst, user_id
					from bag_request
					where user_id='.$id.' and status="completed"
					)as bag_b on bag_a.user_id = user_tickets.user_id
					
				WHERE user_tickets.user_id ='.$id.'';
		
		$query = $this->db->query($sql);
		
			if($query->num_rows()>0)
			{
				return $query->row();
			}
	}
	
	
	public function get_other_details($id)
	{
		
		$query = "	select * from
					(
						select id, user_id, (contact_no) as cnt1, COALESCE(address,'a') as add1 from bag_address
						where id=
						(select max(id) from bag_address where user_id=$id )
					) as t2
					right join
					(
						select id, user_id, contact_no as cnt2, COALESCE(address,'a') as add2 from plant_address
						where id=
						(select max(id) from plant_address where user_id=$id)
					) as t1
					on t1.user_id= t2.user_id
					left join
					(
						select id, user_id, COALESCE(contact_no,'a') as cnt3, COALESCE(address,'a') as add3 from waste_address
						where id=
						(select max(id) from waste_address where user_id=$id)
					) as t3
					on t2.user_id= t3.user_id
				";
		
		$rs = $this->db->query($query);
		
		if($rs->num_rows())
		{
			return $rs->row();
		}
		
	}
	
	/*
	*	methods for summery at home page 
	*/
	
	public function total_plant_req()
	{
		$query = $this->db	->select('count(id) as total')
							->where('status', 'completed')
							->get('plant_request');
		if($query->num_rows())
		{
			return $query->row()->total;
		}
	}
	
	
	public function total_waste_req()
	{
		$query = $this->db	->select('count(id) as total')
							->where('status','completed')
							->get('waste_request');
		if($query->num_rows())
		{
			return $query->row()->total;
		}
	}
	
	
	
	public function total_bag_req()
	{
		$query = $this->db	->select('count(id) as total')
							->where('status', 'completed')
							->get('bag_request');
		if($query->num_rows())
		{
			return $query->row()->total;
		}
	}
	
	
	public function available_car_offer()
	{
		$query = $this->db	->select('count(id) as total')
							->where('offer_date > date(now())')
							->get('car_offer');
		if($query->num_rows())
		{
			return $query->row()->total;
		}
	}
	
	
	public function get_coupon_info()
	{
		$sql = "select * from 
					( select count(id) as used from coupons where status=0 ) as t1
				join 
					(select count(id) as new from coupons where status=1) as t2
				";
		$query = $this->db->query($sql);
		
		if($query->num_rows())
			return $query->row();
		
	}
	
	
	
}