<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Changepw extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
 
    function index() {
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('oldpassword', 'Old Password', 'trim|required|xss_clean|callback_change');
        $this->form_validation->set_rules('newpassword', 'New Password', 'trim|required|xss_clean');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean');
 
        if($this->form_validation->run() == FALSE) {
            redirect('dashboard', 'refresh');
            } else {
                redirect('dashboard', 'refresh');
            }      
     }
 
     function change($oldpassword) {
		 $username = $this->input->post('username');
		 $oldpassword = strtoupper(hash('whirlpool',$this->input->post('oldpassword')));
         $result = $this->mlogin->checkpassword($oldpassword,$username);
         if($result) {
			if($this->input->post('newpassword') != $this->input->post('confirm_password'))
			{
				echo'wrongnew';
			}
			else
			{
				$this->mlogin->update_password($username);
			}
          return TRUE;
          } 
		  else {
			  echo'wrongold';
              return FALSE;
          }
      }
}