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

  <div class="survey" id="survey" >
<div class="am-fl am-cf"><strong class="am-text-primary am-texDDDDDDDDDDDDDDt-lg">编辑题目</strong> </div>
  </div>
	<div class="survey-body">
        <div class="survey-header" style="display: block;">
                        <h1 class="survey-title">新建调查表</h1>
            
                        <div class="survey-intro"></div>
                    </div>

                    <div class="survey-content"><div class="page ui-sortable"><div class="part select" style="display: none;"><h4 class="title"><span class="index"></span><span class="subject">新建问题</span><span class="require">*</span><label class="rules">(必填)</label></h4><div class="intro"></div><table class="options" width="100%"><tbody><tr><td><input type="radio" name="dabb4a2a-b537-421f-812e-d0cc53d78b4e[]"><label>我的</label></td><td><input type="radio" name="dabb4a2a-b537-421f-812e-d0cc53d78b4e[]"><label>什么</label></td></tr><tr><td><input type="radio" name="dabb4a2a-b537-421f-812e-d0cc53d78b4e[]"><label>地方</label></td><td><input type="radio" name="dabb4a2a-b537-421f-812e-d0cc53d78b4e[]"><label>选项</label></td></tr><tr><td><input type="radio" name="dabb4a2a-b537-421f-812e-d0cc53d78b4e[]"><label>选项</label></td><td></td></tr></tbody></table><div class="float_buttons">
        <a class="btn btn-default" href="javascript:void(0);" onclick="return false;" data-action="edit" title="编辑"><i class="fa fa-edit"></i></a>
        <a class="btn btn-default" href="javascript:void(0);" onclick="return false;" data-action="trigger" title="逻辑"><i class="fa fa-code-fork"></i></a>
        <a class="btn btn-default" href="javascript:void(0);" onclick="return false;" data-action="up" title="上移"><i class="fa fa-arrow-up"></i></a>
        <a class="btn btn-default" href="javascript:void(0);" onclick="return false;" data-action="down" title="下移"><i class="fa fa-arrow-down"></i></a>
        <a class="btn btn-default" href="javascript:void(0);" onclick="return false;" data-action="copy" title="复制"><i class="fa fa-copy"></i></a>
        <a class="btn btn-default" href="javascript:void(0);" onclick="return false;" data-action="paste" title="粘贴"><i class="fa fa-paste"></i></a>
        <a class="btn btn-default" href="javascript:void(0);" onclick="return false;" data-action="remove" title="删除"><i class="fa fa-trash-o"></i></a>
    </div></div><div class="part_editor panel panel-default">
    <div class="panel-heading form-inline">
        <span class="text-muted">类型:</span>
        <label class="radio-inline">
            <input type="radio" name="type" value="radio" data-ns="config">单选        </label>
        <label class="radio-inline">
            <input type="radio" name="type" value="checkbox" data-ns="config">多选        </label>
        <label class="radio-inline">
            <input type="radio" name="type" value="select" data-ns="config">下拉菜单        </label>
        <label class="radio-inline">
            <input type="radio" name="type" value="score" data-ns="config">打分        </label>
        <span class="status">
            <label class="checkbox-inline">
                <input type="checkbox" name="required" data-ns="config">必填            </label>
            <label class="checkbox-inline">
                <input type="checkbox" name="intro" data-role="trigger" data-toggle="ckeditor">说明（可插图片）            </label>
        </span>
        <div class="buttons pull-right">
            <button class="btn btn-link" type="button" name="cancel">放弃</button>
            <button class="btn btn-primary" type="button" name="ok">确定</button>
        </div>
    </div>
    <div class="panel-heading form-inline">
        <span class="text-muted">规则:</span>
        <span style="display: none;" data-role="container" data-name="limit">
            至少选择<input class="form-control input-sm text-center limit" type="number" min="0" max="99" name="least" data-ns="config">项            最多选择<input class="form-control input-sm text-center limit" type="number" min="0" max="99" name="most" data-ns="config">项        </span>

        <span style="display: inline;" data-role="container" data-name="column">
            每行显示<select class="form-control input-sm limit" name="column" data-ns="config"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option></select>列        </span>

        <label class="checkbox-inline">
            <input type="checkbox" name="shuffle" data-ns="config">选项随机排列        </label>
        <span style="display: none;" data-role="container" data-name="fix_last">
            <label class="checkbox-inline">
                <input type="checkbox" name="fix_last" data-ns="config">最后一项不随机            </label>
        </span>
    </div>
    <div class="panel-body subject-input">
        <input class="form-control input-lg" type="text" name="subject" autofocus="autofocus" placeholder="请输入问题标题" maxlength="512">
        <div data-role="ckeditor" data-name="intro" style="display:none;"><textarea name="intro"></textarea></div>
    </div>
    <div class="panel-body" data-role="container" data-name="options">
        <button class="btn btn-link">批量添加选项</button>
    <ul class="list-group ui-sortable"><li class="list-group-item option">
    <div class="form-inline">
        <i class="fa fa-fw fa-arrows" data-role="handle"></i>
        <input class="form-control input-sm" type="text" name="label" size="50" maxlength="512" autofocus="autofocus">
        <button class="btn btn-xs btn-success" type="button" name="add" title="添加选项"><i class="fa fa-plus"></i></button>
        <button class="btn btn-xs btn-danger" type="button" name="remove" title="删除选项"><i class="fa fa-minus"></i></button>
        <button class="btn btn-xs btn-default" type="button" name="picture"><i class="fa fa-picture-o"></i></button>
        <span style="display: none;" data-role="container" data-name="score">
            <input class="form-control input-sm text-center limit" type="number" min="0" max="999" name="score" value="0" data-ns="config">分            <label class="checkbox-inline"><input type="checkbox" name="without_score">不计分</label>
        </span>
        <label class="checkbox-inline"><input type="checkbox" name="specify" data-ns="config">允许填空</label>
        <label class="checkbox-inline" style="display:none;"><input type="checkbox" name="specify_required" data-ns="config">必填</label>
        <span style="display: none;" data-role="container" data-name="exclusive">
            <label class="checkbox-inline"><input type="checkbox" name="exclusive" data-ns="config">与其他选项互斥</label>
        </span>
        <input type="hidden" name="url">
    </div>
</li><li class="list-group-item option">
    <div class="form-inline">
        <i class="fa fa-fw fa-arrows" data-role="handle"></i>
        <input class="form-control input-sm" type="text" name="label" size="50" maxlength="512" autofocus="autofocus">
        <button class="btn btn-xs btn-success" type="button" name="add" title="添加选项"><i class="fa fa-plus"></i></button>
        <button class="btn btn-xs btn-danger" type="button" name="remove" title="删除选项"><i class="fa fa-minus"></i></button>
        <button class="btn btn-xs btn-default" type="button" name="picture"><i class="fa fa-picture-o"></i></button>
        <span style="display: none;" data-role="container" data-name="score">
            <input class="form-control input-sm text-center limit" type="number" min="0" max="999" name="score" value="0" data-ns="config">分            <label class="checkbox-inline"><input type="checkbox" name="without_score">不计分</label>
        </span>
        <label class="checkbox-inline"><input type="checkbox" name="specify" data-ns="config">允许填空</label>
        <label class="checkbox-inline" style="display:none;"><input type="checkbox" name="specify_required" data-ns="config">必填</label>
        <span style="display: none;" data-role="container" data-name="exclusive">
            <label class="checkbox-inline"><input type="checkbox" name="exclusive" data-ns="config">与其他选项互斥</label>
        </span>
        <input type="hidden" name="url">
    </div>
</li><li class="list-group-item option">
    <div class="form-inline">
        <i class="fa fa-fw fa-arrows" data-role="handle"></i>
        <input class="form-control input-sm" type="text" name="label" size="50" maxlength="512" autofocus="autofocus">
        <button class="btn btn-xs btn-success" type="button" name="add" title="添加选项"><i class="fa fa-plus"></i></button>
        <button class="btn btn-xs btn-danger" type="button" name="remove" title="删除选项"><i class="fa fa-minus"></i></button>
        <button class="btn btn-xs btn-default" type="button" name="picture"><i class="fa fa-picture-o"></i></button>
        <span style="display: none;" data-role="container" data-name="score">
            <input class="form-control input-sm text-center limit" type="number" min="0" max="999" name="score" value="0" data-ns="config">分            <label class="checkbox-inline"><input type="checkbox" name="without_score">不计分</label>
        </span>
        <label class="checkbox-inline"><input type="checkbox" name="specify" data-ns="config">允许填空</label>
        <label class="checkbox-inline" style="display:none;"><input type="checkbox" name="specify_required" data-ns="config">必填</label>
        <span style="display: none;" data-role="container" data-name="exclusive">
            <label class="checkbox-inline"><input type="checkbox" name="exclusive" data-ns="config">与其他选项互斥</label>
        </span>
        <input type="hidden" name="url">
    </div>
</li><li class="list-group-item option">
    <div class="form-inline">
        <i class="fa fa-fw fa-arrows" data-role="handle"></i>
        <input class="form-control input-sm" type="text" name="label" size="50" maxlength="512" autofocus="autofocus">
        <button class="btn btn-xs btn-success" type="button" name="add" title="添加选项"><i class="fa fa-plus"></i></button>
        <button class="btn btn-xs btn-danger" type="button" name="remove" title="删除选项"><i class="fa fa-minus"></i></button>
        <button class="btn btn-xs btn-default" type="button" name="picture"><i class="fa fa-picture-o"></i></button>
        <span style="display: none;" data-role="container" data-name="score">
            <input class="form-control input-sm text-center limit" type="number" min="0" max="999" name="score" value="0" data-ns="config">分            <label class="checkbox-inline"><input type="checkbox" name="without_score">不计分</label>
        </span>
        <label class="checkbox-inline"><input type="checkbox" name="specify" data-ns="config">允许填空</label>
        <label class="checkbox-inline" style="display:none;"><input type="checkbox" name="specify_required" data-ns="config">必填</label>
        <span style="display: none;" data-role="container" data-name="exclusive">
            <label class="checkbox-inline"><input type="checkbox" name="exclusive" data-ns="config">与其他选项互斥</label>
        </span>
        <input type="hidden" name="url">
    </div>
</li><li class="list-group-item option">
    <div class="form-inline">
        <i class="fa fa-fw fa-arrows" data-role="handle"></i>
        <input class="form-control input-sm" type="text" name="label" size="50" maxlength="512" autofocus="autofocus">
        <button class="btn btn-xs btn-success" type="button" name="add" title="添加选项"><i class="fa fa-plus"></i></button>
        <button class="btn btn-xs btn-danger" type="button" name="remove" title="删除选项"><i class="fa fa-minus"></i></button>
        <button class="btn btn-xs btn-default" type="button" name="picture"><i class="fa fa-picture-o"></i></button>
        <span style="display: none;" data-role="container" data-name="score">
            <input class="form-control input-sm text-center limit" type="number" min="0" max="999" name="score" value="0" data-ns="config">分            <label class="checkbox-inline"><input type="checkbox" name="without_score">不计分</label>
        </span>
        <label class="checkbox-inline"><input type="checkbox" name="specify" data-ns="config">允许填空</label>
        <label class="checkbox-inline" style="display:none;"><input type="checkbox" name="specify_required" data-ns="config">必填</label>
        <span style="display: none;" data-role="container" data-name="exclusive">
            <label class="checkbox-inline"><input type="checkbox" name="exclusive" data-ns="config">与其他选项互斥</label>
        </span>
        <input type="hidden" name="url">
    </div>
</li></ul></div>
</div></div></div>
            </div>
  <div class="am-tabs am-margin" data-am-tabs>
    <ul class="am-tabs-nav am-nav am-nav-tabs">
      <li class="am-active"><a href="#tab1">基本信息</a></li>
    </ul>

    <div class="am-tabs-bd">
      <div class="am-tab-panel am-fade am-in am-active" id="tab1">
        <form class="am-form" action="/question/update" id="my_form" method="post">
		<input type="hidden" value="<?php echo $question['id']?>" name="id" />
		<input type="hidden" value="<?php echo $question['type']?>" name="type" id="type"/>
		 <input type="hidden" value="<?php echo $pid?>" name="pid" />
		<input type="hidden" value="" name="option_list" id="option_list" />
                <div class="am-g am-margin-top">
            <div class="am-u-sm-2 am-text-right">
              题目名称
            </div>
            <div class="am-u-sm-4" style="float:left">
              <input type="text" name ="question" class="am-input-sm" value="<?php echo $question['question']?>" >
            </div>
          </div>
		<div class="am-g am-margin-top">
            	<div class="am-u-sm-2 am-text-right">
             	 默认值
            	</div>
            	<div class="am-u-sm-4" style="float:left">
              	<input type="text" name ="default" class="am-input-sm" value="<?php echo $question['default']?>" >
            	</div>
          	</div>
	<div class="am-g am-margin-top">
          <div class="am-u-sm-2 am-text-right">题目类型</div>
          <div class="am-u-sm-10">
            <div class="am-btn-group" data-am-button="">
              <label class="am-btn am-btn-default am-btn-xs am-active" id="type1" onclick="change(1);">
                <input type="radio" name="options"  value="1"> 填空题
              </label>
              <label class="am-btn am-btn-default am-btn-xs" id="type2" onclick="change(2);">
                <input type="radio" name="options"  value="2"> 选择题
              </label>
		 <label class="am-btn am-btn-default am-btn-xs" id="type3" onclick="change(3);">
                <input type="radio" name="options"  value="3"> 多选题
              </label>
		 <label class="am-btn am-btn-default am-btn-xs" id="type4" onclick="change(4);">
                <input type="radio" name="options"  value="4"> 位置题
              </label>

            </div>
          </div>
        </div>
	
	<div  id="tab3" stype="display:none">
        <form class="am-form">
	<div id ="tab4">
        <?php foreach ($question['option_list'] as $item):?>

          <div class="am-g am-margin-top-sm" id="option<?php echo $item['number']?>">
            <div class="am-u-sm-2 am-text-right">
                <?php echo $item['number']?>
            </div>
            <div class="am-u-sm-4 am-u-end">
              <input type="text" class="am-input-sm" name="content" rel ="<?php echo $item['number']?>" value="<?php echo $item['content']?>">
            </div>
                <div class="am-u-sm-6"><button class="am-btn am-btn-default am-btn-xs am-text-danger" type="button" onclick="myremove(<?php echo $item['number']?>);"><span class="am-icon-trash-o"></span> 删除</button></div>
          </div>
        <?php endforeach;?>
	</div>
	<div> <form class="am-form">
        <div class="am-g am-margin-top-sm">
            <div class="am-u-sm-2 am-text-right">
              选项编号
            </div>
            <div class="am-u-sm-4 am-u-end">
              <input type="text" class="am-input-sm" id="number">
            </div>
          </div>

          <div class="am-g am-margin-top-sm">
            <div class="am-u-sm-2 am-text-right">
              选项内容
            </div>
            <div class="am-u-sm-4 am-u-end">
              <input type="text" class="am-input-sm" id="content">
            </div>
          </div>
        </form>
      </div>


</form>
      </div>


  </div>

  <div class="am-margin">
    <button type="button" class="am-btn am-btn-primary am-btn-xs" onclick="submit();">提交保存</button>
    <button type="button" class="am-btn am-btn-primary am-btn-xs" onclick="location.reload(false);">放弃保存</button>
    <button type="button" class="am-btn am-btn-primary am-btn-xs" onclick="add_option();">新增选项</button>
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
	var option = "";
        $("input[name='content']").each(function(){
                var content = $(this).val();
                var num = $(this).attr("rel");
                option = option + num +":" +content +";";
        });
        $("#option_list").val(option);
	$("#my_form").submit();
}
 var type = "<?php echo $question['type']?>";
$(function(){
	if(type == 2 || type ==3){
                $("#tab3").show();
        }else{
                $("#tab3").hide();
        }
	$("#type"+type).click();
});
function change(i){
        $("#type").val(i);
	type = i;
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
	 var str = '<div class="am-g am-margin-top-sm" id="option'+num+'"><div class="am-u-sm-2 am-text-right">'+num+'</div> <div class="am-u-sm-4 am-u-end"><input type="text"class="am-input-sm" name="content" rel = "'+num+'" value="'+content+'"></div><div class="am-u-sm-6"><button class="am-btn am-btn-default am-btn-xs am-text-danger" type="button" onclick="myremove('+num+');"><span class="am-icon-trash-o"></span> 删除</button></div> </div>';
        $("#tab4").append(str);
}
function myremove(num){
        $("#option"+num).remove();
}
</script>
</html>
