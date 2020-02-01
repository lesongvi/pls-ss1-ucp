<?php
$this->load->view('templates/header_logged');
include('include/online.php');
?>
<ul class="nav nav-tabs nav-justified">
<li><a href="<?php echo base_url(); ?>dashboard/profile"><i class="fa fa-group"></i> Thông tin cá nhân</a></li>
<li><a href="<?php echo base_url(); ?>manage"><i class="fa fa-group"></i> Bảng xếp hạng</a></li>
<li><a href="<?php echo base_url(); ?>manage/shop"><i class="fa fa-gift"></i> Cửa hàng</a></li>
<li class="active"><a href="<?php echo base_url(); ?>manage/house"><i class="fa fa-home"></i> Ai Đang Online?</a></li>
</ul>
<hr>
<div class="body bg-gray">
  <?php
  if(!is_array($aTotalPlayers) || count($aTotalPlayers) == 0){
      echo '<br /><i>None</i>';
  } else {
  ?>
		<div class="row">
			<div class="col-lg-8">
	        <div class="panel panel-default">
			<div class="panel-heading" id="accordion">Ai Đang Online?</div>
			<div class="panel-body">
			<table class="table table-striped">
			<thead>
			<tr>
			<th>ID</th>
			<th>NickName</th>
			<th>Score</th>
			<th>Ping</th>
			</tr>
			</thead>
			 <?php
	  foreach($aTotalPlayers AS $id => $value){
	  ?>
			<tbody>
			<tr>
	          <td><?php echo $value['PlayerID']; ?></td>
	          <td><?php echo htmlentities($value['Nickname']); ?></td>
	          <td><?php echo $value['Score']; ?></td>
	          <td><?php echo $value['Ping']; ?></td>
<?php
	  echo '</tr>';
}
}
?>
			</tbody>
			</table>
			</div>
            </div>
</div>
	<div class="col-lg-4">
		   <div class="panel panel-default">
			<div class="panel-heading" id="accordion">Thông Tin Server</div>
            <div class="panel-body">
			<table class="table table-striped">
			<tbody>
			<tr>
          <td><b>Server</b></td>
          <td><?php echo htmlentities($aInformation['Hostname']); ?></td>
      </tr>
      <tr>
          <td><b>Gamemode</b></td>
          <td><?php echo htmlentities($aInformation['Gamemode']); ?></td>
      </tr>
      <tr>
          <td><b>Người Chơi</b></td>
          <td><?php echo $aInformation['Players']; ?> / <?php echo $aInformation['MaxPlayers']; ?></td>
      </tr>
      <tr>
          <td><b>Map</b></td>
          <td><?php echo htmlentities($aInformation['Map']); ?></td>
      </tr>
      <tr>
          <td><b>Thời Tiết:</b></td>
          <td><?php echo $aServerRules['weather']; ?></td>
      </tr>
      <tr>
          <td><b>Thời Gian</b></td>
          <td><?php echo $aServerRules['worldtime']; ?></td>
      </tr>
      <tr>
          <td><b>Version</b></td>
          <td><?php echo $aServerRules['version']; ?></td>
      </tr>
      <tr>
          <td><b>Mật Khẩu</b></td>
          <td><?php echo $aInformation['Password'] ? 'Yes' : 'No'; ?></td>
      </tr>
			</tbody>
			</table>
			</div>
			</div>
		  </div>
        </div>
</div>
<?php
$this->load->view('templates/footer');
?>