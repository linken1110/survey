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
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">项目选择</strong> </div>
    </div>

    <div class="am-g">
	<form  action="/project/search" id="my_form" method="post">
      <div class="am-u-md-6 am-cf">
        <div class="am-fl am-cf">
          <div class="am-btn-toolbar am-fl">

            <div class="am-form-group am-margin-left am-fl">
		省份
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
        </div>
      </div>
      <div class="am-u-md-3 am-cf">
        <div class="am-fr">
          <div class="am-input-group am-input-group-sm">
            <input type="text" class="am-form-field" placeholder="年份" name="search_time">
                <span class="am-input-group-btn">
                  <button class="am-btn am-btn-default" type="button" onclick="submit();" >搜索</button>
                </span>
          </div>
        </div>
      </div>
	</form>
    </div>

    <div class="am-g">
      <div class="am-u-sm-12">
        <form class="am-form">
          <table class="am-table am-table-striped am-table-hover table-main">
            <thead>
              <tr>
                <th class="table-check"><input type="checkbox" /></th><th class="table-id">ID</th><th class="table-title">项目名称</th><th class="table-author">省份</th><th class="table-date">创建时间</th><th class="table-set">操作</th>
              </tr>
          </thead>
          <tbody>
	    <?php foreach ($list as $item):?>
            <tr>
              <td><input type="checkbox" /></td>
              <td><?php echo $item['id']?></td>
              <td><?php echo $item['name']?></td>
              <td><?php echo $item['province']?></td>
	      <td><?php echo $item['create_time']?></td>
              <td>
                <div class="am-btn-toolbar">
                  <div class="am-btn-group am-btn-group-xs">
			<button type="button" class="am-btn am-btn-default am-btn-xs am-text-secondary" onclick="window.location.href='/statics/question_result?id=<?php echo $item['id']?>'"><span class="am-icon-check"></span>信息汇总</button>
                  </div>
                </div>
              </td>
            </tr>
	<?php endforeach;?>	
          </tbody>
        </table>
      </div>

    </div>
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
