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
<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
<link rel="stylesheet" href="../../assets/css/bootstrap-theme-dcp.css">
<link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
<link rel="stylesheet" href="../../assets/css/inside.css">
<link rel="stylesheet" href="../../assets/css/notify.css">
<link rel="stylesheet" href="../../assets/css/spectrum.css">
<link rel="stylesheet" href="../../assets/css/survey-sandbox.css">
<link rel="stylesheet" href="../../assets/css/default.css">
<link rel="stylesheet" href="../../assets/css/layout.css">
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
	<div class="survey" id="survey">
			 <form  action="/question/add" id="my_form" method="post">
        <input type="hidden" value="<?php echo $project['id']?>" name="pid" />
                <input type="hidden" name="category_id" value="<?php echo $category['id']?>" >
        <input type="hidden" value="1" name="type" id="type" />
        <input type="hidden" value="" name="option_list" id="option_list" />
	<div class="survey-body">
        <div class="survey-header">
                        <h1 class="survey-title">新建题目</h1>
            
                        <div class="survey-intro"></div>
                    </div>

    <div class="part_editor panel panel-default">
    <div class="panel-heading form-inline">
        <span class="text-muted"style="color:#428bca;">题目类型:</span>
	 <div class="am-btn-group" data-am-button>
              <label class="am-btn am-btn-default am-btn-xs" onclick="change(1);">
                <input type="radio" name="options" > 填空题
              </label>
              <label class="am-btn am-btn-default am-btn-xs" onclick="change(2);">
                <input type="radio" name="options" > 选择题
              </label>
              <label class="am-btn am-btn-default am-btn-xs" onclick="change(3);">
                <input type="radio" name="options"  > 多选题
              </label>
                <label class="am-btn am-btn-default am-btn-xs" onclick="change(4);">
                <input type="radio" name="options" > 位置题
              </label>
            </div>
        <div class="buttons pull-right">
            <button class="btn btn-link" type="button" name="cancel" onclick="location.reload(false);">放弃</button>
            <button class="btn btn-primary" type="button" name="ok" onclick="submit();">确定</button>
        </div>
    </div>
    <div class="panel-body subject-input">
        <input class="form-control input-lg" type="text" name="subject" autofocus="autofocus" placeholder="所属项目:黑龙江" maxlength="512" disabled="true">
    </div>
    <div class="panel-body subject-input">
        <input class="form-control input-lg" type="text" name="subject" autofocus="autofocus" placeholder="题目分类:住户基本特征情况" maxlength="512" disabled="true">
    </div>
    <div class="panel-body subject-input">
        <input class="form-control input-lg" type="text" name="subject" autofocus="autofocus" placeholder="请输入问题标题" maxlength="512">
    </div>
    <div class="panel-body subject-input">
        <input class="form-control input-lg" type="text" name="subject" autofocus="autofocus" placeholder="默认值" maxlength="512">
    </div>
    <div class="panel-body" data-role="container" data-name="options" style="display:none;" id="tab3">
        <button class="btn btn-link">批量添加选项</button>
    <ul class="list-group ui-sortable"><li class="list-group-item option">
    <div class="form-inline">
        <i class="fa fa-fw fa-arrows" data-role="handle"></i>
        <input class="form-control input-sm" type="text" name="label" size="50" maxlength="512" autofocus="autofocus">
        <button class="btn btn-xs btn-success" type="button" name="add" title="添加选项"><i class="fa fa-plus"></i></button>
        <button class="btn btn-xs btn-danger" type="button" name="remove" title="删除选项"><i class="fa fa-minus"></i></button>
	 <button class="btn btn-xs btn-default" type="button" name="up" ><i class="fa fa-arrow-up"></i></button>
         <button class="btn btn-xs btn-default" type="button" name="down" ><i class="fa fa-arrow-down"></i></button>
            <label class="checkbox-inline"><input type="radio" name="default" data-ns="config">设为默认值</label>
    </div>
</li><li class="list-group-item option">
    <div class="form-inline">
        <i class="fa fa-fw fa-arrows" data-role="handle"></i>
        <input class="form-control input-sm" type="text" name="label" size="50" maxlength="512" autofocus="autofocus">
        <button class="btn btn-xs btn-success" type="button" name="add" title="添加选项"><i class="fa fa-plus"></i></button>
        <button class="btn btn-xs btn-danger" type="button" name="remove" title="删除选项"><i class="fa fa-minus"></i></button>
	 <button class="btn btn-xs btn-default" type="button" name="up" ><i class="fa fa-arrow-up"></i></button>
         <button class="btn btn-xs btn-default" type="button" name="down" ><i class="fa fa-arrow-down"></i></button>
		<label class="checkbox-inline"><input type="radio" name="default" data-ns="config">设为默认值</label>
    </div>
</li><li class="list-group-item option">
    <div class="form-inline">
        <i class="fa fa-fw fa-arrows" data-role="handle"></i>
        <input class="form-control input-sm" type="text" name="label" size="50" maxlength="512" autofocus="autofocus">
        <button class="btn btn-xs btn-success" type="button" name="add" title="添加选项"><i class="fa fa-plus"></i></button>
        <button class="btn btn-xs btn-danger" type="button" name="remove" title="删除选项"><i class="fa fa-minus"></i></button>
        <button class="btn btn-xs btn-default" type="button" name="up" ><i class="fa fa-arrow-up"></i></button>
	 <button class="btn btn-xs btn-default" type="button" name="down" ><i class="fa fa-arrow-down"></i></button>
		<label class="checkbox-inline"><input type="radio" name="default" data-ns="config">设为默认值</label>
    </div>
</li></ul></div>
</div>
</div></div></div>
            </div>
	</div>
</form>
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
$(function(){
        var chkData = "<?php echo $category['id']?>";
        $('#category option').each(function(){
                var self = $(this);
                var selfVal = self.val();
                if(selfVal == chkData) 
                {
                        self.attr('selected' , 'true');
                }
        });
});
function change(i){
	$("#type").val(i);
	if(i == 2 || i ==3){
		$("#tab3").show();
	}else{
		$("#tab3").hide();
	}
}
function add_option(){
	var num = $("#number").val();
	var content = $("#content").val();
	$("#number").val("");
	$("#content").val("");
	if(!num || !content){
		return;
	}
	var str = '<form class="am-form"><div class="am-g am-margin-top-sm" id="option'+num+'"><div class="am-u-sm-2 am-text-right">'+num+'</div> <div class="am-u-sm-4 am-u-end" style="width:270px"><input type="text"class="am-input-sm" name="content" rel = "'+num+'" value="'+content+'"></div><div class="am-u-sm-6"><button class="am-btn am-btn-default am-btn-xs am-text-danger" type="button" onclick="myremove('+num+');"><span class="am-icon-trash-o"></span> 删除</button></div> </div></form>';
	$("#tab4").append(str);
}
function myremove(num){
	$("#option"+num).remove();
}
function submit(){
	var option = "";
	$("input[name='content']").each(function(){
		var content = $(this).val();
		var num = $(this).attr("rel");
		option = option + num +":" +content +";";
	});
	$("#option_list").val(option);
        $("#my_form").submit();
}
</script>
</body>
</html>
