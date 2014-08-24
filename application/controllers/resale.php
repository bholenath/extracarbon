<?php if(!defined('BASEPATH')) exit('no direct access to the script is allowed');

class Resale extends My_Controller
{

	var $menu;
	var $uploadpath;

	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('dashboard_menu');
		
		$this->load->model('earnpoint_model');
		$this->load->model('showpoint_model');
		$this->load->model('resale_model');
		
		$this->uploadpath = realpath(APPPATH.'../assets/images/uploads');
		
		$menu = new dashboard_menu();
		
		$this->load->helper('date');
		
		$this->menu = $menu->menu();
		
		$this->auth->is_logged_in();
		
		$this->auth->clear_cache();
		
	}
	
	public function index()
	{		
		$this->upload_item();
	}
	
	public function upload_item()
	{
		$data['title'] 			= 'Upload Item';
		
		$data['menu'] 			= $this->menu;
		$data['user_data'] 		= $this->earnpoint_model->get_user_data($this->session->userdata('username'));
		
		
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
				
				$this->render_view('resale_upload', $data);
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
					
					redirect('resale/upload_item');
				}
				else
				{
					$pic_name = $this->session->userdata('userid').'_'.date('Y_m_d_gis').'.jpg';
					
					if($this->resale_model->save_item_info($pic_name)):
					
						$image_data = $this->upload->data();
						
						
						rename($image_data['full_path'], 'assets/images/resale_item/'.$pic_name);
						
						$this->session->set_flashdata('upload_msg', 'Image uploaded successfully. You will get a quote on your mentioned 
						Email Id regarding you item within 48 hours. <br> Thank You');
						
						redirect('resale/upload_item');
						
					endif;
				}
				
				
				$this->render_view('resale_upload', $data);
			}	
		}
		else
			$this->render_view('resale_upload', $data);
		
	}
	
}