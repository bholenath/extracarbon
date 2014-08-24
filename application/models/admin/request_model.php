<?php 


class Request_Model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		
	}
	
	
	public function get_today_total_request()
	{
		$query = $this->db->query('	SELECT count( id ) AS total_plant_req, plant_request.user_id, date_time, 
									waste.total_waste_req, bag.total_bag_req
									FROM plant_request
									LEFT JOIN 
									(
										SELECT count( id ) AS total_waste_req, user_id
										FROM waste_request
										WHERE date( date_time ) = curdate( )
									) AS waste ON waste.user_id = plant_request.user_id
									LEFT JOIN 
									(
										SELECT count( id ) AS total_bag_req, user_id
										FROM bag_request
										WHERE date( date_time ) = curdate( )
									) AS bag ON bag.user_id = plant_request.user_id
									
									WHERE date( plant_request.date_time ) = curdate( ) '
								);
		
		if($query->num_rows())
		{
			return $query->row();
		}
	}
	
	public function get_today_total($type)
	{
		$sql  = 'select count(id) as total from '.$type.'_request where date('.$type.'_request.date_time) =curdate()';
		$query = $this->db	->query($sql);
							
		if($query->num_rows()>0)
			return $query->row()->total;
	}
	
	public function get_all_total($type, $sort)
	{
		$condition='';
		if($sort!="")
			$condition = 'where status="'.$sort.'"';
		
		
		$sql  = 'select count(id) as total from '.$type.'_request '.$condition;
		$query = $this->db	->query($sql);
							
		if($query->num_rows()>0)
			return $query->row()->total;
	}
	
	
	public function get_today_request($limit, $offset, $type)
	{
		
		$query = $this->db->query('SELECT '.$type.'_request.id, '.$type.'_request.user_id, email,'.$type.'_address.contact_no, status , request, '.$type.'_request.date_time
									FROM '.$type.'_request
									LEFT JOIN users_info ON users_info.id = '.$type.'_request.user_id
									left join '.$type.'_address on '.$type.'_address.user_id='.$type.'_request.user_id
									WHERE date( '.$type.'_request.date_time ) = curdate( )
									order by date_time DESC
									LIMIT '.$offset.', '.$limit
								);
								
		if($query->num_rows()>0)
			return $query->result();
	}
	
	
	public function get_all_request($limit, $offset, $type, $sort)
	{
		$condition='';
		if($sort!="")
			$condition = 'where status ="'.$sort.'"';
		
		$query = $this->db->query('SELECT '.$type.'_request.id, '.$type.'_request.user_id, '.$type.'_address.contact_no, email, status , request, '.$type.'_request.date_time
									FROM '.$type.'_request
									LEFT JOIN users_info ON users_info.id = '.$type.'_request.user_id
									'.$condition.'
									left join '.$type.'_address on '.$type.'_address.user_id='.$type.'_request.user_id
									order by date_time DESC
									LIMIT '.$offset.', '.$limit
								);
								
		if($query->num_rows()>0)
			return $query->result();
	}
	
	
	public function change_status($status, $id, $type, $point, $uid)
	{
		if($type=='waste' && $point!==NULL)
		{
			$data = array('status'=> $status, 'point' => $point);
		}
		else if($type=='waste' && $point==NULL)
		{
			$data = array('status'=> $status, 'point' => 0);
			
		}
		else
		{
			$data = array('status'=> $status);
		}
		
		
		$this->db->where('id', $id);
		$this->db->update($type.'_request',$data);
		
	}
	
	
	public function update_waste_point($uid)
	{
		if($uid == NULL)
			$uid = 0;
		
		$query = $this->db	->select('sum(point) as sum')
							->where('user_id', $uid)
							->get('waste_request');
		if($query->num_rows()>0)
		{
			$sql = 'update user_points set waste_pick_point='.$query->row()->sum.' where user_id='.$uid;
			
			if($this->db->query($sql))
				echo 'updated';
			
		}
	}
	
}