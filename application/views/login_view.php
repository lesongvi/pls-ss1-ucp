<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Đăng nhập tài khoản</title>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<link href="<?php echo base_url(); ?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
 
<link href="<?php echo base_url(); ?>css/default.css" rel="stylesheet" type="text/css"/>
 
<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css"/>

<script src="<?php echo base_url() ?>js/jquery.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.min.js"></script>

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script src="<?php echo base_url(); ?>js/custom.js"></script>

<script>
 var base_url = "<?php echo base_url(); ?>";
</script>
<!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
<style>html{background:transparent;}
.login_wrapper{
	background-image: url('<?php echo base_url(); ?>images/background.jpg');
}
</style>
</head>
<body class="login_wrapper">
<div class="form-box login_box" id="login-box">
<div class="header bg-blue" style="font-size: 1.3em;">
Chào mừng tới UCP PlaySamp <br> hãy đăng nhập để tiếp tục.
</div>
<div class="body bg-gray">
<form method="post" id="login_form">
<div id="error"></div>
<div class="form-group">
<input type="text" id="username" name="username" class="form-control" placeholder="Tài khoản">
</div>
<div class="form-group">
<input type="password" id="username" name="password" class="form-control" placeholder="Mật khẩu">
</div>
</div>
<div class="footer">
<button type="submit" class="btn bg-blue btn-block" id="btnLogin">Đăng Nhập</button>
<div>
<a data-toggle="modal" href="#forgot" style="font-weight: bold;">
Quên mật khẩu? </a>
<a href="<?php echo base_url(); ?>dashboard/register" class="pull-right" style="font-weight: bold;">
Đăng ký </a>
</div>
</div>
</form>
</div>
<!-- Modal -->
<div id="forgot" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Quên mật khẩu?</h4>
      </div>
      <div class="modal-body">
					<form method="post" id="forgot_form">
					<div id="forgot"></div>
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Tên tài khoản" name="username_lost" id="username_lost" type="text" required="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Email" name="email_lost" id="email_lost" type="text" required="">
							</div>
						</fieldset>
						<button type="submit" class="btn btn-info" id="btnLostPwd">Lấy lại mật khẩu</button>
					</form>
      </div>
    </div>

  </div>
</div>
<img class="login_animation login_animation1" src="<?php echo base_url(); ?>images/animation-1.png" alt="animation-1">
<img class="login_animation login_animation2" src="<?php echo base_url(); ?>images/animation-2.png" alt="animation-2">
<img class="login_animation login_animation3" src="<?php echo base_url(); ?>images/animation-3.png" alt="animation-3">
</body>
</html>