<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
 
    function index() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
 
        if($this->form_validation->run() == FALSE) {
            redirect('dashboard', 'refresh');
            } else {
                redirect('dashboard', 'refresh');
            }      
     }
 
     function check_database($password) {
         $username = $this->input->post('username');
         $result = $this->mlogin->login($username, $password);
         if($result) {
			 echo'ok';
             $sess_array = array();
             foreach($result as $row) {
                 
                 $sess_array = array('id' => $row->id,'email' => $row->Email,'username' => $row->Username,'model' => $row->Model,'money' => $row->Money
				 ,'bank' => $row->Bank,'level' => $row->Level,'regidate'=> $row->RegiDate,'lastlogin'=> $row->LastLogin,'gioitinh'=> $row->Sex,'ip'=> $row->IP,'warning' => $row->Warnings
				 ,'band'=> $row->Band,'admin'=>$row->AdminLevel,'credits'=>$row->Credits);
                 
                 $this->session->set_userdata('logged_in', $sess_array);
                 }
          return TRUE;
          } else {
              return FALSE;
          }
      }
}
/* End of file verifylogin.php */
/* Location: ./application/controllers/verifylogin.php */
