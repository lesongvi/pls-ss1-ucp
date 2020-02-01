<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
class Mlogin extends CI_Model {
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
    function login($username, $password) {
        
        $this->db->select('*');
        $this->db->from('accounts');
        $this->db->where('Username', $username);
        $this->db->where('Key', strtoupper(hash('whirlpool',$password)));
        $this->db->limit(1);
         
        
        $query = $this->db->get();
        if($query->num_rows() == 1) {
            return $query->result(); 
        } else {
            return false; 
        }
    }
	
	function checkuser($username) {
        
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
	
	public function register_user()
	{
	$data=array(
	'Username'=>$this->input->post('username'),
	'Sex'=>$this->input->post('sex'),
	'BirthDate'=>$this->input->post('date'),
	'Email'=>$this->input->post('email'),
	'Key'=>strtoupper(hash('whirlpool',$this->input->post('password')))
	);
	$this->db->set('RegiDate', 'NOW()', FALSE);
	$this->db->insert('accounts',$data);
	return true;
	}
	
	public function register_user2()
	{
	$data=array(
	'Username'=>$this->input->post('user'),
	'Email'=>$this->input->post('email'),
	'Key'=>strtoupper(hash('whirlpool',$this->input->post('password'))),
	'Sex'=>$this->input->post('sex'),
	'Age'=>$this->input->post('age')
	);
	$this->db->set('RegiDate', 'NOW()', FALSE);
	$this->db->insert('accounts',$data);
	return true;
	}
	
	function checkpassword($oldpassword,$username) {
        
        $this->db->select('Key,Username');
        $this->db->from('accounts');
        $this->db->where('Key', $oldpassword);
		$this->db->where('Username', $username);
        $this->db->limit(1);
         
        
        $query = $this->db->get();
        if($query->num_rows() == 1) {
            return $query->result(); 
        } else {
            return false; 
        }
    }
	
	public function update_password($username)
	{
	$data=array(
	'Key'=>strtoupper(hash('whirlpool',$this->input->post('newpassword')))
	);
	$this->db->where('Username', $username);
	$this->db->update('accounts',$data);
	return true;
	}
	
	function checkforgot($username, $email_lost) {
        
        $this->db->select('Username,Email');
        $this->db->from('accounts');
        $this->db->where('Username', $username);
        $this->db->where('Email', $email_lost);
        $this->db->limit(1);
         
        
        $query = $this->db->get();
        if($query->num_rows() == 1) {
            return $query->result(); 
        } else {
            return false; 
        }
    }
	
	public function recovery($username, $email_lost)
	{
	$key= $this->rand_string(9);
	$from = 'admin@playsamp.com';
	$to = $email_lost;  
	$subject = 'Mật khẩu mới từ GTA SAMP';
	$message = '
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="format-detection" content="telephone=no" /> <!-- disable auto telephone linking in iOS -->
	</head>
	<body bgcolor="#E1E1E1" leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
		<center style="background-color:#E1E1E1;">
			<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable" style="table-layout: fixed;max-width:100% !important;width: 100% !important;min-width: 100% !important;">
				<tr>
					<td align="center" valign="top" id="bodyCell">
						<table bgcolor="#E1E1E1" border="0" cellpadding="0" cellspacing="0" width="500" id="emailHeader">
							<tr>
								<td align="center" valign="top">
									<!-- CENTERING TABLE // -->
									<table border="0" cellpadding="0" cellspacing="0" width="100%">
										<tr>
											<td align="center" valign="top">
												<!-- FLEXIBLE CONTAINER // -->
												<table border="0" cellpadding="10" cellspacing="0" width="500" class="flexibleContainer">
													<tr>
														<td valign="top" width="500" class="flexibleContainerCell">

															<!-- CONTENT TABLE // -->
															<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
																<tr>
																	<td align="left" valign="middle" id="invisibleIntroduction" class="flexibleContainerBox" style="display:none !important; mso-hide:all;">
																		<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:100%;">
																			<tr>
																				<td align="left" class="textContent">
																					<div style="font-family:Helvetica,Arial,sans-serif;font-size:13px;color:#828282;text-align:center;line-height:120%;">
																						The introduction of your message preview goes here. Try to make it short.
																					</div>
																				</td>
																			</tr>
																		</table>
																	</td>
																</tr>
															</table>
														</td>
													</tr>
												</table>
												<!-- // FLEXIBLE CONTAINER -->
											</td>
										</tr>
									</table>
									<!-- // CENTERING TABLE -->
								</td>
							</tr>
							<!-- // END -->

						</table>
						<table bgcolor="#FFFFFF"  border="0" cellpadding="0" cellspacing="0" width="500" id="emailBody">
							<tr>
								<td align="center" valign="top">
									<table border="0" cellpadding="0" cellspacing="0" width="100%" style="color:#FFFFFF;" bgcolor="#3498db">
										<tr>
											<td align="center" valign="top">
												<table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
													<tr>
														<td align="center" valign="top" width="500" class="flexibleContainerCell">
															<table border="0" cellpadding="30" cellspacing="0" width="100%">
																<tr>
																	<td align="center" valign="top" class="textContent">
																		<h1 style="color:#FFFFFF;line-height:100%;font-family:Helvetica,Arial,sans-serif;font-size:35px;font-weight:normal;margin-bottom:5px;text-align:center;">SAMP UCP</h1>
																		<h2 style="text-align:center;font-weight:normal;font-family:Helvetica,Arial,sans-serif;font-size:23px;margin-bottom:10px;color:#205478;line-height:135%;">Yêu cầu lấy lại mật khẩu</h2>
																		<div style="text-align:center;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#FFFFFF;line-height:135%;">Xin chào! chúng tôi đã nhận được yêu cầu lấy lại mật khẩu của bạn và đây là mật khẩu mới của bạn:</div>
																		<div style="text-align:center;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#FFFFFF;line-height:135%;"><h3>'.$key.'</h3></div>
																	</td>
																</tr>
															</table>
															<!-- // CONTENT TABLE -->

														</td>
													</tr>
												</table>
												<!-- // FLEXIBLE CONTAINER -->
											</td>
										</tr>
									</table>
									<!-- // CENTERING TABLE -->
								</td>
							</tr>
							<!-- // MODULE ROW -->
		</center>
		</body>
		</html>
	';
	$header = "Content-type: text/html\r\nFrom: $from\r\nReply-to: $from"; 
	if (mail($to, $subject, $message, $header))
	{
	$new_pwd = strtoupper(hash('whirlpool',$key));
	$data=array(
	'Key'=>$new_pwd
	);
	$this->db->where('Username', $username);
	$this->db->update('accounts',$data);
	}
	return true;
	}
	
	function rand_string( $length ) {
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$size = strlen( $chars );
					$str = "";
					for( $i = 0; $i < $length; $i++ ) {
						$str .= $chars[ rand( 0, $size - 1 ) ];
					 }
					return $str;
	}
	
}
  
/* End of file modelog.php */
/* Location: ./application/models/modelog.php */
