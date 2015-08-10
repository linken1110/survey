<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Amaze后台管理系统模板HTML 表格页面 - 源码之家</title>
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
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">项目成员列表</strong> </div>
    </div>

    <div class="am-g">
      <div class="am-u-md-6 am-cf">
        <div class="am-fl am-cf">
          <div class="am-btn-toolbar am-fl">
            <div class="am-btn-group am-btn-group-xs">
              <button type="button" class="am-btn am-btn-default" onclick="window.location.href='/project_member/add_member'"><span class="am-icon-plus"></span> 新增</button>
              <button type="button" class="am-btn am-btn-default"><span class="am-icon-trash-o"></span> 删除</button>
            </div>

          </div>
        </div>
      </div>
	<div class="am-u-md-3 am-cf">
        <div class="am-fr">
	<form  action="/project_member/search" id="my_form" method="post">
          <div class="am-input-group am-input-group-sm">
            <input type="text" class="am-form-field" placeholder="用户名" name="name">
                <span class="am-input-group-btn">
                  <button class="am-btn am-btn-default" type="button" onclick="submit();">搜索</button>
                </span>
          </div>
	</form>
        </div>
      </div>
    </div>

    <div class="am-g">
      <div class="am-u-sm-12">
        <form class="am-form">
          <table class="am-table am-table-striped am-table-hover table-main">
            <thead>
              <tr>
                <th class="table-check"><input type="checkbox" /></th><th class="table-id">ID</th><th class="table-title">用户名</th><th class="table-author">项目角色</th><th class="table-date">创建时间</th><th class="table-set">操作</th>
              </tr>
          </thead>
          <tbody>
	    <?php foreach ($list as $item):?>
            <tr>
              <td><input type="checkbox" /></td>
              <td><?php echo $item['uid']?></td>
              <td><?php echo $item['name']?></td>
              <td><?php if($item['position'] == 1){?>管理员<?php }else{?>调查员<?php }?></td>
	      <td><?php echo $item['create_date']?></td>
              <td>
                <div class="am-btn-toolbar">
                  <div class="am-btn-group am-btn-group-xs">
                    <button class="am-btn am-btn-default am-btn-xs am-text-danger" type="button" onclick="window.location.href='/project_member/delete_member?pid=<?php echo $item['project_id']?>&uid=<?php echo $item['uid']?>'"><span class="am-icon-trash-o"></span> 删除</button>
		    <button type="button" class="am-btn am-btn-default" onclick="window.location.href='/survey_result/get_list??pid=<?php echo $item['project_id']?>&uid=<?php echo $item['uid']?>'"><span class="am-icon-copy"></span> 问卷列表</button>
                  </div>
                </div>
              </td>
            </tr>
	<?php endforeach;?>	
          </tbody>
        </table>
          <div class="am-cf">
  共 3 条记录
  <div class="am-fr">
    <ul class="am-pagination">
      <li class="am-disabled"><a href="#">«</a></li>
      <li class="am-active"><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">5</a></li>
      <li><a href="#">»</a></li>
    </ul>
  </div>
</div>
          <hr />
          <p>注：.....</p>
        </form>
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
<script src="../../assets/js/jquery.min.js"></script>
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
