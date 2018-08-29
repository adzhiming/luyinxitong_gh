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
		<link href="/Public/assets/bootstrap/css/jquery.audioplayer.css" rel="stylesheet" />
    </head>
<script type="text/javascript">
var SearchMode = "<?php echo ($SearchMode); ?>"
</script>
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
                              <form id="form1" method="post" action="">
                                <div>
	                                <!-- <div class="pull-left col-md-1">
	                                    <h4 class="panel-title">录音查询</h4>
	                                </div> -->
	                                <div class="pull-left col-md-3">
	                                <div class="input-group" style="padding:5px;">
		                                <lable class="pull-left">开始时间：<input name="datetimepicker_start" id="datetimepicker_start" type="text" value="<?php echo ($datetimepicker_start); ?>" /></lable><br>
		                             </div>
		                             
	                                </div>
	                                <div class="pull-left col-md-3">
	                                 	<div class="input-group" style="padding:5px;">
		                                <lable class="pull-left">结束时间：<input name="datetimepicker_end" id="datetimepicker_end" type="text" value="<?php echo ($datetimepicker_end); ?>" /></lable>                     
	                                 </div>
	                                </div>
	                                <div class="pull-left col-md-1">
		                                <div class="search_input_group">
										      <span class="search_input-group-addon">
										        <input name="SearchMode" value="0" type="checkbox" aria-label="..." <?php if($SearchMode == 0): ?>checked<?php endif; ?>>详细信息
										      </span>
									    </div><!-- /input-group -->
	                                </div>
	                                <div class="pull-left col-md-2">
	                                        <button class="btn btn-success btn-large">打印</button>
											<button class="btn btn-info btn-large">搜索</button>
	                                </div>
                                </div>
                                </form>
                                <div style="clear:both"></div>
                            </div><!-- panel-heading -->
                            <table id="basicTable" class="table table-striped table-bordered responsive">
                                <thead class="">
                                    <tr>
                                        <?php if($SearchMode == 0): ?><th>通道号</th>
	                                        <th>主叫</th>
	                                        <th>被叫</th>
	                                        <th>录音号码</th>
	                                        <th>方向</th>
	                                        <th>录音/录像</th>
	                                        <th>开始时间</th>
	                                        <th>时长</th>
                                        <?php else: ?>
                                            <th>通道号</th>
	                                        <th>录音次数</th>
	                                        <th>录音时长</th>
	                                        <th>录像次数</th>
	                                        <th>录像时长</th><?php endif; ?>
                                    </tr>
                                </thead>
                         
                                <tbody>
                                  
                                </tbody>
                            </table>
                        </div><!-- panel -->
                        
                        
                            
                           
                        </div><!-- panel -->
                      
                        
                    </div><!-- contentpanel -->
                </div><!-- mainpanel --><!-- mainpanel -->
            </div><!-- mainwrapper -->
        </section>
		
        <script src="/Public/assets/bootstrap/js/jquery-1.11.1.min.js"></script>
        <script src="/Public/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="/Public/assets/bootstrap/js/jquery.datatables.min.js"></script>
        <script src="/Public/assets/bootstrap/js/bootstrap-datetimepicker.js"></script>
        <script src="/Public/assets/bootstrap/js/custom.js"></script>

<script type="text/javascript">
$(document).ready( function () {
	
if(SearchMode == 0){
table=$('#basicTable').dataTable(
        {
            "ajax": {  //类似jquery的ajax参数，基本都可以用。
                "type": "post",  //后台指定了方式，默认get，外加datatable默认构造的参数很长，有可能超过get的最大长度。
                "url": '../record/recordCount',
                "dataSrc": "data",  //默认data，也可以写其他的，格式化table的时候取里面的数据
                "data": function (d) {  //d 是原始的发送给服务器的数据，默认很长。
                    d.datetimepicker_start = $('#datetimepicker_start').val();
                    d.datetimepicker_end = $('#datetimepicker_end').val();
                    d.SearchMode = SearchMode;
                   
                    //获取是否是查询,然后置0，0为非搜索查询
                }
            },
        
            "pagingType": "full_numbers",
            //"sPaginationType": "full_numbers", //分页风格，full_number会把所有页码显示出来（大概是，自己尝试）
            "sDom": "<'row-fluid inboxHeader'<'span6'<'dt_actions'>l><'span6'f>r>t<'row-fluid inboxFooter'<'span6'i><'span6'p>>", //待补充
            "iDisplayLength": 12,  //每页显示10条数据
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
//            "sAjaxSource": '/index.php/Home/Record/serach_nasty', //给服务器发请求的url
            "aoColumns": [  //这个属性下的设置会应用到所有列，按顺序没有是空
                {"mData": 'n_channelid'},
                {"mData": 'v_called'},
                {"mData": 'v_caller'},
                {"mData": 'v_caller'},
                {"mData": 'n_calldirection'},
                {"mData": 'v_voicefile'},
                {"mData": 'd_starttime'},
                {"mData": 'longtime'},
            ],

            "aoColumnDefs": [//和aoColums类似，但他可以给指定列附近属性
                {"bSortable": false, "aTargets": [1, 3, 6, 7]}, //这句话意思是第1,3,6,7,8,9列（从0开始算） 不能排序
                {"bSearchable": false, "aTargets": [1, 2, 3, 4, 5, 6, 7]} //bSearchable 这个属性表示是否可以全局搜索，其实在服务器端分页中是没用的
            ],
            "aaSorting": [[2, "desc"]], //默认排序
            "fnInitComplete": function (oSettings, json) { //表格初始化完成后调用 在这里和服务器分页没关系可以忽略
                $("input[aria-controls='DataTables_Table_0']").attr("placeHolder", "请输入高手用户名");
            }
        });
}
else
{
	table=$('#basicTable').dataTable(
	        {
	            "ajax": {  //类似jquery的ajax参数，基本都可以用。
	                "type": "post",  //后台指定了方式，默认get，外加datatable默认构造的参数很长，有可能超过get的最大长度。
	                "url": '../record/recordCount',
	                "dataSrc": "data",  //默认data，也可以写其他的，格式化table的时候取里面的数据
	                "data": function (d) {  //d 是原始的发送给服务器的数据，默认很长。
                         d.datetimepicker_start = $('#datetimepicker_start').val();
                         d.datetimepicker_end = $('#datetimepicker_end').val();
	                	 d.SearchMode = SearchMode;
	                    //获取是否是查询,然后置0，0为非搜索查询
	                }
	            },
	        
	            "pagingType": "full_numbers",
	            //"sPaginationType": "full_numbers", //分页风格，full_number会把所有页码显示出来（大概是，自己尝试）
	            "sDom": "<'row-fluid inboxHeader'<'span6'<'dt_actions'>l><'span6'f>r>t<'row-fluid inboxFooter'<'span6'i><'span6'p>>", //待补充
	            "iDisplayLength": 12,  //每页显示10条数据
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
//	            "sAjaxSource": '/index.php/Home/Record/serach_nasty', //给服务器发请求的url
	            "aoColumns": [  //这个属性下的设置会应用到所有列，按顺序没有是空
	                {"mData": 'n_channelid'},
	                {"mData": 'camount'},
	                {"mData": 'recordtime'},
	                {"mData": 'vtimes'},
	                {"mData": 'vsecond'}
	            ],

	            "aoColumnDefs": [//和aoColums类似，但他可以给指定列附近属性
	                {"bSortable": false, "aTargets": [1, 3]}, //这句话意思是第1,3,6,7,8,9列（从0开始算） 不能排序
	                {"bSearchable": false, "aTargets": [1, 2, 3]} //bSearchable 这个属性表示是否可以全局搜索，其实在服务器端分页中是没用的
	            ],
	            "aaSorting": [[2, "desc"]], //默认排序
	            "fnInitComplete": function (oSettings, json) { //表格初始化完成后调用 在这里和服务器分页没关系可以忽略
	                $("input[aria-controls='DataTables_Table_0']").attr("placeHolder", "请输入高手用户名");
	            }
	        });
	
}
        
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
</script>

    </body>
</html>