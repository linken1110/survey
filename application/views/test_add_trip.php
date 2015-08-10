
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
     

<div class="iframe_wrapper" style="margin-left: 0px;"><iframe id="js_iframe" src="/main/map1" scrolling="no"></iframe></div>
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

