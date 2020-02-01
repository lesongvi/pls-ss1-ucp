<?php
$this->load->view('admin/templates/header');
?>
<div class="body bg-gray">
<div class="text-center">
<h3>Tạo tin tức</h3>
<p>Tin tức, sự kiện đều được tạo ra ở đây</p>
</div>
<hr>
	<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading text-center">Chọn tin tức để chỉnh sửa</div>
					<div class="panel-body">
						<div class="col-md-12">
						<?php foreach($news as $news_item) { ?>
						<div class="col-md-4">
						<a href="<?php echo base_url(); ?>admin/edit_news/<?php echo $news_item['id']; ?>"><img class="img-rounded" src="<?php echo $news_item['image']; ?>" width="200px" height="100px"/></br>
						<strong><font color="blue"></font>Bài viết: <?php echo $news_item['title']; ?></strong></a>
						</div>
						<?php } ?>
							</div>
					</div>
				</div>
			</div><!-- /.col-->
		</div>
</div>
<?php
$this->load->view('admin/templates/footer');
?>