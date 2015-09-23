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
<style type="text/css">
  .gridly {
    position: relative;
    width: 960px;
  }
  .brick.small {
    width: 140px;
    height: 140px;
  }
  .brick.large {
    width: 300px;
    height: 300px;
  }
</style>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

<div class="am-cf admin-main">
  <!-- content start -->
<!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div style="text-align:center"><strong class="am-text-primary am-text-lg"></strong> </div>
    </div>
	<form action="hueditSub" id="qeditsub" method="post">
							<input type="hidden" value="" name="id">
	<table class="hd_del_ta  am-table-striped am-table-hover table-main" id="table1" align="center" border="0" cellpadding="0" cellspacing="1" width="97%">
		<tbody>
                                                                        <tr>
                                                                                <td class="hd_ta_t"style="background:#7cb5ec" colspan="2"><strong class="am-text-primary am-text-lg" style="color:white">问卷信息<input name="num" value="060001" type="hidden"></strong>

		</td>
                                                                        </tr>
               </tbody>
		<?php foreach ($list as $item):?>
                                                                        <?php if($item['type'] == 1 || $item['type'] == 4){?>
                                                                        <tr><td><?php echo $item['question']?></td>
                                                                        <td><input name="<?php echo $item['id']?>" class="question" value="<?php echo $item['answer']?>">
                                                                        </tr>
                                                                        <?php }else if($item['type'] == 2){?>
                                                                                <tr>
                                                                                <td><?php echo $item['question']?></td>
                                                                                <td><select name="<?php echo $item['id']?>" class="question">
                                                                                        <?php foreach ($item['option_list'] as $option):?>
                                                                                                <?php if($item['answer'] == $option['number'] ){?>
                                                                                                <option selected="selected" value="<?php echo $option['number']?>"><?php echo $option['content']?></option>                         
                                                                                                <?php }else {?>
                                                                                                <option value="<?php echo $option['number']?>"><?php echo $option['content']?>
</option>                         
                                                                                                <?php }?>
                                                                                        <?php endforeach;?>
                                                                        <?php }else if($item['type'] == 3){?>


                                                                        <?php }?>
                                                                <?php endforeach;?>
	</table>
	 <div class="am-g" style="margin-top:20px;">
      <div class="am-u-sm-12">
        <form class="am-form">
          <table class="am-table am-table-striped am-table-hover table-main">
            <thead>
              <tr>
                <th class="table-check"><input type="checkbox" /></th><th class="table-number">出行目的</th><th class="table-title">出行时间</th><th class="table-author">出行地点</th><th class="table-date">到达地点</th><th class="table-set">操作</th>
              </tr>
          </thead>
          <tbody>
		 <?php foreach ($trip_list as $item):?>
            <tr>
              <td><input type="checkbox" /></td>
              <td><?php echo $item['purpose']?></td>
              <td><a href="#"><?php echo $item['start_time']?></a></td>
              <td><?php echo $item['start_address']?></td>
              <td><?php echo $item['end_address']?></td>
              <td>
                <div class="am-btn-toolbar">
                  <div class="am-btn-group am-btn-group-xs">
                    <button class="am-btn am-btn-default am-btn-xs am-text-secondary" type="button" onclick="window.location.href='/main/trip_info?id=<?php echo $item['id']?>'"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                    <button class="am-btn am-btn-default am-btn-xs am-text-danger" type="button" onclick="delete_item(<?php echo $item['id']?>)"><span class="am-icon-trash-o"></span> 删除</button>
                  </div>
                </div>
              </td>
            </tr>
                <?php endforeach;?>
          </tbody>
        </table>
						</form>
	<div class="am-margin">
    <button type="button" class="am-btn am-btn-primary am-btn-xs" onclick="update_user_info()">提交保存</button>
    <button type="button" class="am-btn am-btn-primary am-btn-xs">删除选中</button>
   <button type="button" class="am-btn am-btn-primary am-btn-xs" onclick="window.location.href='/main/add_trip?uid=<?php echo $uid?>'">新增出行</button>
  </div>

  </div>
  <!-- content end -->  
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
<!--<![endif]-->
<script src="../../assets/js/app.js"></script>
<script type="text/javascript">
var uid = <?php echo $uid?>;
function delete_item(id){
	if(confirm("确定要删除吗？")){
         $.ajax({
                type: 'POST',
                url: "/trip_info/delete_trip",
                data: {id:id},
                dataType: 'json',
                success: function(result){
                        if(result['result'] ){
				window.location.reload();
                        }
                },
                error: function(){
                        alert('Error loading PHP document');

                }
        });
        }	
}
function update_user_info(){
	var question_list ="";
        $(".question").each(function(){
                var num = $(this).attr("name");
                var value =     $(this).val();
                question_list = question_list +num +":" +value+"|";
        });
	 $.ajax({
                type: 'POST',
                url: "/survey_result/user_update",
                data: {uid:uid,question_list:question_list},
                dataType: 'json',
                success: function(result){
                        if(result['result'] ){
                                alert('保存成功');
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
