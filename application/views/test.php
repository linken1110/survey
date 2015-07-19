
<!doctype html>
<html class="no-js">
<head>
    </style>

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
  <link rel="stylesheet" href="../../assets/css/js_demo.css">
  <script src="../../assets/js/jquery.min.js" type="text/javascript"></script>
</head>
<body>
<?php include 'header.php';?>
<?php include 'sidebar.php';?>
<div class="admin-content">
     


    <ul class="am-avg-sm-1 am-avg-md-4 am-margin am-padding am-text-center admin-content-list ">
      <li><a href="#" class="am-text-success"><span class="am-icon-btn am-icon-file-text"></span><br/>出行次數<br/>2300</a></li>
      <li><a href="#" class="am-text-warning"><span class="am-icon-btn am-icon-briefcase"></span><br/>出行里程<br/>308公里</a></li>
      <li><a href="#" class="am-text-danger"><span class="am-icon-btn am-icon-recycle"></span><br/>上次出行<br/>2015/06/10</a></li>
      <li><a href="#" class="am-text-secondary"><span class="am-icon-btn am-icon-user-md"></span><br/>新增<br/>出行链</a></li>
    </ul>
<div id="code_wrapper">
    <div id="code_arrow" class="go_back"><span title="显示并修改代码">›</span><p title="隐藏代码">‹</p></div>
    <div id="code_core">
      <div class="code_head" style="text-align:center">
        

        <span style="color:#0097db">出行记录</span>
      </div><!-- /.code_head -->

      <div class="code_body">
      <p class="body_content"><a class="am-text-secondary">2015/05/13</a><a class="am-text-danger">  家-->人民广场</a></p>   
      <p class="body_content"><a class="am-text-secondary">2015/05/13</a><a class="am-text-danger">  家-->世纪大道</a></p>
      <p class="body_content"><a class="am-text-secondary">2015/05/13</a><a class="am-text-danger">  家-->漕河泾</a></p>
      <p class="body_content"><a class="am-text-secondary">2015/05/13</a><a class="am-text-danger">  家-->同济大学</a></p>      
      </div><!-- /.code_body -->

    </div><!-- /#code_core -->
  </div>
<div class="iframe_wrapper" style="margin-left: 300px;"><iframe id="js_iframe" src="http://localhost/~linyanchun/1/index.php/welcome/map" scrolling="no"></iframe></div>
  </div>
<?php include 'footer.php';?>
<script type="text/javascript">
$(function(){


  var oList = $('#sub_page_nav');
  oList.find('> li > a').click(function(){
    var oThis = $(this);

    if(oThis.find('ul.children').length > 0){
      return true;
    }

    var oThisUl = oThis.next('ul');
    $('ul.children').not(oThisUl).hide('fast');
    oThisUl.toggle('fast');

    return false;
  });

  var iCodeWidth     = 300,
    oArrow         = $('#code_arrow'),
    oCodeCore      = $('#code_core'),
    oIframeWrapper = $('div.iframe_wrapper'),
    iIframeMargin  = parseInt(oIframeWrapper.css('margin-left'));
  oArrow.click(function(){
    if(oArrow.hasClass('go_back')){
      oCodeCore.animate({width: 0});
      oIframeWrapper.animate({marginLeft: iIframeMargin-iCodeWidth});
      oArrow.removeClass('go_back');
    }else{
      oCodeCore.animate({width: iCodeWidth});
      oIframeWrapper.animate({marginLeft: iIframeMargin});
      oArrow.addClass('go_back');
    }
  });


 
});

var sCopyTarget = "#codes";
localStorage.code = $(sCopyTarget).val();
// console.log(localStorage.code);

var editor = null;







</script>
</body>
</html>

