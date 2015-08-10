<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Amaze后台管理系统模板HTML首页 - 源码之家</title>
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
                                                                                <td class="hd_ta_t"style="background:#7cb5ec" colspan="2"><strong class="am-text-primary am-te
xt-lg" style="color:white">问卷信息</span><input name="num" value="060001" type="hidden"></td>
                                                                        </tr>
               </tbody>
		<tr>
                     <td>户口登记状况<input name="itemid" value="138" type="hidden"></td>
                     <td> 
                     <select name="item_value">
                             <option selected="selected" value="1">本市户籍</option>
                             <option value="2">非本市户籍,居留6个月以上</option>
                             <option value="3">非本市户籍,居留6个月以内</option>
                      </select>
                        </td>
                </tr>
		<tr>
                     <td>年龄<input name="itemid" value="138" type="hidden"></td>
                     <td> <input name="item_value" value="">周岁</td>
		</tr>
		<tr>
                     <td>性别<input name="itemid" value="138" type="hidden"></td>
                     <td> 
                     <select name="item_value">
                             <option selected="selected" value="1">男</option>
                             <option value="2">女</option>
                      </select>
                        </td>
                </tr>
		<tr>
                     <td>文化程度<input name="itemid" value="138" type="hidden"></td>
                     <td> 
                     <select name="item_value">
                             <option selected="selected" value="1">小学以下</option>
                             <option value="2">小学</option>
			     <option value="3">初中</option>
				<option value="4">高中</option>
				<option value="5">大专</option>
				<option value="6">本科</option>
				<option value="7">研究生及以上</option>
                      </select>
                        </td>
                </tr> 
		<tr>
                     <td>公休日<input name="itemid" value="138" type="hidden"></td>
                     <td> 
                     <select name="item_value">
                             <option selected="selected" value="1">星期一</option>
                             <option value="2">星期二</option>
                             <option value="3">星期三</option>
                                <option value="4">星期四</option>
                                <option value="5">星期五</option>
                                <option value="6">星期六</option>
                                <option value="7">星期天</option>
				<option value="7">不定</option>
                      </select>
                        </td>
                </tr>         		
		<tr>
                     <td>职业<input name="itemid" value="138" type="hidden"></td>
                     <td> 
			<select name="itemvalue">
																	                 				
																	                 					<option value="工人">工人 </option>
																	                 				
																	                 					<option value="公司职员">公司职员 </option>
																	                 				
																	                 					<option value="私营企业负责人">私营企业负责人 </option>
																	                 				
																	                 					<option value="商业服务人员">商业服务人员 </option>
																	                 				
																	                 					<option value="在校学生">在校学生 </option>
																	                 				
																	                 					<option value="个人经营者">个人经营者 </option>
																	                 				
																	                 					<option value="工职人员">工职人员 </option>
																	                 				
																	                 					<option value="离退休人员">离退休人员 </option>
																	                 				
																	                 					<option value="待业或未就业">待业或未就业 </option>
																	                 				
																	                 					<option value="其他">其他 </option>
																	                 				
																	                 			</select>
                        </td>
                </tr>          
		<tr>
	     <td>个人月收入(元)<input name="itemid" value="138" type="hidden"></td>
                     <td> 
                     <select name="item_value">
                             <option selected="selected" value="1">无</option>
                             <option value="2"><1000</option>
                             <option value="3">1001-2000</option>
                	     <option value="4">2001-3000</option>
			     <option value="5">3001-5000</option>
			     <option value="6">5001-10000</option>
			     <option value="7">>10000</option>
                      </select>
			</td>
		</tr>
		<tr>
     
                                                                           <td class="hd_ta_t"style="background:#7cb5ec" colspan="2"><strong class="am-text-primary am-te
xt-lg" style="color:white">个人出行情况</span><input name="num" value="060001" type="hidden"></td>
                                                                        </tr>
	</table>
<!--
	<div class="am-g">
      <div class="am-u-md-6 am-cf">
        <div class="am-fl am-cf">
          <div class="am-btn-toolbar am-fl">
            <div class="am-btn-group am-btn-group-xs">
              <button type="button" class="am-btn am-btn-default" onclick="window.location.href='/main/add_quest'"><span class="am-icon-plus"></span> 新增</button>
              <button type="button" class="am-btn am-btn-default"><span class="am-icon-save"></span> 保存</button>
              <button type="button" class="am-btn am-btn-default"><span class="am-icon-archive"></span> 审核</button>
              <button type="button" class="am-btn am-btn-default"><span class="am-icon-trash-o"></span> 删除</button>
            </div>

          </div>
        </div>
      </div>
    </div>
-->
	 <div class="am-g">
      <div class="am-u-sm-12">
        <form class="am-form">
          <table class="am-table am-table-striped am-table-hover table-main">
            <thead>
              <tr>
                <th class="table-check"><input type="checkbox" /></th><th class="table-number">出行目的</th><th class="table-title">出行时间</th><th class="table-author">出行地点</th><th class="table-date">到达地点</th><th class="table-set">操作</th>
              </tr>
          </thead>
          <tbody>
            <tr>
              <td><input type="checkbox" /></td>
              <td>文化娱乐</td>
              <td><a href="#">2014/9/4 7:28:47</a></td>
              <td>南苑弄23号2单元603</td>
              <td>西湖</td>
              <td>
                <div class="am-btn-toolbar">
                  <div class="am-btn-group am-btn-group-xs">
                    <button class="am-btn am-btn-default am-btn-xs am-text-secondary" type="button" onclick="window.location.href='/main/trip_info'"><span class="am-icon-penc
il-square-o"></span> 编辑</button>
                    <button class="am-btn am-btn-default am-btn-xs am-text-danger"><span class="am-icon-trash-o"></span> 删除</button>
                  </div>
                </div>
              </td>
            </tr>
	 <tr>
              <td><input type="checkbox" /></td>
              <td>上学</td>
              <td><a href="#">2014年9月5日 7:28:47</a></td>
              <td>南苑弄23号2单元603</td>
              <td>学校</td>
              <td>
                <div class="am-btn-toolbar">
                  <div class="am-btn-group am-btn-group-xs">
                    <button class="am-btn am-btn-default am-btn-xs am-text-secondary" type="button" onclick="window.location.href='/main/trip_info'"><span class="am-icon-penc
il-square-o"></span> 编辑</button>
                    <button class="am-btn am-btn-default am-btn-xs am-text-danger"><span class="am-icon-trash-o"></span> 删除</button>
                  </div>
                </div>
              </td>
	</tr>
	<tr>
	 <td><input type="checkbox" /></td>
              <td>回家</td>
		<td>2014年9月4日 7:28:47</td>
              <td><a href="#">南苑弄23号2单元605</a></td>
		 <td><a href="#">南苑弄23号2单元603</a></td>
              <td>
                <div class="am-btn-toolbar">
                  <div class="am-btn-group am-btn-group-xs">
                    <button class="am-btn am-btn-default am-btn-xs am-text-secondary" type="button" onclick="window.location.href='/main/trip_info'"><span class="am-icon-penc
il-square-o"></span> 编辑</button>
                    <button class="am-btn am-btn-default am-btn-xs am-text-danger"><span class="am-icon-trash-o"></span> 删除</button>
                  </div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
						</form>
	<div class="am-margin">
    <button type="button" class="am-btn am-btn-primary am-btn-xs">提交保存</button>
    <button type="button" class="am-btn am-btn-primary am-btn-xs">删除选中</button>
   <button type="button" class="am-btn am-btn-primary am-btn-xs" onclick="window.location.href='/main/add_trip'">新增出行</button>
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
<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/js/amazeui.min.js"></script>
<!--<![endif]-->
<script src="../../assets/js/app.js"></script>
</body>
</html>
