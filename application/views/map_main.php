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
		 .marker {
      color: #ff6600;
      padding: 4px 10px;
      border: 1px solid #fff;
      white-space: nowrap;
      font-size: 12px;
      font-family: "";
      background-color: #0066ff;
    }
	  </style>
</head>
<body>
	  <div id="mapContainer"></div>
	 
	 <script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=437a0558f1ae01520a7c0ba63fb69ed8"></script>
	<script src="../../assets/js/jquery.js"></script>
  	 <script type="text/javascript">
	 $(function() {
		var home_list = eval('<?php echo json_encode($list);?>');
		var mapObj;
		var map, marker;

    		map = new AMap.Map("mapContainer", {
      			resizeEnable: true,
      			center: [120.297428, 30.30923],
      			zoom: 10
    		});
		home_list.forEach(function(e){
			marker = new AMap.Marker({ //创建自定义点标注                 
			icon: "http://webapi.amap.com/images/marker_sprite.png",
                                position: new AMap.LngLat(e.lng, e.lat),                 
                        	offset: new AMap.Pixel(-10,-34)               
                                        
                	});
			 marker.setMap(map);
			AMap.event.addListener(marker,"click",function(a){
					window.open("/survey_result/survey_list?id="+e.id);	
                                });
                        
		});	
	});
	 </script>
	<script type="text/javascript">
		function test(val){
			var map = new AMap.Map("mapContainer", {
                        resizeEnable: true,
                        center: [120.297428, 30.30923],
                        zoom: 10
               		 });
			val.forEach(function(e){
                        marker = new AMap.Marker({ //创建自定义点标注                 
                        icon: "http://webapi.amap.com/images/marker_sprite.png",
                                position: new AMap.LngLat(e.lng, e.lat),                 
                                offset: new AMap.Pixel(-10,-34)               
                                        
                        });
                         marker.setMap(map);
                        AMap.event.addListener(marker,"click",function(a){
                                        window.open("/survey_result/survey_list?id="+e.id);     
                                });
                        
                });     
		}
	 </script> 
</body>
</html>						

	

