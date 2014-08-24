<?php if(!defined('BASEPATH')) exit('no direct access to the script is allowed');


class Stats extends My_AdminController
{

	public function __construct()
	{
		parent::__construct();
		
		$this->auth->admin_auth();

		$this->load->model('admin/stats_model');
	}
	
	public function index()
	{
		$data['title'] = 'stats';
		
		$this->render_view('stats_view', $data);
		
		
	}
	
	public function journey($month=Null)
	{
		
		$data['title'] = 'stats';
		
		$data['stats'] = $this->stats_model->get_search_journeywise(1, $month);
		
		$this->render_view('stats_journey', $data);
	}
	
	
	public function users()
	{
		$data['title'] = 'stats';
		
		$data['stats'] = $this->stats_model->get_search_mostusers(1);
		
		$this->render_view('stats_users', $data);
	}
	
	public function user_stats($uid, $month=Null)
	{
		$data['title'] = 'stats';
		
		$data['stats'] = $this->stats_model->get_search_userwise($uid, 1, $month);
		
		$this->render_view('user_stats_dtl', $data);
	}
	
	public function graph()
	{
		$data['title'] 	= 'stats';
		
		$data['stats'] 	= $this->stats_model->get_search_journeywise(1);
		$data['stats1'] = $this->stats_model->get_failed_journey(1);
		
		$this->render_view('graph1', $data);
	}

}