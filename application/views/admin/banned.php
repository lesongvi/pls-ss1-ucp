<?php
$this->load->view('admin/templates/header');
?>
<div class="body bg-gray">
<hr>
<div class="row">
<div class="col-md-12">
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