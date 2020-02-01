<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['nama'] = $session_data['email'];
            $data['username'] = $session_data['username'];
            $data['id'] = $session_data['id'];
            $this->load->view('dashboard', $data);
        } else {
            $this->load->view('home');
        }
	}
	
	function check_database($password) {
         $username = $this->input->post('username');
         $result = $this->mlogin->login($username, $password);
         if($result) {
			 echo'ok';
             $sess_array = array();
             foreach($result as $row) {
                 
                 $sess_array = array('id' => $row->id,'email' => $row->Email,'username' => $row->Username);
                 
                 $this->session->set_userdata('logged_in', $sess_array);
                 }
          return TRUE;
          } else {
              return FALSE;
          }
      }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
