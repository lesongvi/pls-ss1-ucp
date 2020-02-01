<?php
$this->load->view('templates/header_logged');
?>	
<div class="body bg-gray">
<hr>
<div class="row no-space margin-bottom-30">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Lịch sử</div>
				<div class="panel-body">
				<table class="table">
				<thead>
				<tr>
				  <th>ID</th>
				  <th>Tên giao dịch</th>
				  <th>Loại giao dịch</th>
				  <th>Mệnh giá</th>
				  <th>Trạng thái</th>
				  <th>Ngày thực hiện</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach($history as $history_item){ ?>
				<tr>
				<td><?php echo $history_item->id; ?></td>
				<td><?php echo $history_item->name; ?></td>
				<td><?php echo $history_item->type; ?></td>
				<td><?php echo $history_item->amount; ?></td>
				<td><?php if($history_item->status == 0) echo '<span class="label label-danger">Không thành công</span>'; else echo'<span class="label label-success">Thành công</span>';?></td>
				<td><?php echo $history_item->newdate; ?></td>
				</tr>
				<?php } ?>
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