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
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">项目列表</strong> </div>
    </div>

    <div class="am-g">
	<form  action="/project/search" id="my_form" method="post">
      <div class="am-u-md-6 am-cf">
        <div class="am-fl am-cf">
          <div class="am-btn-toolbar am-fl">
            <div class="am-btn-group am-btn-group-xs">
              <button type="button" class="am-btn am-btn-default" onclick="window.location.href='/project/add_project'"><span class="am-icon-plus"></span> 新增</button>
              <button type="button" class="am-btn am-btn-default"><span class="am-icon-trash-o"></span> 删除</button>
            </div>
            <div class="am-form-group am-margin-left am-fl" >
	<!--
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
		-->
		<input type="text" class="am-form-field" placeholder="省份" name="province" style="width:139px;height:37px;margin-left:145px;">
            </div>
      </div>
        </div>
      </div>
      <div class="am-u-md-3 am-cf">
        <div class="am-fr">
          <div class="am-input-group am-input-group-sm">
	<div id="demo_box" >
            <div class="pop_ctrl" style="cursor: default;"><i class="fa fa-bars" style="display:none"></i></div>
            <ul id="demo_ul" style="display: none; position: absolute;  margin-top:5px; margin-left: 0px; width: 300px; float: left; padding: 0px; border-top-left-radius: 10px; border-top-right-radius: 10px; border-bottom-right-radius: 10px; border-bottom-left-radius: 10px; background: rgb(52, 73, 94); z-index:100;">
                <li class="demo_li" style="display: block;  float: left; width: 80px; height: 80px;text-align: center; border-top-left-radius: 10px; border-top-right-radius: 10px; border-bottom-right-radius: 10px; border-bottom-left-radius: 10px;" onclick="changeyear(2008);"><div style="margin-top:25px;font-size:22px;">2008</div></a></li>
                <li class="demo_li" style="display: block;  float: left; width: 80px; height: 80px;text-align: center; border-top-left-radius: 10px; border-top-right-radius: 10px; border-bottom-right-radius: 10px; border-bottom-left-radius: 10px;" onclick="changeyear(2009);"><div style="margin-top:25px;font-size:22px;
">2009</div></a></li>
                <li class="demo_li" style="display: block;  float: left; width: 80px; height: 80px;text-align: center; border-top-left-radius: 10px; border-top-right-radius: 10px; border-bottom-right-radius: 10px; border-bottom-left-radius: 10px;" onclick="changeyear(2010);"><div style="margin-top:25px;font-size:22px;
">2010</div></li>
                <li class="demo_li" style="display: block;  float: left; width: 80px; height: 80px;text-align: center; border-top-left-radius: 10px; border-top-right-radius: 10px; border-bottom-right-radius: 10px; border-bottom-left-radius: 10px;" onclick="changeyear(2011);"><div style="margin-top:25px;font-size:22px;
">2011</div></li>
                <li class="demo_li" style="display: block;  float: left; width: 80px; height: 80px;text-align: center; border-top-left-radius: 10px; border-top-right-radius: 10px; border-bottom-right-radius: 10px; border-bottom-left-radius: 10px;" onclick="changeyear(2012);"><div style="margin-top:25px;font-size:22px;
">2012</div></li>
                <li class="demo_li" style="display: block;  float: left; width: 80px; height: 80px;text-align: center; border-top-left-radius: 10px; border-top-right-radius: 10px; border-bottom-right-radius: 10px; border-bottom-left-radius: 10px;" onclick="changeyear(2013);"><div style="margin-top:25px;font-size:22px;
">2013</div></li>
                <li class="demo_li" style="display: block;  float: left; width: 80px; height: 80px;text-align: center; border-top-left-radius: 10px; border-top-right-radius: 10px; border-bottom-right-radius: 10px; border-bottom-left-radius: 10px;" onclick="changeyear(2014);"><div style="margin-top:25px;font-size:22px;
">2014</div></li>
                <li class="demo_li" style="display: block;  float: left; width: 80px; height: 80px;text-align: center; border-top-left-radius: 10px; border-top-right-radius: 10px; border-bottom-right-radius: 10px; border-bottom-left-radius: 10px;" onclick="changeyear(2015);"><div style="margin-top:25px;font-size:22px;
">2015</div></li>
                <li class="demo_li" style="display: block;  float: left; width: 80px; height: 80px;text-align: center; border-top-left-radius: 10px; border-top-right-radius: 10px; border-bottom-right-radius: 10px; border-bottom-left-radius: 10px;" onclick="changeyear(2016);"><div style="margin-top:25px;font-size:22px;
">2016</div></li>
            </ul>
        </div>
            <input type="text" class="am-form-field" placeholder="年份" name="search_time" id="year" onfocus="popup();">
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
                    <button class="am-btn am-btn-default am-btn-xs am-text-secondary" type="button" onclick="window.location.href='/project/edit_project?id=<?php echo $item['id']?>'"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                    <button class="am-btn am-btn-default am-btn-xs am-text-danger" type="button" onclick="delete_item(<?php echo $item['id']?>)"><span class="am-icon-trash-o"></span> 删除</button>
		    <button type="button" class="am-btn am-btn-default" onclick="window.location.href='/project_member/member_list?id=<?php echo $item['id']?>'"><span class="am-icon-copy"></span> 项目成员</button>
			<button type="button" class="am-btn am-btn-default am-btn-xs am-text-secondary" onclick="window.location.href='/question/category_list?id=<?php echo $item['id']?>'"><span class="am-icon-check"></span>问卷管理</button>
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
