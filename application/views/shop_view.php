<?php
$this->load->view('templates/header_logged');
?>
<ul class="nav nav-tabs nav-justified">
<li><a href="<?php echo base_url(); ?>dashboard/profile"><i class="fa fa-group"></i> Thông tin cá nhân</a></li>
<li><a href="<?php echo base_url(); ?>manage"><i class="fa fa-group"></i> Bảng xếp hạng</a></li>
<li class="active"><a href="<?php echo base_url(); ?>manage/shop"><i class="fa fa-gift"></i> Cửa hàng</a></li>
<li><a href="<?php echo base_url(); ?>manage/house"><i class="fa fa-home"></i> Danh sách House</a></li>
</ul>
<div class="body bg-gray">
<hr>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body tabs">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#vehicles" data-toggle="tab">Ô tô</a></li>
							<li class=""><a href="#plane" data-toggle="tab">Máy bay</a></li>
							<li class=""><a href="#ship" data-toggle="tab">Tàu Thuyền</a></li>
							<li><a href="#toys" data-toggle="tab">Đồ chơi</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="vehicles">
							<div class="col-lg-12">
							<div class="pull-right"><?php echo $pagination; ?></div>
							</div>
							<?php for ($i = 0; $i < count($deptlist); ++$i) { ?>
							<div class="col-xs-6 col-sm-3">
							<div class="thumbnail">
							<img src="<?php echo base_url(); ?>images/vehicles/Vehicle_<?php echo $deptlist[$i]->id ?>.jpg" class="fw">
							<div class="text-center">
							<h3 class="name-product"><?php echo $deptlist[$i]->product ?></h3>
							<span class="label label-warning"><i class="fa fa-dollar"></i> <?php echo $deptlist[$i]->price ?></span>
							</br></br>
							<input type="hidden" class="idProduct" value="<?php echo $deptlist[$i]->id; ?>">
							<input type="hidden" class="idImg" value="Vehicle_<?php echo $deptlist[$i]->id; ?>.jpg">
							<input type="hidden" class="idAmount" value="<?php echo $deptlist[$i]->price; ?>">
							<a href="" data-toggle="modal" data-target="#buynow" class="buy btn btn-info btn-sm">Mua Ngay</a>
											</div>
										</div>
									</div>
							<?php } ?>
							</div>
							<div class="tab-pane fade" id="plane">
							<?php foreach($planelist as $plane) { ?>
							<div class="col-xs-6 col-sm-3">
							<div class="thumbnail">
							<img src="<?php echo base_url(); ?>images/vehicles/Vehicle_<?php echo $plane->id ?>.jpg" class="fw">
							<div class="text-center">
							<h3 class="name-product"><?php echo $plane->product ?></h3>
							<span class="label label-warning"><i class="fa fa-dollar"></i> <?php echo $plane->price ?></span>
							</br></br>
							<input type="hidden" class="idProduct" value="<?php echo $plane->id; ?>">
							<input type="hidden" class="idImg" value="Vehicle_<?php echo $plane->id; ?>.jpg">
							<input type="hidden" class="idAmount" value="<?php echo $plane->price; ?>">
							<a href="" data-toggle="modal" data-target="#buynow" class="buy btn btn-info btn-sm">Mua Ngay</a>
											</div>
										</div>
									</div>
							<?php } ?>
							</div>
							<div class="tab-pane fade" id="ship">
							<?php foreach($shiplist as $ship) { ?>
							<div class="col-xs-6 col-sm-3">
							<div class="thumbnail">
							<img src="<?php echo base_url(); ?>images/vehicles/Vehicle_<?php echo $ship->id ?>.jpg" class="fw">
							<div class="text-center">
							<h3 class="name-product"><?php echo $ship->product ?></h3>
							<span class="label label-warning"><i class="fa fa-dollar"></i> <?php echo $ship->price ?></span>
							</br></br>
							<input type="hidden" class="idProduct" value="<?php echo $ship->id; ?>">
							<input type="hidden" class="idImg" value="Vehicle_<?php echo $ship->id; ?>.jpg">
							<input type="hidden" class="idAmount" value="<?php echo $ship->price; ?>">
							<a href="" data-toggle="modal" data-target="#buynow" class="buy btn btn-info btn-sm">Mua Ngay</a>
											</div>
										</div>
									</div>
							<?php } ?>
							</div>
							<div class="tab-pane fade" id="toys">
							<?php foreach($toylist as $toy) { ?>
							<div class="col-xs-6 col-sm-3">
							<div class="thumbnail">
							<img src="<?php echo base_url(); ?>images/toy/<?php echo $toy->id ?>.jpg" class="fw">
							<div class="text-center">
							<h3 class="name-product"><?php echo $toy->product ?></h3>
							<span class="label label-warning"><i class="fa fa-dollar"></i> <?php echo $toy->price ?></span>
							</br></br>
							<input type="hidden" class="idProduct" value="<?php echo $toy->id; ?>">
							<input type="hidden" class="idImg" value="<?php echo $toy->id; ?>.jpg">
							<input type="hidden" class="idAmount" value="<?php echo $toy->price; ?>">
							<a href="" data-toggle="modal" data-target="#buynow" class="toy btn btn-info btn-sm">Mua Ngay</a>
											</div>
										</div>
									</div>
							<?php } ?>
							</div>
						</div>
					</div>
				</div><!--/.panel-->
			</div><!--/.col-->
		</div><!--/.row-->	
</div>
<?php
$this->load->view('templates/footer');
?>