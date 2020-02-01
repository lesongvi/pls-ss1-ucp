jQuery(function($) {
	//Login Form
  $("#login_form").validate({
    submitHandler: loginform 
       });  
    /* validation */
    
    /* login submit */
    function loginform()
    {  
   var data = $("#login_form").serialize();
    
   $.ajax({
    
   type : 'POST',
   url  : base_url + 'login',
   data : data,
   beforeSend: function()
   { 
    $("#error").fadeOut();
    $("#btnLogin").html('<i class="fa fa-refresh fa-spin"></i> &nbsp; Đang thực hiện');
   },
   success :  function(response)
      {
			if(response=="ok")
			{
				setTimeout(function(){ window.location = "dashboard"; },1500);
			}
			else
			{
			$("#error").fadeIn();
			$("#error").html('<div class="alert alert-danger">Tên tài khoản hoặc mật khẩu không đúng</div>');
			$("#btnLogin").html('Đăng Nhập');
			}
	 }
   });
    return false;
  }
//Register Form
  $("#register_form").validate({
    submitHandler: registerform 
       });  
    /* validation */
    
    /* login submit */
    function registerform()
    {  
   var data = $("#register_form").serialize();
    
   $.ajax({
    
   type : 'POST',
   url  : base_url + 'register',
   data : data,
   beforeSend: function()
   { 
    $("#reg_error").fadeOut();
    $("#btnRegister").html('<i class="fa fa-refresh fa-spin"></i> &nbsp; Đang thực hiện');
   },
   success :  function(response)
      {
			if(response =="usererror")
			{
			$("#reg_error").fadeIn();
			$("#reg_error").html('<div class="alert alert-danger">Tên tài khoản đã tồn tại</div>');
			$("#btnRegister").html('Đăng Ký');
			}
			else if(response =="checkname")
			{
			$("#reg_error").fadeIn();
			$("#reg_error").html('<div class="alert alert-danger">Tên không hợp lệ(Tên đúng: Họ_Tên)</div>');
			$("#btnRegister").html('Đăng Ký');
			}
			else if(response =="emailerror")
			{
			$("#reg_error").fadeIn();
			$("#reg_error").html('<div class="alert alert-danger">Địa chỉ Email đã tồn tại</div>');
			$("#btnRegister").html('Đăng Ký');
			}
			else if(response =="passerror")
			{
			$("#reg_error").fadeIn();
			$("#reg_error").html('<div class="alert alert-danger">Mật khẩu không trùng khớp</div>');
			$("#btnRegister").html('Đăng Ký');
			}			
			else
			{
				$("#btnRegister").html('<i class="fa fa-refresh fa-spin"></i> Đăng ký thành công...');
				setTimeout(function(){ window.location = base_url + 'dashboard/login'; },1500);
			}
	 }
   });
    return false;
  }
  //Change Password Form
  $("#password_form").validate({
    submitHandler: changepassform 
       });  
    /* validation */
    
    /* login submit */
    function changepassform()
    {  
   var data = $("#password_form").serialize();
    
   $.ajax({
    
   type : 'POST',
   url  : base_url + 'changepw',
   data : data,
   beforeSend: function()
   { 
    $("#change").fadeOut();
    $("#btnChange").html('<i class="fa fa-refresh fa-spin"></i> &nbsp; Đang thực hiện');
   },
   success :  function(response)
      {
			if(response =="wrongold")
			{
			$("#change").fadeIn();
			$("#change").html('<div class="alert alert-danger">Mật khẩu cũ không đúng</div>');
			$("#btnChange").html('Đổi mật khẩu');
			}
			else if(response =="wrongnew")
			{
			$("#change").fadeIn();
			$("#change").html('<div class="alert alert-danger">Xác nhận mật khẩu không đúng</div>');
			$("#btnChange").html('Đổi mật khẩu');
			}			
			else
			{
				$("#btnChange").html('<i class="fa fa-check-square-o"></i> Đổi mật khẩu thành công...');
			}
	 }
   });
    return false;
  }
    //Forgot Password Form
  $("#forgot_form").validate({
    submitHandler: forgotform 
       });  
    /* validation */
    
    /* login submit */
    function forgotform()
    {  
   var data = $("#forgot_form").serialize();
    
   $.ajax({
    
   type : 'POST',
   url  : base_url + 'recovery',
   data : data,
   beforeSend: function()
   { 
    $("#forgot").fadeOut();
    $("#btnLostPwd").html('<i class="fa fa-refresh fa-spin"></i> &nbsp; Đang thực hiện');
   },
   success :  function(response)
      {
			if(response =="error")
			{
			$("#forgot").fadeIn();
			$("#forgot").html('<div class="alert alert-danger">Thông tin bạn nhập không chính xác!</div>');
			$("#btnLostPwd").html('Lấy lại mật khẩu');
			}			
			else
			{
				$("#forgot").html('<div class="alert alert-success">Một mật khẩu mới đã được gửi về email của bạn! hãy kiểm tra...</div>');
				$("#btnLostPwd").html('<i class="fa fa-check-square-o"></i> Thành công');
			}
	 }
   });
    return false;
  }
  $(".card a").click(function(event){
		event.preventDefault();
		var id = $(this).attr('id');
		$('a').removeClass('active');
		$(this).addClass("active");
		$('#chonmang').val(id);
	});
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
			if(obj.Code == 200){
				$('#loading-product').html('<meta http-equiv="Refresh" content="0; url=http://'+baseurl+'/manage/success">');
				$('#group-pay').show();
			}else{
				$('#loading-product').html('<meta http-equiv="Refresh" content="0; url=http://'+baseurl+'/ucp5/manage/failed">');
				$('#group-pay').show();
			}
		});
	});
	$('#buynow').on('hidden.bs.modal', function () {
	$('#loading-product').html('');
	})
	$('ul.nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});
	$("#btnRcon").click(function(event){	
		var clientmsg = $("#comannd").val();
		var cmd = clientmsg.replace("/", "");
		var cmd2 = clientmsg.replace(/[0-9]/g, '');
		var numb = clientmsg.match(/\d/g);
		if(numb == null)
		{
			numb = 0;
		}
		$("#rcon-user").fadeOut();
		$("#rcon-user").append('<li class="left clearfix"><div class="chat-body clearfix"> <div><strong>Admin</strong></div><p>'+clientmsg+'</p></div></li>').fadeIn();
		if(cmd2 == "trogiup"){
			$("#rcon-res").fadeOut();
			$("#rcon-res").append('<li class="right clearfix"><div class="chat-body clearfix"> <div><strong>Server</strong></div><p>Danh sách lệnh: /cmdlist,/varlist,/weather,/gravity</br>/ban,/kick,/banip,/unbanip,/hostname,/mapname,/worldtime,/weburl.</p></div></li>').fadeIn();
		}
		else
		{
		$("#btnRcon").html('<i class="fa fa-refresh fa-spin"></i>');
		$.get(base_url+'include/callRcon.php?lenh='+cmd2+'&value='+numb+'',function(data){
		$("#btnRcon").html('Gửi');
		$("#comannd").attr("value", "");
		$("#rcon-res").fadeOut();
		$("#rcon-res").append('<li class="right clearfix"><div class="chat-body clearfix"> <div><strong>Server</strong></div><p>Thông báo: '+data+'</p></div></li>').fadeIn();
		});
		}
		return false;
	});
	$(window).load(function() {
   $("#loading-product").fadeOut(500);
})
});