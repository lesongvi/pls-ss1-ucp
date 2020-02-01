<?php
header('Content-Type: text/html; charset=utf-8');
define('CORE_API_HTTP_USR', 'merchant_21135');
define('CORE_API_HTTP_PWD', '211355LXtkF53xhjsOJyp15MIGEbHUTPZlr');

$bk = 'https://www.baokim.vn/the-cao/restFul/send';
$seri = isset($_POST['txtseri']) ? $_POST['txtseri'] : '';
$sopin = isset($_POST['txtpin']) ? $_POST['txtpin'] : '';
//Loai the cao (VINA, MOBI, VIETEL, VTC, GATE)
$mang = isset($_POST['chonmang']) ? $_POST['chonmang'] : '';
	if($mang=='MOBI'){
			$ten = "Mobifone";
		}
	else if($mang=='VIETEL'){
			$ten = "Viettel";
		}
	else if($mang=='GATE'){
			$ten = "Gate";
		}
	else if($mang=='VTC'){
			$ten = "VTC";
		}
	else $ten ="Vinaphone";

//Mã MerchantID dang kí trên Bảo Kim
$merchant_id = '22567';
//Api username 
$api_username = 'vietrpcom';
//Api Pwd d
$api_password = 'zcVzyJQ4VhBAygFB4rgi';
//Mã TransactionId 
$transaction_id = time();
//mat khau di kem ma website dang kí trên B?o Kim
$secure_code = 'b23e7a88da99d76d';

$arrayPost = array(
	'merchant_id'=>$merchant_id,
	'api_username'=>$api_username,
	'api_password'=>$api_password,
	'transaction_id'=>$transaction_id,
	'card_id'=>$mang,
	'pin_field'=>$sopin,
	'seri_field'=>$seri,
	'algo_mode'=>'hmac'
);

ksort($arrayPost);

$data_sign = hash_hmac('SHA1',implode('',$arrayPost),$secure_code);

$arrayPost['data_sign'] = $data_sign;

$curl = curl_init($bk);

curl_setopt_array($curl, array(
	CURLOPT_POST=>true,
	CURLOPT_HEADER=>false,
	CURLINFO_HEADER_OUT=>true,
	CURLOPT_TIMEOUT=>30,
	CURLOPT_RETURNTRANSFER=>true,
	CURLOPT_SSL_VERIFYPEER => false,
	CURLOPT_HTTPAUTH=>CURLAUTH_DIGEST|CURLAUTH_BASIC,
	CURLOPT_USERPWD=>CORE_API_HTTP_USR.':'.CORE_API_HTTP_PWD,
	CURLOPT_POSTFIELDS=>http_build_query($arrayPost)
));

$data = curl_exec($curl);

$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

$result = json_decode($data,true);

date_default_timezone_set('Asia/Ho_Chi_Minh');
$time = date("Y-m-d H:i:s",time());
//$time = time();roi
if(isset($_POST['btnCard'])){
									if($status==200){
								$amount = $result['amount'];
								switch($amount) {
									case 10000 :$xu = 200;break;
									case 20000 :$xu = 400;break;
									case 50000 :$xu = 1000;break;
									case 100000 :$xu = 2000;break;
									case 200000 :$xu = 4000;break;
									case 300000 :$xu = 6000;break;
									case 500000 :$xu = 10000;break; 
								}
									
								$dbhost="localhost";
								$dbuser="root";
								$dbpass="";
								$dbname="gta";
								$db = mysql_connect($dbhost,$dbuser,$dbpass) or die("cant connect db");
								mysql_select_db($dbname,$db) or die("cant select db");
								mysql_query("UPDATE accounts SET Credits=Credits + $xu WHERE Username ='$username';");
								mysql_query("INSERT INTO `lichsu` (`username`,`name`,`type`,`status`,`amount`,`date`) VALUES ('$username','Nạp thẻ cào','.$ten.','1','$amount',NOW())");
								echo'<div class="alert alert-success">Bạn đã nạp thành công thẻ cào '.$ten.' mệnh giá '.$amount.'</div>';
								}
								else{
								mysql_query("INSERT INTO `lichsu` (`username`,`name`,`type`,`status`,`amount`,`date`) VALUES ('$username','Nạp thẻ cào','.$ten.','0','Error',NOW())");
								echo'<div class="alert alert-danger">Thông tin thẻ cào không hợp lệ hoặc thẻ đã được sử dụng</div>';
								}
									}
?>

