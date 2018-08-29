<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

	
        <title>用户管理</title>

        <link href="/Public/assets/bootstrap/css/style.default.css" rel="stylesheet">
        <link href="/Public/assets/bootstrap/css/select2.css" rel="stylesheet" />		
        <link href="/Public/assets/bootstrap/css/jquery.dataTables.min.css" rel="stylesheet">
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
                       
                       	<div class="col-md-12">
                                <form id="basicForm" method="post" action="userAdd">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-btns">
                                            <a href="#" class="panel-minimize tooltips" data-toggle="tooltip" title="Minimize Panel"><i class="fa fa-minus"></i></a>
                                            <a href="#" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
                                        </div><!-- panel-btns -->
                                        <h4 class="panel-title">用户添加</h4>
                                    </div><!-- panel-heading -->
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">用户名 <span class="asterisk">*</span></label>
                                                <div class="col-sm-6">
                                                    <input type="text" id="username" name="username" class="form-control" placeholder="用户名" required />
                                                </div>
                                            </div><!-- form-group -->
                                          
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">密码 <span class="asterisk">*</span></label>
                                                <div class="col-sm-6">
                                                    <input type="email" id="password" name="password" class="form-control" placeholder="密码" required />
                                                </div>
                                            </div><!-- form-group -->
                                          
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">用户权限</label>
                                                <div class="col-sm-6">
                                                      <div class="ckbox ckbox-primary col-sm-2">
                                                        <input type="checkbox" value="1" id="int_search" name="can">
	                                                    <label for="int_search">查询</label>
	                                                  </div>
	                                                  <div class="ckbox ckbox-primary col-sm-2">  
	                                                    <input type="checkbox" value="1" id="int_del" name="can">
	                                                    <label for="int_del">删除</label>
	                                                    </div>
	                                                    <div class="ckbox ckbox-primary col-sm-2">
	                                                    <input type="checkbox" value="1" id="int_manage" name="can">
	                                                    <label for="int_manage">管理</label>
	                                                    </div>
	                                                    <div class="ckbox ckbox-primary col-sm-2">
	                                                    <input type="checkbox" value="1" id="int_lock" name="can">
	                                                    <label for="int_lock">锁定</label>
	                                                    </div>
                                                    </div>
                                              </div><!-- form-group -->
                                            
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">有权号码<span class="asterisk">*</span></label>
                                                <div class="col-sm-6">
                                                    <textarea rows="5" id="privilege" name="privilege" class="form-control" placeholder="有权号码，指用户有权查看录音的号码。此项留空则可查看所有号码的录音。 
多个号码用逗号隔开，系统将自动过滤非数字字符。" required></textarea>
                                                </div>
                                            </div><!-- form-group -->
                                            
                                            <div class="form-group">
	                                            <label class="col-sm-2 control-label">工作站<span class="asterisk">*</span></label>
	                                            <div class="col-sm-6">
	                                            <?php if(is_array($station)): foreach($station as $key=>$list): ?><div class="ckbox ckbox-primary">
	                                                    <input type="checkbox" id="site_<?php echo ($list["n_sid"]); ?>" class="selectStation" value="<?php echo ($list["n_sid"]); ?>" name="site" required="">
	                                                    <label for="site_<?php echo ($list["n_sid"]); ?>"><?php echo ($list["v_sname"]); ?></label>
	                                                </div><!-- rdio --><?php endforeach; endif; ?>
	                                             <div class="ckbox ckbox-primary">
	                                                    <input type="checkbox" value="f"  id="checkSiteAll" name="checkSiteAll">
	                                                    <label for="checkSiteAll">全选/全否</label>
	                                              </div>   
	                                                
	                                            </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">备注信息<span class="asterisk">*</span></label>
                                                <div class="col-sm-6">
                                                    <textarea rows="5" id="remark" name="remark" class="form-control" placeholder="备注信息" required></textarea>
                                                </div>
                                            </div><!-- form-group -->
                                        </div><!-- row -->
                                        <div class="modal-footer col-sm-6">
									        <a href="/home/Account/userManage" class="btn btn-default" data-dismiss="modal">取消</a>
									        <button type="button" class="btn btn-primary submit">添加</button>
									    </div>
                                    </div><!-- panel-body -->
                           
                                </div><!-- panel -->
                                </form>
                                
                            </div><!-- col-md-6 -->
                           
                            
					      
                        </div><!-- panel -->
                      
                        <div style="clear:both"></div>
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
		        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
		        <button type="button" class="btn btn-primary ok">确定</button>
		      </div>
		    </div>
		  </div>
		</div>
        </section>
		
        <script src="/Public/assets/bootstrap/js/jquery-1.11.1.min.js"></script>
        <script src="/Public/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="/Public/assets/bootstrap/js/custom.js"></script>
        


<script type="text/javascript">
$(document).ready( function () {
  $('.submit').click(function(){
	   var username = $('#username').val()
	   var password = $('#password').val()
	   var privilege = $('#privilege').val();
	   var remark = $('#remark').val();
       var canItems = -1
       var val = 0 
    	   $("input[name='can']").each(function(){
               if($(this).is(":checked"))
               {
            	   val = 1
               }
               else{
            	   val = 0
               }
               
               if(canItems ==  -1){
            	   canItems = val
			   }
			  else{
				  canItems = canItems +","+ val
				}
             });
       
       var stationid =""
    		 $('input[name="site"]:checked').each(function(){ 
    			 if(stationid ==""){
    				 stationid = $(this).val()
    			 }
    			 else{
    				 stationid = stationid +","+ $(this).val()
    			 }
       }); 
       if(username ==''){
    	   $('#alertModel').modal('show');
   		   $('.Alertmessage').html('用户名不能为空') 
   		   return;
       }
       if(password ==''){
    	   $('#alertModel').modal('show');
   		   $('.Alertmessage').html('密码不能为空') 
   		   return;
       }
      var url = "userAdd" 
	  $.ajax({
				type:"POST",
				url:url,
				data:{
					username:username,password:password,canItems:canItems,privilege:privilege,stationid:stationid,remark:remark	
				},
				success: function(data){
					if(data.code){
						$('.Alertmessage').css("color",'#1fb5ad');
					}
					else{
						$('.Alertmessage').css("color",'red');
					}
				    $('#alertModel').modal('show');
		   		    $('.Alertmessage').html(data.message)
				}
	 })
  })

  $("#checkSiteAll").click(function() {
	    var state = $("#checkSiteAll").prop("checked");
	    if(state == true) {
	        $(".selectStation").prop("checked", "checked");
	    } else {
	        $(".selectStation").prop("checked", "");
	    }
	});
  
}) 

$('.ok').click(function(){
   $('#alertModel').modal('hide');
   window.location.href="/home/Account/userManage"
})     
</script>        
		
		
    </body>
</html>