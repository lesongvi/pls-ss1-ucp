<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	function index() {


		$data['page_title'] = 'Trang chủ SAMP';
		$this->load->model('news');
		$this->load->model('top_model');
        $this->load->helper('url_helper');
		
		$data['news'] = $this->news->get_news();
		$data['top'] = $this->top_model->get_top();
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['email'] = $session_data['email'];
            $data['username'] = $session_data['username'];
            $data['id'] = $session_data['id'];
			$data['admin'] = $session_data['admin'];
			if($this->config->item('baotri') == 1)
			{
				if($data['admin'] > 0)
				{
				$this->load->view('dashboard', $data);
				}
				else
				{
				$this->load->view('error');
				}
			}
			else
			{
				$this->load->view('dashboard', $data);
			}
        } else {
			if($this->config->item('baotri') == 1)
			{
				$this->load->view('error');
			}
			else
			{
				$this->load->view('dashboard',$data);
			}
        }
    }
	public function news($id)
    {
		if($id == NULL)
		{
			redirect('dashboard');
		}
		else
		{
		  $this->load->model('news');
		  $this->load->helper('url_helper');
		  $data['news_item'] = $this->news->get_news($id);
		  $data['page_title'] = "Tin tức";
		  if($this->session->userdata('logged_in'))
		  {
				if($this->config->item('baotri') == 1)
				{
				if($data['admin'] > 0)
				{
				$this->load->view('news_view', $data);
				}
				else
				{
				$this->load->view('error');
				}
				}
				$session_data = $this->session->userdata('logged_in');
				$data['email'] = $session_data['email'];
				$data['username'] = $session_data['username'];
				$data['id'] = $session_data['id'];
				$data['admin'] = $session_data['admin'];
				$this->load->view('news_view', $data);
		  } 
		  else {
			if($this->config->item('baotri') == 1)
			{
				$this->load->view('error');
			}
			else
			{
				$this->load->view('news_view',$data);
			}
		  }
	  }
    }
	function login()
	{
		$title['page_title'] = 'Đăng nhập tài khoản';
		if($this->session->userdata('logged_in'))
        {
			$session_data = $this->session->userdata('logged_in');
            $data['email'] = $session_data['email'];
            $data['username'] = $session_data['username'];
            $data['id'] = $session_data['id'];
			$data['admin'] = $session_data['admin'];
            $this->load->view('dashboard', $data);
        } else {
            $this->load->view('login_view',$title);
        }
	}
	
	function register()
	{
		$title['page_title'] = 'Đăng ký tài khoản';
		if($this->session->userdata('logged_in'))
        {
			$session_data = $this->session->userdata('logged_in');
            $data['email'] = $session_data['email'];
            $data['username'] = $session_data['username'];
            $data['id'] = $session_data['id'];
			$data['admin'] = $session_data['admin'];
			$data['model'] = $session_data['model'];
			$data['credits'] = $session_data['credits'];
			
            $this->load->view('dashboard', $data);
        } else {
			if($this->config->item('allow_reg') == 1)
			{
				$this->load->view('register_view',$title);
			}
			else
			{
				redirect('dashboard/login');
			}
        }
	}
	
	function password()
	{
		$data['page_title'] = 'Đổi mật khẩu';
		if($this->session->userdata('logged_in'))
        {
			$session_data = $this->session->userdata('logged_in');
            $data['email'] = $session_data['email'];
            $data['username'] = $session_data['username'];
            $data['id'] = $session_data['id'];
			$data['admin'] = $session_data['admin'];
			$data['credits'] = $session_data['credits'];
			$data['model'] = $session_data['model'];
			if($this->config->item('baotri') == 1)
			{
				if($data['admin'] > 0)
				{
				$this->load->view('password_view', $data);
				}
				else
				{
				$this->load->view('error');
				}
			}
			else
			{
            $this->load->view('password_view', $data);
			}
        } else {
            if($this->config->item('baotri') == 1)
			{
				$this->load->view('error');
			}
			else
			{
				redirect('dashboard/login');
			}
        }
	}
	
	function forgot()
	{
		$data['page_title'] = 'Quên mật khẩu';
		if($this->session->userdata('logged_in'))
        {
			$session_data = $this->session->userdata('logged_in');
            $data['email'] = $session_data['email'];
            $data['username'] = $session_data['username'];
            $data['id'] = $session_data['id'];
			$data['admin'] = $session_data['admin'];
			$data['credits'] = $session_data['credits'];
			$data['model'] = $session_data['model'];
            redirect('dashboard');
        } else {
            $this->load->view('recovery_view', $data);
        }
	}
	function history()
	{
		$data['page_title'] = 'Lịch sử giao dịch';
		if($this->session->userdata('logged_in'))
        {
			$session_data = $this->session->userdata('logged_in');
            $data['email'] = $session_data['email'];
            $data['username'] = $session_data['username'];
            $data['id'] = $session_data['id'];
			$data['credits'] = $session_data['credits'];
			$data['admin'] = $session_data['admin'];
			$data['model'] = $session_data['model'];
			$this->load->model('history_model');
			$data['history'] = $this->history_model->gethistory($data['username']);
			if($this->config->item('baotri') == 1)
			{
				if($data['admin'] > 0)
				{
				$this->load->view('history', $data);
				}
				else
				{
				$this->load->view('error');
				}
			}
			else
			{
            $this->load->view('history', $data);
			}
        } else {
            redirect('dashboard/login');
        }
	}
	function credit()
	{
		$data['page_title'] = 'Nạp thẻ cào';
		if($this->session->userdata('logged_in'))
        {
			$session_data = $this->session->userdata('logged_in');
            $data['email'] = $session_data['email'];
            $data['username'] = $session_data['username'];
            $data['id'] = $session_data['id'];
			$data['admin'] = $session_data['admin'];
			$data['credits'] = $session_data['credits'];
			$data['model'] = $session_data['model'];
			if($this->config->item('baotri') == 1)
			{
				if($data['admin'] > 0)
				{
				$this->load->view('credits_view', $data);
				}
				else
				{
				$this->load->view('error');
				}
			}
			else
			{
            $this->load->view('credits_view', $data);
			}
        } else {
            redirect('dashboard/login');
        }
	}
	function profile()
	 {
		if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
			$data['page_title'] = 'Thông tin cá nhân';
            $data['email'] = $session_data['email'];
            $data['username'] = $session_data['username'];
            $data['id'] = $session_data['id'];
			$data['money'] = $session_data['money'];
			$data['bank'] = $session_data['bank'];
			$data['model'] = $session_data['model'];
			$data['level'] = $session_data['level'];
			$data['ip'] = $session_data['ip'];
			$data['regidate'] = $session_data['regidate'];
			$data['lastlogin'] = $session_data['lastlogin'];
			$data['gioitinh'] = $session_data['gioitinh'];
			$data['band'] = $session_data['band'];
			$data['warning'] = $session_data['warning'];
			$data['admin'] = $session_data['admin'];
			$data['credits'] = $session_data['credits'];
			$this->load->model('newmember');
			$data['member'] = $this->newmember->getmember();
			$this->load->model('getcar');
			$data['vehicles'] = $this->getcar->getmemcar($data['id']);
			$this->load->model('gettoy');
			$data['toys'] = $this->gettoy->getmemtoy($data['id']);
			if($this->config->item('baotri') == 1)
			{
				if($data['admin'] > 0)
				{
				$this->load->view('profile_view', $data);
				}
				else
				{
				$this->load->view('error');
				}
			}
			else
			{
            $this->load->view('profile_view', $data);
			}
        } else {
            redirect('dashboard', 'refresh');
        }
	 }
	 
	function logout() {
         $this->session->unset_userdata('logged_in');
         $this->session->sess_destroy();
         redirect('dashboard', 'refresh');
     }

	 //Dashboard
	 function download(){
		 
		if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['email'] = $session_data['email'];
            $data['username'] = $session_data['username'];
            $data['id'] = $session_data['id'];
			$data['admin'] = $session_data['admin'];
			$data['credits'] = $session_data['credits'];
        }
		$data['page_title'] = 'Trang tải về';
		$this->load->view('download_view',$data);
	 }
		
		function support()
		{
		$data['page_title'] = 'Hỗ trợ SAMP';
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['email'] = $session_data['email'];
            $data['username'] = $session_data['username'];
            $data['id'] = $session_data['id'];
			$data['admin'] = $session_data['admin'];
            $this->load->view('support', $data);
        } else {
            $this->load->view('support',$data);
        }
		}
}

