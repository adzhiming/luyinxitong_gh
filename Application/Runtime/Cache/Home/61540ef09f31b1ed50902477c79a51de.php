<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

	
        <title>系统参数</title>

        <link href="/Public/assets/bootstrap/css/style.default.css" rel="stylesheet">
        <link href="/Public/assets/bootstrap/css/select2.css" rel="stylesheet" />		
        <link href="/Public/assets/bootstrap/css/jquery.dataTables.min.css" rel="stylesheet">
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
                	<form action="" method="post" enctype="application/x-www-form-urlencoded">
                    <div class="contentpanel">
                       
                        <div class="panel panel-title-head">
                        <div class="search_banner">
                             <div class="pull-left col-md-1">
	                                <span class="btn btn-info btn-large downloadPeizhi">导出配置</span>
	                          </div> 
	                          <div class="pull-left col-md-1"> 
	                                <a class="btn btn-info btn-large" href="<?php echo U('home/System/backupUpload/type/system');?>">恢复配置</a>
	                          </div>
	                          <div style="clear:both"></div>
                         </div>   
                            <table id="basicTable" class="table table-striped table-bordered responsive">
                                <thead class="">
                                    <tr>
                                        <th>参数名称</th>
                                        <th>参数取值</th>
                                        <th>参数描述</th>
                                    </tr>
                                </thead>
                         
                                <tbody>
                                  <?php if(is_array($rs)): foreach($rs as $key=>$list): ?><tr role="row">
	                                     <td><?php echo ($list["v_paramsnamech"]); ?></td>
	                                     <td><?php echo ($list["paramsset"]); ?></td>
	                                     <td><?php echo ($list["v_describe"]); ?><input type='hidden' name="hid<?php echo ($list["v_paramsname"]); ?>" value="<?php echo ($list["v_value"]); ?>"></td>
	                                  </tr><?php endforeach; endif; ?>
                                </tbody>
                            </table>
                        </div><!-- panel -->
                        
                        <div class="col-md-3">
                        	<input type="hidden" name="strPname" value="<?php echo $strPname; ?>" />
                            <input type="hidden" name="todo" id="todo"  />
	                        <input class="btn btn-info btn-large" type="button" value="提交修改" onclick="formSub('update')">
	                        <input class="btn btn-info btn-large" type="button" value="恢复默认值"  onclick="formSub('setDefault')">
	                    </div>
                            
                           
                        </div><!-- panel -->
                      </form>
                        
                    </div><!-- contentpanel -->
                </div><!-- mainpanel --><!-- mainpanel -->
            </div><!-- mainwrapper -->
            
            
        </section>
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
		        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
		        <button type="button" class="btn btn-primary sureDel" data-dismiss="modal">确定</button>
		      </div>
		    </div>
		  </div>
		</div> 


		<div class="modal fade" id="pathMod" tabindex="-1" role="dialog" >
		  <div class="modal-dialog" role="document" id="selectcontent">

		  </div>
		</div>
        <script src="/Public/assets/bootstrap/js/jquery-1.11.1.min.js"></script>
        <script src="/Public/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="/Public/assets/bootstrap/js/custom.js"></script>
    </body>
    <script>
	function formSub(todo){
		$("#todo").val(todo);
		if(todo=="setDefault"){
			if(!confirm("确定将所有参数恢复默认值？")){
				return false;	
			}
		}else{
			var c;
			if(document.forms[0].Sys_AutoBakDir){
			//有录音自动备份路径时，禁止使用中文路径
				c=document.forms[0].Sys_AutoBakDir;
				if(/.*[\u4e00-\u9fa5]+.*$/.test(c.value)){    
					alert("发生错误！\r\n系统不支持包含中文的录音路径！");
					c.select();
					return false;    
				} 
			}
			//跨局代答码验证:
			if(document.forms[0].ExchangeNumber){
				c=document.forms[0].ExchangeNumber;
				var v=c.value;
				if(v!=""){
					var V_char="0123456789*#";
					for(var i=0;i<v.length;i++){
						var temp=v.substr(i,1);
						if(V_char.indexOf(temp)<0){
							alert("输入错误：代答码包含非法字符，仅允许使用:"+V_char);
							c.focus();
							return false;
						}
					}
				}
			}
			if(!confirm("确定修改系统参数？")){
				return false;	
			}
		}
		document.forms[0].submit();
	}

	//数据有效性检测
	function check(obj,pn){
		var pv=obj.value.replace(/\ /g,"");
		if(pv==""){
			alert("参数值禁止为空!");
			obj.focus();
			return false;
		}
		var rv=getRegEx(pn);			//获取参数预定正则表达式，用于验证用户输入是否非法
		//alert(rv);
		if(rv.reg==""){return true;}	//未定验证规则，不做验证
		re = new RegExp(rv.reg);
		//alert(re);
		var tmp=pv.match(re);
		if(tmp==null){
			alert(rv.msg);
			obj.focus();
			return false;
		}else{
			tmp=tmp.toString().split(",")[0];
			if(tmp==pv){
				return true;
			}else{
				alert(rv.msg);
				obj.focus();
				return false;	
			}	
		}
	}

	
	function SetPath(o,showFile,disk){
/*		var p=$(o).val();
		//获得窗口的垂直位置 
	    var iTop = (window.screen.availHeight - 30 - 380) / 2; 
	    //获得窗口的水平位置 
	    var iLeft = (window.screen.availWidth - 10 - 450) / 2; 
	    
	    var url="selectPath?tamp="+Math.random()+"&t="+showFile+"&p="+p+"&disk="+disk;
		 
        //直接点击某条录音的小喇叭，只播放当前录音
		window.open(url,"player","height=450,width=550, top="+ iTop + ",left="+ iLeft + ", toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no,status=no");*/
		var url="selectPath";
		var currentdisk = $(o).val();
        $.ajax({
		type:"POST",
		dataType:"html",
		url:url,
		data:{
			disk:disk,currentdisk:currentdisk,t:0 
		},
		 
		success: function(data){
		  $('#selectcontent').html("");
		  $('#selectcontent').html(data);
		  $('#pathMod').modal('show');
		}
	})
	}


	//点击文件夹时，进入文件夹
function to(url,file){
	if(file.substr(file.length-1,1)!="\\"){
		file=file+"\\"	;
	}
	loadFileList(url,file);
}

function up(){
	var file=$("#path").val();
	var tmp=file.substr(0,file.length-1).lastIndexOf("\\");
	if(tmp<0){
		alert("已到最上层目录");
	}else{
		var tpath=file.substr(0,tmp+1);
		var url="t=<?php echo $showFile ?>&p="+tpath;
		loadFileList(url,tpath);	
	}	
}

function loadFileList(url,file){
	url="getFileList?"+url;
	$.ajax({
		type:"POST",
		url:url,
		data:{
			id:1 
		},	 
		success: function(data){
			$('.fileWrap').html("");
			$('.fileWrap').html(data);
			$("#hid_path").val(decodeURIComponent(file));
			$("#path").val(decodeURIComponent(file));
		}
	})
	 
}

function selectok(){
 
	var selectpath = $('#path').val()
	$("#Sys_AutoBakDir").val(selectpath)
	$('#pathMod').modal('hide');
}


		//设置参数对应的正则表达式，根据此规则进行数据验证
	function getRegEx(pn){
		var o = { reg:"", msg:""};
		switch(pn){
			case "Sys_AutoBakClock"	:
				o={
					reg : /(([01][0-9])|2[0-3]):([0-5][0-9])/,
					msg : "时间格式错误！请重新输入。"
				};break;
			case "Sys_AutoBakDir":			//数据库自动备份路径
			case "Sys_AutoBakDataPath":		//录音自动备份目录
				o={
					reg : /[c-zC-Z]\:(\\[^\/:*?"<>|]{1,})/,	//文件夹名称禁止出现的字符（\/:*?"<>|）
					msg : "备份路径格式错误！文件夹名称禁止使用“/:*?\"<>|”等字符\r\n请重新输入。"
				};break;
			case "Sys_AutoBakPeriodSpace":	//字段备份周期，单位(天)
			case "Sys_DelShorterThan":		//字段删除，少于多少秒的录音
			case "Sys_License_Count":		//可用通道参数
			case "Sys_RecordFileStoreDays"://文件过期时间，0表示不过期。过期则删除
				o={
					reg : /\d{1,4}/,
					msg : "输入错误！请输入一个正整数。"
				};break;
			case "Sys_DivFileTime"://分割时间
				o={
					reg : /\d{1,4}/,
					msg : "输入错误！请输入一个正整数。"
				};break;
			case "Sys_IpCh_Count"://录音通道号
				o={
					//reg : /\d{1,4}/,
					reg : /^(0|\d{1,2}|1[0-2][0-8])$/,
					msg : "输入错误！请输入小于128的正整数。"
				};break;
			case "Sys_Vedio_Count"://录象通道号
				o={
					//reg : /\d{1,4}/,
					reg : /^(0|\d{1}|1[0-6])$/,
					msg : "输入错误！请输入小于16的正整数。"
				};break;	
			default:
				o={
					reg : "",
					msg : ""
				};
		}
		return o;
	}


	$('.downloadPeizhi').click(function(){
		$('#alertModel').modal('show');
		$('.downloadName').css("display","none");
		var url="<?php echo U('home/System/down_systemParameter');?>"
		var Items
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
				console.log(data)
				$('.loadEffect').css("display","none");
				$('.downloadName').css("display","block");
				$('.modal-title').html("操作完成");
				$('.Alertmessage').html("成功导出配置：<a href='"+data.data+"'>点击下载</a>")
			}
		})
	})
	</script>
</html>