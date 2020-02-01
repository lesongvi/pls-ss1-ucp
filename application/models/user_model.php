<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {
 public function __construct()
 {
  parent::__construct();
 }
 public function add_user()
 {
  $data=array(
    'Username'=>$this->input->post('user_name'),
    'Email'=>$this->input->post('email_address'),
    'Key'=>strtoupper(hash('whirlpool',$this->input->post('password'))
  );
  $this->db->insert('accounts',$data);
 }
 
 function checkusername($username) {
	 
		$this->db->select('Username');
        $this->db->from('accounts');
        $this->db->where('Username', $username);
        $this->db->limit(1);
        
        $query = $this->db->get();
        if($query->num_rows() == 1) {
            return $query->result(); 
        } else {
            return false; 
        }
}
 function checkemail($email) {
	 
		$this->db->select('Email');
        $this->db->from('accounts');
        $this->db->where('Email', $email);
        $this->db->limit(1);
        
        $query = $this->db->get();
        if($query->num_rows() == 1) {
            return $query->result(); 
        } else {
            return false; 
        }
}
}
?>