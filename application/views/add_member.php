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
<?php include 'sidebar.php';?>
  <!-- content start -->
	<div class="admin-content">

  <div class="am-cf am-padding">
    <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">增加项目成员</strong> </div>
  </div>

  <div class="am-tabs am-margin" data-am-tabs>
    <ul class="am-tabs-nav am-nav am-nav-tabs">
      <li class="am-active"><a href="#tab1">基本信息</a></li>
    </ul>

    <div class="am-tabs-bd">
      <div class="am-tab-panel am-fade am-in am-active" id="tab1">
        <form class="am-form" action="/project_member/add" id="my_form" method="post">
		<input  name ="id" class="am-input-sm"  type="hidden" value="<?php echo $id?>" >
                <div class="am-g am-margin-top">
            <div class="am-u-sm-2 am-text-right">
              用户名
            </div>
            <div class="am-u-sm-4" style="float:left">
              <input type="text" name ="name" class="am-input-sm" value="" >
            </div>
          </div>
	<div class="am-g am-margin-top">
            <div class="am-u-sm-2 am-text-right">
              密码
            </div>
            <div class="am-u-sm-4" style="float:left">
              <input type="text" name ="pass" class="am-input-sm" value="" >
            </div>
          </div>
		<div class="am-g am-margin-top">
          <div class="am-u-sm-2 am-text-right">职位</div>
          <div class="am-u-sm-10">
            <select name = "position" id= "position">
		<option value="1">管理员</option>
                <option value="2">调查员</option>
            </select>
          </div>
        </div>
</form>
      </div>



  </div>

  <div class="am-margin">
    <button type="button" class="am-btn am-btn-primary am-btn-xs" onclick="submit();">提交保存</button>
    <button type="button" class="am-btn am-btn-primary am-btn-xs" onclick="location.reload(false);">放弃保存</button>
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
<script src="../../assets/js/jquery-1.9.1.min.js"></script>
<script src="../../assets/js/amazeui.min.js"></script>
<!--<![endif]-->
</body>
<script type="text/javascript">
function submit(){
	$("#my_form").submit();
}
</script>
</html>
