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
<link rel="stylesheet" href="../../assets/css/editor.css">
<link rel="stylesheet" href="../../assets/css/jquery.gridly.css">
</head>
<body class="g_wrapper g_wrapper_full page_edit g_survey" style="font-weight:400;line-height:1.6;font-size:1.6rem;font-family:'Segoe UI','Lucida Grande',Helvetica,Arial,'Microsoft YaHei',FreeSans,Arimo,'Droid Sans','wenquanyi micro hei','Hiragino Sans GB','Hiragino Sans GB W3',FontAwesome,sans-serif;">
<style type="text/css">
  .gridly {
    position: relative;
    width: 100%;
  }
  .brick.small {
    width: 100%;
    height: 140px;
  }
  .brick.large {
    width: 100%;
    height: 300px;
  }
</style>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

<?php include 'header.php';?>
<div class="am-cf admin-main">
<?php include 'sidebar.php';?>
  <!-- content start -->
<!-- content start -->
  <div class="admin-content">
<div class="survey_options published" style="display: block;margin-top:20px;margin-bottom:-20px;margin-right:20px;">
		 <a id="save_message" class="btn btn_middle btn_white"style="margin-right:300px;display: none;">保存成功</a>
		<a onclick="window.location.reload();" id="preview_survey" class="btn btn_middle btn_white">撤销</a>
                <a onclick="save_survey();" id="publish_survey" class="btn btn_middle btn_blue btn_start"><i></i>保存修改</a>
            </div>
<div class="survey_wrap">
	<div class="survey_title" style="margin-top:-50px;">

                            <div class="inner">

                                <h1 class="title_content cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" contenteditable="true" tabindex="0" spellcheck="false" role="textbox" aria-label="false" aria-describedby="cke_34" style="position: relative;">杭州市居民出行调查问卷</h1>

                            </div>

                        </div>

	<ul class="am-avg-sm-1 am-avg-md-4 am-margin am-padding am-text-center admin-content-list " style="margin-top:10px;">
				       <li onclick = "add_question(2);" style="cursor:pointer;height:38px;line-height:38px;border:1px solid #e0e0e0;background-color:#fff;margin-bottom:3px"><i style=" display:inline-block;*display:inline;*zoom:1;vertical-align:middle;margin:0 10px;background-image:url(../../assets/image/sprites_ico_2x.png);background-size:241px 232px;background-position:-224px -17px;width:17px;height:16px; line-height:38px;"></i>单选题</li>
		<li onclick = "add_question(3);"style="cursor:pointer;height:38px;line-height:38px;border:1px solid #e0e0e0;background-color:#fff;margin-bottom:3px"><i style=" display:inline-block;*display:inline;*zoom:1;vertical-align:middle;margin:0 10px;background-image:url(../../assets/image/sprites_ico_2x.png);background-size:241px 232px;background-position:-224px -101px;width:16px;height:16px; line-height:38px;"></i>多选题</li>
		<li onclick = "add_question(1);" style="cursor:pointer;height:38px;line-height:38px;border:1px solid #e0e0e0;background-color:#fff;margin-bottom:3px"><i style=" display:inline-block;*display:inline;*zoom:1;vertical-align:middle;margin:0 10px;background-image:url(../../assets/image/sprites_ico_2x.png);background-size:241px 232px;background-position:-224px -149px;width:16px;height:14px; line-height:38px;"></i>填空题</li>
		<li onclick = "add_question(4);"style="cursor:pointer;height:38px;line-height:38px;border:1px solid #e0e0e0;background-color:#fff;margin-bottom:3px"><i style=" display:inline-block;*display:inline;*zoom:1;vertical-align:middle;margin:0 10px;background-image:url(../../assets/image/sprites_ico_2x.png);background-size:241px 232px;background-position:-224px -117px;width:17px;height:16px; line-height:38px;"></i>位置题</li>
    	</ul>
	<div class="survey_main">
	<div class="survey_container">
		<div class="page" data-pid="1" style="display: block;">
		<div id='module_list'>
			<?php $num  =0; foreach ($list as $item): $num++;?>
				<div class='modules'>
				<?php if ($item['type'] == 1 || $item['type'] == 4){?>
				<div class="question question_text required" data-type="text" id="question_<?php echo $item['id']?>" data-id="<?php echo $item['id']?>"> <div class="inner"> <div class="title"> <span class="title_index"><span class="question_index" data-for="<?php echo $item['id']?>"><?php echo $num;?></span>. </span> <div class="title_text"> <p><?php echo $item['question']?></p></div>  <span class="required" title="必答" style="display: none;">*</span><span class="tips">  </span> </div><div class="inputs"style="margin-top:10px;"> <input class="survey_form_input" type="text" size="" maxlength="" id="text_<?php echo $item['id']?>" name="answer_<?php echo $item['id']?>" value="<?php echo $item['default']?>" placeholder="默认值"> </div> </div> <ul class="control"> <li><b title="编辑" class="edit" onclick="edit(<?php echo $item['id']?>);"><i></i></b></li> <li><b title="复制" class="copy"><i></i></b></li> <li><b title="删除" class="delete" onclick="delete_item(<?php echo $item['id']?>);"><i></i></b></li>  </ul></div>
				<?php }else if( $item['type'] == 2){?>
				<div class="question question_radio required" id="question_<?php echo $item['id']?>" data-type="radio" data-id="<?php echo $item['id']?>" style="display: block;"> <div class="inner"> <div class="title"> <span class="title_index"> <span class="question_index" data-for="<?php echo $item['id']?>"><?php echo $num;?></span>. </span> <div class="title_text"> <p><?php echo $item['question']?></p>
 </div>  <span class="required" title="必答" style="display: none;">*</span>  <span class="tips">  </span> </div>  <div class="inputs">   
				<?php foreach ($item['option_list'] as $option_list):?>
					<div class="option_item" style="width: 100%;">  <input class="survey_form_checkbox" type="radio" name="answer_<?php echo $item['id']?>" data-oid="o-100-ABCD" id="option_<?php echo $item['id']?>_o-100-ABCD" value="<p><?php echo $option_list['content']?></p>
"> <label for="option_q-39-tpPN_o-100-ABCD" style="font-weight:500"> <i class="survey_form_ui"></i> <div class="option_text"><p><?php echo $option_list['content']?></p>
</div> <div class="display_tip" data-goto="" data-display="">   </div></label>   </div>

				<?php endforeach;?>
</div> </div> <ul class="control"> <li><b title="编辑" class="edit" onclick="edit(<?php echo $item['id']?>);"><i></i></b></li> <li><b title="复制" class="copy"><i></i></b></li>  <li><b title="删除" class="delete" onclick="delete_item(<?php echo $item['id']?>);"><i></i></b></li>  </ul></div>
				<?php }else if( $item['type'] == 3){?>
					 <div class="question question_radio required" id="question_<?php echo $item['id']?>" data-type="radio" data-id="<?php echo $item['id']?>" style="display: block;"> <div class="inner"> <div class="title"> <span class="title_index"> <span class="question_index" data-for="<?php echo $item['id']?>"><?php echo $num;?></span>. </span> <div class="title_text"> <p><?php echo $item['question']?></p>
 </div>  <span class="required" title="必答" style="display: none;">*</span>  <span class="tips">  </span> </div>  <div class="inputs">
                                <?php foreach ($item['option_list'] as $option_list):?>
                                        <div class="option_item" style="width: 100%;">  <input class="survey_form_checkbox" type="checkbox" name="answer_<?php echo $item['id']?>" data-oid="o-100-ABCD" id="option_<?php echo $item['id']?>_o-100-ABCD" value="<p><?php echo $option_list['content']?></p>"> <label for="option_q-39-tpPN_o-100-ABCD" style="font-weight:500"> <i class="survey_form_ui"></i> <div class="option_text"><p><?php echo $option_list['content']?></p></div> <div class="display_tip" data-goto="" data-display="">   </div></label>   </div>

                                <?php endforeach;?>
</div> </div> <ul class="control"> <li><b title="编辑" class="edit" onclick="edit(<?php echo $item['id']?>);"><i></i></b></li> <li><b title="复制" class="copy"><i></i></b></li> <li><b title="删除" class="delete" onclick="delete_item(<?php echo $item['id']?>);"><i></i></b></li>  </ul></div>

				<?php }?>
				</div>
			<?php endforeach;?>
			</div>
		</div>
	</div>
	</div>
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
<script src="../../assets/js/jquery.gridly.js"></script>
<script src="../../assets/js/jquery-ui.min.js"></script>
<!--
<script src="../../assets/js/jquery.sortable.js"></script>
<script src="../../assets/js/jquery.sortable.min.js"></script>
-->
<script src="../../assets/js/sortable/Sortable.js"></script>
<script src="../../assets/js/sortable/Sortable.min.js"></script>
<script src="../../assets/js/survey.js"></script>
<script type="text/javascript">
 $(function() {
var el = document.getElementById('module_list');
window.x = new Sortable(el, {
				draggable: '.modules',
				handle: '.question',
				onAdd: function (evt){ console.log('onAdd.foo:', evt.item); },
				onUpdate: function (evt){ console.log('onUpdate.foo:', evt.item); },
				onRemove: function (evt){ console.log('onRemove.foo:', evt.item); },
				onStart:function(evt){ console.log('onStart.foo:',evt.item);},
				onEnd: function(evt){ 
					restore();			
				}
  });
});
var edit_flag = false;
var category_id =  "<?php echo $category_id?>";
var pid = <?php echo $id?>;
</script>
</body>
</html>
