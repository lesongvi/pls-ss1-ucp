<?php
$this->load->view('templates/header_logged');
?>	
<div class="body bg-gray">
<hr>
		<div class="row">
			<div class="col-lg-8">
	        <div class="panel panel-default">
			<div class="panel-heading" id="accordion"><i class="fa fa-dollar"></i> Nạp thẻ cào</div>
            <div class="panel-body">
			<?php include('include/card.php'); ?>
			<div class="card-760 pull-left">
					<div class="card pull-left">
						<a href="#" id="VINA">
							<div class="card-list">
								<span class="card-active"></span>
								<div>
									<img src="<?php echo base_url(); ?>images/vina.png" class="logo-card" alt="">
								</div>

								<div>Thẻ Vinaphone</div>
							</div>
						</a>
					</div>
					<div class="card pull-left">
						<a href="#" id="MOBI">
							<div class="card-list">
								<span class="card-active"></span>
								<div>
									<img src="<?php echo base_url(); ?>images/mobi.png" class="logo-card" alt="">
								</div>

								<div>Thẻ Mobiphone</div>
							</div>
						</a>
					</div>
					<div class="card pull-left">
						<a href="#" id="VIETEL">
							<div class="card-list ">
								<span class="card-active"></span>
								<div>
									<img src="<?php echo base_url(); ?>images/vittel.png" class="logo-card" alt="">
								</div>
								<div>Thẻ Viettel</div>
							</div>
						</a>
					</div>
				</div>
				<div>
					<form method="POST" action="" accept-charset="UTF-8" class="fr-card pull-left">
						<input type="hidden" name="chonmang" id="chonmang" value="">
						<fieldset disabled="">
							<div class="form-group ">
								<input type="text" class="form-control" placeholder="Tài Khoản: <?php echo $username; ?>" name="txtuser">
							</div>
						</fieldset>
						<div class="form-group ">
							<input type="text" class="form-control" placeholder="Nhập mã thẻ" name="txtpin">
						</div>
						<div class="form-group ">
							<input type="text" class="form-control" placeholder="Số seri" name="txtseri">
						</div>

						<div class="form-group ">
							<input class="btn btn-primary" type="submit" name="btnCard" value="Đồng Ý">
						</div>
					</form>
				</div>
			</div>
            </div>
          </div>
		  <div class="col-lg-4">
		   <div class="panel panel-default">
			<div class="panel-heading" id="accordion"><i class="fa fa-dollar"></i> Mệnh giá quy đổi</div>
            <div class="panel-body">
			Đang có sự kiện x2
			<table class="table table-striped">
			<thead>
			<tr>
			<th>Mệnh giá</th>
			<th>Quy đổi</th>
			</tr>
			</thead>
			<tbody>
			<tr>
			<td>10.0000đ</td>
			<td>200 Coin</td>
			</tr>
			<tr>
			<td>20.0000đ</td>
			<td>400 Coin</td>
			</tr>
			<tr>
			<td>50.0000đ</td>
			<td>1000 Coin</td>
			</tr>
			<tr>
			<td>100.0000đ</td>
			<td>2000 Coin</td>
			</tr>
			<tr>
			<td>200.0000đ</td>
			<td>4000 Coin</td>
			</tr>
			<tr>
			<td>500.0000đ</td>
			<td>10000 Coin</td>
			</tr>
			</tbody>
			</table>
			</div>
			</div>
		  </div>
        </div>
</div>
<?php
$this->load->view('templates/footer');
?>	