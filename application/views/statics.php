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
	<div class="survey_wrap">
        <div class="survey_title" style="margin-top:-50px;">

                            <div class="inner">
				<h1 class="title_content cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" contenteditable="true" tabindex="0" spellcheck="false" role="textbox" aria-label="false" aria-describedby="cke_34" style="position: relative; margin-bottom:30px;">出行链信息总汇</h1>
                                <h1 class="title_content cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" contenteditable="false" tabindex="0" spellcheck="false" role="textbox" aria-label="false" aria-describedby="cke_34" style="position: relative;text-align:left;color:#0e90d2">平均出行时间: <span id="hour" style="color:red;"></span>小时 <span id="minute" style="color:red;"></span>分 <span id="second"  style="color:red;"></span>秒</h1>
			<h1 class="title_content cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" contenteditable="false" tabindex="0" spellcheck="false" role="textbox" aria-label="false" aria-describedby="cke_34" style="position: relative;text-align:left;color:#0e90d2;margin-top:10px;margin-bottom:10px">平均出行次数: <span style="color:red;"><?php echo $count?></span></h1>
                            </div>

                        </div>
	</div>	
	<div id="container" style="min-width:800px;height:300px"></div>
	<div id="container1" style="min-width:800px;height:300px"></div>
	<div id="container2" style="min-width:800px;height:300px"></div>
</div>
</div>
<footer>
  <hr>
</footer>


<!--[if (gte IE 9)|!(IE)]><!-->
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/amazeui.min.js"></script>
<script src="../../assets/js/Highchart/highcharts.js"></script>
<script src="../../assets/js/Highchart/highcharts-more.js"></script>
<script src="../../assets/js/Highchart/highcharts-3d.src.js"></script>
<!--<![endif]-->
<script src="../../assets/js/app.js"></script>
<script type="text/javascript">
	$(function () { 
	var time = "<?php echo $time;?>";
	formatSeconds(time);
	var type_list = eval('<?php echo json_encode($type_list);?>');
	var pupose_list = eval('<?php echo json_encode($pupose_list);?>');
	var address_type_list = eval('<?php echo json_encode($address_type_list);?>');
	$('#container1').highcharts({
		 chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: '出行目的汇总分布图'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
	credits:{
                enabled:false // 禁用版权信息
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: pupose_list
        }]
    	});
	$('#container2').highcharts({
                 chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: '用地性质汇总分布图'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        credits:{
                enabled:false // 禁用版权信息
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: address_type_list
        }]
        });
	 var chart = new Highcharts.Chart({
        chart: {
            renderTo: 'container',
            type: 'column',
            margin: 75,
            options3d: {
                enabled: true,
                alpha: 15,
                beta: 15,
                depth: 50,
                viewDistance: 25
            }
        },
	legend: {
            enabled: false
            
        },
        title: {
            text: '出行方式汇总分布图'
        },
        subtitle: {
            text: '柱状图'
        },
        plotOptions: {
            column: {
                depth: 25
            }
        },
	xAxis:{
  	 title:{
       		text:'出行方式'
   		},
		labels: {
    		formatter:function(){
			return type_list[this.value].name;	
   		 }
 	 }
	},
	yAxis:{
   		title:{
       			text:'所占比例'
   		}
	},
	credits:{
     		enabled:false // 禁用版权信息
	},
        series: [{
            data: type_list
        }]
    });
});

        function formatSeconds(value) {
    		var theTime = parseInt(value);// 秒
    		var theTime1 = 0;// 分
    		var theTime2 = 0;// 小时
    		if(theTime > 60) {
        		theTime1 = parseInt(theTime/60);
        		theTime = parseInt(theTime%60);
            		if(theTime1 > 60) {
            			theTime2 = parseInt(theTime1/60);
            			theTime1 = parseInt(theTime1%60);
            		}
		}
		$("#hour").html(theTime2);
		$("#minute").html(theTime1);
		$("#second").html(theTime);
    	}
</script> 
</body>
</html>
