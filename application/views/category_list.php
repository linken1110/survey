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
 <link rel="stylesheet" href="../../assets/css/screen.css">
</head>
<body class="g_wrapper g_wrapper_full page_edit g_survey" style="font-weight:400;line-height:1.6;font-size:1.6rem;font-family:'Segoe UI','Lucida Grande',Helvetica,Arial,'Microsoft YaHei',FreeSans,Arimo,'Droid Sans','wenquanyi micro hei','Hiragino Sans GB','Hiragino Sans GB W3',FontAwesome,sans-serif;">
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

<?php include 'header.php';?>
<div class="am-cf admin-main">
<?php include 'sidebar.php';?>
  <!-- content start -->
  <div class="admin-content">

<div class="survey_options published" style="display: block;margin-top:20px;margin-bottom:-20px;margin-right:20px;">
                <a onclick="window.location.href='/project/edit_category?id=<?php echo $pid?>'" id="publish_survey" class="btn btn_middle btn_blue btn_start"><i></i>配置</a>
            </div>
<div class="survey_wrap">
        <div class="survey_title" style="margin-top:-50px;">

                            <div class="inner">

                                <h1 class="title_content cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" contenteditable="false" tabindex="0" spellcheck="false" role="textbox" aria-label="false" aria-describedby="cke_34" style="position: relative;">杭州市居民出行调查问卷</h1>

                            </div>

                        </div>
</div>

	 <ul class="am-avg-sm-1 am-avg-md-4 am-margin am-padding am-text-center admin-content-list " style ="margin-top:20px;">
		<?php foreach ($list as $item):?>
		 <?php if($item['id']  == 1) {?>
      <li style="font-size:20px;"><a href="/question/quest_list?id=<?php echo $pid?>&category_id=<?php echo $item['id']?>" class="am-text-success"><span class="am-icon-btn am-icon-home" style="width:60px;height:60px;font-size:40px;line-height:53px;"></span><br/><?php echo $item['name']?></li>
	<?php }else if($item['id']  == 2){?>
	<li style="font-size:20px;"><a href="/question/quest_list?id=<?php echo $pid?>&category_id=<?php echo $item['id']?>" class="am-text-warning"><span class="am-icon-btn am-icon-user-md" style="width:60px;height:60px;font-size:40px;line-height:53px;"></span><br/><?php echo $item['name']?></li>
        <?php }else if($item['id']  == 3){?>
	<li style="font-size:20px;"><a href="/question/quest_list?id=<?php echo $pid?>&category_id=<?php echo $item['id']?>" class="am-text-danger"><span class="am-icon-btn am-icon-user-md" style="width:60px;height:60px;font-size:40px;line-height:53px;"></span><br/><?php echo $item['name']?></li>
         <?php }else if($item['id']  == 4){?>
	<li style="font-size:20px;"><a href="/question/quest_list?id=<?php echo $pid?>&category_id=<?php echo $item['id']?>" class="am-text-secondary"><span class="am-icon-btn am-icon-recycle" style="width:60px;height:60px;font-size:40px;line-height:53px;"></span><br/><?php echo $item['name']?></li>
        <?php }?>
		<?php endforeach;?>
    </ul>
  <!-- content end -->
</div>

<footer>
  <hr>
</footer>
<!--[if (gte IE 9)|!(IE)]><!-->
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/jquery1.11.1.min.js"></script>
<script src="../../assets/js/amazeui.min.js"></script>
<!--<![endif]-->
<script src="../../assets/js/app.js"></script>
<script type="text/javascript">
	function submit(){
        	$("#my_form").submit();
	}
</script>
</body>
</html>
