<?php
$this->load->view('admin/templates/header');
?>
<div class="body bg-gray">
<div class="text-center">
<h3>Cài đặt</h3>
<p>Bạn có thể cấu hình trang web của bạn</p>
</div>
<hr>
<div class="row">
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading text-center"><i class="fa fa-gears"></i> Cài đặt</div>
					<div class="panel-body">
						<?php echo form_open('admin/updateconfig'); ?>
						<?php echo $this->session->flashdata('thongbao'); ?>
						<div class="form-group">
									<label>Tên Website</label>
									<input type="text" class="form-control" value="<?php echo $ucp_name; ?>" name="ucpname">
								</div>
						<div class="form-group">
									<label>Admin có thể truy cập cài đặt:</label>
									<input type="text" class="form-control" value="<?php echo $allow_admin; ?>" name="config">
								</div>
						<div class="form-group">
									<label>Admin có thể đăng tin tức:</label>
									<input type="text" class="form-control" value="<?php echo $news_allow; ?>" name="news">
								</div>
						<div class="form-group">
									<label>Facebook:</label>
									<input type="text" class="form-control" value="<?php echo $facebook; ?>" name="facebook">
								</div>
						<div class="form-group">
									<label>Favicon: <img src="<?php echo $this->config->item('favicon'); ?>" width="32px" height="32px"/></label>
									<input type="text" class="form-control" value="<?php echo $favicon; ?>" name="favicon">
								</div>
								<div class="form-group">
									<label>Ảnh giữa trang 1:  <img src="<?php echo $this->config->item('slider'); ?>" width="32px" height="32px"/></label>
									<input type="text" class="form-control" value="<?php echo $slider; ?>" name="slider">
								</div>
								<div class="form-group">
									<label>Ảnh giữa trang 2: <img src="<?php echo $this->config->item('slider2'); ?>" width="32px" height="32px"/></label>
									<input type="text" class="form-control" value="<?php echo $slider2; ?>" name="slider2">
								</div>
								<div class="form-group">
									<label>Ảnh giữa trang 3: <img src="<?php echo $this->config->item('slider3'); ?>" width="32px" height="32px"/></label>
									<input type="text" class="form-control" value="<?php echo $slider3; ?>" name="slider3">
								</div>
								<div class="form-group">
									<label>Ảnh nền: <img src="<?php echo $this->config->item('background'); ?>" width="32px" height="32px"/></label>
									<input type="text" class="form-control" value="<?php echo $background; ?>" name="background">
								</div>
						<div class="form-group">
									<label>Bật tính năng đăng ký:</label>
									<?php if($allow_reg == 1){ ?>
									<select name="reg">
									<option value="1">Bật</option>
									<option value="0">Tắt</option>
									</select>
									<?php }else{?>
									<select name="reg">
									<option value="0">Tắt</option>
									<option value="1">Bật</option>
									</select>
									<?php } ?>
								</div>
							<div class="form-group">
									<label>Bật tính năng bảo trì:</label>
									<?php if($baotri == 1){ ?>
									<select name="baotri">
									<option value="1">Bật</option>
									<option value="0">Tắt</option>
									</select>
									<?php }else{ ?>
									<select name="baotri">
									<option value="0">Tắt</option>
									<option value="1">Bật</option>
									</select>
									<?php } ?>
								</div>
						<div class="form-group">
									<input type="submit" class="btn btn-primary" value="Lưu cài đặt">
								</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading text-center">Trợ giúp</div>
					<div class="panel-body">
					<div class="alert alert-info">
					<ul>
					<li>Tên Website bạn có thể nhập bất kì tùy thích ví dụ: abcxyz</li>
					<li>Admin có thể truy cập cài đặt mặc định là 99999.</li>
					<li>Admin có thể đăng tin tức mặc định là 99999.</li>
					<li>Tính năng đăng ký và bảo trì bạn có thể tủy chỉnh bật tắt.</li>
					</ul>
					</div>
					</div>
				</div>
			</div><!-- /.col-->
		</div>
</div>
<?php
$this->load->view('admin/templates/footer');
?>