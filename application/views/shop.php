<?php
$conn=mysql_connect("localhost", "root", "") or die("can't connect database");
mysql_select_db("test",$conn);
<script>
$('.buy').click(function(event){
		event.preventDefault();
		idProduct = $(this).parent().find('.idProduct').val();
		var name = $(this).parent().find('.name-product').text();
		var idImg = $(this).parent().find('.idImg').val();
		idAmount = $(this).parent().find('.idAmount').val();
		$('#myModalLabel1').text(name);
		$('.buy-product-img').html('<img class="fw" src="'+base_url+'images/vehicles/'+idImg+'" width="150px" height="128px">');
		$('.buy-price').html('Giá: <strong class="p-credits">'+idAmount+'</strong>');
	});
	$('.toy').click(function(event){
		event.preventDefault();
		idProduct = $(this).parent().find('.idProduct').val();
		var name = $(this).parent().find('.name-product').text();
		var idImg = $(this).parent().find('.idImg').val();
		idAmount = $(this).parent().find('.idAmount').val();
		$('#myModalLabel1').text(name);
		$('.buy-product-img').html('<img class="fw" src="'+base_url+'images/toy/'+idImg+'" width="150px" height="128px">');
		$('.buy-price').html('Giá: <strong class="p-credits">'+idAmount+'</strong>');
	});
	$('#buyNow').click(function(){
		$('#loading-product').html('<i class="fa fa-spinner fa-pulse fa-3x fa-fw margin-bottom"></i>');
		$('#group-pay').hide();
		var nameproduct = $('#myModalLabel1').text();
		$.get(base_url+"manage/buyproduct",{ buy: idProduct, price: idAmount},function(data){
			var obj = $.parseJSON(data);
			if(obj.Code === "200"){
				$('#loading-product').html('<div class="alert alert-success">Bạn đã mua thành công vật phẩm <strong>'+nameproduct+'</strong></div>');
				$('#group-pay').show();
				var x = idAmount;
				$('#mycredit').text(x);
			}else{
				$('#loading-product').html('<div class="alert alert-danger">Số tiền của bạn không đủ để mua vật phẩm này</div>');
				$('#group-pay').show();
			}
		});
	});
</script>
		function get_vehicles_list($limit, $start)
    {
        $sql = 'select * from cuahang_vehicles order by id DESC limit ' . $start . ', ' . $limit;
        $query = $this->db->query($sql);
        return $query->result();
    }
	
	function get_plane_list()
    {
        $sql = 'select * from cuahang_plane order by id DESC ';
        $query = $this->db->query($sql);
        return $query->result();
    }
	
	function get_ship_list()
    {
        $sql = 'select * from cuahang_ship order by id DESC ';
        $query = $this->db->query($sql);
        return $query->result();
    }
	
	function get_toy_list()
	{
		$sql = 'select * from cuahang_toys order by id DESC ';
        $query = $this->db->query($sql);
        return $query->result();
	}
	
	function buy($vatpham,$creditsthat,$gia,$id)
	{
		if ($gia >= 500 && $creditsthat >=500)
		{
		$data=array(
		'sqlID'=>$id,
		'pvModelID'=>$vatpham,
		'pvFuel'=>100
		);
		$this->db->insert('vehicles',$data);
		$sql = "update accounts set Money = Money - '$gia' where id='$id' and Money > 0";
		$query = $this->db->query($sql);
		return true;
		}
	}
	
	function buytoy($vatpham,$gia,$creditsthat,$id)
	{
		if ($gia >= 500 && $creditsthat >=500)
		{
		$data=array(
		'player'=>$id,
		'modelid'=>$vatpham
		);
		$this->db->insert('toys',$data);
		$sql = "update accounts set Money = Money - '$gia' where id='$id' and Money > 0";
		$query = $this->db->query($sql);
		return true;
		}
	}
	
	function trutien($gia,$id)
	{
	}
}
		function shop(){
		$data['page_title'] = 'Cửa hàng';
		if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['email'] = $session_data['email'];
            $data['username'] = $session_data['username'];
            $data['id'] = $session_data['id'];
			$data['admin'] = $session_data['admin'];
			$data['credits'] = $session_data['money'];
			$data['model'] = $session_data['model'];
			
			$this->load->library('pagination');
			$this->load->helper('url');
			$this->load->model('shop_model');
			
			$config['base_url'] = base_url('manage/shop');
			$config['total_rows'] = 132;
			$config['per_page'] = "12";
			$config["uri_segment"] = 3;
			$choice = $config["total_rows"] / $config["per_page"];
			$config["num_links"] = floor($choice);

			//config for bootstrap pagination class integration
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = false;
			$config['last_link'] = false;
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['prev_link'] = '&laquo';
			$config['prev_tag_open'] = '<li class="prev">';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = '&raquo';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';

			$this->pagination->initialize($config);
			$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

			//call the model function to get the department data
			$data['deptlist'] = $this->shop_model->get_vehicles_list($config["per_page"], $data['page']);           

			$data['pagination'] = $this->pagination->create_links();
			
			$data['planelist'] = $this->shop_model->get_plane_list();
			
			$data['shiplist'] = $this->shop_model->get_ship_list();
			
			$data['toylist'] = $this->shop_model->get_toy_list();
			
			$this->load->view('shop_view',$data);
        }
		else
		{
			redirect('dashboard/login', 'refresh');
		}
		}
		
		function buyproduct()
		{
			if($this->session->userdata('logged_in'))
			{
				$session_data = $this->session->userdata('logged_in');
				$data['email'] = $session_data['email'];
				$data['username'] = $session_data['username'];
				$data['id'] = $session_data['id'];
				$data['admin'] = $session_data['admin'];
				$data['credits'] = $session_data['money'];
				$data['model'] = $session_data['model'];
				
				$vatpham = $_REQUEST["buy"];
				$gia = $_REQUEST["price"];
				$mycredit = $data['credits'];
				$id = $data['id'];
				
				$this->load->model('shop_model');
				if($vatpham >= 400 && $vatpham <= 609)
				{
					if($mycredit < $gia)
					{
						$json = array("Code" => "Error");
						echo json_encode($json);
					}
					else
					{
						$creditsthat = $data['credits'];
						$this->shop_model->buy($vatpham,$creditsthat,$gia,$id);
						$json = array("Code" => "200");
						echo json_encode($json);
						$this->shop_model->trutien($gia,$id);
					}
				}
				else
				{
					if($mycredit < $gia)
					{
						$json = array("Code" => "Error");
						echo json_encode($json);
					}
					else
					{
						$creditsthat = $data['credits'];
						$this->shop_model->buytoy($vatpham,$creditsthat,$gia,$id);
						$json = array("Code" => "200");
						echo json_encode($json);
						$this->shop_model->trutien($gia,$id);
					}
				}
			}
		}
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
?>