<?php


class Auth 
{
	
	public function is_logged_in()
	{
		$CI = & get_instance();
		
		$auth = $CI->session->userdata('username')?true:false;
		
		if(!$this->auth())
			redirect('home');
	
	}
	
	public function auth()
	{
		$CI = & get_instance();
		
		$auth = $CI->session->userdata('username')?true:false;
		
		return $auth;
	}
	
	public function clear_cache()
    {
		$CI = & get_instance();
        $CI->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $CI->output->set_header("Pragma: no-cache");
    }
	
	public function admin_auth()
	{
		$CI = & get_instance();
		
		$auth = $CI->session->userdata('admin_username');
		
		if(!$auth)
			redirect('admin/login');
	}
}