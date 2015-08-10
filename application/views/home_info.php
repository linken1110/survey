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
										<td class="hd_ta_t"style="background:#7cb5ec" colspan="2"><strong class="am-text-primary am-text-lg" style="color:white">户基本信息</span><input name="num" value="060001" type="hidden"></td>
									</tr>
								</tbody>
								<tbody><tr>
									<td>现在住户地址:</td>
									<td><input name="address" value="南苑弄23号2单元603"></td>
								</tr>
								<tr>
									<td>五年前地址</td>
									<td><input name="faddress" value="与现住址相同"></td>
								</tr>
								<tr>
									<td>经度:</td>
									<td><input name="lng" readonly="readonly" value="120.274796"><a href="javascript:getLngLat(2);">选择经纬度</a>
									</td>
								</tr>
								<tr>
									<td>纬度:</td>
									<td><input name="lat" readonly="readonly" value="30.159739"><a href="javascript:getLngLat(1);">选择经纬度</a></td>
								</tr>
								
									<tr>
										<td>家庭总人口<input name="itemid" value="130" type="hidden"></td>
										<td>
												<input name="item_value" value="3">
											  
										</td>
									</tr>
								
									<tr>
										<td>其中不满6周岁<input name="itemid" value="131" type="hidden"></td>
										<td>
												<input name="item_value" value="0">
											  
										</td>
									</tr>
								
									<tr>
										<td>本市户籍人口<input name="itemid" value="132" type="hidden"></td>
										<td>
												<input name="item_value" value="3">
											  
										</td>
									</tr>
								
									<tr>
										<td>其中不满6周岁<input name="itemid" value="133" type="hidden"></td>
										<td>
												<input name="item_value" value="0">
											  
										</td>
									</tr>
								
									<tr>
										<td>居住满6个月<input name="itemid" value="134" type="hidden"></td>
										<td>
												<input name="item_value" value="">
											  
										</td>
									</tr>
								
									<tr>
										<td>其中不满6周岁<input name="itemid" value="135" type="hidden"></td>
										<td>
												<input name="item_value" value="">
											  
										</td>
									</tr>
								
									<tr>
										<td>居住不满6个月<input name="itemid" value="136" type="hidden"></td>
										<td>
												<input name="item_value" value="">
											  
										</td>
									</tr>
								
									<tr>
										<td>其中不满6周岁<input name="itemid" value="137" type="hidden"></td>
										<td>
												<input name="item_value" value="">
											  
										</td>
									</tr>
								
									<tr>
										<td>住房性质<input name="itemid" value="138" type="hidden"></td>
										<td> 
												<select name="item_value">
													
														<option selected="selected" value="自有住房">自有住房</option>
													
														<option value="租（借）房屋">租（借）房屋</option>
													
														<option value="雇主提供">雇主提供</option>
													
														<option value="其他">其他</option>
													
												</select>
											 
										</td>
									</tr>
								
									<tr>
										<td>小 汽 车<input name="itemid" value="139" type="hidden"></td>
										<td>
												<input name="item_value" value="1">
											  
										</td>
									</tr>
								
									<tr>
										<td>摩 托 车<input name="itemid" value="140" type="hidden"></td>
										<td>
												<input name="item_value" value="0">
											  
										</td>
									</tr>
								
									<tr>
										<td>电动自行车<input name="itemid" value="141" type="hidden"></td>
										<td>
												<input name="item_value" value="1">
											  
										</td>
									</tr>
								
									<tr>
										<td>自 行 车<input name="itemid" value="142" type="hidden"></td>
										<td>
												<input name="item_value" value="1">
											  
										</td>
									</tr>
								
									<tr>
										<td>家庭年收入<input name="itemid" value="146" type="hidden"></td>
										<td> 
												<select name="item_value">
													
														<option value="10 万及以下 (包括10万)">10 万及以下 (包括10万)</option>
													
														<option selected="selected" value="10~30 万(包括30万)">10~30 万(包括30万)</option>
													
														<option value="30~50 万 (包括50万)">30~50 万 (包括50万)</option>
													
														<option value="50~100 万(包括100万)">50~100 万(包括100万)</option>
													
														<option value="100 万以上">100 万以上</option>
													
												</select>
											 
										</td>
									</tr>
								
									<tr>
										<td>家庭住房市场单价<input name="itemid" value="171" type="hidden"></td>
										<td> 
												<select name="item_value">
													
														<option value="<1 万/ ㎡">&lt;1 万/ ㎡</option>
													
														<option selected="selected" value="1~1.5 万/ ㎡(包括1万)">1~1.5 万/ ㎡(包括1万)</option>
													
														<option value="1.5~2 万/ ㎡(包括1.5万)">1.5~2 万/ ㎡(包括1.5万)</option>
													
														<option value="2~3 万/ ㎡(包括2万)">2~3 万/ ㎡(包括2万)</option>
													
														<option value=">=3 万/ ㎡">&gt;=3 万/ ㎡</option>
													
												</select>
											 
										</td>
									</tr>
								
									<tr>
										<td>是否有购车计划<input name="itemid" value="172" type="hidden"></td>
										<td> 
												<select name="item_value">
													
														<option selected="selected" value="打算买车">打算买车</option>
													
														<option value="不打算买车">不打算买车</option>
													
												</select>
											 
										</td>
									</tr>
								
									<tr>
										<td>购买车的目的<input name="itemid" value="173" type="hidden"></td>
										<td>  
												<div>
													<input name="item_value" type="hidden" value="上下班使用,自驾游">
													
														<input type="checkbox" checked="checked" value="上下班使用" onchange="getVal(this)">上下班使用 
								                 				
														<input type="checkbox" value="接送孩子" onchange="getVal(this)">接送孩子 
								                 				
														<input type="checkbox" value="平时购物" onchange="getVal(this)">平时购物 
								                 				
														<input type="checkbox" checked="checked" value="自驾游" onchange="getVal(this)">自驾游 
								                 				
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
