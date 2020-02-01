<?php
$this->load->view('admin/templates/header');
?>
<div class="body bg-gray">
<div class="text-center">
<h3>Lệnh Rcon</h3>
<p>Bạn có thể sử dụng lệnh Rcon ở đây. Cẩn thận trước khi sử dụng!</p>
</div>
<hr>
<div class="row">
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading text-center">Cấu hình</div>
					<div class="panel-body">
						<?php echo form_open('admin/update'); ?>
						<?php echo $this->session->flashdata('thongbao'); ?>
						<div class="form-group">
									<label>Địa chỉ IP Server</label>
									<input type="text" class="form-control" value="<?php echo $server; ?>" name="server">
								</div>
						<div class="form-group">
									<label>Port</label>
									<input type="text" class="form-control" value="<?php echo $port; ?>" name="port">
								</div>
						<div class="form-group">
									<label>RCON Password</label>
									<input type="text" class="form-control" value="<?php echo $rcon; ?>" name="rcon">
								</div>
						<div class="form-group">
									<input type="submit" class="btn btn-primary" value="Lưu cấu hình">
								</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading text-center">Thông tin</div>
					<div class="panel-body">
					<?php
					require("include/SampQuery.php");
					
					$query = new SampQuery($server, $port); // Create the SampQuery object
					
					if ($query->connect()) { // Attempt to the SA-MP server and if the connection was successful run the code below
					$info = $query->getInfo();
					$ping = $query->getPing();
					?>
					<table class="table table-striped">
					<tbody>
					 <tr>
					  <th scope="row">Tên máy chủ</th>
					  <td><?php echo $info['hostname']; ?></td>
					</tr>
					<tr>
						<th scope="row">Gamemode</th>
						<td><?php echo $info['gamemode']; ?></td>
					</tr>
					<tr>
						<th scope="row">Map</th>
						<td><?php echo $info['map']; ?></td>
					</tr>
					</tbody>
					<tr>
						<th scope="row">Người chơi</th>
						<td><?php echo $info['players']; ?> / <?php echo $info['maxplayers']; ?></td>
					</tr>
					<tr>
						<th scope="row">Mật khẩu</th>
						<td><?php echo $info['password']; ?></td>
					</tr>
					</table>
					<?php
					} else {
						echo '<div class="alert alert-info">Bạn phải bật chức năng Query trong Gamemode bằng cách mở file server.cfg và chỉnh dòng query 0 thành 1</div>';
					}
					$query->close(); // Close the connection
					?>
					</div>
				</div>
			</div><!-- /.col-->
		</div>
<div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-comment"></span> RCON COMMAND (Sử dụng lệnh /trogiup nhé)
					<div id="rcon-load"></div>
                </div>
				<div class="panel-body">
				<div class="col-md-6">
                    <ul class="chat">
					<div id="rcon-user">
					</div>
                    </ul>
				</div>
				<div class="col-md-6">
				  <ul class="chat">
					<div id="rcon-res">
					</div>
                    </ul>
				</div>
				</div>
				<div class="panel-footer">
                    <div class="input-group">
                        <input id="comannd" type="text" class="form-control input-sm" placeholder="Nhập lệnh của bạn tại đây" />
                        <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm" id="btnRcon">
                                Gửi</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$this->load->view('admin/templates/footer');
?>