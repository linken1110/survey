<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>调查问卷后台管理系统</title>
  <meta name="description" content="这是一个 index 页面">
  <meta name="keywords" content="index">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="icon" type="image/png" href="../../assets/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="../../assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="../../assets/css/amazeui.min.css"/>
  <link rel="stylesheet" href="../../assets/css/admin.css">
 <link rel="stylesheet" href="../../assets/css/admin.css">
  <link rel="stylesheet" href="../../assets/css/js_demo.css">
</head>
<body>
<style type="text/css">
  .gridly {
    position: relative;
    width: 960px;
  }
  .brick.small {
    width: 140px;
    height: 140px;
  }
  .brick.large {
    width: 300px;
    height: 300px;
  }
</style>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

<div class="am-cf admin-main">
  <!-- content start -->
<!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div style="text-align:center"><strong class="am-text-primary am-text-lg"></strong> </div>
    </div>
	<form action="/survey_result/user_add" id="qeditsub" method="post">
							<input type="hidden" value="" name="id">
	<table class="hd_del_ta  am-table-striped am-table-hover table-main" id="table1" align="center" border="0" cellpadding="0" cellspacing="1" width="97%">
		<tbody>
                                                                        <tr>
                                                                                <td class="hd_ta_t"style="background:#7cb5ec" colspan="2"><strong class="am-text-primary am-text-lg" style="color:white">问卷信息<input id ="home_id" name="num" value="<?php echo $home_id?>" type="hidden"></strong>

		</td>
                                                                        </tr>
               </tbody>
		<?php foreach ($list as $item):?>
                                                                        <?php if($item['type'] == 1 || $item['type'] == 4){?>
                                                                        <tr><td><?php echo $item['question']?></td>
                                                                        <td><input name="<?php echo $item['id']?>" class="question" value="">
                                                                        </tr>
                                                                        <?php }else if($item['type'] == 2){?>
                                                                                <tr>
                                                                                <td><?php echo $item['question']?></td>
                                                                                <td><select name="<?php echo $item['id']?>" class="question">
                                                                                        <?php foreach ($item['option_list'] as $option):?>
                                                                                                <option  value="<?php echo $option['number']?>"><?php echo $option['content']?></option>                         
                                                                                        <?php endforeach;?>
                                                                        <?php }else if($item['type'] == 3){?>


                                                                        <?php }?>
                                                                <?php endforeach;?>
	</table>
		 <button type="button" class="am-btn am-btn-primary am-btn-xs" style="margin-left:400px;margin-top:10px;margin-bottom:10px;" onclick="mysubmit();">提交保存</button>
	</form>
  </div>
  <!-- content end -->  
<!-- content end -->

</div>

<footer>
  <hr>
</footer>

<!--[if lt IE 9]>
<script src="../../assets/js/jquery1.11.1.min.js"></script>
<script src="../../assets/js/modernizr.js"></script>
<script src="../../assets/js/polyfill/rem.min.js"></script>
<script src="../../assets/js/polyfill/respond.min.js"></script>
<script src="../../assets/js/amazeui.legacy.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/amazeui.min.js"></script>
<!--<![endif]-->
<script src="../../assets/js/app.js"></script>
<script type="text/javascript">
function mysubmit(){
	var home_id = $("#home_id").val();
	var question_list ="";
	$(".question").each(function(){
    		var num = $(this).attr("name");
		var value =	$(this).val();
		question_list = question_list +num +":" +value+"|";
  	});
	$.ajax({
                type: 'POST',
                url: "/survey_result/user_add",
                data: {home_id:home_id,question_list:question_list},
                dataType: 'json',
                success: function(result){
                        if(result['result'] ){
				 window.parent.add_user(result['id']); 
				alert('保存成功');
                        }
                },
                error: function(){
                        alert('Error loading PHP document');

                }
        });
}
</script>
</body>
</html>
