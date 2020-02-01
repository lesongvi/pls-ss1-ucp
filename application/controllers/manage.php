<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Manage extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
		function index(){
		if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['email'] = $session_data['email'];
            $data['username'] = $session_data['username'];
            $data['id'] = $session_data['id'];
			$data['admin'] = $session_data['admin'];
			$data['credits'] = $session_data['money'];
			$data['model'] = $session_data['model'];
        }
		$this->load->library('pagination');
        $this->load->helper('url');
        $this->load->model('top_model');

        $config['base_url'] = base_url('manage/top');
        $config['total_rows'] = 100;
        $config['per_page'] = "10";
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //call the model function to get the department data
        $data['deptlist'] = $this->top_model->get_department_list($config["per_page"], $data['page']);           

        $data['pagination'] = $this->pagination->create_links();

		$data['page_title'] = "Bảng xếp hạng";
		
		$data['page_active'] = 'class="active"';
        //load the department_view
        $this->load->view('top_view',$data);		
		}
		
		function shop(){
		$data['page_title'] = 'Cửa hàng';
		if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['email'] = $session_data['email'];
            $data['username'] = $session_data['username'];
            $data['id'] = $session_data['id'];
			$data['admin'] = $session_data['admin'];
			$data['credits'] = $session_data['money'];
			$data['model'] = $session_data['model'];
			
			$this->load->library('pagination');
			$this->load->helper('url');
			$this->load->model('shop_model');
			
			$config['base_url'] = base_url('manage/shop');
			$config['total_rows'] = 132;
			$config['per_page'] = "12";
			$config["uri_segment"] = 3;
			$choice = $config["total_rows"] / $config["per_page"];
			$config["num_links"] = floor($choice);

			//config for bootstrap pagination class integration
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = false;
			$config['last_link'] = false;
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['prev_link'] = '&laquo';
			$config['prev_tag_open'] = '<li class="prev">';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = '&raquo';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';

			$this->pagination->initialize($config);
			$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

			//call the model function to get the department data
			$data['deptlist'] = $this->shop_model->get_vehicles_list($config["per_page"], $data['page']);           

			$data['pagination'] = $this->pagination->create_links();
			
			$data['planelist'] = $this->shop_model->get_plane_list();
			
			$data['shiplist'] = $this->shop_model->get_ship_list();
			
			$data['toylist'] = $this->shop_model->get_toy_list();
			
			$this->load->view('shop_view',$data);
			
        }
		else
		{
			redirect('dashboard/login', 'refresh');
		}
		}
		
		function buyproduct()
		{
			if($this->session->userdata('logged_in'))
			{
				$session_data = $this->session->userdata('logged_in');
				$data['email'] = $session_data['email'];
				$data['username'] = $session_data['username'];
				$data['id'] = $session_data['id'];
				$data['admin'] = $session_data['admin'];
				$data['credits'] = $session_data['money'];
				$data['model'] = $session_data['model'];

				$vatpham = $_REQUEST["buy"];
				$gia = $_REQUEST["price"];
				$mycredit = $data['credits'];
				$id = $data['id'];
				
				$this->load->model('shop_model');
				if($vatpham >= 400 && $vatpham <= 609)
				{
					if($mycredit < $gia)
					{
						$json = array("Code" => "Error");
						echo json_encode($json);
					}
					else
					{
						$creditsthat = $data['credits'];
						$this->shop_model->buy($vatpham,$creditsthat,$gia,$id);
					    $json = array("Code" => "200");
						echo json_encode($json);
					}
				}
				else
				{
					if($mycredit < $gia)
					{
						$json = array("Code" => "Error");
						echo json_encode($json);
					}
					else
					{
						$creditsthat = $data['credits'];
						$this->shop_model->buytoy($vatpham,$creditsthat,$gia,$id);
						$json = array("Code" => "200");
						echo json_encode($json);
					}
				}
			}
		}
		
		function success(){
		$data['page_title'] = 'Mua hàng thành công';
		if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['email'] = $session_data['email'];
            $data['username'] = $session_data['username'];
            $data['id'] = $session_data['id'];
			$data['admin'] = $session_data['admin'];
			$data['credits'] = $session_data['money'];
			$data['model'] = $session_data['model'];
			
			$this->load->library('pagination');
			$this->load->helper('url');
			
			$config['base_url'] = base_url('manage/muahang');
			$config['total_rows'] = 132;
			$config['per_page'] = "12";
			$config["uri_segment"] = 3;
			$choice = $config["total_rows"] / $config["per_page"];
			$config["num_links"] = floor($choice);

			//config for bootstrap pagination class integration
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = false;
			$config['last_link'] = false;
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['prev_link'] = '&laquo';
			$config['prev_tag_open'] = '<li class="prev">';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = '&raquo';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';

			$this->pagination->initialize($config);
			$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

			//call the model function to get the department data			
			$this->load->view('thanhcong_view',$data);
        }
		else
		{
			redirect('dashboard/login', 'refresh');
		}
		}
		
		function failed(){
		$data['page_title'] = 'Mua hàng thành công';
		if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['email'] = $session_data['email'];
            $data['username'] = $session_data['username'];
            $data['id'] = $session_data['id'];
			$data['admin'] = $session_data['admin'];
			$data['credits'] = $session_data['money'];
			$data['model'] = $session_data['model'];
			
			$this->load->library('pagination');
			$this->load->helper('url');
			$this->load->model('shop_model');
			
			$config['base_url'] = base_url('manage/error');
			$config['total_rows'] = 132;
			$config['per_page'] = "12";
			$config["uri_segment"] = 3;
			$choice = $config["total_rows"] / $config["per_page"];
			$config["num_links"] = floor($choice);

			//config for bootstrap pagination class integration
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = false;
			$config['last_link'] = false;
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['prev_link'] = '&laquo';
			$config['prev_tag_open'] = '<li class="prev">';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = '&raquo';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';

			$this->pagination->initialize($config);
			$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

			//call the model function to get the department data			
			$this->load->view('thatbai_view',$data);
        }
		else
		{
			redirect('dashboard/login', 'refresh');
		}
		}
		
		function house(){
		if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['email'] = $session_data['email'];
            $data['username'] = $session_data['username'];
            $data['id'] = $session_data['id'];
			$data['admin'] = $session_data['admin'];
			$data['credits'] = $session_data['money'];
			$data['model'] = $session_data['model'];
        }
		$this->load->library('pagination');
        $this->load->helper('url');
        $this->load->model('house_model');

        $config['base_url'] = base_url('manage/house');
        $config['total_rows'] = 100;
        $config['per_page'] = "10";
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //call the model function to get the department data
        $data['deptlist'] = $this->house_model->get_house($config["per_page"], $data['page']);           

        $data['pagination'] = $this->pagination->create_links();

		$data['page_title'] = "Danh sách nhà cửa";
        //load the department_view
        $this->load->view('house_view',$data);		
		}
}
/* End of file verifylogin.php */
/* Location: ./application/controllers/verifylogin.php */
