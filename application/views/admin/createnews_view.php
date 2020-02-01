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
					<div class="panel-heading text-center">Tạo tin tức</div>
					<div class="panel-body">
						<div class="col-md-12">
						<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
						<?php echo $success; ?>
							<?php echo form_open('admin/create_news'); ?>
								<div class="form-group">
									<label>Tiêu đề</label>
									<input type="text" class="form-control" placeholder="Tiêu đề" name="title">
								</div>
																
								<div class="form-group">
									<label>Hình ảnh</label>
									<input type="text" class="form-control" name="image" placeholder="Copy link ảnh vào đây">
								</div>
								
								<div class="form-group">
									<label>Nội dung</label>
									<textarea class="form-control" rows="3" name="text"></textarea>
								</div>
								<div class="form-group">
								<button type="submit" class="btn btn-primary">Đăng tin tức</button>
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