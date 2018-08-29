<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

	
        <title>高级参数</title>

        <link href="/Public/assets/bootstrap/css/style.default.css" rel="stylesheet">
        <link href="/Public/assets/bootstrap/css/select2.css" rel="stylesheet" />		
        <link href="/Public/assets/bootstrap/css/jquery.dataTables.min.css" rel="stylesheet">
    </head>
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
                     <form name="form1" action="paramsChannel/channelid/<?php echo ($channelid); ?>" method="post">
                        <div class="panel panel-title-head">
                        <div class="search_banner">
                             <div class="pull-left col-md-1">
	                                <a class="btn btn-info btn-large" href="/home/System/channelParameter">普通参数</a>
	                          </div> 
	                          <div class="pull-left col-md-1">
	                                <a class="btn btn-info btn-large active" href="/home/System/paramsChannel">高级参数</a>
	                          </div>
                             <div class="pull-left col-md-1">
	                                <span class="btn btn-info btn-large downloadPeizhi">导出配置</span>
	                          </div> 
	                          <div class="pull-left col-md-1">
	                                <a class="btn btn-info btn-large" href="<?php echo U('home/System/backupUpload/type/channel');?>">恢复配置</a>
	                          </div>
	                          <div style="clear:both"></div>
                         </div>
                         <div  style="background-color: #f7f7f7; display:block;line-height: 30px;margin-top: 5px;  margin-bottom: 5px;">
                            <label for="inputPassword" class="col-md-1 control-label">请选择通道</label>
                           <div class="col-md-1">
                                <select name="channelid" id="channelid" onchange="MM_jumpMenu(this)">
                                    <option value="paramsChannel/channelid/9999">全部</option>
                                    <?php if(is_array($channelist)): foreach($channelist as $key=>$rsList): if(trim($channelid) == trim($rsList['n_channelno'])){?>
                                           <option value="/home/System/paramsChannel/channelid/{$rsList.n_channelno}" selected="selected">
                                        <?php }else{ ?>
                                           <option value="/home/System/paramsChannel/channelid/<?php echo ($rsList["n_channelno"]); ?>" >
                                        <?php }?>
                                        <?php echo ($rsList["n_channelno"]); ?>
                                        </option><?php endforeach; endif; ?>
                                </select>
                            </div>
                            <label  class="col-md-3 control-label">（如果选择全部，则操作对所有通道起作用）</label>
                            
                        </div>   
                            <table id="basicTable" class="table table-striped table-bordered responsive">
                                <thead class="">
                                    <tr>
                                        <th>动作名称</th>
                                        <th>配置参数</th>
                                        <th>相关描述</th>
                                    </tr>
                                </thead>
                         
                                <tbody>
                                  <?php if(is_array($rs)): foreach($rs as $key=>$list): ?><tr role="row">
	                                     <td><?php echo ($list["v_paramsnamech"]); ?></td>
	                                     <td><?php echo ($list["paramsset"]); ?>
                                            <input type="hidden" name="hid<?php echo ($list["v_paramsname"]); ?>" value="<?php echo ($list["v_value"]); ?>" />
                                         </td>
	                                     <td><?php echo ($list["v_describe"]); ?></td>
	                                  </tr><?php endforeach; endif; ?>
                                </tbody>
                            </table>
                        </div><!-- panel -->
                        <div class="col-md-3">
                                <input type="hidden" value="<?php echo ($strParaName); ?>" name="paraList" />
                                <input type="hidden" value="" name="todo" id="todo" />
	                            <input class="btn btn-info btn-large" type="button" value="提交修改" onclick="formSub('update')">
	                            <input class="btn btn-info btn-large" type="button" value="恢复默认值" onclick="formSub('default')">
	                    </div> 
	                   </form>
                            
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
        </section>
		
        <script src="/Public/assets/bootstrap/js/jquery-1.11.1.min.js"></script>
        <script src="/Public/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="/Public/assets/bootstrap/js/custom.js"></script>
	
    <script type="text/javascript">
    function MM_jumpMenu(obj){ //v3.0
        var url = $(obj).val()
         window.location.href=  url
     // eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
     // if (restore) selObj.selectedIndex=0;
    }
    //提交表单
    function formSub(todo){
        var v1="";
        var v2="";
        if(document.forms[0].StartRecKey){
        //有码控启动字头参数，验证格式0~9、*#
            v1=document.forms[0].StartRecKey.value;
            if(v1!=""){
                if(!Vchar(v1)){
                    alert("输入错误：码控启动字头包含非法字符，合法字符包括:0123456789*#");
                    document.forms[0].StartRecKey.focus();
                    return false;
                }
            }
        }
        if(document.forms[0].StopRecKey){
        //有码控停止字头参数，验证格式0~9、*#
            v2=document.forms[0].StopRecKey.value;
            if(v2!=""){
                if(!Vchar(v2)){
                    alert("输入错误：码控停止字头包含非法字符，合法字符包括:0123456789*#");
                    document.forms[0].StopRecKey.focus();
                    return false;
                }
            }
        }
        if(v1!="" && v1==v2){
            alert("码控启动字头与码控停止字头不能相同，请重新设置");
            return false;
        }
        var v3="";
        var v4="";
        if(document.forms[0].NoSoundDtrmTime){
            v3=document.forms[0].NoSoundDtrmTime.value;
            if(v3!=""){
                if(!isNum(v3)){
                    alert("输入错误：声控静音判定时长只能输入数字！");
                    document.forms[0].NoSoundDtrmTime.focus();
                    return false;
                }
            }
        }
        
        if(document.forms[0].ChannelPort){
            v4=document.forms[0].ChannelPort.value;
            if(v4!=""){
                if(!isNum(v4)){
                    alert("输入错误：通道端口只能输入数字！");
                    document.forms[0].ChannelPort.focus();
                    return false;
                }
            }
        }
        $("#todo").val(todo);
        if(document.form1.paraList.value==""){  
        //当前所选通道无参数可设置
            alert("当前所选通道无参数可设置,请选择需要配置的通道");
            return false;   
        }
         
        document.forms[0].submit();
    }
    
    function Vchar(v){
        if(v!=""){
            var V_char="0123456789*#,";
            //有效字符串:0123456789*#,","为多个码控启动字头分隔符
            for(var i=0;i<v.length;i++){
                var temp=v.substr(i,1);
                if(V_char.indexOf(temp)<0){
                    return false;
                }
            }
        }
        return true;
    }
    
    function isNum(str){
        if(str=="")return true;
        //var re = new RegExp("[0-9]{1,15}","g");
        //var arr = str.match(re);
        str=str.toUpperCase();  
        //忽略大小写转换为大写再判断
        var compare=/^[0-9]+$/;

        if(!compare.test(str)){
            return false;
        }
        return true;
    
    }

//系统参数和通道参数有效值验证
function CheckVerify(obj){
/*   var V_Verify=obj.title;
   var v=obj.value.replace(/\ /g,"");
   if(V_Verify!=""){
      if(v==""){
         alert("参数值不允许为空");
         obj.focus();
         //obj.value=obj.defaultValue;
         return false;
      }
      if(V_Verify!=""){
         V_Verify=V_Verify.split(",");
         var len=V_Verify.length;
         for(var i=0; i<len;i++){
            if(v==V_Verify[i]){
               return true;
               break;
            }  
         }
      }
      alert("输入值无效，请在指定范围内设置参数值!\r\n\r\n有效值包括：\r\n"+V_Verify);
      obj.value=obj.defaultValue;
      obj.focus();
      return false;
   }*/
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

    </body>
</html>