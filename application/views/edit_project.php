<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Amaze后台管理系统模板HTML首页 - 源码之家</title>
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
    <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">增加项目</strong> </div>
  </div>

  <div class="am-tabs am-margin" data-am-tabs>
    <ul class="am-tabs-nav am-nav am-nav-tabs">
      <li class="am-active"><a href="#tab1">基本信息</a></li>
    </ul>

    <div class="am-tabs-bd">
      <div class="am-tab-panel am-fade am-in am-active" id="tab1">
        <form class="am-form" action="/project/update" id="my_form" method="post">
		<input type="hidden" value="<?php echo $info['id']?>" name="id" />
                <div class="am-g am-margin-top">
            <div class="am-u-sm-2 am-text-right">
              项目名称
            </div>
            <div class="am-u-sm-4" style="float:left">
              <input type="text" name ="name" class="am-input-sm" value="<?php echo $info['name']?>" >
            </div>
          </div>
		<div class="am-g am-margin-top">
          <div class="am-u-sm-2 am-text-right">省份</div>
          <div class="am-u-sm-10">
            <select name = "province" id= "province">
		<option value="北京">北京</option>
                <option value="天津">天津</option>
                <option value="上海">上海</option>
                <option value="重庆">重庆</option>
                <option value="黑龙江">黑龙江</option>
                <option value="吉林">吉林</option>
                <option value="辽宁">辽宁</option>
                <option value="河北">河北</option>
                <option value="河南">河南</option>
                <option value="山东">山东</option>
                <option value="山西">山西</option>
                <option value="陕西">陕西</option>
                <option value="宁夏">宁夏</option>
                <option value="甘肃">甘肃</option>
                <option value="青海">青海</option>
                <option value="新疆">新疆</option>
                <option value="四川">四川</option>
                <option value="贵州">贵州</option>
                <option value="云南">云南</option>
                <option value="西藏">西藏</option>
                <option value="湖北">湖北</option>
                <option value="湖南">湖南</option>
                <option value="广西">广西</option>
                <option value="广东">广东</option>
                <option value="海南">海南</option>
                <option value="安徽">安徽</option>
                <option value="江西">江西</option>
                <option value="江苏">江苏</option>
                <option value="浙江">浙江</option>
                <option value="福建">福建</option>
                <option value="内蒙古">内蒙古</option>
            </select>
          </div>
        </div>
                <div class="am-g am-margin-top-sm">
            <div class="am-u-sm-2 am-text-right">
              项目描述
            </div>
            <div class="am-u-sm-10">
              <textarea rows="10" name="description" placeholder="请使用富文本编辑插件"><?php echo $info['description']?></textarea>
            </div>
          </div>
        <div class="am-g am-margin-top">
          <div class="am-u-sm-2 am-text-right">
            发布时间
          </div>
          <div class="am-u-sm-10">
              <div class="am-form-group am-form-icon">
		 <i class="am-icon-calendar"></i>
                <input type="text" name="create_time" class="am-form-field am-input-sm" placeholder="时间" value="<?php echo $info['create_time']?>">
              </div>
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
$(function(){
	var chkData = "<?php echo $info['province']?>";
      	$('#province option').each(function(){
		var self = $(this);
        	var selfVal = self.val();
        	if(selfVal == chkData) 
		{
			self.attr('selected' , 'true');
		}
    	});
});
</script>
</html>
