<?php
$this->load->view('templates/header');
?>

<div class="body bg-gray">
<div class="text-center">
<h3>Tin tức</h3>
<p>Hãy đọc cho thật kỹ để tránh trường hợp nhầm lẫn:</p>
</div>
<hr>
	<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading" id="accordion"><?php echo $news_item['title']; ?></div>
					<div class="panel-body">
					<div class="text-center">
					<img class="img-rounded" src="<?php echo $news_item['image']; ?>" width="200px" height="100px"/>
					</div>
					</br>
					<?php echo $news_item['post']; ?>
					</div>
				</div>
				
			</div><!--/.col-->
		</div>
</div>
<?php
$this->load->view('templates/footer');
?>	