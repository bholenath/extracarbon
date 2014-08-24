<?php if(!defined('BASEPATH')) exit('no direct access to the scrip is allowed');


class Carpool extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('dashboard_menu');
		
		$this->load->model('dashboard_model');
		$this->load->model('carpool_model');


		$menu = new dashboard_menu();
		
		$this->menu = $menu->menu();
	
		$this->auth->clear_cache();
		
		$this->auth->is_logged_in();
	}
	
	
	public function index()
	{
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
	
	
	/* ---- Methods for search for pool/lift ---------- */
	
	public function register()
	{
		$data['title']		= 'Register';
		
		$data['menu'] 		= $this->menu;
		$data['user_data'] 	= $this->dashboard_model->get_user_data($this->session->userdata('username'));
		
		return $this->render_view('pool_register', $data);
	}
	
	
	public function search()
	{
		$data['title']		= 'Search';
		
		$data['menu'] 		= $this->menu;
		$data['user_data'] 	= $this->dashboard_model->get_user_data($this->session->userdata('username'));

		$data['status'] 	= $this->carpool_model->check_status('request');
		
		$this->load->library('form_validation');
		$this->load->helper('form');
		
		
		if($this->input->get('search'))
		{
			$this->carpool_model->save_user_search();
			
			$data['total'] = $this->carpool_model->get_total_result();
			
			$this->load->library('pagination');
			
			$suffix = '?to='.$_GET['to'].'&from='.$_GET['from'].'&date='.$_GET['date'].'&time1='.$_GET['time1'].'&time2='.$_GET['time2'].'&time3='.$_GET['time3'].'&search=Search';
			
			$config = array(
								'base_url' 			=> site_url('carpool/search'),
								'full_tag_open' 	=> '<div id="page_link">',
								'full_tag_close' 	=> '</div>',
								'total_rows'		=> $data['total'],
								'per_page'			=> 2,
								'uri_segment'		=> 3,
								'suffix'			=> $suffix
								
							);
							
			$this->pagination->initialize($config);
			
			$offset = ($this->uri->segment(3)?$this->uri->segment(3):0);
			$limit	= $config['per_page'];
			
			$data['pagination'] = $this->pagination->create_links();
			
			$data['pool_offer'] = $this->carpool_model->search_pool_offer($limit, $offset);
			
			$this->render_view('car_offer', $data);
			
		}
		else
		{
			$this->render_view('car_search', $data);
		}
		
		
	}
	
	
	
	public function request_reg()
	{
		$data['a'] = '';
		
		echo $this->load->view('request_reg', $data, true);
		
	}
	
	
	public function request_register()
	{
		$subject 	= 'Registration Confirmation';
				
		$str 		= $this->session->userdata('userid').'_'.$this->session->userdata('username').'_req';
		
		$str 		= base64_encode($str);
		
		$link		= base_url().'carpool/verify/?vc='.$str;
		
		$message 	= 'Dear '.$this->session->userdata('name').'<br><p> You must be logged in on '.base_url().' before verifying your infomation</p>. <br> <h3> Please Click on this link to verify your account '.$link.'</h3> <br><br><p>Please do not reply this mail. </p>';
	
	
		if($this->send_mail($_POST['email'], $subject, $message))
		{
			$this->carpool_model->request_register();
			
			
			echo 'You will get a message on your mail-id, please open your mail and verify your account';
			
		}
		else
			echo 'It seem there is some problem with your email-id, kindly try later or choose some other email id. ';
		
		
	}
	
	
	public function pooler_detail()
	{
		//echo $_POST['id'];
		
		$data['pooler']  = $this->carpool_model->get_pooler_detail($_POST['id']);
		
		
		echo $this->load->view('pooler_detail', $data, true);
	
	}
	
	
	
	/* ---- Methods for offer ---------- */
	
	
	public function offer()
	{
		$data['menu'] 		= $this->menu;
		$data['user_data'] 	= $this->dashboard_model->get_user_data($this->session->userdata('username'));
		
		
		if($this->carpool_model->check_status('offer')===false)
		{
		
			$data['title']	= 'Register Yourself';
			
			$this->load->library('form_validation');
			$this->load->helper('form');
			
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('contact_no', 'Contact No.', 'trim|required|numeric|min_length[10]');
			$this->form_validation->set_rules('address', 'Address', 'trim|required');
			$this->form_validation->set_rules('pincode', 'Pin Code', 'trim|required|numeric|exact_length[6]');
			$this->form_validation->set_rules('car_rc', 'Car RC No.', 'trim|required');
		
			if($this->form_validation->run()===false)
			{
				$this->render_view('offer_reg', $data);
			}
			else
			{
				$subject 	= 'Registration Confirmation';
				
				$str 		= $this->session->userdata('userid').'_'.$this->session->userdata('username').'_pool';
				
				$str 		= base64_encode($str);
				
				$link		= base_url().'carpool/verify/?vc='.$str;
				
				$message 	= 'You must be logged in on http://www.extracarbon.com before verifying your infomation. <br> Please Click on this link to verify your account '.$link;
			
			
				if($this->send_mail($this->input->post('email'), $subject, $message))
				{
					$this->carpool_model->register_offer_details();
					
					$this->session->set_flashdata('mail_msg','You will get a message on your mail-id, please open your mail and verify your account');
					
					redirect('carpool/offer');
				}
				
			}

		}
		else
		{
			$data['title']	= 'Offer Detail';
			
			$this->load->library('form_validation');
			
			$this->load->helper('form');
			
			$this->render_view('enter_offer', $data);
		}
	}
	
	
	public function verify()
	{
	
		if(isset($_GET['vc'])):
		
			$var	= base64_decode($_GET['vc']);
			$vars 	= explode('_', $var);
			
			
			
			if($vars[0]==$this->session->userdata('userid') && $vars[1]==$this->session->userdata('username'))
			{
				
				if($vars[2]=='pool')
				{
				
					if($this->carpool_model->confirm_details('offer'))
					{
						
			
						echo $this->session->set_flashdata('reg_success','Your information successfully submited, now you can enter offer(s) for car pool');
						
						redirect('carpool/offer');
					}
				}
				else if($vars[2]=='req')
				{
					if($this->carpool_model->confirm_details('request'))
					{
						
			
						$this->session->set_flashdata('reg_success','Your information successfully submited, now you are able to view car pooler\'s details');
						
						redirect('carpool/search');
					}
				}
				else
					exit('Not Valid URL');
				
			}
			else
				exit('Not Valid URL');
				
		else:
			exit('Not Valid URL');
		endif;
		
	}
	
	
	
	
	public function save_offer()
	{
		$data['title']	= 'Offer Reistered';
		
		$data['menu'] 		= $this->menu;
		$data['user_data'] 	= $this->dashboard_model->get_user_data($this->session->userdata('username'));
		
		
		$this->load->library('form_validation');
		$this->load->helper('form');
		
		$this->form_validation->set_rules('dest', 'Destination', 'trim|required');
		$this->form_validation->set_rules('src', 'Source/Pick-Up Place', 'trim|required');
		$this->form_validation->set_rules('date', 'Date', 'trim|required');
		
	
		if($this->form_validation->run()===false)
		{
			$this->render_view('enter_offer', $data);
		}
		else
		{
			if($this->carpool_model->save_offer())
			{
				echo $this->session->set_flashdata('reg_offer','Your offer has been saved successfully.');
				redirect('carpool/offer');
			}
		}
	}
	
	
	public function my_offers()
	{
		$data['title']		= 'My Offers';
		
		$data['menu'] 		= $this->menu;
		$data['user_data'] 	= $this->dashboard_model->get_user_data($this->session->userdata('username'));
		
		
		$data['total'] 		= $this->carpool_model->get_total_rows('car_offer');
	
		$config = array(
						'base_url'		=> site_url('carpool/my_offers'),
						'full_tag_open' => '<div id="page_link">',
						'full_tag_close'=> '</div>',
						'total_rows' 	=> $data['total'],
						'per_page'		=> 9,
						'uri_segment'	=> 3
						);
		
		$this->load->library('pagination');
		$this->pagination->initialize($config);
		
		$limit	 = $config['per_page'];
		$segment = $this->uri->segment(3);
		
		$data['offers']		= $this->carpool_model->get_my_offers($limit, $segment);
		
		$data['pagination'] = $this->pagination->create_links();
		
		
		$this->render_view('my_offers', $data);
		
	}
	
	public function delete_my_offer()
	{
		echo $this->carpool_model->delete_my_offer($_POST['id']);
	}
	
	
	public function terms_conditions()
	{
		$data['title'] = '';
		
		echo $this->load->view('car_terms', $data, true);
	}


}