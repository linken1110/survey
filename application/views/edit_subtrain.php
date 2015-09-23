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
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

<?php include 'header.php';?>
<div class="am-cf admin-main">
  <!-- content start -->
	<div class="admin-content">

  <div class="am-cf am-padding">
    <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">编辑地铁</strong> </div>
  </div>

  <div class="am-tabs am-margin" data-am-tabs>
    <ul class="am-tabs-nav am-nav am-nav-tabs">
 <li class="am-active"><a href="#tab1">基本信息</a></li>
    <!--  <li id="totab3" style="display:none;"><a href="#tab3">选项</a></li>-->
    </ul>

<div class="am-tabs-bd">
      <div class="am-tab-panel am-fade am-in am-active" id="tab1">
	<form class="am-form" action="/subtrain/update" id="my_form" method="post">
	<input type="hidden" value="<?php echo $id?>" name="id" />
	<input type="hidden" value="<?php echo $pid?>" name="pid" />
	<input type="hidden" value="" name="station_list" id="station_list" />
        <div class="am-g am-margin-top">
          <div class="am-u-sm-2 am-text-right">地铁名称</div>
          <div class="am-u-sm-10" style="width:270px">
		<input type="text" name="name" value="<?php echo $train['name']?>" class="am-form-field am-input-sm" style="float:none">
          </div>
        </div>
	<div id ="tab3" ><form class="am-form">
	 <?php foreach ($train['subtrain_list'] as $item):?>
		 <div class="am-g am-margin-top-sm" id="option<?php echo $item['id']?>">
		<div class="am-u-sm-2 am-text-right">
             	 站点
            	</div>
		 <div class="am-u-sm-4 am-u-end" style="width:270px">
		<input type="text"class="am-input-sm" name="content" rel = "<?php echo $item['id']?>" value="<?php echo $item['name']?>"></div><div class="am-u-sm-6"><button class="am-btn am-btn-default am-btn-xs am-text-danger" type="button" onclick="myremove(<?php echo $item['id']?>);"><span class="am-icon-trash-o"></span> 删除</button></div> </div>
	 <?php endforeach;?>
	</form></div>
	<div> <form class="am-form">
	<div class="am-g am-margin-top-sm">
            <div class="am-u-sm-2 am-text-right">
              站点名称
            </div>
            <div class="am-u-sm-4 am-u-end" style="width:270px">
              <input type="text" class="am-input-sm" id="subname">
            </div>
          </div>
	</form></div>
</form>
  </div>
 <div class="am-margin">
    <button type="button" class="am-btn am-btn-primary am-btn-xs" onclick="submit();">提交保存</button>
    <button type="button" class="am-btn am-btn-primary am-btn-xs" onclick="location.reload(false);">放弃保存</button>
   <button type="button" class="am-btn am-btn-primary am-btn-xs" onclick="add_option();">新增站点</button>
  </div>
</div>
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
var num = 1;
$(function(){
	num = <?php echo $max_id?>;
	num ++;
});
function add_option(){
	var name = $("#subname").val();
	num ++;
	$("#subname").val("");
	if(!name){
		return;
	}
	var str = '<form class="am-form"><div class="am-g am-margin-top-sm" id="option'+num+'"><div class="am-u-sm-2 am-text-right">站点</div><div class="am-u-sm-4 am-u-end" style="width:270px"><input type="text"class="am-input-sm" name="content" rel = "'+num+'" value="'+name+'"></div><div class="am-u-sm-6"><button class="am-btn am-btn-default am-btn-xs am-text-danger" type="button" onclick="myremove('+num+');"><span class="am-icon-trash-o"></span> 删除</button></div> </div></form>';
	$("#tab3").append(str);
}
function myremove(num){
	$("#option"+num).remove();
}
function submit(){
	var option = "";
	$("input[name='content']").each(function(){
		var content = $(this).val();
		var num = $(this).attr("rel");
		option = option +content +";";
	});
	$("#station_list").val(option);
        $("#my_form").submit();
}
</script>
</body>
</html>
