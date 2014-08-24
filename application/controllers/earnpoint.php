<?php if(!defined('BASEPATH')) exit('no direct access to the script is allowed');

class Earnpoint extends My_Controller
{

	var $menu;
	var $uploadpath;

	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('dashboard_menu');
		
		$this->load->model('earnpoint_model');
		
		$this->uploadpath = realpath(APPPATH.'../assets/images/uploads');
		
		$menu = new dashboard_menu();
		
		$this->menu = $menu->menu();
		
		$this->auth->is_logged_in();
		
		$this->auth->clear_cache();
		
	}
	
	public function index()
	{
		$data['title'] = 'Earn Points';
		
		$data['menu'] = $this->menu;
		
		$data['user_data'] = $this->earnpoint_model->get_user_data($this->session->userdata('username'));
		
		$this->render_view('earn_point', $data);
		
	}
	
	
	public function send_mail($to, $subject, $message)
	{
		$config = array(	
						'protocol'	=> 'smtp',
						'smtp_host'	=> 'webmail.extracarbon.com',
						'smtp_user'	=> 'admin@extracarbon.com',
						'smtp_pass'	=> $this->earnpoint_model->get_email_pass('pass_out'),
						'smtp_port'	=> 25,
						'mailtype'	=> 'html',
						'charset'	=> 'iso-8859-1'
						);
						
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		
		$this->email->from($config['smtp_user'], 'extracarbon.com');
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($message);
		
		return $this->email->send();
	}
	
	
	/*
	*-------------- User Detail view on Right Side -------------
	*/
	
	
	public function user_detail()
	{
		$data['user_data'] 	= $this->earnpoint_model->get_user_data($this->session->userdata('username'));
		
		return $this->load->view('right_view', $data, true);
	}
	

	
	public function earn_point_1()
	{
		/*
		$contact_data = array(
								'contact_add'=>$_POST['contact_add'], 
								'contact_no'=> $_POST['contact_no'],
								'gender' =>$_POST['gender']
							);
		*/					
		$data['user_data'] = $this->earnpoint_model->get_user_data($this->session->userdata('username'));
		
		//$this->session->set_userdata($contact_data);
		
		$this->earnpoint_model->save_contact($_POST['contact_add'], $_POST['contact_no']);
		//print_r($contact_data);
		
		//echo $this->earn_point_2();
		
	}
	
	public function earn_point_2()
	{
		$data['title'] = '';
		
		$data['user_data'] = $this->earnpoint_model->get_user_data($this->session->userdata('username'));
		
		return $this->load->view('earn_point_2', $data, true);
		
	}
	
	public function save_user_choice()
	{
		//echo "$_POST[car_no] - $_POST[travel_choice] - $_POST[travel_choice_2]";
		
		$data['user_data'] = $this->earnpoint_model->get_user_data($this->session->userdata('username'));
		
		print_r( $this->earnpoint_model->save_user_choice($_POST['car_no'], $_POST['travel_choice'], $_POST['travel_choice_2']));
		
	}
	
	
	
	public function upload_ticket()
	{
		$data['title'] = 'Upload ticket';
		
		$data['menu'] = $this->menu;
		$data['user_data'] = $this->earnpoint_model->get_user_data($this->session->userdata('username'));
		
		$data['user_detail'] = $this->user_detail();
		
		$this->load->library('form_validation');
		$this->load->helper('form');
		
			
		$config = array(
						'upload_path' 	=> $this->uploadpath,	//'assets/images/uploads/',
						'allowed_types' => 'jpg|jpeg|gif|png',
						'max_size' 		=> 2000
						);
		
		//exit($this->uploadpath);
		
		$this->load->library('upload', $config);
		
		if($this->input->post('upload'))
		{
		
			
			$this->form_validation->set_rules('amount', 'Amount', 'trim|required|number');
			$this->form_validation->set_rules('bill_no', 'Bill No', 'trim|required|number');
			
			if($this->form_validation->run()===false)
			{
				$this->session->set_flashdata('amount_error', 'Please Enter Amount<br>');
				//$this->session->set_flashdata('bill_error', 'Please Enter Bill Number');
				//redirect('earnpoint/upload_ticket');
				$this->render_view('upload_ticket', $data);
			}
			else
			{
				
				
				
				if(!$this->upload->do_upload('metro_ticket'))
				{
					//$data['upload_error' ] = $this->upload->display_errors();
					$this->session->set_flashdata('amount', $this->input->post('amount')); 
					$this->session->set_flashdata('bill_no', $this->input->post('bill_no')); 
					$this->session->set_flashdata('upload_error', $this->upload->display_errors()); 
					
					redirect('earnpoint/upload_ticket');
				}
				else
				{
				
					if($this->earnpoint_model->save_ticket()):
					
						$image_data = $this->upload->data();
						
						
						rename($image_data['full_path'], 'assets/images/uploads/'.$this->session->userdata('userid').'_'.date('Y_m_d_gis').'.jpg');
						
						$this->session->set_flashdata('upload_msg', 'Ticket uploaded successfully. You will get <b>Rs.'.($this->input->post('amount')*.01). '</b> for this. Please have patience until your ticket is verified <br> <br> Thank You');
						
						redirect('earnpoint/upload_ticket');
						
					endif;
				}
				
				
				$this->render_view('upload_ticket', $data);
			}	
		}
		else
			$this->render_view('upload_ticket', $data);
		
	}
	
	public function change_password()
	{
		$data['title'] = 'Change Password';
		
		$data['menu'] = $this->menu;
		$data['user_data'] = $this->earnpoint_model->get_user_data($this->session->userdata('username'));
		
		$data['user_detail'] = $this->user_detail();
		
		$this->load->library('form_validation');
		$this->load->helper('form');
		
		if($this->input->post()):
		
			$this->form_validation->set_rules('old_pss', 'Old Password', 'required');
			$this->form_validation->set_rules('new_pss','New Password', 'trim|required');
			$this->form_validation->set_rules('re_pss','Confirm Password', 'trim|required');

	
			if($this->form_validation->run())
			{
				
				if($this->earnpoint_model->change_password()===true)
				{
					$this->session->set_flashdata('pss_chng', 'Your Password has been changed successfully');
					redirect('earnpoint/change_password');
				}
				else
				{
					$this->session->set_flashdata('err_pss', $this->earnpoint_model->change_password());
					redirect('earnpoint/change_password');
				}
			}
			else
			{
				
				$data['title'] = 'Fill All Fields';
				$this->render_view('change_password', $data);
			}
		
		else:
			$data['title'] = 'Change Password';
			$this->render_view('change_password',$data);
		endif;
			
	}
	
	
	/*
	*-------------- Common Method to save Address for Gift Plant, Waste Pick, Recycle Bage  -------------
	*/
	
	
	public function save_address()
	{
	$type = $this->uri->segment(3);
	
		if($type=='waste')
		{
			$subject 	= 'Request made for Recycle Waste-Pick';
			
			$message1	= 'Dear '.$this->session->userdata('username').' <br> <br> You have Requested for Recycle Waste Pickup with following details. <br><br> Contact No: '.$_POST['contact_no'].' <br> Address: '.$_POST['address']. '<br><br><br> Your request is on process.<br><br> Thankyou.';
		}
		
		if($type=='bag')
		{
			$subject 	= 'Request made for Recycle Bag';
			
			$message1	= 'Dear '.$this->session->userdata('username').' <br> <br> You have Requested for Recycle Bag with following details. <br><br> Contact No: '.$_POST['contact_no'].' <br> Address: '.$_POST['address']. '<br><br><br> Your request is on process.<br><br> Thankyou.';
		}
		
		if($type=='plant')
		{
			$subject 	= 'Request made for Gift Plant';
			
			$message1	= 'Dear '.$this->session->userdata('username').' <br> <br> You have Requested for Gift Plant with following details. <br><br> Contact No: '.$_POST['contact_no'].' <br> Address: '.$_POST['address']. '<br><br><br> Your request is on process.<br><br> Thankyou.';
		}
		
		
		$message2	= 'Dear Admin <br> <br> A new  Recycle Waste Pickup request is made with following details. <br><br> 
		From : '.$this->session->userdata('username').'<br><br> Contact No: '.$_POST['contact_no'].' <br><br> Address: '.
		$_POST['address'].' <br><br> User Instructions: '.$_POST['instruction'].' <br><br><br> Your request is on process.
		<br><br> Thankyou.';
		
						$query99 = $this->db->select('id')
						  				    ->where('email', $this->session->userdata('username'))						  
		 				  				    ->get('users_info');										   
						
						$user_id = $query99->row()->id;				
				
						$query22 = $this->db->select('waste_pick_point')
						  				   ->where('user_id', $user_id)						  
		 				  				   ->get('user_points');
				
						$waste_pick_point1 = (10 + ($query22->row()->waste_pick_point));
				
						$this->db->where('user_id', $user_id);				
						$val11 = $this->db->update('user_points', array('waste_pick_point' => $waste_pick_point1));			
						
		if($this->send_mail($this->session->userdata('username'), $subject, $message1) && 
		$this->send_mail('admin@extracarbon.com', $subject, $message2))
		{			
			
			if($this->earnpoint_model->save_address($type, $_POST['contact_no'], $_POST['address'] ))
			echo 'Thank You. We will soon collect your Waste.';
				
		}
	}
	
	
	
	
	/*
	*-------------- Gift Plant Methods -------------
	*/
	
	public function gift_plant()
	{
		$data['title'] 		= 'Recipient Information for Gift';
		
		$data['menu'] 		= $this->menu;
		$data['user_data'] 	= $this->earnpoint_model->get_user_data($this->session->userdata('username'));
		
		$data['r_data']		= $this->earnpoint_model->get_last_address('plant', $this->session->userdata('userid'));
		
		$data['user_detail'] = $this->user_detail();
		
		$this->render_view('plant_address', $data);
		
	}
	
		
	public function plant_request()
	{
		if($this->earnpoint_model->_request('plant'))
		{
			$this->session->set_flashdata('req_response', 'You request is successfully submit, we will process it as soon as possible, please have patience.<br><br> If you appericiate our effort you can donate. <br><br>Thank You !');
						
			redirect('dashboard');
			
		}
	}
	
	
	/*-------------- Ends here ------------- */
	
	
	
	
	/*
	*-------------- Request for Waste-Pick Methods -------------
	*/
	
	
	public function recycle_waste()
	{
		$data['title'] 		= 'Recipient Information for Waste-Pick';
		
		$data['menu'] 		= $this->menu;
		$data['user_data'] 	= $this->earnpoint_model->get_user_data($this->session->userdata('username'));
		
		$data['r_data']		= $this->earnpoint_model->get_last_address('waste', $this->session->userdata('userid'));
		
		$data['user_detail'] = $this->user_detail();
		
		$this->render_view('waste_address', $data);
		
	}
	
		
	public function waste_request()
	{
		if($this->earnpoint_model->_request('waste'))
		{
			
			$this->session->set_flashdata('rec_response', 'You request is successfully submit, we will process it as soon as possible, please have patience.<br><br>You will receive a mail regarding this request.<br><br>Thank You !');
						
			redirect('dashboard');
			
		}
	}
	
		
	
	/*-------------- Ends here ------------- */
	
	
	
	
	
	/*
	*-------------- Request for Recycle Bag Methods -------------
	*/
	
	
	public function recycle_bag()
	{
		$data['title'] 		= 'Recipient Information for Recycle Bag';
		
		$data['menu'] 		= $this->menu;
		$data['user_data'] 	= $this->earnpoint_model->get_user_data($this->session->userdata('username'));
		
		$data['r_data']		= $this->earnpoint_model->get_last_address('bag', $this->session->userdata('userid'));
		
		$data['user_detail'] = $this->user_detail();
		
		$this->render_view('bag_address', $data);
		
	}
	
		
	public function bag_request()
	{
		if($this->earnpoint_model->_request('bag'))
		{
			$this->session->set_flashdata('rec_response', 'You request is successfully submit, we will process it as soon as possible,<br><br>You will receive a mail regarding this request. please have patience. <br><br>Thank You !');
						
			redirect('dashboard');
			
		}
	}
	
		
	
	/*-------------- Ends here ------------- */
	
	
	
	
	public function check_bill_no()
	{
		echo $this->earnpoint_model->check_bill_no($_POST['bill_no']);
		
	}
	
	
	
	
	public function donate()
	{
		$data['title'] = 'Donation';
		
		$data['menu'] 		= $this->menu;
		$data['user_data'] 	= $this->earnpoint_model->get_user_data($this->session->userdata('username'));
		
		$data['user_detail'] = $this->user_detail();
		
		$this->render_view('donation', $data);
	}
	

}