<?php
$this->load->view('templates/header_logged');
?>
<ul class="nav nav-tabs nav-justified">
<li class="active"><a href="<?php echo base_url(); ?>dashboard/profile"><i class="fa fa-group"></i> Thông tin cá nhân</a></li>
<li class="inactive"><a href="<?php echo base_url(); ?>manage"><i class="fa fa-group"></i> Bảng xếp hạng</a></li>
<li><a href="<?php echo base_url(); ?>manage/shop"><i class="fa fa-gift"></i> Cửa hàng</a></li>
<li><a href="<?php echo base_url(); ?>manage/house"><i class="fa fa-home"></i> Danh sách House</a></li>
</ul>
<div class="body bg-gray">
<hr>
		<div class="row">
			<div class="col-lg-8">
	        <div class="panel panel-default">
			<div class="panel-heading" id="accordion"><i class="fa fa-user"></i> Sơ yếu lý lịch
			<div class="pull-right">IP: <?php echo $ip; ?></div></div>
            <div class="panel-body">
              <div class="row">        
                <div class=" col-md-12 col-lg-12"> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Tên tài khoản:</td>
                        <td><?php echo $username; ?></td>
                      </tr>
                      <tr>
                        <td>Ngày đăng ký:</td>
                        <td><?php echo $regidate; ?></td>
                      </tr>
                      <tr>
                        <td>Lần Online cuối:</td>
                        <td><?php echo $lastlogin; ?></td>
                      </tr>
                   
                         <tr>
                             <tr>
                        <td>Giới tính</td>
                        <td><?php if($gioitinh == 1) echo 'Nam'; else echo 'Nữ'; ?></td>
                      </tr>
                        <tr>
                        <td>Email:</td>
                        <td><?php echo $email; ?></td>
                      </tr>
                      <tr>
                        <td>Tiền trong người:</td>
                        <td><?php echo $money; ?></td>
                      </tr>
					  <tr>
                        <td>Tiền ngân hàng:</td>
                        <td><?php echo $bank; ?></td>
                      </tr>
                    </tbody>
                  </table>
                  <hr>
                </div>
              </div>
            </div>
            
          </div>
        </div>
		<div class="col-lg-4">
				<div class="panel panel-default">
					<div class="panel-heading" id="accordion"><i class="fa fa-user"></i> Thành viên mới</div>
					<div class="panel-body">
					<table class="table table-striped">
					<thead>
					<tr>
					<th>Tên tài khoản</th>
					<th>Ngày đăng ký</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach($member as $getmem){?>
					 <tr>
						 <td><?php echo $getmem->Username;?></td>
						 <td><?php echo $getmem->newdate;?></td>
					  </tr>    
					 <?php }?>  
					</tbody>
					</table>
					</div>
				</div>
				
		</div>
		</div>
				<div class="row">
		<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading" id="accordion"><i class="fa fa-car"></i> Phương tiện đang sở hữu</div>
					<div class="panel-body">
					<?php foreach($vehicles as $getvehicles){?>
					<div class="col-md-2">
				<div class="panel panel-primary">
					<div class="panel-body text-center">
						<img src="<?php echo base_url(); ?>images/vehicles/Vehicle_<?php echo $getvehicles->pvModelID;?>.jpg" width="100px" height="100px">
						<span>ID Phương tiện: <?php echo $getvehicles->pvModelID;?></span>
					</div>
				</div>
			</div>
					<?php }?>
					</div>
				</div>
			</div>
		</div>
				<div class="row">
		<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading" id="accordion"><i class="fa fa-gamepad"></i> Toys đang sở hữu</div>
					<div class="panel-body">
					<?php foreach($toys as $usertoy){?>
					<div class="col-md-2">
				<div class="panel panel-primary">
					<div class="panel-body">
						<img src="<?php echo base_url(); ?>images/toy/<?php echo $usertoy->modelid;?>.jpg" width="100px" height="100px">
						<span>ID Toy: <?php echo $usertoy->modelid;?></span>
					</div>
				</div>
			</div>
					<?php }?>
					</div>
				</div>
			</div>
		</div>
<hr>
</div>
<?php
$this->load->view('templates/footer');
?>	