<?php
$this->load->view('templates/header_logged');
?>	
<div class="body bg-gray">
<hr>
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">Chức năng</div>
<div class="panel-body">
<ul class="nav nav-tabs nav-justified">
<p class="text-center"><i class="fa fa-cogs"></i> Danh sách chức năng </p>
<hr>
<li class="active"><a href="<?php echo base_url(); ?>manage"><i class="fa fa-gavel"></i> Danh sách vi phạm</a></li>
<li><a href="<?php echo base_url(); ?>manage/top"><i class="fa fa-group"></i> Bảng xếp hạng</a></li>
<li><a href="<?php echo base_url(); ?>manage/shop"><i class="fa fa-gift"></i> Cửa hàng</a></li>
<li><a href="<?php echo base_url(); ?>manage/house"><i class="fa fa-home"></i> Danh sách House</a></li>
<li><a href="<?php echo base_url(); ?>manage/bussiness"><i class="fa fa-suitcase"></i> Danh sách cửa hàng</a></li>
</ul>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Danh sách Banned</div>
					<div class="panel-body">
						<table class="table">
						    <thead>
						    <tr>
						        <th>ID</th>
						        <th>Tên tài khoản</th>
						        <th>IP</th>
						        <th>Trạng thái</th>
								<th>Lý do</th>
								<th>Ngày Banned</th>
						    </tr>
						    </thead>
							<tbody>
							<?php for ($i = 0; $i < count($deptlist); ++$i) { ?>
							<tr>
								<td><?php echo ($page+$i+1); ?></td>
								<td><?php echo $deptlist[$i]->Username; ?></td>
								<td><?php echo $deptlist[$i]->ip_address; ?></td>
								<td><?php if($deptlist[$i]->status == 1) echo'<span class="label label-danger">Đã khóa</span>'; else echo'<span class="label label-success">Đã mở khóa</span>'; ?></td>
								<td><?php echo $deptlist[$i]->reason; ?></td>
								<td><?php echo $deptlist[$i]->bandate; ?></td>
							</tr>
							<?php } ?>
							<tbody>
						</table>
						<?php echo $pagination; ?>
					</div>
				</div>
			</div>
</div>
</div>
<?php
$this->load->view('templates/footer');
?>	