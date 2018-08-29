<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

	
        <title>告警日志</title>

        <link href="/Public/assets/bootstrap/css/style.default.css" rel="stylesheet">
        <link href="/Public/assets/bootstrap/css/select2.css" rel="stylesheet" />		
        <link href="/Public/assets/bootstrap/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="/Public/assets/bootstrap/css/bootstrap-datetimepicker.css" rel="stylesheet">
		<link href="/Public/assets/bootstrap/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
        <style type="text/css">
	 .Alertmessage{
		text-align: center;
	    color: red;
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
                       
                        <div class="panel panel-title-head">
                         <div class="search_banner">
                                <div>
	                                <!-- <div class="pull-left col-md-1">
	                                    <h4 class="panel-title">录音查询</h4>
	                                </div> -->
	                                <div class="pull-left col-md-4">
	                                <div class="input-group">
	                                <span class="search_input-group-addon">
										        告警状态：
									        :<select name="ClearFlag" id="ClearFlag" style="width: 100px;">
						            			<option value="-1">所有状态</option>
						                        <option value="0">未消除</option>
						                        <option value="1">已消除</option>
						                    </select>
						                    <select name='Level' id='Level' style="width: 125px;">
						                    	<option value=''>所有级别</option>
						                    	<option value="4">LOG_ERROR</option>
						                        <option value="6">LOG_NOTICE</option>
						                        <option value="7">LOG_INFO</option>
											</select>
									</span>
		                            </div>
	                                </div>
	                                <div class="pull-left " style="width: 45%;">
	                                <div class="input-group pull-left" style="padding:5px;">
		                                <lable class="pull-left">开始时间：<input name="datetimepicker_start" id="datetimepicker_start" type="text" value="<?php echo ($datetimepicker_start); ?>" /></lable>
		                                <lable class="pull-left">结束时间：<input name="datetimepicker_end" id="datetimepicker_end" type="text" value="<?php echo ($datetimepicker_end); ?>" /></lable>
		                             </div>
		                              
	                                </div>
	                               
	                                <div class="pull-left col-md-2">
											<button class="btn btn-info btn-large search">搜索</button>
	                                </div>
	                                 
                                </div>
                                <div style="clear:both"></div>
                            </div><!-- panel-heading -->   
                            <table id="basicTable" class="table table-striped table-bordered responsive">
                                <thead class="">
                                    <tr>
                                        <th><input type="checkbox" id="checked_all"></th>
                                        <th>告警模块</th>
                                        <th>告警状态</th>
                                        <th>告警等级</th>
                                        <th>告警内容</th>
                                        <th>告警时间</th>
                                        <th>处理人员</th>
                                        <th>处理时间</th>
                                    </tr>
                                </thead>
                         
                                <tbody>
                                  <!-- <tr role="row" class="odd"><td>1</td><td>admin</td><td class="sorting_1">男</td><td>市场</td><td>8632</td><td>8632</td><td>8632</td><td>备注</td><td><a href="./phoneBookEdit">编辑</a>|删除</td></tr> -->
                                </tbody>
                            </table>
                        </div><!-- panel -->
                        
                        
                            
                           
                        </div><!-- panel -->
                      
                        
                    </div><!-- contentpanel -->
                </div><!-- mainpanel --><!-- mainpanel -->
            </div><!-- mainwrapper -->
            
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
		        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
		        <button type="button" class="btn btn-primary sureDel">确定</button>
		      </div>
		    </div>
		  </div>
		</div> 
        </section>
		
        <script src="/Public/assets/bootstrap/js/jquery-1.11.1.min.js"></script>
        <script src="/Public/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="/Public/assets/bootstrap/js/jquery.datatables.min.js"></script>
        <script src="/Public/assets/bootstrap/js/bootstrap-datetimepicker.js"></script>
        <script src="/Public/assets/bootstrap/js/custom.js"></script>
        


<script type="text/javascript">
jQuery('#datetimepicker_start').datetimepicker.dates['zh'] = {  
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
var CHANNEL_TB;
var SearchMode=""
$(document).ready( function () {
	CHANNEL_TB =$('#basicTable').dataTable(
	        {
	        	
	            "ajax": {  //类似jquery的ajax参数，基本都可以用。
	                "type": "post",  //后台指定了方式，默认get，外加datatable默认构造的参数很长，有可能超过get的最大长度。
	                "url": '../System/alarmLog',
	                "dataSrc": "data",  //默认data，也可以写其他的，格式化table的时候取里面的数据
	                "data": function (d) {  //d 是原始的发送给服务器的数据，默认很长。Level
	                	d.ClearFlag = $("#ClearFlag").val();
	                	d.Level = $("#Level").val();
	                	d.datetimepicker_start=$('#datetimepicker_start').val();
	                	d.datetimepicker_end=$('#datetimepicker_end').val();
	                }
	            },
	        
	            "pagingType": "full_numbers",
	            //"sPaginationType": "full_numbers", //分页风格，full_number会把所有页码显示出来（大概是，自己尝试）
	            "sDom": "<'row-fluid inboxHeader'<'span6'<'dt_actions'>l><'span6'f>r>t<'row-fluid inboxFooter'<'span6'i><'span6'p>>", //待补充
	            "iDisplayLength": 10,  //每页显示10条数据
	            "bAutoWidth": false,  //宽度是否自动，感觉不好使的时候关掉试试
	            "bLengthChange": false,
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
//	            "sAjaxSource": '/index.php/Home/System/serach_nasty', //给服务器发请求的url
	            "aoColumns": [  //这个属性下的设置会应用到所有列，按顺序没有是空
	            	{"mData": function (mData)
	              	   {
	                      return "<input type='checkbox' class='checked_per_pro' name='checked_per_pro'  value='"+mData.n_sn+"' />"+mData.n_sn;
	                     }
	              	},
	                {"mData": 'v_modulename'},
	                {"mData": 'n_zt'},
	                {"mData": 'n_dj'},
	                {"mData": 'v_content'},
	                {"mData": 'd_logtime'},
	                {"mData": 'username'},
	                {"mData": 'd_cleartime'}
	                 
	            ],

	            "aoColumnDefs": [//和aoColums类似，但他可以给指定列附近属性
	                {"bSortable": false, "aTargets": [0,1, 2]}, //这句话意思是第1,3,6,7,8,9列（从0开始算） 不能排序
	                {"bSearchable": false, "aTargets": [ 2, 3]} //bSearchable 这个属性表示是否可以全局搜索，其实在服务器端分页中是没用的
	            ],
	            "aaSorting": [[2, "desc"]], //默认排序
	            "fnInitComplete": function (oSettings, json) { //表格初始化完成后调用 在这里和服务器分页没关系可以忽略
	                $("input[aria-controls='DataTables_Table_0']").attr("placeHolder", "请输入高手用户名");
	            }
	        });
})

$('.search').click(function(){

    CHANNEL_TB.fnClearTable();
    CHANNEL_TB.fnReloadAjax();
}) 

$("#checked_all").click(function() {
    var state = $("#checked_all").prop("checked");
    if(state == true) {
        $(".checked_per_pro").prop("checked", "checked");
    } else {
        $(".checked_per_pro").prop("checked", "");
    }
});

//删除选中的记录
function del(){
	//删除选中的记录
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
		var msg="注意！！\r\n\n此操作将把所选记录彻底删除";
		msg+="\r\n\n确定删除所选记录？";
		var url="phoneBookDel"
		if(confirm(msg)){
			$.ajax({
				type:"POST",
				url:url,
				data:{
					phoneBookID:toDel	
				},
				success: function(data){
					$('#alertModel').modal('show');
					$('.Alertmessage').html(data.message)
		   		    $('#alertModel').modal('hide');
		   		    alert(data.message)
		   		    window.location.reload()
				}
			})
		}
	}
}

	//消除告警
	function cl(id){ 
		if(id==""){
			alert("请选择要消除的告警");	
			return false;
		}
		var url = "clearAlarm";
		if(confirm("确定消除所选告警？")){
	  		$.ajax({
				type:"POST",
				url:url,
				data:{
					id:id	
				},
				success: function(data){
					$('#alertModel').modal('show');
					$('.Alertmessage').html(data.message)
		   		   // $('#alertModel').modal('hide');
		   		   // alert(data.message)
		   		   // window.location.reload()
				}
			})

		}else{
			if(id!=""){
			//点击单条告警后取消操作，如果有多选记录，则将toClear值恢复为所选ID，否则设置为空
				sum(document.form1.N_SN,document.form1.toClear);
			}
		}
	}

$(".sureDel").click(function(){
	$('#alertModel').modal('hide');
	 CHANNEL_TB.fnClearTable();
    CHANNEL_TB.fnReloadAjax();
})

	//统计指定复选框所选中的值，并把值保存到一个hidden控件
function sum(co,ho){
	var vStr="";
	if(!co){return vStr;}
	if(co.length>1){
		for(var i=0;i<co.length;i++){
			if(co[i].checked){
				vStr+=((vStr=="")?"":",")+co[i].value;
			}
		}
	}else{
		vStr=co.checked?co.value:"";
	}
	ho.value=vStr;
}
</script>	
		      
		
		
    </body>
</html>