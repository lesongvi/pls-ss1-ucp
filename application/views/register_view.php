<?php
$this->load->view('templates/header');
?>
<div class="body bg-gray">
<div class="text-center">
<h3>Đăng ký tài khoản</h3>
<p>Hãy đăng ký tài khoản và tham gia máy chủ nhé!</p>
</div>
<hr>
		<div class="row"></br>
			<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">Đăng ký tài khoản</div>
				<div class="panel-body">
					<form method="post" id="register_form">
					<div id="reg_error"></div>
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Tên tài khoản" name="username" id="username" type="text" required="">
								</div>
								<div class="form-group">
								<select class="form-control" name="sex" id="sex">
								<option value="1">Nam</option>
								<option value="2">Nữ</option>
								</select>
							</div>
							<div class="form-group">
							<input class="form-control" name="date" id="date" type="date" value="2000-01-01"/>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Địa chỉ Email" name="email" id="email" type="text" required="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Mật khẩu" name="password" id="password " type="password" required="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Xác nhận mật khẩu" name="password2" id="password2" type="password" required="">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Đồng ý quy định">Đồng ý quy định máy chủ
								</label>
							</div>
							<button type="submit" class="btn btn-primary" id="btnRegister">Đăng Ký</button>
						</fieldset>
					</form></div>
		</div>
		</div>
		</div>
</div>
<?php
$this->load->view('templates/footer');
?>