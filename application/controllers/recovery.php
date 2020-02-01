<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Recovery extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
 
    function index() {		
        $this->form_validation->set_rules('username_lost', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email_lost', 'Email', 'trim|required|xss_clean|callback_check_database');
					
		if($this->form_validation->run() == FALSE) {
            redirect('dashboard', 'refresh');
            } else {
                redirect('dashboard', 'refresh');
            }   
     }
	 
	function check_database($email_lost) {
         $username = $this->input->post('username_lost');
         $result = $this->mlogin->checkforgot($username, $email_lost);
         if($result) {
			 echo'ok';
			$this->mlogin->recovery($username, $email_lost);
          return TRUE;
          } else {
			  echo'error';
              return FALSE;
          }
      }

}