<?php
$this->load->view('templates/header_logged');
?>	
<ul class="nav nav-tabs nav-justified">
<li><a href="<?php echo base_url(); ?>dashboard/profile"><i class="fa fa-group"></i> Thông tin cá nhân</a></li>
<li class="active"><a href="<?php echo base_url(); ?>manage"><i class="fa fa-group"></i> Bảng xếp hạng</a></li>
<li><a href="<?php echo base_url(); ?>manage/shop"><i class="fa fa-gift"></i> Cửa hàng</a></li>
<li><a href="<?php echo base_url(); ?>manage/house"><i class="fa fa-home"></i> Danh sách House</a></li>
</ul>
<div class="body bg-gray">
<hr>
<div class="row">
<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Bảng xếp hạng</div>
					<div class="panel-body">
						<table class="table">
						    <thead>
						    <tr>
						        <th>ID</th>
						        <th>Tên tài khoản</th>
						        <th>Cấp độ</th>
						        <th>Tiền</th>
						    </tr>
						    </thead>
							<tbody>
							<?php for ($i = 0; $i < count($deptlist); ++$i) { ?>
							<tr>
								<td><?php echo ($page+$i+1); ?></td>
								<td><?php echo $deptlist[$i]->Username; ?></td>
								<td><span class="label label-info"><?php echo $deptlist[$i]->Level; ?></span></td>
								<td><?php echo number_format($deptlist[$i]->Money + $deptlist[$i]->Bank); ?>$</td>
							</tr>
							<?php } ?>
							<tbody>
						</table>
						
					</div>
				</div>
			</div>
</div>
</div>
<?php
$this->load->view('templates/footer');
?>	