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
 <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
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
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">项目管理</strong> </div>
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
            <tr>
              <td><input type="checkbox" /></td>
              <td><?php echo $project['id']?></td>
              <td><?php echo $project['name']?></td>
              <td><?php echo $project['province']?></td>
	      <td><?php echo $project['create_time']?></td>
              <td>
                <div class="am-btn-toolbar">
                  <div class="am-btn-group am-btn-group-xs">
		    <button type="button" class="am-btn am-btn-default" onclick="window.location.href='/project_member/member_list?id=<?php echo $project['id']?>'"><span class="am-icon-copy"></span> 项目成员</button>
			<button type="button" class="am-btn am-btn-default am-btn-xs am-text-secondary" onclick="window.location.href='/question/category_list?id=<?php echo $project['id']?>'"><span class="am-icon-check"></span>问卷管理</button>
                  </div>
                </div>
              </td>
            </tr>
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
<script src="../../assets/js/My97DatePicker/WdatePicker.js"></script>
<script src="../../assets/js/popupmenu/js/jquery.popmenu.js"></script>
<script type="text/javascript">
$(function(){    
	$('#year').popmenu();    
	$('#demo_box').popmenu({'background':'#e6e6e6','focusColor':'#c7c7c7','borderRadius':'0','iconSize':'80px'});    
})    
	function popup(){
		$('.pop_ctrl').click();
	}
	function submit(){
        	$("#my_form").submit();
	}
	function changeyear(year){
		$('#demo_ul').hide();
		$("#year").val(year);
	}
WdatePicker({eCont:'div1',onpicked:function(dp){alert('你选择的日期是:'+dp.cal.getDateStr())}});
function delete_item(id){
	if(confirm("确定要删除吗？"))
	{
		window.location.href="/project/delete_project?id="+id;
	}
}
</script>
</body>
</html>
