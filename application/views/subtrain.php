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
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

<header class="am-topbar admin-header">
  <div class="am-topbar-brand">
  </div>

</header>

<div class="am-cf admin-main">
  <!-- content start -->
  <div class="admin-content">


    <ul class="am-avg-sm-1 am-avg-md-4 am-margin am-padding am-text-center admin-content-list ">
	<li><a href="/subtrain/add_subtrain?id=<?php echo $id?>" class="am-text-secondary"><img src="../../assets/image/new.gif" height="50px;" width="50px;"><br/>新增地铁</a></li>
	<?php foreach ($subtrains as $item):?>
	<?php if($item['id'] % 4 == 1) {?>
	<li><a href="/subtrain/edit_subtrain?id=<?php echo $item['id']?>&pid=<?php echo $id?>" class="am-text-success"><img src="../../assets/image/subtrain.jpg" height="50px;" width="50px;"><br/><?php echo $item['name']?></a></li>
	<?php }else if($item['id'] % 4 == 2){?>
	<li><a href="/subtrain/edit_subtrain?id=<?php echo $item['id']?>&pid=<?php echo $id?>" class="am-text-warning"><img src="../../assets/image/subtrain.jpg" height="50px;" width="50px;"><br/><?php echo $item['name']?></a></li>
	<?php }else if($item['id'] % 4 == 3){?>
	<li><a href="/subtrain/edit_subtrain?id=<?php echo $item['id']?>&pid=<?php echo $id?>" class="am-text-danger"><img src="../../assets/image/subtrain.jpg" height="50px;" width="50px;"><br/><?php echo $item['name']?></a></li>
	 <?php }else if($item['id'] % 4 == 0){?>
        <li><a href="/subtrain/edit_subtrain?id=<?php echo $item['id']?>&pid=<?php echo $id?>" class="am-text-secondary"><img src="../../assets/image/subtrain.jpg" height="50px;" width="50px;"><br/><?php echo $item['name']?></a></li>
	<?php }?>
	<?php endforeach;?>
    </ul>


  <!-- content end -->

</div>

<footer>
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
</body>
</html>
