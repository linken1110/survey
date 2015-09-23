<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>调查问卷后台管理系统</title>
  <meta name="description" content="这是一个 table 页面">
  <meta name="keywords" content="table">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="icon" type="image/png" href="../../assets/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="../../assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="../../assets/css/amazeui.min.css"/>
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
<?php include 'sidebar.php';?>
  <!-- content start -->
  <div class="admin-content">
	<ul class="am-avg-sm-1 am-avg-md-4 am-margin am-padding am-text-center admin-content-list ">
	<li><a onclick='change_frame("/survey_result/home_info?id=<?php echo $id?>")' class="am-text-secondary"><img src="../../assets/image/3.png" height="50px;" width="50px;"><br/>住户信息</a></li>
	<?php $num = 0;foreach ($list as $item):$num++?>
		<li><a onclick='change_frame("/survey_result/quest_info?id=<?php echo $item['id']?>&pid=<?php echo $pid?>")' class="am-text-success"><img src="../../assets/image/1.png" height="50px;" width="50px;"><br/>用户<?php echo $num?></a></li>
	 <?php endforeach;?>
	<li id="add_user"><a onclick = 'change_frame("/survey_result/add_user?id=<?php echo $id?>&pid=<?php echo $pid?>")' class="am-text-secondary"><img src="../../assets/image/2.png" height="50px;" width="50px
;"><br/>新增用户</a></li>
    	</ul>
	<div class="iframe_wrapper"><iframe id="js_iframe" src="/survey_result/home_info?id=<?php echo $id?>" scrolling="no"></iframe></div>
</div>
  <!-- content end -->
</div>

<footer>
  <hr>
</footer>

<!--[if lt IE 9]>
<script src="assets/js/jquery1.11.1.min.js"></script>
<script src="assets/js/modernizr.js"></script>
<script src="assets/js/polyfill/rem.min.js"></script>
<script src="assets/js/polyfill/respond.min.js"></script>
<script src="assets/js/amazeui.legacy.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/amazeui.min.js"></script>
<!--<![endif]-->
<script src="../../assets/js/app.js"></script>
<script type="text/javascript">
	var pid = <?php echo $pid?>;
	function change_frame(str){
		document.getElementById('js_iframe').src=str;
	}
	function go_to_question(){
		window.location.href="/main/add_quest";
	}
	function add_user(id){
		var tmp = "change_frame('/survey_result/quest_info?id="+id+"&pid="+pid+"')";
		var str = '<li><a onclick="'+tmp+'" class="am-text-success"><img src="../../assets/image/1.png" height="50px;" width="50px;"><br/>新用户</a></li>';
		$("#add_user").before(str);
	}
</script>
</body>
</html>
