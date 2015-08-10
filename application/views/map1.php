<!DOCTYPE html>
<html>
<head>
	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	  <title>城市下拉列表</title>
	  <style type="text/css">
	  	body{
			margin:0;
			height:100%;
			width:100%;
			position:absolute;
		}
		#mapContainer{
			position: absolute;
			top:0;
			left: 0;
			right:0;
			bottom:0;
		}
		#tip{
			height:45px;
			background-color:#fff;
			padding-left:10px;
			padding-right:10px;
			border:1px solid #969696;
			position:absolute;
			font-size:12px;
			right:10px;
			bottom:20px;
			border-radius:3px;
			line-height:45px;
		}
	  </style>
</head>
<body>
	  <div id="mapContainer"></div>
	  <div id="tip">
		    省：<select id='province' style="width:100px"  onchange='search(this)'></select>
		    市：<select id='city' style="width:100px"  onchange='search(this)'></select>
		    区：<select id='district' style="width:100px" onchange='search(this)'></select>
		    商圈：<select id='biz_area' style="width:100px"></select>
	  </div>
	 
	 <script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=437a0558f1ae01520a7c0ba63fb69ed8"></script>
  	 <script type="text/javascript">
		var mapObj, district, polygons=[], citycode;
		var citySelect = document.getElementById('city');
		var districtSelect = document.getElementById('district');
		var areaSelect = document.getElementById('biz_area');
		var polyline;
		var arr = new Array();
		var lnglatList = new Array();
		var objList = new Array();
		mapObj = new AMap.Map('mapContainer',{
			resizeEnable: true, 
		    layers: [
		        new AMap.TileLayer()
		    ],
		    view: new AMap.View2D({
		        center: new AMap.LngLat(116.30946,39.937629),
		        zoom: 3
		    })
		});
		//起始位置
		var marker = new AMap.Marker({ //创建自定义点标注                 
  			map:mapObj,                 
  				position: new AMap.LngLat(116.406326, 39.903942),                 
 			offset: new AMap.Pixel(-10,-34)               
  			                
		});
		var geocoder;

		//加载地理编码插件
		var geocoder;
		AMap.service(["AMap.Geocoder"], function() {
			geocoder = new AMap.Geocoder({
				radius: 1000,
				extensions: "all"
			});

		});
		arr.push(new AMap.LngLat(116.406326 ,39.903942)); 
		lnglatList.push(marker); 
		polyline = draw_line();
		var lnglat;                 
		var listener = AMap.event.addListener(mapObj,"click",function(e){
				var obj = new Object();
				lnglat=e.lnglat;
				var lnglatXY = new AMap.LngLat( lnglat.lng,lnglat.lat);
   				arr.push(lnglatXY);

   				var marker = new AMap.Marker({
      			map:mapObj,
      			position:e.lnglat,
      			draggable:false,
      			icon:"http://webapi.amap.com/images/0.png",
      			offset:new AMap.Pixel(-10,-34)
   				});
   				lnglatList.push(marker);
   				mapObj.setCenter(lnglat);

				AMap.event.addListener(marker,"click",function(e){

				});
				AMap.event.addListener(marker,"dblclick",function(e){
		
					lnglatList.remove(marker);
					objList.remove(obj);
					arr = [];
		
					get_arr();
					update_line();
					marker.setMap(null)        ;
				});
				update_line();
			//逆地理编码
			geocoder.getAddress(lnglatXY, function(status, result){
				//取回逆地理编码结果
				if(status === 'complete' && result.info === 'OK'){
					var address = geocoder_CallBack(result);
					obj.address = address;
					obj.change = false;
					obj.way = 1;
					obj.lng = lnglat.lng;
					obj.lat = lnglat.lat;
					var info = [];
					 info.push(' <form action="hueditSub" id="qeditsub" method="post"><table class="hd_del_ta  am-table-striped am-table-hover table-main" id="table1" align="center" border="0" cellpadding="0"cellspalue="060001" type="hidden"><tbody> <tr><td class="hd_ta_t"style="background:#7cb5ec" colspan="2"><strong class="am-text-primary am-txt-lg" style="color:white">个人出行信息</span><input name="num" value="060001" type="hidden"></td></tr></tbody><tbody><tr> <td>出发时间:</td> <td><input name="address" value=""></td> </tr> <tr><td>出发地点</td> <td><input name="faddress" value=""></td></tr><tr><td>起点用地性质<input name="itemid" value="138" type="hidden"></td> <td>  <select name="item_value"><option selected="selected" value="1">住宅</option><option value="2">行政办公</option><option value="3">商场店铺</option><option value="4">其他</option> </select> </td> </tr><tr><td>到达时间:</td> <td><input name="address" value=""></td> </tr> <tr> <td>到达地点</td> <td><input name="faddress" value=""></td></tr>  <tr><td>终点用地性质<input name="itemid" value="138" type="hidden"></td> <td> <select name="item_value"> <option selected="selected" value="1">住宅</option><option value="2">行政办公</option><option value="3">商场店铺</option><option value="4">其他</option> </select></td> </tr> <tr>  <td>出行目的<input name="itemid" value="130" type="hidden"></td><td><select name="item_value"><option selected="selected" value="1">上班</option>  <option value="2">上学</option><option value="3">购物</option><option value="4">其他</option></select> </td> </tr></table><button type="button" class="am-btn am-btn-primary am-btn-xs" >提交保存</button></form>');
	/*				info.push("<b>  "+obj.address +"</b>");
					info.push("<b> 经度 "+obj.lng +"</b>");
					info.push("<b>  纬度"+obj.lat +"</b>");
					info.push("<b> 是否换乘 <select> <option value ='1'>是</option> <option value ='0'>否</option> </select></b>");
					info.push("<b> 方式 <select> <option value ='1'>步行</option> <option value ='2'>公交</option><option value ='3'>地铁</option><option value ='4'>开车</option> </select></b>");
					*/
					var inforWindow = new AMap.InfoWindow({
	
					offset:new AMap.Pixel(0,-23),
						content:info.join("<br>")
					});
					AMap.event.addListener(marker,"click",function(e){
						inforWindow.open(mapObj,marker.getPosition());
					});
					objList.push(obj);
				}
			});

		});
function get_arr(){
	for(var i=0;i<lnglatList.length;i++){
			arr.push(new AMap.LngLat(lnglatList[i].$c.position.lng,lnglatList[i].$c.position.lat)); 
	}
}
function draw_line(){
	obj = new AMap.Polyline({                   
  	map:mapObj,                 
  	path:arr,                   
  	strokeColor:"red",                   
  	strokeOpacity:0.4,                   
  	strokeWeight:3                  
	});                   
//调整视野到合适的位置及级别                 
	mapObj.setFitView(); 
  	return obj;
}
function update_line(){
	var polylineoptions = {	
			    zIndex:10,
		            strokeStyle:"solid",
			    strokeColor:"#FF3300",
			    strokeOpacity:0.8,
			    strokeWeight:5,
			    isOutline:false,
			    path:arr	
			};
			polyline.setOptions(polylineoptions);
}

Array.prototype.remove=function(obj){ 
for(var i =0;i <this.length;i++){ 
var temp = this[i]; 
if(!isNaN(obj)){ 
temp=i; 
} 
if(temp == obj){ 
for(var j = i;j <this.length;j++){ 
this[j]=this[j+1]; 
} 
this.length = this.length-1; 
} 
} 
} 
		var provinceList = ['北京市', '天津市', '河北省', '山西省', '内蒙古自治区', '辽宁省', '吉林省','黑龙江省', '上海市', '江苏省', '浙江省', '安徽省', '福建省', '江西省', '山东省','河南省', '湖北省', '湖南省', '广东省', '广西壮族自治区', '海南省', '重庆市','四川省', '贵州省', '云南省', '西藏自治区', '陕西省', '甘肃省', '青海省', '宁夏回族自治区', '新疆维吾尔自治区', '台灣', '香港特别行政区', '澳门特别行政区'];
		var provinceSelect = document.getElementById('province');
		var content = '<option>--请选择--</option>';
		for(var i =0, l = provinceList.length; i < l; i++){
		  content += '<option value="province">'+provinceList[i]+'</option>';
		  provinceSelect.innerHTML = content;
		}
		
		//行政区划查询
		   
		AMap.service(["AMap.DistrictSearch"], function() {
		    var opts = {
		        subdistrict: 1,   //返回下一级行政区
		        extensions: 'all',  //返回行政区边界坐标组等具体信息
		        level:'city'  //查询行政级别为 市
		    };
		
		    //实例化DistrictSearch
		    district = new AMap.DistrictSearch(opts);
		});
		
		
		
		function getData(e){
			  var dList = e.districtList;
		      for(var m = 0,ml = dList.length; m < ml; m++){
		        var data = e.districtList[m].level;
		        var bounds = e.districtList[m].boundaries;
				//只绘制 区, 且 本级别行政区划是上一级区划的下级行政区
		        if(data == "district" && dList[m].citycode === citycode){
		          if(bounds) {
		            for(var i =0, l = bounds.length; i < l; i++){
		              //生成行政区划polygon
		              var polygon = new AMap.Polygon({
		                map:mapObj,
		                strokeWeight:1,
		                strokeColor:'#CC66CC',
		                fillColor:'#CCF3FF',
		                fillOpacity:0.7,
		                path:bounds[i]
		              });
		              polygons.push(polygon);
		            }
		            mapObj.setFitView();//地图自适应
		          }
		        }
		
		        var list = e.districtList || [],
		            subList =[], level, nextLevel;
		        if(list.length >= 1) {
		          subList = list[0].districtList;
		          level = list[0].level;
		        }
		
		        //清空下一级别的下拉列表
		        if(level === 'province'){
		          
		          nextLevel = 'city';
		          citySelect.innerHTML = '';
		          districtSelect.innerHTML = '';
		          areaSelect.innerHTML = '';
		        }else if(level === 'city'){
		
		          nextLevel = 'district';
		          districtSelect.innerHTML = '';
		          areaSelect.innerHTML = '';
		        } else if(level === 'district') {
		            
		            nextLevel = 'biz_area';
		            areaSelect.innerHTML = '';
		        }
		
		        if(subList){
		          var contentSub = '<option>--请选择--</option>';
		          for(var i=0,l=subList.length; i<l; i++){
		            var name = subList[i].name; 
		            var levelSub = subList[i].level;
		            var cityCode = subList[i].citycode;
		            contentSub += '<option value="'+levelSub+'|'+cityCode+'">'+name+'</option>';
		            document.querySelector('#'+levelSub).innerHTML = contentSub;
		          }
		        }
		      } 
		}
		
		function search(obj){
		  //清除地图上所有覆盖物
		  for(var i = 0, l = polygons.length; i < l; i ++){
		    polygons[i].setMap(null);
		  }
		  
		  var option = obj[obj.options.selectedIndex];
		  var arrTemp = option.value.split('|');
		  var level = arrTemp[0];//行政级别
		  citycode = arrTemp[1];// 城市编码
		  var keyword = option.text; //关键字
		
		  district.setLevel(level); //行政区级别
		  //行政区查询
		  district.search(keyword, function(status, result){
		  	getData(result);
		  }); 
		}
		//地理编码返回结果展示
		function geocoder_CallBack(data){
			var resultStr="";
			//地理编码结果数组

			resultStr = data.regeocode.formattedAddress;

			mapObj.setFitView();
			return resultStr;
		}
	 </script>
</body>
</html>						

	

