<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

	
        <title>录音系统</title>
        <link href="/Public/assets/bootstrap/css/style.default.css" rel="stylesheet">
        <link href="/Public/assets/bootstrap/css/select2.css" rel="stylesheet" />		
        <link href="/Public/assets/bootstrap/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="/Public/assets/bootstrap/css/bootstrap-datetimepicker.css" rel="stylesheet">
		<link href="/Public/assets/bootstrap/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
        <link href="/Public/assets/bootstrap/css/bootstrap-multiselect.css" rel="stylesheet">
		<link href="/Public/assets/bootstrap/css/jquery.audioplayer.css" rel="stylesheet" />
		
		<style type="text/css">
.loadEffect{
    width: 100px;
    height: 100px;
    position: relative;
    margin: 0 auto;
	display:none;
 }
 .loadEffect span{
    display: inline-block;
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background: lightgreen;
    position: absolute;
    -webkit-animation: load 1.04s ease infinite;
 }
 @-webkit-keyframes load{
    0%{
       opacity: 1;
    }
    100%{
       opacity: 0.2;
    }
 }
 .loadEffect span:nth-child(1){
    left: 0;
    top: 50%;
    margin-top:-8px;
    -webkit-animation-delay:0.13s;
 }
 .loadEffect span:nth-child(2){
    left: 14px;
    top: 14px;
    -webkit-animation-delay:0.26s;
 }
 .loadEffect span:nth-child(3){
    left: 50%;
    top: 0;
    margin-left: -8px;
    -webkit-animation-delay:0.39s;
 }
 .loadEffect span:nth-child(4){
    top: 14px;
    right:14px;
    -webkit-animation-delay:0.52s;
 }
 .loadEffect span:nth-child(5){
    right: 0;
    top: 50%;
    margin-top:-8px;
    -webkit-animation-delay:0.65s;
 }
 .loadEffect span:nth-child(6){
    right: 14px;
    bottom:14px;
    -webkit-animation-delay:0.78s;
 }
 .loadEffect span:nth-child(7){
    bottom: 0;
    left: 50%;
    margin-left: -8px;
    -webkit-animation-delay:0.91s;
 }
 .loadEffect span:nth-child(8){
    bottom: 14px;
    left: 14px;
    -webkit-animation-delay:1.04s;
 }
 .Alertmessage{
	text-align: center;
    color: red;
 }

 #basicTable_length{
        float: right;
        margin-right: 10px;
 }

 .multiselect-native-select  ul{
    max-height: 450px;
    overflow: auto;
    width: 250px;
}

.fynr{
    width: 750px;

    word-wrap:break-word;
        line-height: 28px;
    height: 350px;
    overflow: auto;
}
        </style>
 
    </head>

    <body>
        
                   <header>
            <div class="headerwrapper">
                <div class="header-left">
                    <a href="index.html" class="logo">
                        <img src="/Public/assets/images/picture/logo.png" alt="" /> 
                    </a>
                    <div class="pull-right">
                        <a href="#" class="menu-collapse">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                </div><!-- header-left -->
                <div class="header-right">
                    <div class="pull-right">
                        
                        <div class="btn-group btn-group-list btn-group-notification">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                          
                              <span class="badge"><?php echo ($sys_Vinfo["v_value"]); ?>录音管理系统</span>
                            </button>
                           
                        </div><!-- btn-group -->
                        
                       
                       
                        
                    </div><!-- pull-right -->
                
            </div><!-- headerwrapper -->
        </header>
        
        <section>
            <div class="mainwrapper">
			   
			    <div class="leftpanel">
                    <div class="media profile-left">
                        <div class="panel-icon icon-globe"><i class="fa fa-user"></i></div>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo ($admininfo["v_accountname"]); ?></h4>
                            <span class="user-options"><a href="#"><i class="glyphicon glyphicon-user"></i></a>
                             
                              <!-- <a href="#"><i class="glyphicon glyphicon-log-out"></i></a> -->
							</span>
                        </div>
                    </div><!-- media -->
                    
                    
                    <ul class="nav nav-pills nav-stacked">
                        <li <?php if($CurrentPage == 'home'): ?>class='active'<?php endif; ?> ><a href="/home/index/index"><i class="fa fa-home"></i> <span>系统概况</span></a></li>
                        <li <?php if($CurrentPage == 'recordList'): ?>class='active'<?php endif; ?> ><a href="/home/record/recordList"><i class="fa fa-search-minus"></i> <span>录音查询</span></a></li>
                        <li <?php if($CurrentPage == 'recordCount'): ?>class='active'<?php endif; ?> ><a href="/home/record/recordCount"><i class="fa fa-bar-chart"></i> <span>录音统计</span></a></li>
                        <li class="parent"><a href="#"><i class="fa fa-id-card"></i> <span>账号管理</span></a>
                            <ul class="children"  <?php if($AccountSub == '1'): ?>style="display:block"<?php endif; ?>  >
                                <li <?php if($CurrentPage == 'userManage'): ?>class='active'<?php endif; ?> ><a href="/home/Account/userManage">用户管理</a></li>
                                <li <?php if($CurrentPage == 'phoneBook'): ?>class='active'<?php endif; ?> ><a href="/home/Account/phoneBook">电话簿</a></li>
                                <li <?php if($CurrentPage == 'departMent'): ?>class='active'<?php endif; ?> ><a href="/home/Account/departMent">分组管理</a></li>
                            </ul>
                        </li>
                        <li class="parent"><a href="#"><i class="fa fa-windows"></i> <span>系统管理</span></a>
                            <ul class="children"  <?php if($SystemSub == '1'): ?>style="display:block"<?php endif; ?> >
                                <li <?php if($CurrentPage == 'channel'): ?>class='active'<?php endif; ?> ><a href="/home/System/channelParameter">通道参数</a></li>
                                <li <?php if($CurrentPage == 'system'): ?>class='active'<?php endif; ?> ><a href="/home/System/systemParameter">系统参数</a></li>
                                <li <?php if($CurrentPage == 'license'): ?>class='active'<?php endif; ?> ><a href="/home/System/licenseInfo">注册信息</a></li>
                                <li <?php if($CurrentPage == 'disk'): ?>class='active'<?php endif; ?> ><a href="/home/System/diskParameter">硬盘参数</a></li>
                                <li <?php if($CurrentPage == 'ip'): ?>class='active'<?php endif; ?> ><a href="/home/System/ipLimint">IP限制</a></li>
                                <li <?php if($CurrentPage == 'station'): ?>class='active'<?php endif; ?> ><a href="/home/System/station">工作站配置</a></li>
                                <li <?php if($CurrentPage == 'operationLog'): ?>class='active'<?php endif; ?> ><a href="/home/System/operationLog">操作日志</a></li>  
                                <li <?php if($CurrentPage == 'alarmLog'): ?>class='active'<?php endif; ?> ><a href="/home/System/alarmLog">警告日志</a></li>                              
                            </ul>
                        </li>
						
                        <li class="parent"><a href="#"><i class="fa fa-file-text"></i> <span>相关下载</span></a>
                            <ul class="children"  <?php if($CurrentPage == 'download'): ?>style="display:block"<?php endif; ?>>
                                <li <?php if($CurrentPage == 'download'): ?>class='active'<?php endif; ?> ><a href="/home/Other/download">备份录音下载</a></li>
                                <li><a href="/Uploads/apps/RecordPlayer.exe">录音软件</a></li>
                            </ul>
                        </li>
                       <li><a href="/home/Login/login_out"><i class="fa fa-sign-out"></i> <span>退出系统</span></a></li> 
                    </ul>
                   
					
					<!-- <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="/index/index"><i class="fa fa-home"></i> <span>系统概况</span></a></li>
                        <li><a href="/index/record/recordList"><i class="fa fa-search-minus"></i> <span>用户管理</span></a></li>
						<li><a href="graphs.html"><i class="fa fa-bar-chart-o"></i> <span>Graphs &amp; Charts</span></a></li>
                        <li class="parent"><a href="#"><i class="fa fa-suitcase"></i> <span>UI Elements</span></a>
                            <ul class="children">
                                <li><a href="alerts.html">Alerts &amp; Notifications</a></li>
                                <li><a href="buttons.html">Buttons</a></li>
                                <li><a href="extras.html">Extras</a></li>
                                
                                
                                <li><a href="modals.html">Modals</a></li>
                                <li><a href="widgets.html">Panels &amp; Widgets</a></li>
                                <li><a href="sliders.html">Sliders</a></li>                                
                                <li><a href="tabs-accordions.html">Tabs &amp; Accordions</a></li>
                                <li><a href="typography.html">Typography</a></li>
                            </ul>
                        </li>
						<li><a href="icons.html"><i class="fa fa-cube"></i> <span>Icons</span></a></li>
                        <li class="parent"><a href="#"><i class="fa fa-edit"></i> <span>Forms</span></a>
                            <ul class="children">
                                <li><a href="code-editor.html">Code Editor</a></li>
                                <li><a href="general-forms.html">General Forms</a></li>
                                <li><a href="form-layouts.html">Layouts</a></li>
                                <li><a href="wysiwyg.html">Text Editor</a></li>
                                <li><a href="form-validation.html">Validation</a></li>
                                <li><a href="form-wizards.html">Wizards</a></li>
                            </ul>
                        </li>
                        <li class="parent"><a href="#"><i class="fa fa-bars"></i> <span>Tables</span></a>
                            <ul class="children">
                                <li><a href="basic-tables.html">Basic Tables</a></li>
                                <li><a href="data-tables.html">Data Tables</a></li>
                            </ul>
                        </li>
                        <li><a href="maps.html"><i class="fa fa-map-marker"></i> <span>Maps</span></a></li>
                        <li class="parent"><a href="#"><i class="fa fa-file-text"></i> <span>Pages</span></a>
                            <ul class="children">
                                <li><a href="notfound.html">404 Page</a></li>
                                <li><a href="blank.html">Blank Page</a></li>
                                <li><a href="calendar.html">Calendar</a></li>
                                <li><a href="invoice.html">Invoice</a></li>
                                <li><a href="locked.html">Locked Screen</a></li>
                                <li><a href="media-manager.html">Media Manager</a></li>
                                <li><a href="people-directory.html">People Directory</a></li>
                                <li><a href="profile.html">Profile</a></li>                                
                                <li><a href="search-results.html">Search Results</a></li>
                                <li><a href="signin.html">Sign In</a></li>
                                <li><a href="signup.html">Sign Up</a></li>
                            </ul>
                        </li>
                        
                    </ul> -->
                </div>
               
                
                <div class="mainpanel">
                    <div class="contentpanel">
                       
                        <div class="panel panel-title-head" >
                        <!--<form id="form1">-->
                            <div class="search_banner">
                                <div class="clearfix">
	                                <!-- <div class="pull-left col-md-1">
	                                    <h4 class="panel-title">录音查询</h4>
	                                </div> -->
	                                <div class="pull-left col-md-3">
	                                <div class="input-group" style="padding:5px;">
		                                <lable class="pull-left">开始时间：<input name="datetimepicker_start" id="datetimepicker_start" type="text" value="<?php echo ($datetimepicker_start); ?>" /></lable><br>
		                             </div>
		                             <div class="input-group" style="padding:5px;">
		                                <lable class="pull-left">结束时间：<input name="datetimepicker_end" id="datetimepicker_end" type="text" value="<?php echo ($datetimepicker_end); ?>" /></lable>                     
	                                 </div>
	                                </div>
	                                <div class="pull-left col-md-3">
	                                 	<div class="search_input_group">
	                                 	      
										      <span class="search_input-group-addon">
										        <input name="SearchMode"   value="0" type="radio" aria-label="...">按号码查询
										        <input name="SearchMode"   value="1" type="radio" aria-label="...">按姓名查询
										      </span>
										      <input type="text" name="search_key" id="search_key" class="search_form-control" aria-label="..." value="">
										     
									    </div><!-- /input-group -->
									    <div class="search_input_group">
										      <span class="search_input-group-addon">
										        <input name="InOut" value="2" type="radio" aria-label="...">拨出和来电
										        <input name="InOut" value="1" type="radio" aria-label="...">拨出
										        <input name="InOut" value="0" type="radio" aria-label="...">来电
										        <input name="has_video" id="has_video" value="1" type="checkbox" aria-label="...">有录像
										      </span>
									    </div><!-- /input-group -->
	                                </div>
	                                <div class="col-md-3">
		                                <div class="search_input_group">
										      <span class="search_input-group-addon">
										        	时长大于等于（秒）：
										      </span>
										      <input type="text" name="stime" id="stime"  class="search_form-control" value="1">
									    </div>
                                        <label for="id_select"></label>
                                            <select id="channels_sel" multiple="multiple" data-size="5">
                                                 <?php if(is_array($rsChno)): foreach($rsChno as $key=>$chnolist): ?><option value="<?php echo ($chnolist["chno"]); ?>"><?php echo ($chnolist["channelname"]); ?></option><?php endforeach; endif; ?>
                                            </select> 
	                                </div>
	                                <div class="col-md-3">
	                                	 
										       
										    <!-- <div class="dropdown-menu dropdown-menu-right">
											  	<div class="dropdown-menu-floatlist">
											  		<div id="channelblock" class="labelblock">
												  		<?php if(is_array($rsChno)): foreach($rsChno as $key=>$chnolist): ?><label for='chkChnl_<?php echo ($chnolist["n_channelno"]); ?>'><input type="checkbox" id='chkChnl_<?php echo ($chnolist["n_channelno"]); ?>' value="<?php echo ($chnolist["n_channelno"]); ?>"  name="chk_CN"/><?php echo ($chnolist["n_channelno"]); ?></label><?php endforeach; endif; ?>
											  		</div>
											  		<div class="clearfix">
											  			<label class="pull-right allchecked"><input id="allCheckBox" type="checkbox" />全选/全否</label>
											  			<p class="tip pull-right text-primary">提示:查找所有通道时可全不选中</p>
											  		</div>
											  	</div>
									    	</div> -->
									     
								    	<div class="col-xs-6">
								    		<div class="btn btn-info btn-large search">开始搜索</div>
										</div>
	                                </div>
                                </div>
                            </div>
                        <!--</form>-->
                        	
                        <!-- panel-heading -->
                        <div style="line-height: 50px;height: 50px;">
                             <div class="pull-left ">
	                                <button class="btn btn-primary btn-small " type="button" onclick="play('','')">播放选中录音</button>
	                          </div> 
	                          <div class="pull-left ">
	                                <button class="btn btn-info btn-small" type="button"  onclick="vplay('','')">播放选中录像</button>
	                          </div>
                             <div class="pull-left ">
	                                <button class="btn btn-danger btn-small" type="button" onclick="del(<?php echo canDel(); ?>)"
                    alt="删除选中记录">删除选中记录</button>
	                          </div> 
	                          <div class="pull-left ">
	                                <button class="btn btn-warning btn-small" type="button"  onclick="batDown()" >打包下载录音</button>
	                          </div>
                              <div class="pull-left ">
                                    <button class="btn btn-success btn-small" type="button"  onclick="batDownExcel()" >导出录音EXCEL</button>
                              </div>
                            <!--   <div class="pull-right ">
                                    <label>每页显示</label>
                                    <select name="pageSize" id="pageSize" onchange="changeSearch()">
                                        <option value="10">10条</option>
                                        <option value="20">20条</option>
                                        <option value="50">50条</option>
                                        <option value="100">100条</option>
                                        <option value="200">200条</option>
                                        <option value="500">500条</option>
                                        <option value="1000">1000条</option>
                                    </select>
                              </div> -->
	                          <div style="clear:both"></div>
                         </div>
						 <div class="table-responsive" style="max-height: 650px;width:100%;">
                            <table id="basicTable"  class="table table-striped table-bordered" >
                                <thead class="">
                                    <tr>
                                        <td><input type="checkbox" id="checked_all"></td>
                                        <th>线路号</th>
                                        <th>线路信息</th>
                                        <th>主叫</th>
                                        <th>被叫</th>
                                        <th>录音号码</th>
                                        <th>方向</th>
                                        <th>开始时间</th>
                                        <th>结束时间</th>
                                        <th>时长</th>
                                        <th>录音播放</th>
                                        <th>主叫录像</th>
                                        <th>被叫录像</th>
                                        <th>锁定</th>
                                        <th>备注</th>
                                    </tr>
                                </thead>
                         
                                <tbody>
                                  
                                </tbody>
                            </table>
							</div>
                        </div><!-- panel -->
                           
                        </div><!-- panel -->
                      
                    </div><!-- contentpanel -->
            </div><!-- mainwrapper -->
        </section>
		
		<div class="modal fade" id="videoPlayMod" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel" style="text-align: center;">正在玩命地打包</h4>
		      </div>
		      <div class="modal-body">
		        <div class="inner">
		        	<h4 class="downloadName"></h4>
		        </div>
		        <div class="loadEffect">
				     <span></span>
				     <span></span>
				     <span></span>
				     <span></span>
				     <span></span>
				     <span></span>
				     <span></span>
				     <span></span>
				</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
		        <!-- <button type="button" class="btn btn-primary">确定</button> -->
		      </div>
		    </div>
		  </div>
		</div>
		
		
		<!-- 告警模态框 -->
		<div class="modal fade" id="alertModel" tabindex="-1" role="dialog" aria-labelledby="myAlert">
		  <div class="modal-dialog" role="document" style="width:450px">
		    <div class="modal-content" >
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myAlert" style="text-align: center;">提示</h4>
		      </div>
		      <div class="modal-body">
		        <div class="inner">
		        	<h4 class="Alertmessage"> </h4>
		        </div>
		        
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-primary" data-dismiss="modal">关闭</button>
		        <!-- <button type="button" class="btn btn-primary">确定</button> -->
		      </div>
		    </div>
		  </div>
		</div>

        <!-- 翻译内容模态框 -->
        <div class="modal fade" id="fanyiModel" tabindex="-1" role="dialog" aria-labelledby="myFanyi">
          <div class="modal-dialog" role="document" style="width:800px">
            <div class="modal-content" >
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myFanyi" style="text-align: center;">翻译内容</h4>
              </div>
              <div class="modal-body">
                <div class="inner">
                    <div class="loadEffect">
                         <span></span>
                         <span></span>
                         <span></span>
                         <span></span>
                         <span></span>
                         <span></span>
                         <span></span>
                         <span></span>
                     </div>
                     <div class="fynr"></div>
                     
                </div>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">关闭</button>
                <!-- <button type="button" class="btn btn-primary">确定</button> -->
              </div>
            </div>
          </div>
        </div>


        <script src="/Public/assets/bootstrap/js/jquery-1.11.1.min.js"></script>
        <script src="/Public/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="/Public/assets/bootstrap/js/jquery.datatables.min.js"></script>
        <script src="/Public/assets/bootstrap/js/bootstrap-datetimepicker.js"></script>
        <script src="/Public/assets/bootstrap/js/bootstrap-multiselect.js"></script>
        <script src="/Public/assets/bootstrap/js/custom.js"></script>
        <script src="/Public/assets/bootstrap/js/jquery.audioplayer.js"></script>
<script type="text/javascript">


var CHANNEL_ARR = new Array();
var CHANNEL_TB;
var InOut = 2;
var SearchMode = 0;
var has_video = 0;
$(document).ready( function () {
	$('#channels_sel').multiselect({
            includeSelectAllOption: true,
            enableFiltering: true,
            buttonWidth: '200px'
        });

	
CHANNEL_TB = $('#basicTable').dataTable(
        {
        	
            "ajax": {  //类似jquery的ajax参数，基本都可以用。
                "type": "post",  //后台指定了方式，默认get，外加datatable默认构造的参数很长，有可能超过get的最大长度。
                "url": "<?php echo U('record/recordList');?>",
//              "dataSrc": "data",  //默认data，也可以写其他的，格式化table的时候取里面的数据
                "dataType":"json",
                "data":  function (d){  //d 是原始的发送给服务器的数据，默认很长。
                	$("input:radio[name='InOut']:checked").each(function() { 
                		InOut = $(this).val();  // 每一个被选中项的值
                    });	
                	$("input:radio[name='SearchMode']:checked").each(function() { 
                		SearchMode = $(this).val();  // 每一个被选中项的值
                    });
                	if($('#has_video').is(':checked')){
                		has_video = 1;
                	}
                    //console.log($('#channels_sel').val())
                	d.chk_CN = String($('#channels_sel').val());
                	d.datetimepicker_start=$('#datetimepicker_start').val();
                	d.datetimepicker_end=$('#datetimepicker_end').val();
                	d.SearchMode=SearchMode;
                	d.InOut=InOut;
                	d.search_key=$('#search_key').val();
                	d.has_video=has_video;
                	d.stime=$('#stime').val();
                    return d;
//              	d.chk_CN = CHANNEL_ARR;
//                  d.is_search = $('#is_search').val();
//                  $('#is_search').val(0);
                    //获取是否是查询,然后置0，0为非搜索查询
                }
            },
        
            "pagingType": "full_numbers",
            //"sPaginationType": "full_numbers", //分页风格，full_number会把所有页码显示出来（大概是，自己尝试）
            "sDom": "<'row-fluid inboxHeader'<'span6'<'dt_actions'>l><'span6'f>r>t<'row-fluid inboxFooter'<'span6'i><'span6'p>>", //待补充
            "aLengthMenu": [[10, 20, 50,100,500,1000], [10, 20, 50,100,500,1000]],
            "iDisplayLength": 10,  //每页显示10条数据
            "bAutoWidth": false,  //宽度是否自动，感觉不好使的时候关掉试试
            "bLengthChange": true,
            
            "bFilter": false,
            "oLanguage": {  //下面是一些汉语翻译
                "sSearch": "搜索",
                "sLengthMenu": "每页显示 _MENU_ 条记录",
                "sZeroRecords": "没有检索到数据",
                "sInfo": "显示 _START_ 至 _END_ 条 &nbsp;&nbsp;共 _TOTAL_ 条",
                "sInfoFiltered": "(筛选自 _MAX_ 条数据)",
                "sInfoEmtpy": "没有数据",
                "sProcessing": "正在加载数据...",
                "oPaginate":
                        {
                            "sFirst": "首页",
                            "sPrevious": "前一页",
                            "sNext": "后一页",
                            "sLast": "末页"
                        }
            },
            "bProcessing": true, //开启读取服务器数据时显示正在加载中……特别是大数据量的时候，开启此功能比较好
            "bServerSide": true, //开启服务器模式，使用服务器端处理配置datatable。注意：sAjaxSource参数也必须被给予为了给datatable源代码来获取所需的数据对于每个画。 这个翻译有点别扭。开启此模式后，你对datatables的每个操作 每页显示多少条记录、下一页、上一页、排序（表头）、搜索，这些都会传给服务器相应的值。
//            "sAjaxSource": '/index.php/Home/Record/serach_nasty', //给服务器发请求的url
            "aoColumns": [  //这个属性下的设置会应用到所有列，按顺序没有是空
            	{"mData": function (mData)
             	   {
                     return "<input type='checkbox' class='checked_per_pro' name='checked_per_pro'  value='"+mData.n_sn+"' />";
                    }
             	},
                {"mData": 'n_channelid'},
                {"mData": 'n_channelinfo'},
                {"mData": 'v_caller'},
                {"mData": 'v_called'},
                {"mData": 'v_ext'},
                {"mData": 'n_calldirection'},
                {"mData": 'd_starttime'},
                {"mData": 'd_stoptime'},
                {"mData": 'longtime'},
                {"mData": function(mData){
                    if(mData.translate !=''){
                        return mData.v_voicefileplay+"&nbsp;&nbsp;<span class='fanyi' style='cursor:pointer;' data-sn='"+mData.n_sn+"')'>翻译</span>";
                    }
                    return mData.v_voicefileplay;
                }},
                {"mData": 'local_video'},
                {"mData": 'remote_video'},
                {"mData": 'n_lock_info'},
                {"mData": 'remark_info'}
            ],

            "aoColumnDefs": [//和aoColums类似，但他可以给指定列附近属性
                {"bSortable": false, "aTargets": [0,1, 3, 6, 7, 8]}, //这句话意思是第1,3,6,7,8,9列（从0开始算） 不能排序
                {"bSearchable": false, "aTargets": [1, 2, 3, 4, 5, 6, 7, 8]} //bSearchable 这个属性表示是否可以全局搜索，其实在服务器端分页中是没用的
            ],
            "aaSorting": [[2, "desc"]], //默认排序
            "fnInitComplete": function (oSettings, json) { //表格初始化完成后调用 在这里和服务器分页没关系可以忽略
                $("input[aria-controls='DataTables_Table_0']").attr("placeHolder", "请输入高手用户名");
            }
            
        });
        
$('.search').click(function(){

    CHANNEL_TB.fnClearTable();
    CHANNEL_TB.fnReloadAjax();
     
}) 

 jQuery('#datetimepicker_start').datetimepicker.dates['zh'] = { 
        format : "yyyy-mm-dd hh:ii:ss", 
        days:       ["星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六","星期日"],  
        daysShort:  ["日", "一", "二", "三", "四", "五", "六","日"],  
        daysMin:    ["日", "一", "二", "三", "四", "五", "六","日"],  
        months:     ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月","十二月"],  
        monthsShort:  ["一", "二", "三", "四", "五", "六", "七", "八", "九", "十", "十一", "十二"],  
        meridiem:    ["上午", "下午"],  
        //suffix:      ["st", "nd", "rd", "th"],  
        today:       "今天"  
}; 

jQuery('#datetimepicker_end').datetimepicker.dates['zh'] = {  
    format : "yyyy-mm-dd hh:ii:ss",
    days:       ["星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六","星期日"],  
    daysShort:  ["日", "一", "二", "三", "四", "五", "六","日"],  
    daysMin:    ["日", "一", "二", "三", "四", "五", "六","日"],  
    months:     ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月","十二月"],  
    monthsShort:  ["一", "二", "三", "四", "五", "六", "七", "八", "九", "十", "十一", "十二"],  
    meridiem:    ["上午", "下午"],  
    //suffix:      ["st", "nd", "rd", "th"],  
    today:       "今天"  
}; 
		
	jQuery('#datetimepicker_start').datetimepicker({language:'zh'});
	jQuery('#datetimepicker_end').datetimepicker({language:'zh'});
	

	$('.dropdown-menu-floatlist').on('click',function(e){
		e.stopPropagation();
	}).on('change','#allCheckBox', function(e){
//		console.log($(e.target).prop('checked'))
		$('#channelblock').find('[type=checkbox]').prop('checked',$(e.target).prop('checked'));
		channelArrSet();
	}).on('change','#channelblock [type=checkbox]', function(e){
		channelArrSet();
	});
	
	
	
	$('body').on('click', '.video-play',function(e){
		e.preventDefault();
		$('#videoPlayMod').modal('show');
		var $tr = $(e.currentTarget).parents('tr').clone();
		$('#videoPlayMod').find('table').find('tbody').html($tr)
	});
	
	$('#videoPlayMod').on('show.bs.modal',function(e){
//		console.log(e)
		$(e.target).find('.videoName').text('123')	
		$(e.target).find('.videoBlock').html('<audio src="" controls="controls">您的浏览器不支持 video 标签。</audio>');
		$(e.target).find('audio').attr('src','/Public/assets/video/Iron.mp3').audioPlayer();
	})
	
	$('#videoPlayMod').on('hidden.bs.modal',function(e){
		$(e.target).find('.videoBlock').empty()
	})
	
	

})  

function changeSearch(){
     CHANNEL_TB.fnClearTable();
    CHANNEL_TB.fnReloadAjax();
}
function channelArrSet(){
	CHANNEL_ARR = [];
	$('#channelblock').find('[type=checkbox]').each(function(){
		if($(this).prop('checked') == true)
		CHANNEL_ARR.push(parseInt($(this).val()));
	})
	CHANNEL_ARR.sort();
}

function channelElnSet(arr){
	CHANNEL_ARR = arr;
	for(var i in CHANNEL_ARR){
		$('chkChnl_'+CHANNEL_ARR[i]).prop('checked')
	}
}

$("#checked_all").click(function() {
    var state = $("#checked_all").prop("checked");
    if(state == true) {
        $(".checked_per_pro").prop("checked", "checked");
    } else {
        $(".checked_per_pro").prop("checked", "");
    }
});



//播放当前选中的录音
function play(N_SN,fname){
	//获得窗口的垂直位置 
    var iTop = (window.screen.availHeight - 30 - 380) / 2; 
    //获得窗口的水平位置 
    var iLeft = (window.screen.availWidth - 10 - 450) / 2; 
    
	var url="recordPlayer?Rnd="+Math.random()+"&listItem=";
	if(N_SN!=""){
         //直接点击某条录音的小喇叭，只播放当前录音
		var dsc="dialogWidth=450px;dialogHeight=425px;status=no";
		window.open(url+N_SN+"&fname="+fname,"player","height=380,width=450, top="+ iTop + ",left="+ iLeft + ", toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no,status=no");
		
	}else{
		//点击播放选中的录音
		var Items =""
		 $('input[name="checked_per_pro"]:checked').each(function(){ 
			 if(Items ==""){
				 Items = $(this).val()
			 }
			 else{
				 Items = Items +","+ $(this).val()
			 }
		}); 
		if(Items!=""){
			//window.open(url+Items);
			window.open(url+Items,"player","height=380,width=450, top="+ iTop + ",left="+ iLeft + ",toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no,status=no");
		}else{
			$('#alertModel').modal('show');
			$('.Alertmessage').html('请选择要播放的录音') 
			return;
		}
	}
}
 
 
//播放当前选中的录音
function vplay(N_SN,fname){
	//获得窗口的垂直位置 
    var iTop = (window.screen.availHeight - 30 - 700) / 2; 
    //获得窗口的水平位置 
    var iLeft = (window.screen.availWidth - 10 - 700) / 2;
    
	var url="videoPlayer?Rnd="+Math.random()+"&listItem=";
	//var dsc="dialogWidth=450px;dialogHeight=400px;status=no";
	if(N_SN!=""){
		//直接点击某条录音的小喇叭，只播放当前录音
		var dsc="dialogWidth=450px;dialogHeight=425px;status=no";
		 
        window.open(url+N_SN+"&fname="+fname,"player","height=700,width=700, top="+ iTop + ",left="+ iLeft + ", toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no,status=no");
		//模式窗口，需关闭播放器后才能选择其他录音，不方便
		//window.showModalDialog(url+N_SN+"&fname="+fname,"录音文件试听",dsc);
		
	}else{
		//点击播放选中的录音
		var Items =""
		 $('input[name="checked_per_pro"]:checked').each(function(){ 
			 if(Items ==""){
				 Items = $(this).val()
			 }
			 else{
				 Items = Items +","+ $(this).val()
			 }
		}); 
		if(Items!=""){
			//window.open(url+Items);
			window.open(url+Items,"player","height=700,width=700, top="+ iTop + ",left="+ iLeft + ",toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no,status=no");
			//window.showModalDialog(url+Items,"录音文件试听",dsc);
		}else{
			$('#alertModel').modal('show');
			$('.Alertmessage').html('请选择要播放的录象') 
			return;
		}
	}
}


//删除选中的记录
function del(flag){
	if(!flag){
		$('#alertModel').modal('show');
		$('.Alertmessage').html('无权操作，请与管理员联系') 
		return;
		}
	//删除选中的录音
	var toDel =""
	 $('input[name="checked_per_pro"]:checked').each(function(){ 
		 if(toDel ==""){
			 toDel = $(this).val()
		 }
		 else{
			 toDel = toDel +","+ $(this).val()
		 }
	}); 
	if(toDel==""){
		$('#alertModel').modal('show');
		$('.Alertmessage').html('请选中要删除的记录') 
		return;
	}else{
		var msg="注意！！\r\n\n此操作将把所选记录(锁定记录除外)及相关录音文件彻底删除";
		msg+="\r\n\n确定删除所选记录？";
		var url="delRecord"
		if(confirm(msg)){
			$.ajax({
				type:"POST",
				url:url,
				data:{
					strID:toDel	
				},
				success: function(data){
					console.log(data)
					if(data.code){
						alert(data.message);
                        window.location.href="/home/record/recordList"
					}
				}
			})
		}
	}
}

//打包下载
function batDown(){
	var Items =""
	var i =""
		 $('input[name="checked_per_pro"]:checked').each(function(){ 
			 if(Items ==""){
				 Items = $(this).val()
			 }
			 else{
				 Items = Items +","+ $(this).val()
			 }
			 i++
		}); 
	if(Items==""){
		$('#alertModel').modal('show');
		$('.Alertmessage').html('请选择要打包的录像') 
		return;
	}
	if(i>1000){
		var tips="提示：当前记录总数超过1000条，数量较多，全部打包将有可能失败。\r\n建议区分每页打包下载";
		tips+="\r\n\r\n点击【确定】继续打包所有记录\r\n点击【取消】重新选择"
		if(!confirm(tips)){
			return false;
		}
	}
	$('#videoPlayMod').modal('show');
	$('.downloadName').css("display","none");
	var url="recordZip"
	$.ajax({
		type:"POST",
		url:url,
		data:{
			strID:Items
		},
		beforeSend:function(XMLHttpRequest){ 
			$('.loadEffect').css("display","block");
		}, 
		success: function(data){
			if(data.code){
				$('.loadEffect').css("display","none");
				$('.downloadName').css("display","block");
				$('.modal-title').html("操作完成");
				$('.downloadName').html(data.message)
			}
		}
	})
}


function batDownExcel(){
        $("input:radio[name='InOut']:checked").each(function() { 
            InOut = $(this).val();  // 每一个被选中项的值
        }); 
        $("input:radio[name='SearchMode']:checked").each(function() { 
            SearchMode = $(this).val();  // 每一个被选中项的值
        });
        if($('#has_video').is(':checked')){
            has_video = 1;
        }
   
        chk_CN = String(CHANNEL_ARR);
        datetimepicker_start=$('#datetimepicker_start').val();
        datetimepicker_end=$('#datetimepicker_end').val();
        SearchMode=SearchMode;
        InOut=InOut;
        search_key=$('#search_key').val();
        has_video=has_video;
        stime=$('#stime').val();


        $('#videoPlayMod').modal('show');
        $('.downloadName').css("display","none");
        var url="downloadRecordExcel"
        $.ajax({
            type:"POST",
            url:url,
            data:{
                InOut:InOut,SearchMode:SearchMode,has_video:has_video,chk_CN:chk_CN,datetimepicker_start:datetimepicker_start,datetimepicker_end:datetimepicker_end,search_key:search_key
            },
            beforeSend:function(XMLHttpRequest){ 
                $('.loadEffect').css("display","block");
            }, 
            success: function(data){
                $('.loadEffect').css("display","none");
                $('.downloadName').css("display","block");
                $('.modal-title').html("操作完成");
                $('.downloadName').html("成功导出录音记录文件：<a href='"+data.data+"'>点击下载</a>")

                
            }
        })
    }

$('body').on('click', '.fanyi',function(){
    var n_sn = $(this).data('sn')
    if(n_sn ==''){
        alert('获取信息失败，请刷新重试');
        return;
    }
    $(".fynr").html('');
    $('#fanyiModel').modal('show');
    $.ajax({
        type:"post",
        url:"/home/login/getfanyi",
        async:true,
        data:{n_sn:n_sn}, 
        beforeSend:function(XMLHttpRequest){ 
            $('.loadEffect').css("display","block");
        }, 
        success:function(data){
            $('.loadEffect').css("display","none");
            if(data.code){  
                $(".fynr").html(data.data);
                 
                
            }else{ 
                $(".fynr").html(data.msg);
                return;
            } 
        }
    });
});   
   

    function Remark(sn,bak){
        $('#fanyiModel').modal('show');
    } 
</script>        
		
		
    </body>
</html>