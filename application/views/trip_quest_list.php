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
   <link rel="stylesheet" href="../../assets/css/screen.css">
</head>
<body class="g_wrapper g_wrapper_full page_edit g_survey" style="font-weight:400;line-height:1.6;font-size:1.6rem;font-family:'Segoe UI','Lucida Grande',Helvetica,Arial,'Microsoft YaHei',FreeSans,Arimo,'Droid Sans','wenquanyi micro hei','Hiragino Sans GB','Hiragino Sans GB W3',FontAwesome,sans-serif;">
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

<?php include 'header.php';?>
<div class="am-cf admin-main">
<?php include 'sidebar.php';?>
  <!-- content start -->
	<div class="admin-content">
<div class="survey_options published" style="display: block;margin-top:20px;margin-bottom:-20px;margin-right:20px;">
		 <a id="save_message" class="btn btn_middle btn_white" style="margin-right:300px;display: none;">保存成功</a>
		<a onclick="window.location.reload();" id="preview_survey" class="btn btn_middle btn_white">撤销</a>
                <a onclick="submit();" id="publish_survey" class="btn btn_middle btn_blue btn_start"><i></i>保存修改</a>
            </div>
<div class="survey_wrap">
		<div class="survey_title" style="margin-top:-50px;">

                            <div class="inner">

                                <h1 class="title_content cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" contenteditable="false" tabindex="0" spellcheck="false" role="textbox" aria-label="false" aria-describedby="cke_34" style="position: relative;">出行链配置信息</h1>

                            </div>

                        </div>
  <div class="am-tabs am-margin" data-am-tabs>

    <div class="am-tabs-bd">
      <div class="am-tab-panel am-fade am-in am-active" id="tab1">
        <form class="am-form" action="/question/update_trip" id="my_form" method="post">
		<input type="hidden" value="<?php echo $id?>" name="pid" />
		<input type="hidden" value="" name="option1_list" id="option1_list" />
		<input type="hidden" value="" name="option2_list" id="option2_list" />
		<input type="hidden" value="" name="option3_list" id="option3_list" />
		<input type="hidden" value="" name="status" id="status" />
	<div class="am-g am-margin-top">
          <div class="am-u-sm-2 am-text-right"> 轨道交通模块</div>
          <div class="am-u-sm-10">
            <div class="am-btn-group" data-am-button="">
              <label class="am-btn am-btn-default am-btn-xs am-active" id="status1" onclick="change_status(1);" >
                <input type="radio" name="options"  value="1">是
              </label>
              <label class="am-btn am-btn-default am-btn-xs" id="status0" onclick="change_status(0);">
                <input type="radio" name="options"  value="2"> 否
              </label>

            </div>
          </div>
        </div>
	<div class="am-g am-margin-top" style="margin-bottom:20px;">
          <div class="am-u-sm-2 am-text-right"> 选项配置</div>
          <div class="am-u-sm-10">
            <div class="am-btn-group" data-am-button="">
              <label class="am-btn am-btn-default am-btn-xs am-active"  onclick="change(1);">
                <input type="radio" name="options"  value="1">出行目的
              </label>
              <label class="am-btn am-btn-default am-btn-xs"  onclick="change(2);">
                <input type="radio" name="options"  value="2"> 用地性质
              </label>
		 <label class="am-btn am-btn-default am-btn-xs"  onclick="change(3);">
                <input type="radio" name="options"  value="2"> 出行交通工具
              </label>	
		 <label class="am-btn am-btn-default am-btn-xs"  onclick="change(4);">
                <input type="radio" name="options"  value="2"> 轨道交通信息
              </label>
            </div>
          </div>
        </div>
	<div  id="tab3" style="display:none">
        <form class="am-form"><div id="type1">
		<div class="editor_question"><div class="inner radio">
		<div class="row editor_options"><ul id="options_list1" class="options_list"> <ul class="normal_options_list">
		<?php foreach ($options1 as $item):?>
			<li class="option_item " data-id="<?php echo $item['content']?>" data-display="" data-goto=""> <span class="handle"></span>  <input type="checkbox" disabled="">  <div class="option_input_wrap"> <div class="mod_editor inline_editor option_text cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" contenteditable="true" tabindex="0" spellcheck="false" role="textbox" aria-label="false" aria-describedby="cke_138" style="position: relative;"><?php echo $item['content']?></div> </div> <a href="javascript:;" class="btn btn_del btn_del_option" id="btn_del_option" onclick="remove_option(this)">×</a> </li>
		 <?php endforeach;?>
		</ul><li class="option_item option_create" onclick="add_option(this)"> <div class="option_input_wrap"> <span class="add_option">新建选项</span> </div> </li></ul></div></div></div>
	</div>
	</form>
      </div>
	<div  id="tab4" style="display:none">
        <form class="am-form"><div id="type2">
	<div class="editor_question"><div class="inner radio">
                <div class="row editor_options"><ul id="options_list2" class="options_list"> <ul class="normal_options_list">
        <?php foreach ($options2 as $item):?>
		 <li class="option_item " data-id="<?php echo $item['content']?>" data-display="" data-goto=""> <span class="handle"></span>  <input type="checkbox" disabled="">  <div class="option_input_wrap"> <div class="mod_editor inline_editor option_text cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" contenteditable="true" tabindex="0" spellcheck="false" role="textbox" aria-label="false" aria-describedby="cke_138" style="position: relative;"><?php echo $item['content']?></div> </div> <a href="javascript:;" class="btn btn_del btn_del_option" id="btn_del_option" onclick="remove_option(this)">×</a> </li>

        <?php endforeach;?>
	</ul><li class="option_item option_create" onclick="add_option(this)"> <div class="option_input_wrap"> <span class="add_option">新建选项</span> </div> </li></ul></div></div></div>
	</div>
        </form>
      </div>
<div  id="tab5" stype="display:none">
        <form class="am-form"><div id="type3">
	<div class="editor_question"><div class="inner radio">
                <div class="row editor_options"><ul id="options_list3" class="options_list"> <ul class="normal_options_list">
        <?php foreach ($options3 as $item):?>
		 <li class="option_item " data-id="<?php echo $item['content']?>" data-display="" data-goto=""> <span class="handle"></span>  <input type="checkbox" disabled="">  <div class="option_input_wrap"> <div class="mod_editor inline_editor option_text cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" contenteditable="true" tabindex="0" spellcheck="false" role="textbox" aria-label="false" aria-describedby="cke_138" style="position: relative;"><?php echo $item['content']?></div> </div> <a href="javascript:;" class="btn btn_del btn_del_option" id="btn_del_option" onclick="remove_option(this)">×</a> </li>

        <?php endforeach;?>
	</ul><li class="option_item option_create" onclick="add_option(this)"> <div class="option_input_wrap"> <span class="add_option">新建选项</span> </div> </li></ul></div></div></div>
	</div>
        </form>
      </div>
<div  id="tab6" style="display:none">
        <form class="am-form" id="tran_option_list">
	<?php $num = 0; foreach ($subtrain_list as $item):$num++?>
	<?php if($num == 1){?>
		<div id="train<?php echo $item['id']?>" class="trains" style="display:block">
	<?php }else{?>
		<div id="train<?php echo $item['id']?>" class="trains" style="display:none">
	<?php }?>
        <div class="editor_question"><div class="inner radio" data-id="<?php echo $item['id']?>">
		<div class="row editor_title" style="margin-top:20px;margin-left:57px"> <label class="row_title">地铁名称</label> <div class="row_content"> <div placeholder="地铁名称" contenteditable="true" class="question_title mod_editor inline_editor cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="false" aria-describedby="cke_448" style="position: relative;"><?php echo $item['name']?></div></div> </div>
                <div class="row editor_options"><ul id="options_list4" class="options_list"> <ul class="normal_options_list">
        <?php foreach ($item['list'] as $train):?>
                 <li class="option_item " data-id="<?php echo $train['id']?>" data-display="" data-goto=""> <span class="handle"></span>  <input type="checkbox" disabled="">  <div class="option_input_wrap"> <div class="mod_editor inline_editor option_text cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" contenteditable="true" tabindex="0" spellcheck="false" role="textbox" aria-label="false" aria-describedby="cke_138" style="position: relative;"><?php echo $train['name']?></div> </div> <a href="javascript:;" class="btn btn_del btn_del_option" id="btn_del_option" onclick="remove_option(this)">×</a> </li>

        <?php endforeach;?>
        </ul><li class="option_item option_create" onclick="add_option(this)"> <div class="option_input_wrap"> <span class="add_option">新建选项</span> </div> </li></ul></div>
	<div class="row editor_control"> <a href="javascript:;" id="editor_confirm_btn" class="btn btn_small btn_blue btn_confirm" onclick="update(this)">确定</a> <a href="javascript:;" id="editor_cancel_btn" class="btn btn_small btn_white btn_cancel" onclick="cancel()">取消</a> </div></div></div>
        </div>
	 <?php endforeach;?>
        </form>
      </div>
                <div id="add_train" style="display:none">
                        <div class="editor_question"><div class="inner radio">
                        <div class="row editor_title" style="margin-top:20px;margin-left:57px"> <label class="row_title">地铁名称</label> <div class="row_content"> <div placeholder="地铁名称" contenteditable="true" class="question_title mod_editor inline_editor cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="false" aria-describedby="cke_448" style="position: relative;" id="train_name"></div> </div> </div>
                        <div class="row editor_options"><ul id="options_list5" class="options_list"> <ul class="normal_options_list">
                        </ul><li class="option_item option_create" onclick="add_option(this)"> <div class="option_input_wrap"> <span class="add_option">新建站点</span> </div>
 </li></ul></div>
                        <div class="row editor_control"> <a href="javascript:;" id="editor_confirm_btn" class="btn btn_small btn_blue btn_confirm" onclick="save()">确定</a> <a href="javascript:;" id="editor_cancel_btn" class="btn btn_small btn_white btn_cancel" onclick="cancel()">取消</a> </div>
                        </div></div>
                </div>
<!--
<div  id="tab7" style="display:none">
	<form class="am-form">
		<div id="add_train">
			<div class="editor_question"><div class="inner radio">
			<div class="row editor_title" style="margin-top:20px;margin-left:57px"> <label class="row_title">站点名称</label> <div class="row_content"> <div placeholder="站点名称" contenteditable="true" class="question_title mod_editor inline_editor cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="false" aria-describedby="cke_448" style="position: relative;" id="train_name"></div> </div> </div>
			<div class="row editor_options"><ul id="options_list5" class="options_list"> <ul class="normal_options_list">
			</ul><li class="option_item option_create" onclick="add_option(this)"> <div class="option_input_wrap"> <span class="add_option">新建选项</span> </div> </li></ul></div>
			<div class="row editor_control"> <a href="javascript:;" id="editor_confirm_btn" class="btn btn_small btn_blue btn_confirm" onclick="save()">确定</a> <a href="javascript:;" id="editor_cancel_btn" class="btn btn_small btn_white btn_cancel" onclick="cancel()">取消</a> </div>
			</div></div>
		</div>
	</form>
</div>
-->
 <div class="am-cf" id="train_page" style="display:none">
  <div class="am-fr">
    <ul class="am-pagination" id="train_list">
	<li class="subtrain"><a style="cursor:pointer" onclick="add_trip(this);">新增地铁</a></li>
      <li id="start_list" class="am-disabled"><a href="#">«</a></li>
	<?php $num = 0; foreach ($subtrain_list as $item):$num++?>
	<?php if($num == 1){?>
      <li class="subtrain am-active" id="subtrain_<?php echo $item['id']?>"><a style="cursor:pointer" onclick="change_train(<?php echo $item['id']?>,this)" ondblclick="delete_item(<?php echo $item['id']?>)"><?php echo $item['name']?></a></li>
	<?php }else{?>
	<li class="subtrain" id="subtrain_<?php echo $item['id']?>"><a style="cursor:pointer" onclick="change_train(<?php echo $item['id']?>,this)" ondblclick="delete_item(<?php echo $item['id']?>)"><?php echo $item['name']?></a></li>
	<?php }?>
	<?php endforeach;?>
      <li id="end_list"><a href="#">»</a></li>
    </ul>
  </div>
</div>
</form>
      </div>


  </div>
<!--
  <div class="am-margin">
    <button type="button" class="am-btn am-btn-primary am-btn-xs" onclick="submit();">提交保存</button>
    <button type="button" class="am-btn am-btn-primary am-btn-xs" onclick="location.reload(false);">放弃保存</button>
    <button type="button" class="am-btn am-btn-primary am-btn-xs" onclick="add_option();">新增选项</button>
  </div>
-->
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
<script src="../../assets/js/survey.js"></script>
<!--<![endif]-->
</body>
<script type="text/javascript">
var type =1;
function submit(){
	var option1 = "";
	var option2 = "";
	var option3 = "";
	var num1 = num2 = num3 = 1;
        $("#options_list1").find(".mod_editor").each(function(){
                var content = $(this).html();
                option1 = option1 + num1 +":" +content +";";
		num1++;
        });
	$("#options_list2").find(".mod_editor").each(function(){
		var content = $(this).html();
                option2 = option2 + num2 +":" +content +";";
                num2++;
        });
	$("#options_list3").find(".mod_editor").each(function(){
		var content = $(this).html();
                option3 = option3 + num3 +":" +content +";";
                num3++;
        });
        $("#option1_list").val(option1);
	$("#option2_list").val(option2);
	$("#option3_list").val(option3);
	$("#my_form").submit();
}
function add_trip(e){
//	$("#tab6").hide();
	$(".trains").hide();
	 $(".subtrain").removeClass("am-active");
        var $v=$(e)
        $v.parent().addClass("am-active");
	$("#add_train").show();
}
$(function(){
	var status = "<?php echo $status?>";
	$("#status"+status).click();
	$("#tab3").show();
                $("#tab4").hide();
                $("#tab5").hide();
});
function change_status(i){
	$("#status").val(i);
}
function change(i){
        $("#type").val(i);
	type = i;
        if(i == 1){
                $("#tab3").show();
		$("#tab4").hide();
		$("#tab5").hide();
		$("#tab6").hide();
		$("#train_page").hide();
        }else if(i == 2){
                $("#tab3").hide();
		$("#tab4").show();
		$("#tab5").hide();
		$("#tab6").hide();
		$("#train_page").hide();
        }else if(i==3){
		$("#tab3").hide();
                $("#tab4").hide();
                $("#tab5").show();
		$("#tab6").hide();
		$("#train_page").hide();
	}else{
		$("#tab3").hide();
                $("#tab4").hide();
                $("#tab5").hide();
		$("#tab6").show();
		$("#train_page").show();
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
        if(type == 1){
		var str = '<div class="am-g am-margin-top-sm" id="option'+num+'"><div class="am-u-sm-2 am-text-right">'+num+'</div> <div class="am-u-sm-4 am-u-end"><input type="text"class="am-input-sm" name="content1" rel = "'+num+'" value="'+content+'"></div><div class="am-u-sm-6"><button class="am-btn am-btn-default am-btn-xs am-text-danger" type="button" onclick="myremove('+num+');"><span class="am-icon-trash-o"></span> 删除</button></div> </div>';
		$("#type1").append(str);
	}else if(type == 2){
		var str = '<div class="am-g am-margin-top-sm" id="option'+num+'"><div class="am-u-sm-2 am-text-right">'+num+'</div> <div class="am-u-sm-4 am-u-end"><input type="text"class="am-input-sm" name="content2" rel = "'+num+'" value="'+content+'"></div><div class="am-u-sm-6"><button class="am-btn am-btn-default am-btn-xs am-text-danger" type="button" onclick="myremove('+num+');"><span class="am-icon-trash-o"></span> 删除</button></div> </div>';
		$("#type2").append(str);
	}else if(type == 3){
		var str = '<div class="am-g am-margin-top-sm" id="option'+num+'"><div class="am-u-sm-2 am-text-right">'+num+'</div> <div class="am-u-sm-4 am-u-end"><input type="text"class="am-input-sm" name="content3" rel = "'+num+'" value="'+content+'"></div><div class="am-u-sm-6"><button class="am-btn am-btn-default am-btn-xs am-text-danger" type="button" onclick="myremove('+num+');"><span class="am-icon-trash-o"></span> 删除</button></div> </div>';
		$("#type3").append(str);
	}
}
function myremove(type,num){
        $("#"+type+"option"+num).remove();
}
function add_option(e){
        var $obj = $(e);
        $obj.prev().append('<li class="option_item " data-id="o-100-ABCD" data-display="" data-goto=""> <span class="handle"></span>  <input type="checkbox" disabled="">  <div class="option_input_wrap"> <div class="mod_editor inline_editor option_text cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" contenteditable="true" tabindex="0" spellcheck="false" role="textbox" aria-label="false" aria-describedby="cke_138" style="position: relative;"></div> </div> <a href="javascript:;" class="btn btn_del btn_del_option" id="btn_del_option" onclick="remove_option(this)">×</a> </li>');
}
function delete_item(id){
	if(!confirm("确定要删除吗？")){
		return;
	}
	$.ajax({
                type: 'POST',
                url: "/subtrain/delete",
                data: {id:id},
                dataType: 'json',
                success: function(result){
                        if(result['result']){
				$("#subtrain_"+result.id).remove();
				$(".subtrain").last().find('a').click();
                        }
                },
                error: function(){
                        alert('Error loading PHP document');

                }
        });
}
function update(e){
	var $obj = $(e);
	var pid = <?php echo $id?>;
	var id= $obj.parent().parent().attr('data-id');
	var name = $obj.parent().parent().find('.mod_editor').html();
	var station_list = "";
	 $("#options_list4").find(".mod_editor").each(function(){
                var content = $(this).html();
		station_list = station_list +content +";";
        });
	$.ajax({
                type: 'POST',
                url: "/subtrain/update",
                data: {pid:pid,id:id,station_list:station_list,name:name,ajax:1},
                dataType: 'json',
                success: function(result){
                        if(result['result']){
                                $("#save_message").html('保存成功');
                                $("#save_message").show();
				alert('保存成功');
			}
                        else{
                                $("#save_message").html('保存失败');
                                $("#save_message").show();
				alert('保存失败');
                        }
                        setTimeout(function(){$("#save_message").hide();},2000);
                },
                error: function(){
                        alert('Error loading PHP document');

                }
        });
}
function save(){
	var pid = <?php echo $id?>;
	var name = $("#train_name").html();
	var station_list = "";
	 $("#options_list5").find(".mod_editor").each(function(){
                var content = $(this).html();
		station_list = station_list +content +";";
        });
	
	$.ajax({
                type: 'POST',
                url: "/subtrain/add_ajax",
                data: {pid:pid,station_list:station_list,name:name},
                dataType: 'json',
                success: function(result){
                        if(result['result']){
				alert('保存成功');
                                $("#save_message").html('保存成功');
                                $("#save_message").show();
				$("#end_list").before('<li class="subtrain"><a style="cursor:pointer" onclick="change_train('+result.subtrain.id+',this)">'+result.subtrain.name+'</a></li>');

				var str = '<div id="train'+result.subtrain.id+'" class="trains" style="display:none"><div class="editor_question"><div class="inner radio" data-id="'+result.subtrain.id+'"> <div class="row editor_title" style="margin-top:20px;margin-left:57px"> <label class="row_title">地铁名称</label> <div class="row_content"> <div placeholder="地铁名称" contenteditable="true" class="question_title mod_editor inline_editor cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="false" aria-describedby="cke_448" style="position: relative;">'+result.subtrain.name+'</div></div> </div><div class="row editor_options"><ul id="options_list4" class="options_list"> <ul class="normal_options_list">';
		for(var i = 0; i<result.subtrain_list.length;i++) {
				str = str + '<li class="option_item " data-id="'+result.subtrain_list[i].id+'" data-display="" data-goto=""> <span class="handle"></span>  <input type="checkbox" disabled=""><div class="option_input_wrap"> <div class="mod_editor inline_editor option_text cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" contenteditable="true" tabindex="0" spellcheck="false" role="textbox" aria-label="false" aria-describedby="cke_138" style="position: relative;">'+result.subtrain_list[i].name+'</div> </div> <a href="javascript:;" class="btn btn_del btn_del_option" id="btn_del_option" onclick="remove_option(this)">×</a> </li>';
		}
				str = str +'</ul><li class="option_item option_create" onclick="add_option(this)"> <div class="option_input_wrap"> <span class="add_option">新建选项</span> </div> </li></ul></div></div></div><div class="row editor_control"> <a href="javascript:;" id="editor_confirm_btn" class="btn btn_small btn_blue btn_confirm" onclick="save()">确定</a> <a href="javascript:;" id="editor_cancel_btn" class="btn btn_small btn_white btn_cancel" onclick="cancel()">取消</a> </div></div>';
			$("#tran_option_list").append(str);
                        }
                        else{
				alert('保存失败');
                                $("#save_message").html('保存失败');
                                $("#save_message").show();
                        }
                        setTimeout(function(){$("#save_message").hide();},2000);
                },
                error: function(){
                        alert('Error loading PHP document');

                }
        });

}
function change_train(id,e){
	$(".subtrain").removeClass("am-active");
	var $v=$(e)
	$v.parent().addClass("am-active");
	$(".trains").hide();
	$("#add_train").hide();
	$("#train"+id).show();
}
function cancel(){
	window.location.reload();
}
</script>
</html>
