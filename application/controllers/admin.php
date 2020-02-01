<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	function index() {
		if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
			$data['page_title'] = 'Trang quản lý';
            $data['email'] = $session_data['email'];
            $data['username'] = $session_data['username'];
            $data['id'] = $session_data['id'];
			$data['admin'] = $session_data['admin'];
			$data['allow_admin'] = $this->config->item('admin_allow');
			if($data['admin'] <  $data['allow_admin'])
			{
				redirect('dashboard');
			}
			else
			{
            $this->load->view('admin/dashboard', $data);
			}
        } else {
            redirect('dashboard', 'refresh');
        }
	}
	
	function create_news()
	{
		if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
			$data['page_title'] = 'Tạo tin tức';
            $data['email'] = $session_data['email'];
            $data['username'] = $session_data['username'];
            $data['id'] = $session_data['id'];
			$data['admin'] = $session_data['admin'];
			$data['allow_admin'] = $this->config->item('admin_allow');
			$data['success'] = '';
			if($data['admin'] < $data['allow_admin'])
			{
				redirect('dashboard');
			}
			else
			{
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model('news');
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('text', 'Text', 'required');
			$this->form_validation->set_rules('image', 'Image', 'required');
			
			if ($this->form_validation->run() === TRUE)
			{
			$this->news->create_news($data['username']);
			$data['success'] = '<div class="alert alert-success">Đăng bài thành công</div>';
			}
            $this->load->view('admin/createnews_view', $data);
			}
        } 
		else 
		{
            redirect('dashboard', 'refresh');
        }
	}
	
	function edit_news($id = false)
	{
		if($this->session->userdata('logged_in'))
        {
			$this->load->model('news');
            $session_data = $this->session->userdata('logged_in');
			$data['page_title'] = 'Chỉnh sửa tin tức';
            $data['email'] = $session_data['email'];
            $data['username'] = $session_data['username'];
            $data['id'] = $session_data['id'];
			$data['admin'] = $session_data['admin'];
			$data['allow_admin'] = $this->config->item('admin_allow');
			$data['success'] = '';
			if($data['admin'] < $data['allow_admin'])
			{
				redirect('dashboard');
			}
			else
			{
			if ($id == NULL)
			{
				$data['news'] = $this->news->get_news();
				$this->load->view('admin/listnews_view', $data);
			}
			else
			{
				$this->load->helper('form');
				$this->load->library('form_validation');
				$this->form_validation->set_rules('title', 'Title', 'required');
				$this->form_validation->set_rules('text', 'Text', 'required');
				$this->form_validation->set_rules('image', 'Image', 'required');
				
				if ($this->form_validation->run() === TRUE)
				{
				$this->news->edit_news($id);
				$data['success'] = '<div class="alert alert-success">Chỉnh sửa tin tức thành công</div>';
				}
				$data['news_item'] = $this->news->get_news($id);
				$this->load->view('admin/editnews_view', $data);
			}
			} 
		}
		else {
            redirect('dashboard', 'refresh');
        }
	}
	
	function delete_news($id = false)
	{
		if($this->session->userdata('logged_in'))
        {
			$this->load->model('news');
            $session_data = $this->session->userdata('logged_in');
			$data['page_title'] = 'Xóa tin tức';
            $data['email'] = $session_data['email'];
            $data['username'] = $session_data['username'];
            $data['id'] = $session_data['id'];
			$data['admin'] = $session_data['admin'];
			$data['allow_admin'] = $this->config->item('admin_allow');
			$data['success'] = '';
			if($data['admin'] < $data['allow_admin'])
			{
				redirect('dashboard');
			}
			else
			{
			if ($id == NULL)
			{
				$data['news'] = $this->news->get_news();
				$this->load->view('admin/deletenews_view', $data);
			}
			else
			{
				$this->news->delete_news($id);
				$data['success'] = '<div class="alert alert-success">Xóa tin tức thành công</div>';
				redirect('admin/delete_news');
			}
			}
        } else {
            redirect('dashboard', 'refresh');
        }
	}
	
	function create_user()
	{
		if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
			$data['page_title'] = 'Tạo người dùng';
            $data['email'] = $session_data['email'];
            $data['username'] = $session_data['username'];
            $data['id'] = $session_data['id'];
			$data['admin'] = $session_data['admin'];
			$data['allow_admin'] = $this->config->item('admin_allow');
			$data['success'] = '';
			if($data['admin'] < $data['allow_admin'])
			{
				redirect('dashboard');
			}
			else
			{
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model('mlogin');
			$this->form_validation->set_rules('user', 'Username', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('sex', 'Sex', 'required');
			$this->form_validation->set_rules('age', 'Age', 'required');
			
			if ($this->form_validation->run() === TRUE)
			{
				  $check = $this->mlogin->checkuser($this->input->post('user'));
				  if($check)
				  {
					$data['success'] = '<div class="alert alert-danger">Tài khoản đã tồn tại</div>';
				  }
				  else
				  {
					$data['success'] = '<div class="alert alert-success">Tạo tài khoản thành công</div>';
					$this->mlogin->register_user2();
				  }
			}
            $this->load->view('admin/createuser_view', $data);
			}
        } 
		else 
		{
            redirect('dashboard', 'refresh');
        }		
	}
	
	function config_server()
	{
		if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
			$data['page_title'] = 'Cấu hình Rcon';
            $data['email'] = $session_data['email'];
            $data['username'] = $session_data['username'];
            $data['id'] = $session_data['id'];
			$data['admin'] = $session_data['admin'];
			$data['allow_admin'] = $this->config->item('admin_allow');
			if($data['admin'] < $data['allow_admin'])
			{
				redirect('dashboard');
			}
			else
			{		
			
			$data['server'] = $this->config->item('server_ip');
			$data['port'] = $this->config->item('port');
			$data['rcon'] = $this->config->item('rcon_pass');
			
            $this->load->view('admin/config_view', $data);
			}
        } 
		else 
		{
            redirect('dashboard', 'refresh');
        }
	}
	
	function config()
	{
		if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
			$data['page_title'] = 'Cài đặt trang Web';
            $data['email'] = $session_data['email'];
            $data['username'] = $session_data['username'];
            $data['id'] = $session_data['id'];
			$data['admin'] = $session_data['admin'];
			$data['allow_admin'] = $this->config->item('admin_allow');
			
			if($data['admin'] < $data['allow_admin'])
			{
				redirect('dashboard');
			}
			else
			{		
			
			$data['ucp_name'] = $this->config->item('ucp_name');
			$data['news_allow'] = $this->config->item('news_allow');
			$data['allow_reg'] = $this->config->item('allow_reg');
			$data['baotri'] = $this->config->item('baotri');
			$data['facebook'] = $this->config->item('facebook');
			$data['slider'] = $this->config->item('slider');
			$data['slider2'] = $this->config->item('slider2');
			$data['slider3'] = $this->config->item('slider3');
			$data['background'] = $this->config->item('background');
			$data['favicon']= $this->config->item('favicon');
            $this->load->view('admin/config', $data);
			}
        } 
		else 
		{
            redirect('dashboard', 'refresh');
        }
	}
	
	  public function update()
	  {
	   $update_data=array(
		  'server_ip'=>$this->input->post('server'),
		  'port'=>$this->input->post('port'),
		  'rcon_pass'=>$this->input->post('rcon')
		  );
	   $success = $this->Siteconfig->update_config($update_data);
	   if($success)
	   {
		   $this->session->set_flashdata('thongbao', '<div class="alert alert-success">Lưu cài đặt thành công</div>');
		   redirect('admin/config_server');
	   }
	  }
	  
	  public function updateconfig()
	  {
	   $update_data=array(
		  'ucp_name'=>$this->input->post('ucpname'),
		  'admin_allow'=>$this->input->post('config'),
		  'news_allow'=>$this->input->post('news'),
		  'allow_reg'=>$this->input->post('reg'),
		  'baotri'=>$this->input->post('baotri'),
		  'facebook'=>$this->input->post('facebook'),
		  'slider'=>$this->input->post('slider'),
		  'slider2'=>$this->input->post('slider2'),
		  'slider3'=>$this->input->post('slider3'),
		  'background'=>$this->input->post('background'),
		  'favicon'=>$this->input->post('favicon')
		  );
	   $success = $this->Siteconfig->update_config($update_data);
	   if($success)
	   {
		   $this->session->set_flashdata('thongbao', '<div class="alert alert-success">Lưu cài đặt thành công</div>');
		   redirect('admin/config');
	   }
	  }
}