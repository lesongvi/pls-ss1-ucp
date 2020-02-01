<?php
$this->load->view('admin/templates/header');
?>
<div class="body bg-gray">
<div class="text-center">
<h3>Admin</h3>
<p>Tại đây bạn có thể sử dụng các chức năng của Admin!</p>
</div>
<hr>
	<div class="row">
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-body text-center">
					<a href="<?php echo base_url(); ?>admin/create_news">
					<i class="fa fa-comments fa-3x"></i></br>Tạo tin tức
					</a>
					</div>
				</div>
			</div><!--/.col-->
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-body text-center">
					<a href="<?php echo base_url(); ?>admin/edit_news">
					<i class="fa fa-comments fa-3x"></i></br>Chỉnh sửa tin tức
					</a>
					</div>
				</div>
			</div><!--/.col-->
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-body text-center">
					<a href="<?php echo base_url(); ?>admin/delete_news">
					<i class="fa fa-ban fa-3x"></i></br>Xóa tin tức
					</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-body text-center">
					<a href="<?php echo base_url(); ?>admin/create_user">
					<i class="fa fa-users fa-3x"></i></br>Tạo thành viên
					</a>
					</div>
				</div>
			</div><!--/.col-->
		<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-body text-center">
					<a href="<?php echo base_url(); ?>admin/config_server">
					<i class="fa fa-gear fa-3x"></i></br>Cấu hình Rcon
					</a>
					</div>
				</div>
			</div><!--/.col-->
				<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-body text-center">
					<a href="<?php echo base_url(); ?>admin/banned">
					<i class="fa fa-ban fa-3x"></i></br>Danh Sách Banned
					</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-body text-center">
					<a href="<?php echo base_url(); ?>admin/config">
					<i class="fa fa-gears fa-3x"></i></br>Cài đặt
					</a>
					</div>
				</div>
			</div><!--/.col-->
		</div>
</div>	
<?php
$this->load->view('admin/templates/footer');
?>	