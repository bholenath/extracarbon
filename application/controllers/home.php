<?php

class Home extends MY_Controller
{
	var $uploadpath = 'assets/images/resale_item';

	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('auth');
		
		if($this->auth->auth())
			redirect('dashboard');
			
		$this->load->library('form_validation');
		$this->load->model('user_model');
		$this->load->model('carpool_model');
	}
	
	public function send_mail($to, $subject, $message)
	{
		$config = array(	
						'protocol'	=> 'smtp',
						'smtp_host'	=> 'webmail.extracarbon.com',
						'smtp_user'	=> 'admin@extracarbon.com',
						'smtp_pass'	=> $this->carpool_model->get_email_pass('pass_out'),
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
	
	public function feed()
	{	
		$subject = "User FeedBack";
		$message = $_POST['feedback_msg'];
		$mailid = $_POST['feedback_mailid'];
		$name = $_POST['feedback_name'];
		
		$this->load->database();
		$feedback_list_query = "insert into feedback_mail_list(mail_id,name,msg) values ('$mailid','$name','$message')";
		$this->db->query($feedback_list_query);
	
		$to = 'admin@extracarbon.com';
		$to1 = $mailid;
		
		$config = array(	
						'protocol'	=> 'smtp',
						'smtp_host'	=> 'webmail.extracarbon.com',
						'smtp_user'	=> 'admin@extracarbon.com',
						'smtp_pass'	=> $this->carpool_model->get_email_pass('pass_out'),
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
		/*$this->email->send();
		
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		
		$this->email->from($config['smtp_user'], 'extracarbon.com');
		$this->email->to($to1);
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();*/
		
		if($this->email->send())
		{
			$response1 = 'Thank You for Your valuable time. We will work on your Suggestions.';
			echo $response1;
		}	
		else
		{
			$response1 = 'Sorry! Mail Sending Error. Please Try Again.';
			echo $response1;
		}	
	}
	
	public function mail_list()
	{
	$id = $_POST['mailid'];
	$this->load->database();
	$update_list_query = "insert into update_mail_list(mail_id) values ('$id')";
	$this->db->query($update_list_query);
	
		$subject = "Welcome To ExtraCarbon";
		$message = "Thanking You for joining our Updates.<br>You will Receive Updates on our latest offerings and work on your mail
		regularly.";
		$to = $id;
		
		$config = array(	
						'protocol'	=> 'smtp',
						'smtp_host'	=> 'webmail.extracarbon.com',
						'smtp_user'	=> 'admin@extracarbon.com',
						'smtp_pass'	=> $this->carpool_model->get_email_pass('pass_out'),
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
	if($this->email->send())	
	{
	$response = "Thank You for your Request. Please look in your Mail for further details."	;
	echo $response;
	}
	else
	{
	$response = "Sorry! Mail Sending Error. Please Try Again."	;
	echo $response;
	}
	}
	
	public function check_mail_list()
	{
	$id1 = $_POST['check_mailid'];
	$this->load->database();
	$row_list_query = $this->db->select('mail_id')
						   ->where('mail_id', $id1)
						   ->get('update_mail_list');	
	if($row_list_query->num_rows()==1)
	echo 'true';
	else
	echo 'false';
	}
	
	public function index()
	{
		$data['title'] = 'Extra Carbon';	
		$this->render_view('home', $data);
	//	$this->render_view('landing_popup', $data);
	}
	
	public function login()
	{
		
		
		$this->load->helper('form');
		$this->load->library('form_validation');		
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		if($this->form_validation->run()===false)
		{
			$data['title'] = 'Login Error';
			
			$this->render_view('home', $data);
			//redirect('home');
		}	
		else
		{

			if($this->user_model->login())
			{
				$this->session->set_userdata('username', $this->input->post('username'));
				$this->session->set_userdata('userid', $this->user_model->login()->id);
				$this->session->set_userdata('metro_card_no', $this->user_model->login()->metro_card_no);
				$this->session->set_userdata('name', $this->user_model->login()->name);
				redirect('dashboard');
			}
			else
			{
				$this->session->set_flashdata('login_error', 'Invalid Login Details');
				redirect('home');
			}
		}
	}
	
	public function signup()
	{
		
		$this->load->helper('form');
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		if($this->form_validation->run()===false)
		{
			$data['title'] = 'Login Error';
			
			$this->render_view('home', $data);
			//redirect('home');
		}	
		else
		{
		
			if($this->user_model->signup()!==false)
			{
				$this->session->set_userdata('username', $this->input->post('email'));
				$this->session->set_userdata('name', $this->input->post('name'));
				$this->session->set_userdata('metro_card_no', $this->input->post('card_no'));
				$this->session->set_userdata('userid', $this->user_model->user_id());
				redirect('dashboard');
			}
			else
			{
				$this->session->set_flashdata('signup_error', 'Invalid Details');
				redirect('home');
			}
		}
	
	}
		
	public function check_email()
	{
		echo $response = $this->user_model->check_email($_POST['email']);
	}
	
	public function recover_password()
	{
		$data['title'] = 'Recover Password';
		
		$this->load->view('templates/header_1', $data);
		$this->load->view('recover_password', $data);
		$this->load->view('templates/footer', $data);
	}
	
	public function new_password()
	{
		$email 		= $_POST['mailid'];
		
		$password 	= mt_rand(1000,100000);
		
		$message	= "Dear $email <br><br> Your new password is : $password <br><br> Thank You.";
		
		$this->user_model->set_new_password($email, $password);

		
		$config = array(	
						'protocol'	=> 'smtp',
						'smtp_host'	=> 'webmail.extracarbon.com',
						'smtp_user'	=> 'admin@extracarbon.com',
						'smtp_pass'	=> $this->user_model->get_email_pass('pass_out'),
						'smtp_port'	=> 25,
						'mailtype'	=> 'html',
						'charset'	=> 'iso-8859-1'
						);
						
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		
		$this->email->from($config['smtp_user'], 'extracarbon.com');
		$this->email->to($email);
		$this->email->subject("Password Recovery Email");
		$this->email->message($message);
		
		if($this->email->send())
			echo 'Please check you email ID for new password.';
		else
			echo 'Mail Sending Error.';
		
		
	}
	
	
	public function pickup()
	{
		
		$email 		= 'admin@extracarbon.com';
		
		$contact	= trim($_POST['phone_no']);
		
		$mail		= trim($_POST['e_mail']);
		
		$address	= trim($_POST['address']);
		
		$instruction= trim($_POST['instruction']); 
		
		if($instruction != "")
		$final_instruction = $instruction;
		elseif($instruction == "")
		$final_instruction = "NIL";
		
		$this->load->database();
		
		$waste_pickup_query = "insert into waste_pickup_list(contact_no,mail_id,address,instruction) values 
		('$contact','$mail','$address','$final_instruction')";
		
		$this->db->query($waste_pickup_query);		
				
		$message = "Dear Admin, <br><br> Please pick up our Waste. <br><br> Contact No. : <strong>$contact</strong> 
		<br><br> Email Id : <strong>$mail</strong> <br><br> Address : <strong>$address</strong> <br><br> Specific Instructions : 
		<strong>$final_instruction</strong> <br><br><br> Thank You.";
		
		/*$this->user_model->pickup($contact, $address, $instruction);*/
		
		$config = array(	
						'protocol'	=> 'smtp',
						'smtp_host'	=> 'webmail.extracarbon.com',
						'smtp_user'	=> 'admin@extracarbon.com',
						'smtp_pass'	=> $this->user_model->get_email_pass('pass_out'),
						'smtp_port'	=> 25,
						'mailtype'	=> 'html',
						'charset'	=> 'iso-8859-1'
						);
						
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		
		$this->email->from($config['smtp_user'], 'Newbee');
		$this->email->to($email);
		$this->email->subject(" Waste Pickup ");
		$this->email->message($message);
		$this->email->send();		
		
			if($this->user_model->CheckEmail($mail) !== true)
		
			{		
					$pwd 		= mt_rand(1000, 50000);
					$password 	= md5($pwd);		
										
					
						$data = array(
						'name' => 'New User',
						'email' => $mail,
						'password' => $password,
						'metro_card_no' => 0,
						'gender' => 'male',
						'date' => date('Y-m-d')
						);		
		
						if($this->db->insert('users_info', $data))
						{
						
						$query0 = $this->db->select('id')
						  				   ->where('email', $mail)						  
		 				  				   ->get('users_info');
						
						$data1 = array(
						'user_id' => $query0->row()->id,
						'metro_point' => 0,
						'waste_pick_point' => 0,
						'coupon_points' => 0						
						);					
						
						
						if($this->db->insert('user_points', $data1))
						{							
											
						$user_id = $query0->row()->id;				
				
						$query2 = $this->db->select('waste_pick_point')
						  				   ->where('user_id', $user_id)						  
		 				  				   ->get('user_points');
				
						$waste_pick_point = (10 + ($query2->row()->waste_pick_point));
				
						$this->db->where('user_id', $user_id);				
						$val1 = $this->db->update('user_points', array('waste_pick_point' => $waste_pick_point));							
						}						  
					
						$subject = "Waste Pick Request and Registration with ExtraCarbon.Com";
						
						//$mail = $this->input->post('email');
						
						$message = "Dear $mail, <br><br> Congratulations! you are registered with ExtraCarbon.com with following details
						<br> <br>Email/Username: $mail <br> Password : $pwd <br><br> You can change your password anytime.<br><br> 
						Your Waste Pick-Up Request has been confirmed. Our representatives will call you soon.<br><br> You have also 
						received <b>10</b> reward points for this transaction, login to your your profile.<br><br>Thank You.";
						
						$config = array(	
						'protocol'	=> 'smtp',
						'smtp_host'	=> 'webmail.extracarbon.com',
						'smtp_user'	=> 'admin@extracarbon.com',
						'smtp_pass'	=> $this->user_model->get_email_pass('pass_out'),
						'smtp_port'	=> 25,
						'mailtype'	=> 'html',
						'charset'	=> 'iso-8859-1'
						);
						
						$this->load->library('email', $config);
						$this->email->set_newline("\r\n");
		
						$this->email->from($config['smtp_user'], 'Admin');
						$this->email->to($mail);
						$this->email->subject($subject);
						$this->email->message($message);
						
						if($this->email->send())
						{
						echo "<script> alert('Thank You. We will soon collect your Waste.'); </script>";
						echo "<script> window.location.href='".base_url()."other/pickup'; </script>";
						}	
		
						else
						{
						echo "<script> alert('Sorry! Mail Sending Error...Try Again.'); </script>";
						echo "<script> window.location.href='".base_url()."other/pickup'; </script>";
						}					
						
						}
						
			}		
				
			else
				
			{
				
						$query99 = $this->db->select('id')
						  				    ->where('email', $mail)						  
		 				  				    ->get('users_info');										   
						
						$user_id = $query99->row()->id;				
				
						$query22 = $this->db->select('waste_pick_point')
						  				   ->where('user_id', $user_id)						  
		 				  				   ->get('user_points');
				
						$waste_pick_point1 = (10 + ($query22->row()->waste_pick_point));
				
						$this->db->where('user_id', $user_id);				
						$val11 = $this->db->update('user_points', array('waste_pick_point' => $waste_pick_point1));							
										  			   
						$subject = "Waste Pick Request with ExtraCarbon.Com";
						
						//$mail = $this->input->post('email');
						
						$message = "Dear $mail, <br><br> Your Waste Pick-Up Request has been confirmed. Our representatives will call 
						you soon.<br><br> You have received <b>10</b> reward points for this transaction, login to your profile.<br><br>
						Thank You.";
						
						$config = array(	
						'protocol'	=> 'smtp',
						'smtp_host'	=> 'webmail.extracarbon.com',
						'smtp_user'	=> 'admin@extracarbon.com',
						'smtp_pass'	=> $this->user_model->get_email_pass('pass_out'),
						'smtp_port'	=> 25,
						'mailtype'	=> 'html',
						'charset'	=> 'UTF-8'
						);
						
						$this->load->library('email', $config);
						$this->email->set_newline("\r\n");
		
						$this->email->from($config['smtp_user'], 'Admin');
						$this->email->to($mail);
						$this->email->subject($subject);
						$this->email->message($message);
						
						if($this->email->send())
						{
						echo "<script> alert('Thank You. We will soon collect your Waste.'); </script>";
						echo "<script> window.location.href='".base_url()."other/pickup'; </script>";
						}	
		
						else
						{
						echo "<script> alert('Sorry! Mail Sending Error...Try Again.'); </script>";
						echo "<script> window.location.href='".base_url()."other/pickup'; </script>";
						}					
				
			}			
		
	}
	
	/*
	*	resale_signup() 
	*	Sign up from home page with second hand item upload
	*/
	
	public function ewaste_pickup()
	{
		
		$email 		= 'admin@extracarbon.com';
		
		$price	= trim($_POST['price']);
		
		$base_value	= trim($_POST['base_value']);
		
		$company = trim($_POST['company']);
		
		$model = trim($_POST['model']); 
		
		$contact	= trim($_POST['phone_no']);
		
		$e_mail	= trim($_POST['e_mail']);
		
		$address	= trim($_POST['address']);
		
		$instruction= trim($_POST['instruction']);
				
		if($instruction != "")
		$final_instruction = $instruction;
		elseif($instruction == "")
		$final_instruction = "NIL";		
				
		$message = "Dear Admin, <br><br> <strong>Here is the e-waste product which User wish to Sell.</strong> <br><br> <strong> 
		Product : </strong> $company $model <br><br> <strong> Exchange Price : </strong>Rs.<strong>$price</strong> <br><br> <strong> Base
		Value : </strong>Rs.<strong>$base_value</strong> <br><br> <strong> User Contact No. : </strong> $contact <br><br> <strong> User 
		E-Mail : </strong> $e_mail <br><br> <strong> User Address : </strong> $address <br><br> <strong> User Specific Instructions : 
		</strong> $final_instruction <br><br> Thank You.";
		
		$config = array(	
						'protocol'	=> 'smtp',
						'smtp_host'	=> 'webmail.extracarbon.com',
						'smtp_user'	=> 'admin@extracarbon.com',
						'smtp_pass'	=> $this->user_model->get_email_pass('pass_out'),
						'smtp_port'	=> 25,
						'mailtype'	=> 'html',
						'charset'	=> 'iso-8859-1'
						);
						
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		
		$this->email->from($config['smtp_user'], 'Newbee');
		$this->email->to($email);
		$this->email->subject(" E-Waste Product Selling ");
		$this->email->message($message);
		
		if($this->email->send())
		{
			$disp = 'Thank You. We will soon collect your Product.';
			echo $disp;
		}	
		else
		{
			$disp = 'Sorry! Mail Sending Error. Please try Again...';
			echo $disp;
		}	
		
	}	
	
	public function resale_signup()
	{
		$data['title'] = 'Signup with Resale Item.';
		
		$this->load->library('form_validation');
		$this->load->helper('form');
		
			
		$config = array(
						'upload_path' 	=> $this->uploadpath,	
						'allowed_types' => 'jpg|jpeg|gif|png',
						'max_size' 		=> 2000
						);
		
		
		$this->load->library('upload', $config);
		
		if($this->input->post('upload'))
		{
		
			
			$this->form_validation->set_rules('phone', 'Contact No.', 'trim|required|number|min_length[10]');
			$this->form_validation->set_rules('email', 'Email Id', 'trim|required|valid_email');
			$this->form_validation->set_rules('name', 'Item Name', 'trim|required');
			$this->form_validation->set_rules('description', 'Item Description', 'trim|required');
			
			
			if($this->form_validation->run()===false)
			{
				//$this->session->set_flashdata('amount_error', 'Please Enter Amount<br>');
				//exit(validation_errors());
				$this->render_view('home', $data);
			}
			else
			{
				
				if(!$this->upload->do_upload('item_pic'))
				{
					$this->session->set_flashdata('phone', $this->input->post('phone')); 
					$this->session->set_flashdata('email', $this->input->post('email')); 
					$this->session->set_flashdata('name', $this->input->post('name')); 
					$this->session->set_flashdata('description', $this->input->post('description')); 
					$this->session->set_flashdata('upload_error', $this->upload->display_errors()); 
					
					exit($this->upload->display_errors());
					//redirect('home');
				}
				else
				{
					$pwd 		= mt_rand(1000, 50000);
					$password 	= md5($pwd);
					
					if($this->user_model->signup_with_item($password)):
					
						$subject = "Registration with Extracarbon.com";
						
						$mail	 = $this->input->post('email');
						
						$message = "Dear $mail, <br><br> Congratulations! you are registered with extracarbon.com with following details 
						<br> <br>email/username: $mail <br> password : $pwd <br><br> You can change your password anytime.<br><br> 
						Thank You.";						
						
						$this->send_mail($this->input->post('email'), $subject, $message);					
						
						$pic_name = $this->user_model->get_userid($this->input->post('email')).'_'.date('Y_m_d_gis').'.jpg';
					
						$this->session->set_userdata('username', $this->input->post('email'));
						$this->session->set_userdata('name', 'New User');
						$this->session->set_userdata('metro_card_no', '');
						$this->session->set_userdata('userid', $this->user_model->get_userid($this->input->post('email')));			
					
					
						$image_data = $this->upload->data();
						
						
						rename($image_data['full_path'], 'assets/images/resale_item/'.$pic_name);
						
						$this->session->set_flashdata('rec_response', 'Contratulation you have become extracarbon member. You will get our account details on mentioned email id please check it out. And you will receive a quote on your mentioned Email Id regarding you item within 48 hours. <br><br> Thank You');
						
						
						redirect('dashboard');
						
					endif;
				}
				
				
				$this->render_view('home', $data);
			}	
		}
		else
			$this->render_view('home', $data);
			
			
	}
	
	public function resale_signup_new()
	{
		
		$data['title'] = 'Signup with Resale Item.';
		$this->load->library('form_validation');
		$this->load->helper('form');
		$email = $this->input->post('email_new');
		//echo '<pre>';print_r($_POST);die;
		if($this->input->post('upload'))
		{
			//$this->form_validation->set_rules('phone_new', 'Contact No.', 'trim|required|number|min_length[10]');
			$this->form_validation->set_rules('email_new', 'Email Id', 'trim|required|valid_email');
			//$this->form_validation->set_rules('name_new', 'Item Name', 'trim|required');
			//$this->form_validation->set_rules('description_new', 'Item Description', 'trim|required');
			if($this->form_validation->run()===false)
			{
				//$this->session->set_flashdata('amount_error', 'Please Enter Amount<br>');
				//exit(validation_errors());
				$this->render_view('home', $data);
			}
			else
			{
				if($this->user_model->CheckEmail($email)==true)
				{
					if($this->user_model->login_new($email)==true){
						$message = "Dear $mail, <br><br> Congratulations! your Request with extracarbon.com has recieved Sucessfully.<br><br> Thank You.";
						
						$this->send_mail($this->input->post('email_new'), $subject, $message);
						
						
						$pic_name = $this->user_model->get_userid($this->input->post('email_new')).'_'.date('Y_m_d_gis').'.jpg';
					
						$this->session->set_userdata('username', $this->input->post('email_new'));
						$this->session->set_userdata('name', $this->input->post('name_new'));
						$this->session->set_userdata('metro_card_no', '');
						$this->session->set_userdata('userid', $this->user_model->get_userid($this->input->post('email_new')));
						
						rename($image_data['full_path'], 'assets/images/resale_item/'.$pic_name);
						
						$this->session->set_flashdata('rec_response', 'Congratulations! your Request with extracarbon.com has recieved Sucessfully. <br><br> Thank You');
						
						
						redirect('dashboard');
						
					}
				}
				else {
					$pwd 		= mt_rand(1000, 50000);
					$password 	= md5($pwd);
					
					if($this->user_model->signup_with_item_new($password)==true):
					//echo "asasas";die;
						$subject = "Registration with Extracarbon.com";
						
						$mail	 = $this->input->post('email');
						
						$message = "Dear $mail, <br><br> Congratulations! you are registered with extracarbon.com with following details <br> <br>email/username: $mail <br> password : $pwd <br><br> You can change your password anytime.<br><br> Thank You.";
						
						$this->send_mail($this->input->post('email_new'), $subject, $message);
						
						
						$pic_name = $this->user_model->get_userid($this->input->post('email_new')).'_'.date('Y_m_d_gis').'.jpg';
					
						$this->session->set_userdata('username', $this->input->post('email_new'));
						$this->session->set_userdata('name', $this->input->post('name_new'));
						$this->session->set_userdata('metro_card_no', '');
						$this->session->set_userdata('userid', $this->user_model->get_userid($this->input->post('email_new')));
						
						rename($image_data['full_path'], 'assets/images/resale_item/'.$pic_name);
						
						$this->session->set_flashdata('rec_response', 'Contratulation you have become extracarbon member. <br><br> Thank You');
						
						
						redirect('dashboard');
						
					endif;
				
				
				$this->render_view('home', $data);
			}	
		}
	}
}

	public function coupon_new()
	{		
		$data['title'] = 'Signup with Coupon';
		
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->database();
		
		$email = $this->input->post('email_new');
		$coupon = $this->input->post('coupon_new');
		//echo '<pre>';print_r($_POST);die;
		
		if($this->input->post('upload'))
		{			
			$this->form_validation->set_rules('email_new', 'Email Id', 'trim|required|valid_email');
			$this->form_validation->set_rules('coupon_new', 'Coupon No', 'trim|required|number|min_length[6]');
			
			if($this->form_validation->run()===false)
			{
				//$this->session->set_flashdata('amount_error', 'Please Enter Amount<br>');
				//exit(validation_errors());
				$this->render_view('home', $data);
			}
			else
			{
				if($this->user_model->CheckEmail($email) === true)
				{
					if($this->user_model->CheckCouponNew($coupon) === true)
					{					
						$query99 = $this->db->select('id')
						  				    ->where('email', $email)						  
		 				  				    ->get('users_info');
										   
						$data22 = array();
						
						$query21 = $this->db->select('cupon_id,rewards')
						  				  ->where('counpon', $coupon)
						 				  ->where('redeemed', 'Not')
		 				  				  ->get('cupons_rewards');
										  
						$data22 = $query21->row_array();
						$id = $data22['cupon_id'];
						$this->db->where('cupon_id', $id);
						$val10 =$this->db->update('cupons_rewards', array('redeemed' =>'Used'));
						$reward1 = $data22['rewards'];	
						
						if($val10)
						{						
						$user_id = $query99->row()->id;				
				
						$query22 = $this->db->select('coupon_points')
						  				   ->where('user_id', $user_id)						  
		 				  				   ->get('user_points');
				
						$coupon_points1 = ($reward1 + ($query22->row()->coupon_points));
				
						$this->db->where('user_id', $user_id);				
						$val11 = $this->db->update('user_points', array('coupon_points' => $coupon_points1));							
						}						  			   
										   
						$message = "Dear $email, <br><br> Congratulations! your Coupon Request with ExtraCarbon.com has been recieved 
						Sucessfully.<br><br>Thank You.";
						
						$subject = "Coupon Request for Extra Carbon";
						
						$this->send_mail($this->input->post('email_new'), $subject, $message);						
						
						$pic_name = $this->user_model->get_userid($this->input->post('email_new')).'_'.date('Y_m_d_gis').'.jpg';
						
						$query = $this->db->select('metro_card_no, name')
					  					  ->where('email', $email)
					  					  ->get('users_info');
					
						$this->session->set_userdata('username', $email);
						$this->session->set_userdata('name', $query->row()->name);
						$this->session->set_userdata('metro_card_no', $query->row()->metro_card_no);
						$this->session->set_userdata('userid', $this->user_model->get_userid($email));
						
						rename($image_data['full_path'], 'assets/images/resale_item/'.$pic_name);
						
						$this->session->set_flashdata('rec_response', 'Congratulations! We have recieved your Request Sucessfully. <br>
						<br> Thank You');						
						
						redirect('dashboard');						
					}
					else
					{
					echo "<script> alert('Invalid Coupon/Coupon Used. Please Try Again.'); </script>";
					echo "<script> window.location.href='http://www.extracarbon.com'; </script>";
					exit();										
					}
				}
				else 
				{
					$pwd 		= mt_rand(1000, 50000);
					$password 	= md5($pwd);					
										
					if($this->user_model->CheckCouponNew($coupon) === true)
					{
					//echo "asasas";die;
					
						$data = array(
						'name' => 'New User',
						'email' => $email,
						'password' => $password,
						'metro_card_no' => 0,
						'gender' => 'male',
						'date' => date('Y-m-d')
						);		
		
						if($this->db->insert('users_info', $data))
						{
						
						$query0 = $this->db->select('id')
						  				   ->where('email', $email)						  
		 				  				   ->get('users_info');
						
						$data1 = array(
						'user_id' => $query0->row()->id,
						'metro_point' => 0,
						'waste_pick_point' => 0,
						'coupon_points' => 0						
						);
						
						if($this->db->insert('user_points', $data1))
						{
						$data2 = array();
						
						$query1 = $this->db->select('cupon_id,rewards')
						  				  ->where('counpon', $coupon)
						 				  ->where('redeemed', 'Not')
		 				  				  ->get('cupons_rewards');
										  
						$data2 = $query1->row_array();
						$id = $data2['cupon_id'];
						$this->db->where('cupon_id', $id);
						$val =$this->db->update('cupons_rewards', array('redeemed' =>'Used'));
						$reward = $data2['rewards'];	
						
						if($val)
						{						
						$user_id = $query0->row()->id;				
				
						$query2 = $this->db->select('coupon_points')
						  				   ->where('user_id', $user_id)						  
		 				  				   ->get('user_points');
				
						$coupon_points = ($reward + ($query2->row()->coupon_points));
				
						$this->db->where('user_id', $user_id);				
						$val1 = $this->db->update('user_points', array('coupon_points' => $coupon_points));							
						}						  
					
						$subject = "Registration with ExtraCarbon.com";
						
						//$mail = $this->input->post('email');
						
						$message = "Dear $email, <br><br> Congratulations! you are registered with ExtraCarbon.com with following details
						<br> <br>Email/Username: $email <br> Password : $pwd <br><br> You can change your password anytime.<br><br> 
						Thank You.";
						
						$this->send_mail($this->input->post('email_new'), $subject, $message);						
						
						$pic_name = $this->user_model->get_userid($this->input->post('email_new')).'_'.date('Y_m_d_gis').'.jpg';
						
						$query1 = $this->db->select('metro_card_no, name')
					  					  ->where('email', $email)
					  					  ->get('users_info');
					
						$this->session->set_userdata('username', $email);
						$this->session->set_userdata('name', $query1->row()->name);
						$this->session->set_userdata('metro_card_no', $query1->row()->metro_card_no);
						$this->session->set_userdata('userid', $this->user_model->get_userid($email));
						
						rename($image_data['full_path'], 'assets/images/resale_item/'.$pic_name);
						
						$this->session->set_flashdata('rec_response', 'Contratulation you have become Extracarbon member. <br><br> 
						Thank You');						
						
						redirect('dashboard');
						}
						}						
					}	
					
					else
					{
					echo "<script> alert('Invalid Coupon/Coupon Used. Please Try Again.'); </script>";
					echo "<script> window.location.href='http://www.extracarbon.com'; </script>";
					exit();										
					}											
			   }
		   }
	 	}
	}	
	
}