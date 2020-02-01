<?php
$this->load->view('templates/header_logged');
?>	
<ul class="nav nav-tabs nav-justified">
<li><a href="<?php echo base_url(); ?>dashboard/profile"><i class="fa fa-group"></i> Thông tin cá nhân</a></li>
<li><a href="<?php echo base_url(); ?>manage"><i class="fa fa-group"></i> Bảng xếp hạng</a></li>
<li class="active"><a href="<?php echo base_url(); ?>manage/shop"><i class="fa fa-gift"></i> Cửa hàng</a></li>
<li><a href="<?php echo base_url(); ?>manage/house"><i class="fa fa-home"></i> Danh sách House</a></li>
</ul>
<div class="body bg-gray">
<hr>
<div class="row">
<center><img src="https://cdn4.iconfinder.com/data/icons/simplicio/128x128/notification_error.png"></img><br>
<font size="5">Tài khoản của bạn không đủ tiền để mua món hàng này!</font><br>
<a href="<?php echo base_url(); ?>/dashboard/profile" class="btn btn-info btn-sm">Trang Cá Nhân</a> <a href="<?php echo base_url(); ?>/manage/shop" class="btn btn-info btn-sm">Cửa Hàng</a>
</center>
</div>
</div>
<?php
$this->load->view('templates/footer');
?>	