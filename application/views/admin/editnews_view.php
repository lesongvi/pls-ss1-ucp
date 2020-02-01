<?php
$this->load->view('admin/templates/header');
?>
<div class="body bg-gray">
<div class="text-center">
<h3>Chỉnh sửa tin tức</h3>
<p>Bạn hãy chỉnh sửa tin tức ở đây</p>
</div>
<hr>
	<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading text-center">Chỉnh sửa tin tức</div>
					<div class="panel-body">
						<div class="col-md-12">
						<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
						<?php echo $success; ?>
							<form action="<?php echo base_url(); ?>admin/edit_news/<?php echo $news_item['id']; ?>" method="post" accept-charset="utf-8">								
								<div class="form-group">
									<label>Tiêu đề</label>
									<input type="text" class="form-control" placeholder="Tiêu đề" name="title" value="<?php echo $news_item['title']; ?>">
								</div>
								<div class="form-group">
									<label>Hình ảnh</label>
									<input type="text" class="form-control" name="image" placeholder="Copy link ảnh vào đây" value="<?php echo $news_item['image']; ?>">
								</div>
								
								<div class="form-group">
									<label>Nội dung</label>
									<textarea class="form-control" rows="3" name="text"><?php echo $news_item['post']; ?></textarea>
								</div>
								<div class="form-group">
								<button type="submit" class="btn btn-primary">Chỉnh sửa tin tức</button>
								</div>
							</form>
							</div>
					</div>
				</div>
			</div><!-- /.col-->
		</div>
</div>
<?php
$this->load->view('admin/templates/footer');
?>