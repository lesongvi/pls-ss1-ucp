<div class="footer bg-blue">
<font color="white">Copyright © 2016 PlaySamp</font>
<div class="pull-right">
<a href="<?php echo $this->config->item('facebook'); ?>" class="footer-social"><i class="fa fa-facebook"></i></a>
</div>
</div>
<?php 
	if($this->session->userdata('logged_in'))
	{
	?>
	<script>
	var base_url = "<?php echo base_url(); ?>";
	var id = "<?php echo $id; ?>";
	</script>
	<?php } else { ?>
	<script>
	var base_url = "<?php echo base_url(); ?>";
	</script>
	<?php } ?>
</body>
</html>