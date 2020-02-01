<?php
$this->load->view('templates/header');
?>	
<div class="body bg-gray">
<div class="text-center">
<h3>Hỗ trợ</h3>
<p>Vui lòng điền đầy đủ mẫu đơn và gửi về cho chúng tôi nếu bạn có thắc mắc.</p>
</div>
<hr>
<div class="row no-space margin-bottom-30">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Hỗ trợ</div>
				<div class="panel-body">
				<form class="form-horizontal" method="post">
                    <fieldset>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="fname" name="name" type="text" placeholder="Tên Ingame" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="email" name="email" type="text" placeholder="Địa chỉ Email" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-8">
                                <textarea class="form-control" id="message" name="message" placeholder="Nhập nội dung cần hỗ trợ." rows="7"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Gửi</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
				</div>
			</div>
		</div>
		</div>
</div>
<?php
$this->load->view('templates/footer');
?>	