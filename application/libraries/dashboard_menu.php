<?php

class dashboard_menu 
{
	public function __construct()
	{
		
	}
	
	public function menu()
	{
		$data['a'] ='';
		
		$CI = & get_instance();
		
		return $CI->load->view('dashboard_menu', $data, true);
	}
	
	
}