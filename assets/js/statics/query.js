var htCheckQs=new Object();var htQuestion=new Object();if(ddlSaveQuery){ddlSaveQuery.onchange=function(){if(this.value){window.location=this.value;}btnDelQuery.style.display=this.value?"":"none";btnShareReport.style.display=this.value?"":"none";};}if(btnDelQuery){btnDelQuery.style.display=ddlSaveQuery.value?"":"none";btnDelQuery.onclick=function(){var a="/wjx/report/deletereport.aspx?activity="+activityId+"&reportid="+reportid;if(confirm("此操作无法恢复，确认删除吗？")){PDF_launch(a,400,100);}};}if(btnShareReport){btnShareReport.style.display=ddlSaveQuery.value?"":"none";btnShareReport.onclick=function(){if(!isVip){alert("很抱歉，此功能只对企业版用户开放");return;}PDF_launch("/wjx/design/setreportpwd.aspx?reportid="+reportid,550,300);};}function saveQuery(b){var a=getQueryCond();var c="";if(b){c="&s="+b;}PDF_launch("/wjx/activitystat/savereport.aspx?activity="+activityId+"&type=1"+c+"&qCond="+a[0]+"&econd="+a[1],420,100);}function toCheck(a){if(!a.value){var b=a.parentNode.ddlQuery;htCheckQs[b.value]="1";showCondition.call(b);}}function showCondition(){var b=this.value;var e=this;var d=this.spanCondition||document.createElement("span");d.innerHTML="";d.className="spanLeft";d.style.width="320px";d.style.padding="0 5px";if(parseInt(b)==b){var g=this.selectedIndex;var q=qsQuery[g];var m=q.split("§");var k="";if(q){if(!htCheckQs[b]){k="<select id='sel"+g+"'  style='width:320px;' onchange='toCheck(this);'>";for(var f=0;f<m.length;f++){var p=f+1;var j=b+","+p;var l=m[f];k+="<option value='"+p+"'>"+l+"</option>";}k+="<option value='-3'>(跳过)</option>";k+="<option value='-2'>(空)</option>";k+="<optgroup label='---------------------'>";k+="<option value=''>合并多个选项的数据</option>";k+="<optgroup>";k+="</select>";}else{for(var f=0;f<m.length;f++){var p=f+1;var j=b+","+p;var l=m[f];k+="<input type='checkbox' value='"+p+"'/><span>"+l+"</span>";if(p%3==0&&f<m.length-1){k+="<br/>";}}}d.innerHTML=k;}else{var a=this.options[this.selectedIndex];var h=a.getAttribute("isdigit");htQuestion[b]="1";if(h){d.appendChild($("spanEntry").cloneNode(true));var c=d.getElementsByTagName("select")[0];c.onchange=function(){var i=this.parentNode.getElementsByTagName("label")[0];i.style.display=this.value=="3"?"":"none";};c.onchange();htQuestion[b]="2";}else{d.appendChild($("spanQuestion").cloneNode(true));}}d.ddlQuery=e;}else{switch(b){case"省份":if(!ddlProvince.dataLoaded){loadJoinData(d,ddlProvince,1);}else{d.appendChild(ddlProvince).cloneNode(true);}break;case"来源":if(!ddlSource.dataLoaded){loadJoinData(d,ddlSource,3);}else{d.appendChild(ddlSource).cloneNode(true);}break;case"城市":if(!ddlCity.dataLoaded){loadJoinData(d,ddlCity,2);}else{d.appendChild(ddlCity).cloneNode(true);}break;case"IP地址":case"填写完成凭证":case"用户名":case"来源详情":if(b=="IP地址"||b=="用户名"){var o=$("spanInclude").cloneNode(true);o.innerHTML="等于";d.appendChild(o);}else{if(b=="来源详情"){var o=$("spanInclude").cloneNode(true);o.innerHTML="包含";d.appendChild(o);}}d.appendChild($("spanEntry").cloneNode(true));d.getElementsByTagName("select")[0].style.display="none";d.getElementsByTagName("label")[0].style.display="none";break;case"提交答卷日期":case"填写所用时间":case"填写序号":case"分数":d.appendChild($("spanEntry").cloneNode(true));var c=d.getElementsByTagName("select")[0];c.onchange=function(){var i=this.parentNode.getElementsByTagName("label")[0];i.style.display=this.value=="3"?"":"none";};c.onchange();break;}}this.parentNode.parentNode.insertBefore(d,this.btnAddQuery.parentNode);this.spanCondition=d;var n=d.getElementsByTagName("input");if(n[0]&&n[0].type!="checkbox"){n[0].value="";n[0].checkType=b;n[0].onkeydown=doEnterQuery;if(b=="提交答卷日期"){n[0].onclick=function(i){calendar.show(this,null,window.event||i);};n[0].onchange=n[0].onblur=null;}else{n[0].onchange=n[0].onblur=checkData;n[0].onclick=null;}if(n[1]&&n[1].type!="checkbox"){n[1].checkType=b;n[1].value="";n[1].onkeydown=doEnterQuery;if(b=="提交答卷日期"){n[1].onclick=function(i){calendar.show(this,null,window.event||i);};n[1].onchange=n[0].onblur=null;}else{n[1].onchange=n[0].onblur=checkData;n[1].onclick=null;}}}}function loadJoinData(d,f,c){var e=loadData(c);var b=e.split("§");if(!f.dataLoaded){for(var a=0;a<b.length;a++){var g=b[a];if(c==3){g=b[a].split("[")[0];}f.options.add(new Option(b[a],g));}f.dataLoaded=true;}d.appendChild(f).cloneNode(true);}function doEnterQuery(a){a=window.event||a;if(a.keyCode==13){btnQueryClick();a.returnValue=false;return false;}}function BindQsChoiceData(h,a){if(!a){return;}var e=a.split("┋");if(e.length>1){htCheckQs[h.value]="1";h.onchange();var c=new Object();for(var d=0;d<e.length;d++){c[e[d]]="1";}var b=h.spanCondition.getElementsByTagName("input");for(var f=0;f<b.length;f++){var g=b[f];if(c[g.value]){g.checked=true;}}}else{h.onchange();h.spanCondition.getElementsByTagName("select")[0].value=a;}}function BindQsQuestionData(d,c){d.onchange();var a=d.spanCondition.getElementsByTagName("input");a[0].value=c[1]||"";if(a[1]&&c[3]){a[1].value=c[3];}if(!c[2]){c[2]="0";}var b=d.spanCondition.getElementsByTagName("select")[0];b.value=c[2].split(";")[0];if(b.onchange){b.onchange();}}function isQuestion(a){return a.split("§").length>=2;}function initQuery(){ddlQuery.onchange=showCondition;ddlQuery.btnAddQuery=btnAddQuery;btnAddQuery.onclick=addQuery;btnDelQ.onclick=function(){delQuery(ddlQuery.parentNode.parentNode,ddlQuery);};ddlQueries.push(ddlQuery);if(reportType==1&&(qCond||eCond)){var h=true;if(qCond){var b=qCond.split("〒");var a=isQuestion(b[0]);if(a){var f=b[0].split("§");ddlQuery.value=f[0];BindQsQuestionData(ddlQuery,f);}else{var f=b[0].split(",");ddlQuery.value=f[0];BindQsChoiceData(ddlQuery,f[1]);}h=false;for(var e=1;e<b.length;e++){var a=isQuestion(b[e]);if(a){f=b[e].split("§");addQuery(f[0],f);}else{f=b[e].split(",");addQuery(f[0],f[1]);}}}if(eCond){var d=eCond.split("〒");var g=0;if(!qCond){bindECond(d[0],h);h=false;g=1;}for(var e=g;e<d.length;e++){bindECond(d[e],h);}}}else{for(var e=0;e<ddlQuery.options.length;e++){var c=ddlQuery.options[e].text;if(isSample(c)){ddlQuery.selectedIndex=e;break;}}ddlQuery.onchange();}}function bindECond(f,b){var d=f.split("┋");var e="";var c=d[1];var i=d[2];var h=d[3];switch(d[0]){case"1":e="提交答卷日期";break;case"3":e="填写所用时间";break;case"4":e="填写序号";break;case"5":e="分数";break;case"7":e="省份";c=i;i="";h="";break;case"8":e="来源";c=i;i="";h="";break;case"9":e="城市";c=i;i="";h="";break;case"10":e="IP地址";break;case"12":e="用户名";break;case"11":e="填写完成凭证";break;case"13":e="来源详情";break;}if(b){ddlQuery.value=e;ddlQuery.onchange();var g=ddlQuery.spanCondition.getElementsByTagName("input");if(i){g[0].value=i;}if(h){g[1].value=h;g[1].parentNode.style.display="";}if(c){var a=ddlQuery.spanCondition.getElementsByTagName("select")[0];a.value=c;if(a.onchange){a.onchange();}}}else{addQuery(e,c,i,h);}}function delQuery(b,a){if(ddlQueries.length==1){divQueryMsg.innerHTML="必须要保留一个查询条件";return;}ddlQuery.parentNode.parentNode.parentNode.removeChild(b);ddlQueries.remove(a);if(a==ddlQuery){ddlQuery=ddlQueries[0];}}function addQuery(h,b,o,n){if(ddlQueries.length>=queryCount){divQueryMsg.innerHTML="最多只允许"+queryCount+"个查询条件";return;}divQueryMsg.innerHTML="";var e=document.createElement("div");e.style.paddingTop="3px";var f=ddlQuery.cloneNode(true);f.onchange=showCondition;var p=document.createElement("span");p.className="spanLeft";e.appendChild(p);var j=ddlQueries.length;var l=ddlQueries[j-1].selectedIndex;var a=0;if(l+1<ddlQuery.options.length){a=l+1;}else{if(l-1>0){a=l-1;}}f.selectedIndex=a;if(h){f.value=h;}p.appendChild(f);p.appendChild(document.createTextNode(" "));var k=document.createElement("span");e.appendChild(k);k.className="spanLeft";var c=btnAddQuery.cloneNode(true);k.appendChild(c);c.onclick=addQuery;f.btnAddQuery=c;f.spanCondition=null;var g=btnDelQ.cloneNode(true);g.onclick=function(){delQuery(e,f);};k.appendChild(g);var i=document.createElement("div");i.style.clear="both";e.appendChild(i);ddlQuery.parentNode.parentNode.parentNode.appendChild(e);ddlQueries.push(f);if(parseInt(h)==h){if(b instanceof Array){BindQsQuestionData(f,b);}else{BindQsChoiceData(f,b);}}else{f.onchange();var m=f.spanCondition.getElementsByTagName("input");if(m[0]){m[0].value=o||"";}if(m[1]){m[1].value=n||"";if(n){m[1].parentNode.style.display="";}}if(b){var d=f.spanCondition.getElementsByTagName("select")[0];d.value=b;if(d.onchange){d.onchange();}}}}function isInt(a){return parseInt(a)==a;}function isDate(f){var b=/^(\d{1,4})(-|\/)(\d{1,2})\2(\d{1,2})$/;var c=f.match(b);if(c==null){return false;}var e=new Date(c[1],c[3]-1,c[4]);var a=e.getFullYear()+c[2]+(e.getMonth()+1)+c[2]+e.getDate();return a==f;}function checkData(){var a=this.checkType;switch(a){case"省份":break;case"来源":break;case"城市":break;case"IP地址":case"填写完成凭证":case"用户名":case"来源详情":break;case"提交答卷日期":if(!isDate(this.value)){this.value="";divQueryMsg.innerHTML="必须为日期(如2010-1-1)";}break;case"填写序号":break;case"填写所用时间":case"分数":if(!isInt(this.value)){this.value="";divQueryMsg.innerHTML="必须为整数";}break;}}function getQueryCond(){var f="";var r="";var u=0;var l=0;var k=new Object();for(var q=0;q<ddlQueries.length;q++){var v=ddlQueries[q].value;if(k[v]){continue;}k[v]="1";if(parseInt(v)==v){if(u>0){f+="〒";}var t="";if(htQuestion[v]){var s=ddlQueries[q].spanCondition.getElementsByTagName("input");var e=s[0];var g=ddlQueries[q].spanCondition.getElementsByTagName("select")[0];var j="";if(e.value){j=v+"§"+e.value+"§"+g.value;}if(htQuestion[v]=="2"){j+=";1";}if(htQuestion[v]=="2"&&g.value=="3"){if(s[1].value){j+="§"+s[1].value;}else{j="";}}f+=j;}else{if(htCheckQs[v]){var p=ddlQueries[q].spanCondition.getElementsByTagName("input");var o=0;for(var n=0;n<p.length;n++){var h=p[n];if(h.checked){if(o>0){t+="┋";}t+=h.value;o++;}}}else{var m=ddlQueries[q].spanCondition.getElementsByTagName("select")[0];t=m.value;}f+=v+","+t;}u++;}else{if(l>0){r+="〒";}var m=ddlQueries[q].spanCondition.getElementsByTagName("select")[0];var d=m.selectedIndex;var c=ddlQueries[q].spanCondition.getElementsByTagName("input");var b=c[0];var a=c[1];switch(v){case"省份":r+="7┋0┋"+m.value;break;case"来源":r+="8┋0┋"+m.value;break;case"城市":r+="9┋0┋"+m.value;break;case"IP地址":r+="10┋0┋"+b.value;break;case"填写完成凭证":r+="11┋0┋"+b.value;break;case"用户名":r+="12┋0┋"+b.value;break;case"来源详情":r+="13┋0┋"+b.value;break;case"提交答卷日期":r+="1┋"+d+"┋"+b.value+"┋"+a.value;break;case"填写所用时间":r+="3┋"+d+"┋"+b.value+"┋"+a.value;break;case"填写序号":r+="4┋"+d+"┋"+b.value+"┋"+a.value;break;case"分数":r+="5┋"+d+"┋"+b.value+"┋"+a.value;break;}l++;}}f=encodeURIComponent(f);r=encodeURIComponent(r);return[f,r];}document.onclick=function(a){if(window.calendar){calendar.hide();}};initQuery();