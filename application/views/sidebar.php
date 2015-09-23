	<!-- sidebar start -->
  <div class="admin-sidebar">
    <ul class="am-list admin-sidebar-list">
<?php if($user['type'] == 1 || $user['position'] == 1){?>
	 <li><a href="/project/project_list"><span class="am-icon-table"></span> 项目管理</a></li>
<?php }?>
	<li><a href="/survey_result/home_page"><span class="am-icon-file"></span> 问卷结果</a></li>
<li class="admin-parent">
      <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-pencil-square-o"></span> 信息汇总 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
      <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
	<li><a href="/statics/question"><span class="am-icon-puzzle-piece"></span> 一般问题选项统计</a></li>
        <li><a href="/statics/trip" class="am-cf"><span class="am-icon-check"></span> 出行链结果统计</a></li>
      </ul>
    </li>

<?php if($user['type'] == 1 || $user['position'] == 1){?>
       <li><a href="/statics/download_index"><span class="am-icon-pencil-square-o"></span> 数据导出</a></li>
<?php }?>
    </ul>


   
  </div>
  <!-- sidebar end -->


