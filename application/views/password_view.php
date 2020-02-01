<?php
$this->load->view('templates/header_logged');
$username1 = $username;
?>
<div class="body bg-gray">
<hr>
		<div class="row"></br>
			<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Đổi mật khẩu</div>
				<div class="panel-body">
				<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
					<form method="post" id="password_form">
					<div id="change"></div>
					<div class="form-body">
						<div class="form-group">
								<input class="form-control" name="username" id="username" type="text" value="<?php echo $username; ?>" readonly>
						</div>
						<div class="form-group">
								<input class="form-control" placeholder="Mật khẩu cũ" name="oldpassword" id="oldpassword" type="password" required="">
						</div>
						<div class="form-group">
								<input class="form-control" placeholder="Mật khẩu mới" name="newpassword" id="newpassword" type="password" required="">
						</div>
						<div class="form-group">
								<input class="form-control" placeholder="Xác nhận mật khẩu" name="confirm_password" id="confirm_password " type="password" required="">
						</div>
							<button type="submit" class="btn btn-primary" id="btnChange">Đổi mật khẩu</button>
					</form>
					</div>
					</div>
				</div>
		</div>
		</div>
		</div>
</div>
<?php
$this->load->view('templates/footer');
?>