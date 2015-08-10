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
										<td class="hd_ta_t"style="background:#7cb5ec" colspan="2"><strong class="am-text-primary am-text-lg" style="color:white">个人出行信息</span><input name="num" value="060001" type="hidden"></td>
									</tr>
								</tbody>
								<tbody><tr>
									<td>出发时间:</td>
									<td><input name="address" value="2014年9月5日 7:28:47"></td>
								</tr>
								<tr>
									<td>出发地点</td>
									<td><input name="faddress" value="南苑弄23号2单元603"></td>
								</tr>
								<tr>
									<td>起点用地性质<input name="itemid" value="138" type="hidden"></td>
                                                                                <td> 
                                                                                                <select name="item_value">
                                                                                                        
                                                                                                                <option selected="selected" value="1">住宅</option>
                                                                                                        
                                                                                                                <option value="2">行政办公</option>
                                                                                                        
                                                                                                                <option value="3">商场店铺</option>
                                                                                                        
                                                                                                                <option value="4">其他</option>
                                                                                                        
                                                                                                </select>
                                                                                         
                                                                                </td>
								</tr>
								<tr>
                                                                        <td>到达时间:</td>
                                                                        <td><input name="address" value="2014年9月5日 7:28:47"></td>
                                                                </tr>
                                                                <tr>
                                                                        <td>到达地点</td>
                                                                        <td><input name="faddress" value="南苑弄23号2单元603"></td>
                                                                </tr>
                                                                <tr>
                                                                        <td>终点用地性质<input name="itemid" value="138" type="hidden"></td>
                                                                                <td> 
                                                                                                <select name="item_value">
                                                                                                        
                                                                                                                <option selected="selected" value="1">住宅</option>
                                                                                                        
                                                                                                                <option value="2">行政办公</option>
                                                                                                        
                                                                                                                <option value="3">商场店铺</option>
                                                                                                        
                                                                                                                <option value="4">其他</option>
                                                                                                        
                                                                                                </select>
                                                                                         
                                                                                </td>
                                                                </tr>
									<tr>
										<td>出行目的<input name="itemid" value="130" type="hidden"></td>
										<td>
											   <select name="item_value">
                                                                                                        
                                                                                                                <option selected="selected" value="1">上班</option>
                                                                                                        
                                                                                                                <option value="2">上学</option>
                                                                                                        
                                                                                                                <option value="3">购物</option>
                                                                                                        
                                                                                                                <option value="4">其他</option>
                                                                                                        
                                                                                                </select>
										</td>
									</tr>
								
									<tr>
										<td>同行人数<input name="itemid" value="131" type="hidden"></td>
										<td>
												<input name="item_value" value="0">
											  
										</td>
									</tr>
								
								
									<tr>
										<td>是否全程步行<input name="itemid" value="172" type="hidden"></td>
										<td> 
												<select name="item_value">
													
														<option selected="selected" value="1">全程步行</option>
													
														<option value="2">非全程步行</option>
													
												</select>
											 
										</td>
									</tr>
								
									<tr>
										<td>出行交通工具<input name="itemid" value="173" type="hidden"></td>
										<td>  
												<div>
													<input name="item_value" type="hidden" value="上下班使用,自驾游">
													
														<input type="checkbox" checked="checked" value="上下班使用" onchange="getVal(this)">脚踏自行车
														<input type="checkbox" value="接送孩子" onchange="getVal(this)">摩托车
								                 				
														<input type="checkbox" value="平时购物" onchange="getVal(this)">出租车 
								                 				
														<input type="checkbox" checked="checked" value="自驾游" onchange="getVal(this)">公交车
								<input type="checkbox" checked="checked" value="小汽车 " onchange="getVal(this)">小汽车               				
														<input type="checkbox" value="其它" onchange="getVal(this)">其它 
								                 				
												</div>
											
										</td>
									</tr>
								
							</tbody></table>
							<button type="button" class="am-btn am-btn-primary am-btn-xs" style="margin-left:400px;margin-top:10px;margin-bottom:10px;">提交保存</button>
						</form>

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
