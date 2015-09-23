<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!-- saved from url=(0064)http://www.17sucai.com/preview/137615/2015-01-15/demo/index.html -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><HTML 
xmlns="http://www.w3.org/1999/xhtml"><HEAD><META content="IE=11.0000" 
http-equiv="X-UA-Compatible">
 
<META http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<TITLE>登录页面</TITLE> 
<SCRIPT src="../../assets/js/jquery.js" type="text/javascript"></SCRIPT>
 
<STYLE>
body{
	background-image:url('../images/login/bg.jpg');
}

.lg-container{
	width:275px;
	margin:100px auto;
	padding:20px 40px;
	border:1px solid #f4f4f4;
	background:url('../images/login/bg_x.jpg');
	-webkit-border-radius:10px;
	-moz-border-radius:10px;
	border-radius:10px;
	
	-webkit-box-shadow: 0 0 2px #aaa;
	-moz-box-shadow: 0 0 2px #aaa;
	box-shadow: 0 0 2px #aaa;
}
.lg-container h1{
	font-size:40px;
	text-align:center;
}
#lg-form > div {
	margin:10px 5px;
	padding:0px 0;
}
#lg-form label{
	display: none;
	font-size: 20px;
	line-height: 25px;
}
#lg-form input[type="text"],
#lg-form input[type="password"]{
	border:1px solid rgba(51,51,51,.5);
	-webkit-border-radius:10px;
	-moz-border-radius:10px;
	border-radius:10px;
	padding: 5px;
	font-size: 16px;
	line-height: 20px;
	width: 100%;
	text-align:center;
}
#lg-form div:nth-child(3) {
	text-align:center;
}
#lg-form button{
	font-size: 18px;
	border:1px solid #000;
	padding:5px 10px;
	border:1px solid rgba(51,51,51,.5);
	-webkit-border-radius:10px;
	-moz-border-radius:10px;
	border-radius:10px;
	width:200px;
	-webkit-box-shadow: 2px 1px 1px #aaa;
	-moz-box-shadow: 2px 1px 1px #aaa;
	box-shadow: 2px 1px 1px #aaa;
	cursor:pointer;
	color:white;
	background:darkseagreen;
}
#lg-form button:active{
	-webkit-box-shadow: 0px 0px 1px #aaa;
	-moz-box-shadow: 0px 0px 1px #aaa;
	box-shadow: 0px 0px 1px #aaa;
}
#lg-form button:hover{
//	background:#f4f4f4;
}
#message{width:100%;text-align:center}
.success {
	color: green;
}
.error {
	color: red;
}
.u_logo{
        background: url("../images/username.png") no-repeat;
        padding: 10px 10px;
        position: absolute;
        top: 43px;
        left: 20px;

}
.p_logo{
        background: url("../images/password.png") no-repeat;
        padding: 10px 10px;
        position: absolute;
        top: 12px;
        left: 20px;
}
</STYLE>
     
<SCRIPT type="text/javascript">
$(function(){
	//得到焦点
	$("#password").focus(function(){
		$("#left_hand").animate({
			left: "150",
			top: " -38"
		},{step: function(){
			if(parseInt($("#left_hand").css("left"))>140){
				$("#left_hand").attr("class","left_hand");
			}
		}}, 2000);
		$("#right_hand").animate({
			right: "-64",
			top: "-38px"
		},{step: function(){
			if(parseInt($("#right_hand").css("right"))> -70){
				$("#right_hand").attr("class","right_hand");
			}
		}}, 2000);
	});
	//失去焦点
	$("#password").blur(function(){
		$("#left_hand").attr("class","initial_left_hand");
		$("#left_hand").attr("style","left:100px;top:-12px;");
		$("#right_hand").attr("class","initial_right_hand");
		$("#right_hand").attr("style","right:-112px;top:-12px");
	});
});
$(document).ready(function(){
		$("#login").click(function(){
			
			var action = $("#lg-form").attr('action');
			var form_data = {
				username: $("#username").val(),
				password: $("#password").val(),
				is_ajax: 1
			};
			
			$.ajax({
				type: "POST",
				url: action,
				data: form_data,
				success: function(response)
				{
					if(response == "success")
						$("#lg-form").slideUp('slow', function(){
							$("#message").html('<p class="success">You have logged in successfully!</p><p>Redirecting....</p>');
						});
					else
						$("#message").html('<p class="error">ERROR: Invalid username and/or password.</p>');
				}	
			});
			return false;
		});
	});
</SCRIPT>
 
<META name="GENERATOR" content="MSHTML 11.00.9600.17496"></HEAD> 
<BODY>
	<div class="lg-container">
		<h1> <img src="../images/login/logo.png" style="height:80px;"></h1>
		<form  id="lg-form" name="lg-form" action="/login/do_login" method="post">
			
			<div>
				<P style="padding: 30px 0px 10px; position: relative;"><SPAN class="u_logo"></SPAN>
   <INPUT class="ipt" id = "name" name="name" type="text" placeholder="请输入用户名" value="">
    </P>
			</div>
			
			<div>
				<P style="position: relative;"><SPAN class="p_logo"></SPAN>
<INPUT class="ipt" id="password" name = "password" type="password" placeholder="请输入密码" value="">
  </P>
			</div>
			
			<div>				
				<button type="submit" id="login"  onclick="check_submit();">登录</button>
			</div>
			
		</form>
		<p id="error_message" style="display:none;"><span id="message_value" style="color:red;font-size:14px;"></span></p>
	</div>
</BODY>
<script type="text/javascript">
	function check_submit(){
		var name = $("#name").val();	
		var password = $("#password").val(); 	
		if(!name ){
			$("#message_value").html("用户名不能为空");
			$("#error_message").show();
		}else if(!password){
			$("#message_value").html("密码不能为空");
                        $("#error_message").show();
		}else{
			$("#error_message").hide();
			$("#lg-form").submit();	
		}
	}
</script>
</HTML>
