<?php
$this->load->view('admin/templates/header');
?>
<div class="body bg-gray">
<div class="text-center">
<h3>Tạo thành viên</h3>
<p>Bạn muốn tạo thành viên ? hãy vào đây</p>
</div>
<hr>
	<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading text-center">Tạo thành viên</div>
					<div class="panel-body">
						<div class="col-md-12">
						<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
						<?php echo $success; ?>
							<?php echo form_open('admin/create_user'); ?>
							<div class="col-md-6">
								<div class="form-group">
									<label>Tên tài khoản</label>
									<input type="text" class="form-control" placeholder="Tên tài khoản" name="user">
								</div>
																
								<div class="form-group">
									<label>Mật khẩu</label>
									<input type="password" class="form-control" name="password" placeholder="Mật khẩu">
								</div>
								
								<div class="form-group">
									<label>Email</label>
									<input type="text" class="form-control" placeholder="Email" name="email">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Giới tính</label>
									<select class="form-control" name="sex">
									<option value="1">Nam</option>
									<option value="2">Nữ</option>
									</select>
								</div>
								
								<div class="form-group">
									<label>Tuổi</label>
									<input type="number" class="form-control" name="age" min="13" max="65" value="13">
								</div>
							</div>
							<div class="col-md-12">
							<div class="form-group text-center">
								<button type="submit" class="btn btn-primary">Tạo thành viên</button>
							</div>
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