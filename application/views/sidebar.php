	<!-- sidebar start -->
  <div class="admin-sidebar">
    <ul class="am-list admin-sidebar-list">
      <li><a href="/main"><span class="am-icon-home"></span> 首页</a></li>
<?php if($user['type'] == 1){?>
<li class="admin-parent">
      <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-file"></span> 项目管理 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
      <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
        <li><a href="/project/project_list" class="am-cf"><span class="am-icon-check"></span> 项目列表<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
        <li><a href="/project/add_project"><span class="am-icon-puzzle-piece"></span> 新增项目</a></li>
      </ul>
    </li>
<?php }?>
      <li><a href="/survey_result/home_page"><span class="am-icon-table"></span> 问卷结果</a></li>

<?php if($user['type'] == 1 || $user['position'] == 1){?>
      <li><a href="admin-form.html"><span class="am-icon-pencil-square-o"></span> 信息汇总</a></li>
       <li><a href="admin-form.html"><span class="am-icon-pencil-square-o"></span> 数据导出</a></li>
<?php }?>
      <li><a href="#"><span class="am-icon-sign-out"></span> 注销</a></li>
    </ul>

    <div class="am-panel am-panel-default admin-sidebar-panel">
      <div class="am-panel-bd">
        <p><span class="am-icon-bookmark"></span> 公告</p>
        <p>时光静好，与君语；细水流年，与君同。—— Amaze</p>
      </div>
    </div>

   
  </div>
  <!-- sidebar end -->


