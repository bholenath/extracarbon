<?php 


class Stats_Model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		
		date_default_timezone_set('asia/calcutta');
		
	}
	
	public function get_search_mostusers($limit)
	{
		
		
		$query = " 	select user_id, name, email, count(user_id) as count
					from search_list as sl
					join users_info as ui
					on ui.id = sl.user_id
					Group By user_id
					Order By count Desc
					LIMIT 20
					";
					
		$rs = $this->db->query($query);
		
		if($rs->num_rows())
			return $rs->result();
			
	}
	
	
	public function get_search_userwise($uid, $limit, $month)
	{
		if($month==Null || $month=='')
			$month = date('m');
			
		$query = " 	select t1.journey, t1.count, t2.success from
					(
						(
							select concat_ws(' To ', src, dest) as journey, count(concat(src, dest))as count, user_id
							from search_list
							where status=0
							and user_id=$uid
							and concat(year(date_time), month(date_time))=concat(year(now()), $month)
							Group By journey
							LIMIT 10

						) t1
						left outer join
						(
							select concat_ws(' To ', src, dest) as journey, count(concat(src, dest))as success, user_id
							from search_list
							where status=1
							and user_id=$uid
							and concat(year(date_time), month(date_time))=concat(year(now()), $month)
							Group By journey
							LIMIT 10
						) t2
					on t1.journey=t2.journey

					)

					Having count>$limit
					Order By count DESC
				";
					
		$rs = $this->db->query($query);
		
		if($rs->num_rows())
			return $rs->result();
			
	}
	
	
	
	public function get_search_journeywise($limit, $month)
	{
		if($month==Null || $month=='')
			$month = date('m');
		
		
		$query = "	select t1.journey, t1.count, t2.success from
					(
						(
							select concat_ws(' To ', src, dest) as journey, count(concat(src, dest))as count
							from search_list
							where status=0
							and concat(year(date_time), month(date_time))=concat(year(now()), $month)
							Group By journey

						) t1
						left outer join
						(
							select concat_ws(' To ', src, dest) as journey, count(concat(src, dest))as success
							from search_list
							where status=1
							and concat(year(date_time), month(date_time))=concat(year(now()), $month)
							Group By journey

						) t2
					on t1.journey=t2.journey
					)
					Having count>1
					Order By count DESC
					LIMIT 10
				";
		
		$rs = $this->db->query($query);
		
		if($rs->num_rows())
			return $rs->result();
			
	}
	
	
}