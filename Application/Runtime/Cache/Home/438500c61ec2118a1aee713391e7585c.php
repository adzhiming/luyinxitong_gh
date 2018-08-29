<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

	
        <title>硬盘参数</title>

        <link href="/Public/assets/bootstrap/css/style.default.css" rel="stylesheet">
        <link href="/Public/assets/bootstrap/css/select2.css" rel="stylesheet" />		
        <link href="/Public/assets/bootstrap/css/jquery.dataTables.min.css" rel="stylesheet">
		
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
                       <form name="form1" method="post" action="" >
                        <div class="panel panel-title-head">
                            <div class="search_banner">
                                <h5 class="text-primary">当前录音路径:<?php echo ($useingstation); ?></h5>
                                <p>当前所有空间小于预留空间时,会存到下个盘</p>
                            </div><!-- panel-heading -->
                            <table id="basicTable" class="table table-striped table-bordered responsive">
                                <thead class="">
                                    <tr>
                                        <th>当前磁盘</th>
                                        <th>驱动器</th>
                                        <th>磁盘状态</th>
                                        <th>声音文件存放目录</th>
                                        <th>磁盘预留空间数</th>
                                        <input type="hidden" id="txtName" name="txtName" value="" />
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(is_array($rsDisk)): foreach($rsDisk as $key=>$list): ?><tr>
                                        <td><label style="display:block; margin:0 !important"><input data-id="<?php echo ($list["diskval"]); ?>" type="radio" name='UsingDisk'
                                        id='UsingDisk_<?php echo ($list["diskval"]); ?>' value="<?php echo ($list["diskval"]); ?>" <?php if($useingstation == $list["currentdisk"] ): ?>checked<?php endif; ?>></label></td>
                                        <td>
                                        	<?php echo ($list["v_diskvolumename"]); ?>
                                        	<input type="hidden" name="DrvName[]" value="<?php echo ($list["diskval"]); ?>:"  />
                                        </td>
                                        <td>
	                                        <div class="barblock"><div class="bar" style="width:<?php echo ($list["yiyong"]); ?>%"></div></div>
	                                        <div>可用<?php echo ($list["shenxia"]); ?>%(<?php echo ($list["keyong"]); ?>GB)</div>
                                        </td>
                                        <td> 			
				                <input type='text' style='width:80%;'   name="path[]" readonly 
				                  id="path_<?php echo ($list["diskval"]); ?>" value="<?php echo ($list["v_rcdiskpath4vpath"]); ?>"
				 onclick="SetPath(this,0,'<?php echo ($list["diskval"]); ?>')" />
				 <a href="javascript:setEmpty('<?php echo ($list["diskval"]); ?>')" style='color:#00f;' title='删除此路径'>清除</a>
				 <input type='hidden' name="hid_path[]" value="<?php echo ($list["v_rcdiskpath4vpath"]); ?>" />
				 
				 </td> 
                                        <td><input type='hidden' name='hid_LessFreeSpace[]' value='<?php echo ($list["n_lessfreespace"]); ?>' /> 
				 <select name="N_LessFreeSpace[]">
				      <option value='256' <?php if($list["n_lessfreespace"] == '256'): ?>selected<?php endif; ?>>256</option> 
				      <option value='512' <?php if($list["n_lessfreespace"] == '512'): ?>selected<?php endif; ?>>512</option>";
				      <option value='1024' <?php if($list["n_lessfreespace"] == '1024'): ?>selected<?php endif; ?>>1024</option>";
				 </select>MB</td>
                                      </tr><?php endforeach; endif; ?>
                                </tbody>
                            </table>

                        </div><!-- panel -->
                        <input type="hidden" name="SelStationID" id="SelStationID" value="<?php echo ($CurrentStation); ?>" /> 
                        <input type="hidden" name="todo" id="todo" />
                        <input type="hidden" name="hid_UsingPath" value="<?php echo ($UsingPath); ?>" />
                        <input type="hidden" name="newDisk_path" id="newDisk_path" value="<?php echo ($UsingPath); ?>" />
                        <div style="text-align: center;"><input class="btn btn-info btn-large" type="button" onclick="formSub('changePath');" value="确定修改"></div>
                     </form>   
                            
                           
                        </div><!-- panel -->
                      
                        
                    </div><!-- contentpanel -->
                </div><!-- mainpanel --><!-- mainpanel -->
            </div><!-- mainwrapper -->
        </section>
		
		<div class="modal fade" id="pathMod" tabindex="-1" role="dialog" >
		  <div class="modal-dialog" role="document" id="selectcontent">

		  </div>
		</div>
		
        <script src="/Public/assets/bootstrap/js/jquery-1.11.1.min.js"></script>
        <script src="/Public/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="/Public/assets/bootstrap/js/jquery.datatables.min.js"></script>
        <script src="/Public/assets/bootstrap/js/custom.js"></script>

<script type="text/javascript">
 	function formSub(todo){
		$("#todo").val(todo);
		if(todo=="changePath"){
			Obj_path=document.getElementsByName("path[]");
			if(Obj_path.length>1){
				for(var i=0;i<Obj_path.length;i++){
					if(/.*[\u4e00-\u9fa5]+.*$/.test(Obj_path[i].value)){    
						alert("发生错误！\r\n系统不支持包含中文的录音路径！");
						Obj_path[i].select();
						return false;    
					}else if(Obj_path[i].value.length==3){
//						如果不允许设置“C:\”格式(则磁盘根目录，不指定文件夹)的路径，则取消此段注释
						//var msg="录音保存路径错误！"
//						msg+="\r\n\n不能设置为磁盘的根目录，必须指定一个文件夹"
//						msg+="\r\n\n请重新选择录音保存路径"
//						alert(msg);
//						Obj_path[i].select();
//						return false;	
					}	
				}
			}else{
				if(/.*[\u4e00-\u9fa5]+.*$/.test(Obj_path.value)){    
					alert("发生错误！\r\n系统不支持包含中文的录音路径！");
					Obj_path.select();
					return false;    
				} 
			}
		}
		if(!DiskIsEmpty()){return false;}
		document.forms[0].submit();
	}
	
	//判断当前选中磁盘是否设置了路径,否则返回FALSE。
	function DiskIsEmpty(){
		var Radios=$("input[name='UsingDisk']");
		var dLen=Radios.length;
		if(dLen>1){
			for(var i=0;i<dLen;i++){
				var oid=Radios[i].getAttribute("id");
				var pid=oid.replace("UsingDisk","path");//所选项对应的路径框的ID属性
				if(Radios[i].checked){
					if($("#"+pid).val().length<4){
						var msg="所选磁盘未设置录音保存路径或者路径不正确！"
						msg+="\r\n\n不能设置为某个磁盘的根目录，必须指定一个文件夹"
						msg+="\r\n\n请重新选择录音保存路径"
						alert(msg);
						$("#"+pid).focus();
						return false;
					}else{
						$("#newDisk_path").val($("#"+pid).val());//
					}
					break;
				}
			}	
		}
		return true;
	}


	//获取当前选中的磁盘
	function getUsingDisk(){
		var DiskList=$("input[name='UsingDisk']");
		var len=DiskList.length;
//		var usingDisk=document.forms[0].hid_UsingPath.value.substr(0,1);//当前使用盘
		if(len>1){
			for(var i=0;i<len;i++){
				if(DiskList[i].checked){
					usingDisk=DiskList.eq(i).val();	
					 
				}
			}
		}else{
			usingDisk=DiskList.val()
		 
		}
		return usingDisk;
	}

	function setEmpty(id){
		var UsingDisk=getUsingDisk();
		if(UsingDisk.substr(0,1)==id){
			alert("当使用磁盘不允许设置为空。");	
		}else{
			$("#path_"+id).val("");
		}
	}

	//模拟“浏览”窗口，浏览服务端文件资源
	//参数说明：o:接收返回值的控件
//				showfile:浏览窗口是否显示文件。值为0则只显示文件夹，不显示文件
//				disk:	允许浏览的磁盘，如果为空则可浏览所有磁盘
/* 	function SetPath(o,showFile,disk){
		var p=o.value;
		if(!disk){disk="";}
		var aVersion=navigator.appVersion; 
		var version=parseInt(aVersion.split("MSIE")[1]); 
		
		var url="SelectPath/index.php?tamp="+Math.random()+"&t="+showFile+"&p="+p+"&disk="+disk;
		var dsc="dialogWidth=510px;dialogHeight=480px;status=no";
		
		if(version >= 7 || aVersion.indexOf("MSIE")==-1){
			dsc="dialogWidth=510px;dialogHeight=430px;status=no";
		}
		var vReturnValue=window.showModalDialog(url,"选择路径",dsc);
		if(vReturnValue!="clear"){
			o.value=vReturnValue;
		}
	} */
	
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
	var disk = $('#selectID').val(); 
	var id = "path_"+disk
	var selectpath = $('#path').val()
	$("#"+id).val(selectpath)
	$('#pathMod').modal('hide');
}
 	   
</script>
     	
		
    </body>
</html>