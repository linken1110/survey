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
    <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">增加题目</strong> </div>
  </div>

  <div class="am-tabs am-margin" data-am-tabs>
    <ul class="am-tabs-nav am-nav am-nav-tabs">
 <li class="am-active"><a href="#tab1">基本信息</a></li>
      <li><a href="#tab3">选项</a></li>
    </ul>

<div class="am-tabs-bd">
      <div class="am-tab-panel am-fade am-in am-active" id="tab1">
	
        <div class="am-g am-margin-top">
          <div class="am-u-sm-2 am-text-right">所属项目</div>
          <div class="am-u-sm-10">
            <select>
              <option value="option1">杭州</option>
              <option value="option2">萧山</option>
              <option value="option3">上海</option>
            </select>
          </div>
        </div>
	 <div class="am-g am-margin-top">
          <div class="am-u-sm-2 am-text-right">题目分类</div>
          <div class="am-u-sm-10">
            <select>
              <option value="option1">住户基本特征情况</option>
              <option value="option2">个人基本特征情况</option>
              <option value="option3">个人意愿调查</option>
	      <option value="option4">出行链调查</option>
            </select>
          </div>
        </div>
        <div class="am-g am-margin-top">
          <div class="am-u-sm-2 am-text-right">题目类型</div>
          <div class="am-u-sm-10">
            <div class="am-btn-group" data-am-button>
              <label class="am-btn am-btn-default am-btn-xs">
                <input type="radio" name="options" id="option1"> 填空题
              </label>
              <label class="am-btn am-btn-default am-btn-xs">
                <input type="radio" name="options" id="option2"> 选择题
              </label>
              <label class="am-btn am-btn-default am-btn-xs">
                <input type="radio" name="options" id="option3"> 是非题
              </label>
		<label class="am-btn am-btn-default am-btn-xs">
                <input type="radio" name="options" id="option3"> 多选题
              </label>
            </div>
          </div>
        </div>

        <div class="am-g am-margin-top">
          <div class="am-u-sm-2 am-text-right">
            题目内容
          </div>
          <div class="am-u-sm-10">
            <form action="" class="am-form am-form-inline">
              <div class="am-form-group am-form-icon">
                <input type="text" class="am-form-field am-input-sm" >
              </div>
            </form>
          </div>
        </div>

      </div>
	 <div class="am-tab-panel am-fade" id="tab3">
        <form class="am-form">
	 <div class="am-g am-margin-top-sm">
            <div class="am-u-sm-2 am-text-right">
              1
            </div>
            <div class="am-u-sm-4 am-u-end">
              <input type="text" class="am-input-sm" value="3个">
            </div>
		 <div class="am-u-sm-6"><button class="am-btn am-btn-default am-btn-xs am-text-danger"><span class="am-icon-trash-o"></span> 删除</button></div>
          </div>
          <div class="am-g am-margin-top-sm">
            <div class="am-u-sm-2 am-text-right">
              选项编号
            </div>
            <div class="am-u-sm-4 am-u-end">
              <input type="text" class="am-input-sm">
            </div>
          </div>

          <div class="am-g am-margin-top-sm">
            <div class="am-u-sm-2 am-text-right">
              选项内容
            </div>
            <div class="am-u-sm-4 am-u-end">
              <input type="text" class="am-input-sm">
            </div>
          </div>

        </form>
      </div>

    </div>

  </div>

  <div class="am-margin">
    <button type="button" class="am-btn am-btn-primary am-btn-xs">提交保存</button>
    <button type="button" class="am-btn am-btn-primary am-btn-xs">放弃保存</button>
   <button type="button" class="am-btn am-btn-primary am-btn-xs">新增选项</button>
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
<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/js/amazeui.min.js"></script>
<!--<![endif]-->
<script src="../../assets/js/app.js"></script>
</body>
</html>
