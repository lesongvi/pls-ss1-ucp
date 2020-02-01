<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $page_title; ?> - <?php echo $this->config->item('ucp_name'); ?></title>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<link href="<?php echo base_url(); ?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
 
<link href="<?php echo base_url(); ?>css/default.css" rel="stylesheet" type="text/css"/>
<link rel="icon" type="image/png" href="<?php echo $this->config->item('favicon'); ?>" />
<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>js/custom.js"></script>
<style>html{background:transparent;}
.login_wrapper{
background: url('<?php echo $this->config->item('background'); ?>') no-repeat center center fixed;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
}
.alex {
	color: black;
    width: auto;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('http://www.w3schools.com/howto/searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}
</style>
</head>
<body class="login_wrapper">
	<div class="modal fade" id="buynow" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<div class="col-md-4">
					<div class="buy-product-img"></div>
				</div>
				<div class="col-md-8">
					<h4 class="product-name" id="myModalLabel">
						Tên vật phẩm: <strong id="myModalLabel1" class="p-credits"></strong>
					</h4>
					<p class="buy-price"></p>
					<div id="loading-product"></div>
					<div id="group-pay">
						<div class="line"></div>
						<button type="button" class="btn btn-default" data-dismiss="modal">Hủy bỏ</button>
						<button type="button" id="buyNow" class="btn btn-primary">Mua</button>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
<div class="header-box home_box" id="login-box">
<div class="bg-blue" style="font-size: 1.3em;">
<div class="navbar navbar-default myhead bold" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header"><a class="navbar-brand" href="<?php echo base_url(); ?>"><?php echo $this->config->item('ucp_name'); ?></a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>	
        </div>
        <div class="collapse navbar-collapse navbar-menubuilder">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo base_url(); ?>dashboard">Trang Chủ</a>
                </li>
                <li><a href="#">Diễn Đàn</a>
                </li>
                <li><a href="<?php echo base_url(); ?>dashboard/download">Tải Về</a>
                </li>
                <li><a href="<?php echo base_url(); ?>dashboard/support">Hỗ Trợ</a>
                </li>
				<li class="dropdown">
				<?php if(!$this->session->userdata('logged_in')){ ?>
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tài Khoản <b class="caret"></b></a>
				  <ul class="dropdown-menu">
					<li><a href="<?php echo base_url(); ?>dashboard/login">Đăng Nhập</a></li>
					<li><a href="<?php echo base_url(); ?>dashboard/register">Đăng Ký</a></li>
					<li><a href="<?php echo base_url(); ?>dashboard/forgot">Quên Mật Khẩu?</a></li>
				  </ul>
				<?php } else { ?>
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $username;?> <b class="caret"></b></a>
				  <ul class="dropdown-menu">
				  <?php if($admin >= 99999) { ?>
					<li><a href="<?php echo base_url(); ?>admin">Trang Quản Lý</a></li>
					<li class="divider"></li>
					<?php } ?>
					<li><a href="<?php echo base_url(); ?>dashboard/profile">Thông tin cá nhân</a></li>
					<li><a href="<?php echo base_url(); ?>dashboard/password">Đổi mật khẩu</a></li>
					<li><a href="<?php echo base_url(); ?>dashboard/history">Lịch sử</a></li>
					<li><a href="<?php echo base_url(); ?>dashboard/credit">Nạp thẻ</a></li>
					<li class="divider"></li>
					<li><a href="<?php echo base_url(); ?>dashboard/logout">Thoát</a></li>
				  </ul>
				<?php } ?>
				</li>
		</ul>
        </div>
    </div>
</div>
</div>
    <div class="fb-profile">
        <img align="left" class="fb-image-lg" src="<?php echo base_url(); ?>images/vinewood.jpg" alt="Profile image example"/>
        <img align="left" class="fb-image-profile thumbnail" src="<?php echo base_url(); ?>images/avatar/<?php echo $model; ?>.png" alt="Profile image example"/>
        <div class="fb-profile-text">
            <h1><?php echo $username;?></h1>
            <p>Email: <?php echo $email;?></p>
        </div>