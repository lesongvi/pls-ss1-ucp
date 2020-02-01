<?php
$this->load->view('templates/header');
?>
<div class="body bg-gray">
<div class="text-center">
<h3>Quên mật khẩu</h3>
<p>Bạn có thể lấy lại mật khẩu tại đây!</p>
</div>
<hr>
		<div class="row"></br>
			<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">Quên mật khẩu</div>
				<div class="panel-body">
					<form method="post" id="forgot_form">
					<div id="forgot"></div>
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Tên tài khoản" name="username_lost" id="username_lost" type="text" required="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Email" name="email_lost" id="email_lost" type="text" required="">
							</div>
							<button type="submit" class="btn btn-primary" id="btnLostPwd">Lấy lại mật khẩu</button>
						</fieldset>
					</form></div>
		</div>
		</div>
		</div>
</div>
<?php
$this->load->view('templates/footer');
?>