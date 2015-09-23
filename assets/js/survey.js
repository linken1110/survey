function restore(){
        var num = 1;    
        $(".question").each(function(){
                
               $(this).find('.question_index').html(num);
                num++;
        });
}
function save_survey(){
         var question_list = "";
        $(".question").each(function(){
                var content = $(this).attr('data-id');
                question_list = question_list  +content +";";

        });
         $.ajax({
                type: 'POST',
                url: "/question/resort",
                data: {pid:pid,question_list:question_list,category_id:category_id},
                dataType: 'json',
                success: function(result){
                        if(result['result']){
                                $("#save_message").html('保存成功');
                                $("#save_message").show();
                        }                       
                        else{
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
function change_type(e){
        var type = e.options[e.options.selectedIndex].value;
        if(type == 1){
                $(".editor_adv").show();
                $(".editor_options").hide();
        }else if(type ==2 || type == 3){
                $(".editor_adv").hide();
                $(".editor_options").show();
        }
}
function cancel(id){
        $("#question_"+id).show();
        $("#question_edit_"+id).remove();
        edit_flag = false;    
}
function cancel_add(){
	$("#question_edit").remove();
	edit_flag = false;
}
function remove_option(e){
        e.parentNode.remove();
}
function add_option(e){
        var $obj = $(e);
        $obj.prev().append('<li class="option_item " data-id="o-100-ABCD" data-display="" data-goto=""> <span class="handle"></span>  <input type="checkbox" disabled="">  <div class="option_input_wrap"> <div class="mod_editor inline_editor option_text cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" contenteditable="true" tabindex="0" spellcheck="false" role="textbox" aria-label="false" aria-describedby="cke_138" style="position: relative;"></div> </div> <a href="javascript:;" class="btn btn_del btn_del_option" id="btn_del_option" onclick="remove_option(this)">×</a> </li>');
}
function save(id){
        var default_value = $("#mydefault_"+id).html();
        var question = $("#myquestion_"+id).html(); 
        var type = $("#myquestion_type_"+id).val(); 
        var option_list = "";
        var num = 1;
        var $obj = $("#question_edit_"+id);
        $obj.find('li.option_item').find('.mod_editor').each(function(){
                var content = $(this).html();
                option_list = option_list + num +":" +content +";";
                num++;
        });
        $.ajax({
                type: 'POST',
                url: "/question/update_ajax",
                data: {id:id,pid:pid,question:question,type:type,default:default_value,option_list:option_list},
                dataType: 'json',
                success: function(result){
                        window.location.reload();
                                return;
                        if(result['result']){
                                $("#question_"+result['question'].id).find('p').html(result['question'].question);
                                $("#text_"+result['question'].id).val(result['question'].default);
                        }
                        $("#question_"+result['question'].id).show();
                        $("#question_edit_"+result['question'].id).remove();
                        edit_flag = false;    
                                        
                },
                error: function(){
                        alert('Error loading PHP document');

                } 
        });     
}
function add(){
	var default_value = $("#mydefault").html();
        var question = $("#myquestion").html();
        var type = $("#myquestion_type").val();
        var option_list = "";
        var num = 1;
        var $obj = $("#question_edit");
        $obj.find('li.option_item').find('.mod_editor').each(function(){
                var content = $(this).html();
                option_list = option_list + num +":" +content +";";
                num++;
        });
	 $.ajax({
                type: 'POST',
                url: "/question/add_ajax",
                data: {pid:pid,question:question,type:type,default_value:default_value,option_list:option_list,category_id:category_id},
                dataType: 'json',
                success: function(result){
                        window.location.reload();
                                return;

                },
                error: function(){
                        alert('Error loading PHP document');

                }
        });
}
function delete_item(id){
	if(confirm("确定要删除吗？")){
	 $.ajax({
                type: 'POST',
                url: "/question/delete_question_ajax",
                data: {pid:pid,id:id},
                dataType: 'json',
                success: function(result){
			if(result['result'] ){
				$("#question_"+result['id']).parent().remove();
				restore();
			}
                },
                error: function(){
                        alert('Error loading PHP document');

                }
        });
	}
}
function edit(id){
        if(edit_flag){
                return;
        }
        $.ajax({
                type: 'POST',
                url: "/question/get_question_detail",
                data: {id:id},
                success: function(result){
                        var str ='<div class="editor_question" style="position: relative; left: 0px;" id = "question_edit_'+ result['id']+'">';
                        if(result['type'] == 1 || result['type'] == 4){
                                str = str +'<div class="inner text">';
                        }else if(result['type'] == 2){
                                str = str +'<div class="inner radio">';
                        }else if(result['type'] == 3){
                                str = str +'<div class="inner checkbox">';
                        }
                        str = str +' <div class="row editor_title" style="margin-top:20px;"> <label class="row_title">问题标题</label> <div class="row_content"> <div placeholder="问题标题" contenteditable="true" class="question_title mod_editor inline_editor cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="false" aria-describedby="cke_448" style="position: relative;"><p id="myquestion_'+result['id']+'">'+result['question']+'</p></div> </div> </div> ';
                        str = str +' <div class="row editor_title" style="margin-top:20px;"> <label class="row_title">默认值</label> <div class="row_content"> <div placeholde="问题标题" contenteditable="true" class="question_title mod_editor inline_editor cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="false" aria-describedby="cke_448" style="position: relative;"><p id="mydefault_'+result['id']+'">'+result['default']+'</p></div> </div> </div> ';
                        str = str +'<div class="row editor_type"> <label class="row_title">问题切换</label> <div class="row_content"> <select class= "select" id="myquestion_type_'+result['id']+'" onchange="change_type(this);"> <option value="2"';
                         if(result['type'] == 2){
                                str = str +'selected';  
                         }
                        str = str +'>单选题</option> <option value="3" ';
                         if(result['type'] == 3){
                                str = str +'selected';  
                         }
                        str = str + '>多选题</option> <option value="4"';
			if(result['type'] == 4){
                                str = str +'selected';  
                         }
                        str = str + '>位置题</option> <option value="1"';
                        if(result['type'] == 1){
                                str = str +'selected';  
                        }
                        str = str + '>填空题</option>  </select> <label><input name="question_required" type="checkbox" checked="">必填</label> </div> </div>';
                        if(result['type'] == 1){
                                str = str + '<div class="row editor_adv" style="display:block;">'; 
                        }else{
                                str = str + '<div class="row editor_adv" style="display:none;">'; 
                        }
                        str = str +'<label>最多填写 <input class="maxlength editor_input number_input" type="number" min="1" name="maxlength" value=""> 字 </label> <label>文>本验证 <select name="validate"> <option selected="" value="">不限</option> <option value="number">数字</option> <option value="date">日期（2014-01-01）</option> <option value="email">电子邮箱</option> <option value="chinese">中文</option> <option value="english">英文</option> <option value="url">网址</option> <option value="idCard">身份证号码</option> <option value="qq">QQ号</option> <option value="mobile">手机号码(仅支持大陆地区)</option> <option value="phone">电话号码</option> </select> </label> </div>';
                        if(result['type'] == 2 || result['type'] == 3){
                                str = str + '<div class="row editor_options">';
                        }
                        else{
                                str = str + '<div class="row editor_options" style="display:none;">';
                        }
                                str = str +'<ul id = "options_list" class="options_list"> <ul class="normal_options_list">';
                                result.option_list.forEach(function(e){  
                                        str = str + '<li class="option_item " data-id="o-100-ABCD" data-display="" data-goto=""> <span class="handle"></span>  <input type="checkbox" disabled="">  <div class="option_input_wrap"> <div class="mod_editor inline_editor option_text cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" contenteditable="true" tabindex="0" spellcheck="false" role="textbox" aria-label="false" aria-describedby="cke_138" style="position: relative;">'+e.content+'</div> </div> <a href="javascript:;" class="btn btn_del btn_del_option" id="btn_del_option" onclick="remove_option(this)">×</a> </li>';
                                })              
                                str = str + '</ul><li class="option_item option_create" onclick="add_option(this)"> <div class="option_input_wrap"> <span class="add_option">新建选项</span> </div> </li></ul></div>'; 
        
                        str = str +'<div class="row editor_control"> <a href="javascript:;" id="editor_confirm_btn" class="btn btn_small btn_blue btn_confirm" onclick="save('+id+')">确定</a> <a href="javascript:;" id="editor_cancel_btn" class="btn btn_small btn_white btn_cancel" onclick="cancel('+id+')">取消</a> </div>';
                        $("#question_"+id).after(str);
                        $("#question_"+id).hide();
                        edit_flag = true;
		 } ,
                error: function(){
                        alert('Error loading PHP document');

                }, 
                dataType: 'json'
        });
}
function add_question(type){
	if(edit_flag){
		return;
	}
	var str ='<div class="modules" draggable="false" id = "question_edit"><div class="editor_question" style="position: relative; left: 0px;">';
                        if(type == 1 || type == 4){
                                str = str +'<div class="inner text">';
                        }else if(type == 2){
                                str = str +'<div class="inner radio">';
                        }else if(type == 3){
                                str = str +'<div class="inner checkbox">';
                        }
                        str = str +' <div class="row editor_title" style="margin-top:20px;"> <label class="row_title">问题标题</label> <div class="row_content"> <div placeholder="问题标题" contenteditable="true" class="question_title mod_editor inline_editor cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="false" aria-describedby="cke_448" style="position: relative;" id = "myquestion"></div> </div> </div> ';
                        str = str +' <div class="row editor_title" style="margin-top:20px;"> <label class="row_title">默认值</label> <div class="row_content"> <div placeholde="问题标题" contenteditable="true" class="question_title mod_editor inline_editor cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="false" aria-describedby="cke_448" style="position: relative;" id = "mydefault"></div> </div> </div> ';
                        str = str +'<div class="row editor_type"> <label class="row_title">问题切换</label> <div class="row_content"> <select class= "select" id="myquestion_type" onchange="change_type(this);"> <option value="2"';
                         if(type == 2){
                                str = str +'selected';
                         }
                        str = str +'>单选题</option> <option value="3" ';
                         if(type == 3){
                                str = str +'selected';
                         }
                        str = str + '>多选题</option> <option value="4"';
                        if(type == 4){
                                str = str +'selected';
                         }
                        str = str + '>位置题</option> <option value="1"';
                        if(type == 1){
                                str = str +'selected';
                        }
                        str = str + '>填空题</option>  </select> <label><input name="question_required" type="checkbox" checked="">必填</label> </div> </div>';
                        if(type == 1){
                                str = str + '<div class="row editor_adv" style="display:block;">';
                        }else{
                                str = str + '<div class="row editor_adv" style="display:none;">';
                        }
                        str = str +'<label>最多填写 <input class="maxlength editor_input number_input" type="number" min="1" name="maxlength" value=""> 字 </label> <label>文本验证 <select name="validate"> <option selected="" value="">不限</option> <option value="number">数字</option> <option value="date">日期（2014-01-01）</option> <option value="email">电子邮箱</option> <option value="chinese">中文</option> <option value="english">英文</option> <option value="url">网址</option> <option value="idCard">身份证号码</option> <option value="qq">QQ号</option> <option value="mobile">手机号码(仅支持大陆地区)</option> <option value="phone">电话号码</option> </select> </label> </div>';
                        if(type == 2 || type == 3){
                                str = str + '<div class="row editor_options">';
                        }
                        else{
                                str = str + '<div class="row editor_options" style="display:none;">';
                        }
                                str = str +'<ul id = "options_list" class="options_list"> <ul class="normal_options_list">';
                                str = str + '</ul><li class="option_item option_create" onclick="add_option(this)"> <div class="option_input_wrap"> <span class="add_option">新建选项</span> </div> </li></ul></div>';

                        str = str +'<div class="row editor_control"> <a href="javascript:;" id="editor_confirm_btn" class="btn btn_small btn_blue btn_confirm" onclick="add()">确定</a> <a href="javascript:;" id="editor_cancel_btn" class="btn btn_small btn_white btn_cancel"onclick="cancel_add()">取消</a> </div></div>';
                        edit_flag = true;
			$("#module_list").prepend(str);
			window.location.hash = "#question_edit";
}                             
