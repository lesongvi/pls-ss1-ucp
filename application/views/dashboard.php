<?php
$this->load->view('templates/header');
?>
<div class="body bg-gray">
<div class="text-center">
<h3>Chào mừng bạn đến máy chủ của chúng tôi</h3>
<p>Để tham gia các bạn hãy tải SAMP Client và một trong 2 phiên bản GTA SAN:</p>
</div>
<hr>
<div class="row">
	<div class="col-xs-12 col-md-6 col-lg-4">
					<div class="panel panel-default">
					<div class="panel-body text-center">
					<h3><span class="label label-danger">SA:MP Client</span></h3>
					<a href="http://files.sa-mp.com/sa-mp-0.3.7-install.exe" class="btn btn-primary">Tải về</a>
					</div>
					</div>
				</div>
	<div class="col-xs-12 col-md-6 col-lg-4">
					<div class="panel panel-default">
					<div class="panel-body text-center">
					<h3><span class="label label-info">GTA SAN[RIP]</span></h3>
					<a href="#" class="btn btn-primary">Tải về</a>
					</div>
					</div>
				</div>
	<div class="col-xs-12 col-md-6 col-lg-4">
					<div class="panel panel-default">
					<div class="panel-body text-center">
					<h3><span class="label label-warning">GTA SAN[FULL]</span></h3>
					<a href="https://docs.google.com/uc?id=0B8lmnfP48G6-ZFdzT1ZVaE1pWlE&export=download" class="btn btn-primary">Tải về</a>
					</div>
					</div>
				</div>
</div>
<hr>
<div class="row">
	<div class="col-md-6">
					<div class="panel panel-default">
					<div class="panel-heading"><i class="fa fa-comments"></i> Tin tức mới</div>
					<div class="panel-body">
					<?php foreach($news as $news_item) { ?>
					<div class="col-md-6">
					<div class="thumbnail">
					<a href="<?php echo base_url();?>dashboard/news/<?php echo $news_item['id']; ?>"><img src="<?php echo $news_item['image']; ?>" width="512px" height="150px"/></a>
					<a href="<?php echo base_url();?>dashboard/news/<?php echo $news_item['id']; ?>"><strong><?php echo $news_item['title']; ?></strong></br><?php echo $news_item['newdate']; ?></a>
					</div>
					</div>
					<?php } ?>
					</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="panel panel-default">
					<div class="panel-heading"><i class="fa fa-users"></i> Bảng xếp hạng</div>
					<div class="panel-body">
					<table class="table table-striped">
					<thead>
					<tr>
					  <th>Tài khoản</th>
					  <th>Tiền</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach($top as $top_item) { ?>
					<tr>
					  <td><?php echo $top_item->Username; ?></td>
					  <td><?php echo $top_item->Money; ?></td>
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