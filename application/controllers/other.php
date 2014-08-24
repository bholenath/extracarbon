<?php if(!defined('BASEPATH')) exit('no direct access to the script is allowed');

class Other extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Other_model');
		
		$this->load->helper('download');
	}
	
	public function index()
	{
	}
	
	public function policy()
	{
		$data['title'] = 'Privacy Policy';
		
		$this->load->view('templates/header_1', $data);
		$this->load->view('privacy_policy', $data);
		$this->load->view('templates/footer', $data);
	}
	
	public function clientele()
	{
		$data['title'] = 'Our Customer Base';
		
		$this->load->view('templates/header_1', $data);
		$this->load->view('clientele', $data);
		$this->load->view('templates/footer', $data);
	}
	
	public function ewaste()
	{
		$data['title'] = 'Evaluate your E-Waste';
		
		$this->load->view('templates/header_1', $data);
		$this->load->view('ewaste', $data);
		$this->load->view('templates/footer', $data);
	}
	
	public function careers()
	{
		$data['title'] = 'Career with ExtraCarbon';
		
		$this->load->view('templates/header_1', $data);
		$this->load->view('careers', $data);
		$this->load->view('templates/footer', $data);
	}
			
	public function ewaste_sell()
	{
		$data['title'] = 'Evaluate your E-Waste';
		
		$name = $this->uri->segment(3);
		$image = $this->uri->segment(4);
		$value = $this->uri->segment(5);
		$company = $this->uri->segment(6);
		
		$data['name'] = $name;
		$data['image'] = $image;
		$data['value'] = $value;
		$data['company'] = $company;
		
		$this->load->view('templates/header_1', $data);
		$this->load->view('ewaste_sell', $data);
		$this->load->view('templates/footer', $data);
	}		
			
	public function display_items()
	{
		$d=0;
		$model = $_POST['model'];	
		$this->load->database();
		$query1 = $this->db->select('company_image,company')
					   ->distinct()
				 	   ->where('type', $model)
				 	   ->get('ewaste_items');
		/*$query1 = $this->db->query('SELECT DISTINCT company_image,company FROM ewaste_items WHERE type=$model');*/			  
		//$query1 = mysql_query("SELECT DISTINCT company_image,company FROM ewaste_items WHERE type=$model");
		//$rows = mysql_num_rows($query1);
		$rows = $query1->num_rows();
		if($rows == 0)
		{
		$array="";
		$model_data = json_encode($array);
		echo $model_data;
		}
		else
		{
		/*while ($row1 = $query->row()) 
		{
  		$array[$d] = $row1;
		$d++;
		}*/
		foreach ($query1->result_array() as $row1)
		{
		$array[$d] = $row1;
		$d++;
		}
		$model_data = json_encode($array);
		echo $model_data;
		}
	}
	
	public function display_items_data()
	{
		$u=0;
		$company = $_POST['company'];	
		$this->load->database();
		$query2 = $this->db->select('name,base_value,item_image,company')
					   ->where('company',$company)
				 	   ->get('ewaste_items');
		//$query2 = mysql_query("SELECT name,base_value,item_image,company FROM ewaste_items WHERE company=$company");
		//$rows2 = mysql_num_rows($query2);
		$rows2 = $query2->num_rows();
		if($rows2 == 0)
		{
		$array_company="";
		$company_data = json_encode($array_company);
		echo $company_data;
		}
		else
		{
		/*while ($row2 = mysql_fetch_array($query2)) 
		{
  		$array_company[$u] = $row2;
		$u++;
		}*/
		foreach ($query2->result_array() as $row2)
		{
		$array_company[$u] = $row2;
		$u++;
		}
		$company_data = json_encode($array_company);
		echo $company_data;
		}
	}
	
	public function check_price()
	{
		$b = $_POST['value'];
		
		if($_POST['year']=='yes')
		{
		$red1 = (10/100)*$b;
		}
		else
		{
		$red1 = (8/100)*$b;
		}
		if($_POST['screen1']=='yes')
		{
		$red2 = (13/100)*$b;
		}
		else
		{
		$red2 = (10/100)*$b;
		}
		if($_POST['battery']=='yes')
		{
		$red3 = (15/100)*$b;
		}
		else
		{
		$red3 = (10/100)*$b;
		}
		if($_POST['wifi']=='yes')
		{
		$red4 = (17/100)*$b;
		}
		else
		{
		$red4 = (5/100)*$b;
		}
		if($_POST['water']=='yes')
		{
		$red5 = (10/100)*$b;
		}
		else
		{
		$red5 = (5/100)*$b;
		}
		if($_POST['microphone']=='yes')
		{
		$red6 = (15/100)*$b;
		}
		else
		{
		$red6 = (5/100)*$b;
		}
		if($_POST['headphones']=='yes')
		{
		$red7 = (13/100)*$b;
		}
		else
		{
		$red7 = (9/100)*$b;
		}
		echo $price = ($b - ($red1+$red2+$red3+$red4+$red5+$red6+$red7));
		
	}
	
	public function pickup()
	{
		$data['title'] = 'Waste Pickup Service';
		
		$this->load->view('templates/header_1', $data);
		$this->load->view('waste_pickup', $data);
		$this->load->view('templates/footer', $data);
	}
	
	public function recycle_glass()
	{
		$data['title'] = 'Recycled Glass Work';
		
		$this->load->view('templates/header_1', $data);
		$this->load->view('recycle_glass', $data);
		$this->load->view('templates/footer', $data);
	}
	
	public function videos()
	{
		$data['title'] = 'Our Videos';
		
		$this->load->view('templates/header_1', $data);
		$this->load->view('video', $data);
		$this->load->view('templates/footer', $data);
	}
	
	public function construction()
	{
		$data['title'] = 'Page Under Construction';
		
		$this->load->view('templates/header_1', $data);
		$this->load->view('construction', $data);
		$this->load->view('templates/footer', $data);
	}
	
	public function corp_clients()
	{
		$data['title'] = 'Our Corporate Clients';
		
		$this->load->view('templates/header_1', $data);
		$this->load->view('corp_clients', $data);
		$this->load->view('templates/footer', $data);
	}
	
	public function contact_us()
	{
		/*$this->output->cache(30);*/
		
		$data['title'] = 'Contact Us';
		
		
		$this->load->library('form_validation');
		$this->load->helper('form');
		
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('subject', 'Subject', 'trim|required');
		$this->form_validation->set_rules('message', 'Message', 'trim|required');
		
		if($this->form_validation->run()===false)
		{
			$this->load->view('templates/header_1', $data);
			$this->load->view('contact_us', $data);
			$this->load->view('templates/footer', $data);
			
		}
		else
		{
			$config = array(	
						'protocol'	=> 'smtp',
						'smtp_host'	=> 'webmail.extracarbon.com',
						'smtp_user'	=> 'admin@extracarbon.com',
						'smtp_pass'	=> $this->other_model->get_email_pass('pass_out'),
						'smtp_port'	=> 25,
						'mailtype'	=> 'html',
						'charset'	=> 'iso-8859-1'
						);
						
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
					
			$message = 	'<table border="1" width="600px" cellpadding="10px" style="border-collapse:collapse;">';
			$message .= '<tr><th>Name</td><td>'.$this->input->post('name').'</td></td>';
			$message .= '<tr><th>Email</td><td>'.$this->input->post('email').'</td></td>';
			$message .= '<tr><th>Subject</td><td>'.$this->input->post('subject').'</td></td>';
			$message .= '<tr><th>Message</td><td>'.$this->input->post('message').'</td></td>';
			$message .= '</table>';
			
						
			$this->email->from($config['smtp_user'], 'extracarbon.com');
			$this->email->to('info@extracarbon.com');
			$this->email->subject($this->input->post('subject'));
			$this->email->message($message);
			
			if($this->email->send())
			{
			  $this->session->set_flashdata('reply', 'You Query has been submitted successfully, we will contact you soon. Thank You.');
			  redirect('other/contact_us');
			}
		
		}
				
	}	
	
	public function about_us()
	{
		$data['title'] = 'About Us';
		$this->load->view('templates/header_1', $data);
		$this->load->view('about_us', $data);
		$this->load->view('templates/footer', $data);
	}
	
	public function how_it_works()
	{
		$data['title'] = 'How it Works';
		$this->load->view('templates/header_1', $data);
		$this->load->view('how_it_works', $data);
		$this->load->view('templates/footer', $data);
	}
	
	public function disclaimer()
	{
		$data['title'] = 'Disclaimer';
		$this->load->view('templates/header_1', $data);
		$this->load->view('disclaimer', $data);
		$this->load->view('templates/footer', $data);
	}
	
	public function tour()
	{
		//$this->output->cache(30);
		$data['title'] = 'Tour';
		$this->load->view('templates/header_1', $data);
		$this->load->view('tour', $data);
		$this->load->view('templates/footer', $data);
	}
	
	public function rate_list()
	{
		$path = file_get_contents("assets/files/MaterialRates.doc");
		$name = 'MaterialRates.doc';
		force_download($name, $path);
		redirect('home');
	}

}