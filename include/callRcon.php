<?php
require('SampRcon.php');

$query = new SampRcon("vietrp.com", 7777, "adqwkqwvdiyqvdhkasvdywqvdy1");
$command = isset($_GET['lenh']);
$value = isset($_GET['value']);
if($query->connect())
{
if($command == "cmdlist")
{
	print_r($query->getCommandList()); 
}
else if($command == "varlist")
{
	print_r($query->getServerVariables());
}
else if($command == "weather")
{
	print_r($query->getServerVariables($value));
}
else if($command == "gravity")
{
	print_r($query->setGravity($value));
}
else if($command == "ban")
{
	print_r($query->ban($value));
}
else if($command == "kick")
{
	print_r($query->kick($value));
}
else if($command == "banip")
{
	print_r($query->banAddress($value));
}
else if($command == "unbanip")
{
	print_r($query->unbanAddress($value));
}
else if($command == "hostname")
{
	print_r($query->setHostName($value));
}
else if($command == "mapname")
{
	print_r($query->setMapname($value));
}
else if($command == "worldtime")
{
	print_r($query->setTime($value));
}
else if($command == "weburl")
{
	print_r($query->setURL($value));
}
else if($command == "trogiup")
{
	echo'Danh sách lệnh: /cmdlist,/varlist,/weather,/gravity,/ban,/kick,/banip,/unbanip,/hostname,/mapname,/worldtime,/weburl.';
}
else {
	echo'Lệnh sai hoặc không tồn tại';
}
}
else
{
	echo 'SERVER KHÔNG TRẢ LỜI';
}
?>