<!doctype html>
<title>Trang Web đang được bảo trì</title>
<style>
  body { text-align: center; padding: 150px; }
  h1 { font-size: 50px; }
  body { font: 20px Helvetica, sans-serif; color: #333; }
  article { display: block; text-align: left; width: 650px; margin: 0 auto; }
  a { color: #dc8100; text-decoration: none; }
  a:hover { color: #333; text-decoration: none; }
</style>

<article>
    <h1>Bảo Trì</h1>
    <div>
        <p>Xin lỗi hiện tại bạn không thể truy cập trang web do đang bảo trì, vui lòng quay lại sau. Cảm ơn!</p>
        <p><?php echo $this->config->item('ucp_name'); ?> Team</p>
    </div>
	<div>
	<p>Nếu bạn là Admin hãy <a href="<?php echo base_url(); ?>dashboard/login">Đăng nhập</a></p>
	</div>
</article>