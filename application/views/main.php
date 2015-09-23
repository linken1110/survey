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


    <ul class="am-avg-sm-1 am-avg-md-4 am-margin am-padding am-text-center admin-content-list ">
      <li><span class="am-icon-btn am-icon-briefcase"></span><br/><span style="font-size:14px;color:#095f8a">调查项目:<?php echo $project_info['name']?></span></li>
      <li><span class="am-icon-btn am-icon-file-text"></span><br/><span style="font-size:14px;color:#5eb95e">调查户数:<?php echo $home_count?></span></li>
      <li><span class="am-icon-btn  am-icon-user-md"></span><br/><span style="font-size:14px;color:#0e90d2">调查人数:<?php echo $user_count?></span></li>
      <li><span class="am-icon-btn am-icon-recycle"></span><br/><span style="font-size:14px;color:#dd514c">出行次数:<?php echo $trip_count?></span></li>
    </ul>
	<div class="am-g">
        <form  action="/survey_result/home_list" id="my_form" method="post">
	<input type="hidden" value="<?php echo $id?>" name="pid" />
      <div class="am-u-md-6 am-cf">
        <div class="am-fl am-cf">
          <div class="am-btn-toolbar am-fl">
		<input type="text" class="am-form-field" style= "font-size:1.4rem"placeholder="调查员" name="uid" id="uid">
	 </div>
        </div>
      </div>
      <div class="am-u-md-3 am-cf">
        <div class="am-fr">
          <div class="am-input-group am-input-group-sm">
            <input type="text" class="am-form-field" placeholder="调查时间" name="date" onfocus="WdatePicker({startDate:'%y-%M-01',dateFmt:'yyyy-MM-dd',alwaysUseStartDate:true,minDate:'%y-%M-%d',firstDayOfWeek:1})" id="date">
                <span class="am-input-group-btn">
                  <button class="am-btn am-btn-default" type="button" onclick="submit();" >搜索</button>
                </span>
          </div>
        </div>
      </div>
	<div class="am-u-md-3 am-cf">
        <div class="am-fl am-cf">
          <div class="am-btn-toolbar am-fl">
		<span class="am-input-group-btn">
			<button class="am-btn am-btn-primary am-btn-xs" type="button" onclick="(window.location.href='/home_info/add?id=<?php echo $id?>')" style="height:35px">新增用户</button>
                </span>
         </div>
        </div>
      </div>
        </form>
    </div>
<div class="iframe_wrapper"><iframe id="js_iframe" src="/main/map?id=<?php echo $id?>" scrolling="no"></iframe></div>
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
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/amazeui.min.js"></script>
<script src="../../assets/js/My97DatePicker/WdatePicker.js"></script>
<!--<![endif]-->
<script src="../../assets/js/app.js"></script>
<script type="text/javascript">
	function mysubmit(){
		var pid = <?php echo $id?>;
		var uid = $("#uid").val();
		var date = $("#date").val();
		$.ajax({
                type: 'POST',
                url: "/survey_result/home_list",
                data: {pid:pid,uid:uid,date:date},
                dataType: 'json',
                success: function(result){
                        if(result['result']){
				var obj    =eval(result['list']);
				window.frames[0].test(obj);
                        }
                        else{
                        }
                },
                error: function(){
                        alert('Error loading PHP document');

                }
        });
	}
</script> 
</body>
</html>
