<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Register extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
 
    function index() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|callback_check_database');
		$this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password2', 'Password2', 'trim|required|xss_clean');
 
        if($this->form_validation->run() == FALSE) {
            redirect('dashboard', 'refresh');
            } else {
                redirect('dashboard', 'refresh');
            }      
     }
	function check_sex($sex){
				$this->mlogin->register_user();
			  }
	function check_date($date){
		$result = $this->input->post('date');
		$this->mlogin->register_user();
	}
	function check_database($username) {
		if (strpos($username, '_') === false) {
			echo 'checkname';
			}
			else
			{
			$result = $this->mlogin->checkuser($username);
			if($result) {
			 echo'usererror';
			 return TRUE;
			} else {
			  $email = $this->input->post('email');
			  $this->check_email($email);
              return FALSE;
          }
		}
	}  
	function check_email($email) {
         $result = $this->mlogin->checkemail($email);
         if($result) {
			 echo'emailerror';
          return TRUE;
          } else {
			  $this->check_pass();
              return FALSE;
          }
      }
      	  
	  function check_pass(){
	  if($this->input->post('password') != $this->input->post('password2'))
		{
		echo'passerror';
		}
		 else
		{
				$this->mlogin->register_user();
			  }
	  }
}
/* End of file verifylogin.php */
/* Location: ./application/controllers/verifylogin.php */
