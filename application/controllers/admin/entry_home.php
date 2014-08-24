<?php if(!defined('BASEPATH')) exit('no direct access is allowed');


class Entry_Home extends My_Admincontroller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/admin_model');
		$this->auth->admin_auth();
	}
	
	public function index()
	{
		$data['title'] = 'Welcome to User Entry Area';
				
		$this->render_view1('entry_home', $data);
		
	}	
	
	public function data_submit()
	{
	date_default_timezone_set('Asia/Calcutta');
	$date = date('Y-m-d');
	$time = date('H:i:s');
	$total = ($_POST['quantity'] * $_POST['rate']);
	$feri_total = ($_POST['quantity'] * $_POST['fer_rate']);
	
	$data =  array(	'society_name' => $_POST['society'],
					'item_name' => $_POST['item_name'],
					'item_rate' =>$_POST['rate'],
					'feriwala_name' => ucwords($_POST['name']),
					'feriwala_rate' => $_POST['fer_rate'],
					'date' => $date,
					'time' => $time,
					'quantity' => $_POST['quantity'],
					'amount_self' => $total,
					'amount_feriwala' => $feri_total );
					
	if($this->db->insert('society_collection', $data))
	{
	echo "<script> alert('Data Successfully Submitted'); </script>";
	echo "<script> window.location.href='".base_url()."admin/entry_home'; </script>";
	//header('Location: '.base_url().'admin/entry_home');		
	}
	else
	{
	echo "<script> alert('Sorry! Data not Submitted. Try Again.'); </script>";
	echo "<script> history.back(1); </script>";
	}
	}	
	
	public function item_change()
	{
	$item = $_POST['item_name'];
	$society = $_POST['society_name'];
	$data_array = $this->admin_model->get_rate($item,$society);
	echo $data_array;		
	}	
	
}
