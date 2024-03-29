<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>录音播放</title>
</head>
<style type="text/css">
	body,table{font-size:12px; margin:2; overflow:hidden;}    
	.select1{
		background: #fdfcf5; margin: -3px -3px -3px -3px;
		width:430px;
	}   
</style>
<script src="/Public/assets/bootstrap/js/jquery-1.11.1.min.js"></script>
<body onLoad="this.focus()">
<form name="Form1" method="post" action="MPlayer.asp" id="Form1">
	<input type="hidden" id="playFirst" value="<?php echo ($fileName); ?>" />
	<table cellpadding="0" cellspacing="1" style="width:430px; background:#69c;"border="0" align="center">
		<tr bgcolor="#e8f2fd">
			<td align="left">
				<table height="107" border="0" align="center" cellpadding="0" cellspacing="0" style="width:100%;">
					<tr>
						<td id="cm_Player">
							<!--播放器 开始-->
							<OBJECT id="cm_Player1" style="width:100%;height: 64px" type="application/x-oleobject"
								classid="CLSID:6BF52A52-394A-11d3-B153-00C04F79FAA6" name="cm_Player1" VIEWASTEXT>
								
								<PARAM NAME="URL" VALUE="11">
								<PARAM NAME="rate" VALUE="1">
								<PARAM NAME="balance" VALUE="0">
								<PARAM NAME="currentPosition" VALUE="0">
								<PARAM NAME="defaultFrame" VALUE="">
								<PARAM NAME="playCount" VALUE="1">
								<PARAM NAME="autoStart" VALUE="-1">
								<PARAM NAME="currentMarker" VALUE="0">
								<PARAM NAME="invokeURLs" VALUE="-1">
								<PARAM NAME="baseURL" VALUE="">
								<PARAM NAME="volume" VALUE="50">
								<PARAM NAME="mute" VALUE="0">
								<PARAM NAME="uiMode" VALUE="full">
								<PARAM NAME="stretchToFit" VALUE="-1">
								<PARAM NAME="windowlessVideo" VALUE="0">
								<PARAM NAME="enabled" VALUE="-1">
								<PARAM NAME="enableContextMenu" VALUE="-1">
								<PARAM NAME="fullScreen" VALUE="0">
								<PARAM NAME="SAMIStyle" VALUE="">
								<PARAM NAME="SAMILang" VALUE="">
								<PARAM NAME="SAMIFilename" VALUE="">
								<PARAM NAME="captioningID" VALUE="">
								<PARAM NAME="enableErrorDialogs" VALUE="0">
								<PARAM NAME="_cx" VALUE="10398">
								<PARAM NAME="_cy" VALUE="1693">
							</OBJECT>
							<!--播放器 结束-->
						</td>
					</tr>
					<tr>
						<td height="25" bgcolor="#e8f2fd" valign="middle">&nbsp;
							<img id="imgLast" onClick="Last_OneOK();" style="cursor:hand" alt="前一条录音" 
								src="/Public/assets/images/tu_music_1.gif" width="54" height="18" border="0">
							<img id="imgNext" onClick="Next_OneOK();" style="cursor:hand" alt="后一条录音" 
								src="/Public/assets/images/tu_music_2.gif" width="56" height="18" border="0">
							<font color="#ff0000">如无法正常播放，请<a href="/Uploads/apps/mpsetup_9.0.exe">下载</a>新版本播放器。</font>
						</td>
					</tr>
					<tr>
						<td height="28">
                            <table border="0" cellspacing="1" cellpadding="3"
                            	 style="font-size:12px; text-align:center; background:#ccc; width:98%;">
                                <tr bgcolor="#eaeaea">
                                    <td width="10%" nowrap='nowrap'>通道</td>
                                    <td width="12%" nowrap='nowrap'>主叫</td>
                                    <td width="12%" nowrap='nowrap'>被叫</td>
                                    <td width="12%" nowrap='nowrap'>录音号码</td>
                                    <td width="12%" nowrap='nowrap'>方向</td>
                                    <td width="42%" nowrap='nowrap'>开始时间</td>
                                    
                                </tr>
                                <?php if(is_array($rsPlayTotal)): foreach($rsPlayTotal as $k=>$strlist): ?><tr name='tr_info' id='tr_info_<?php echo ($k); ?>' style='display:none;background:#fff;'>
		                               <td><?php echo ($strlist["n_channelid"]); ?></td>
		                               <td><?php echo ($strlist["v_caller"]); ?></td>
		                               <td><?php echo ($strlist["v_called"]); ?></td>
		                               <td><?php echo ($strlist["v_ext"]); ?></td>
		                               <td><?php echo ($strlist["fx"]); ?></td>
		                               <td><?php echo ($strlist["d_starttime"]); ?></td>
		                            </tr><?php endforeach; endif; ?>
                                
                            </table>
						</td>
				  </tr>
			  </table>
				<br>
				<table style="width:430px;"height="175" border="0" align="center" cellpadding="0" cellspacing="1"
					bgcolor="#6699cc">
					<tr>
						<td height="20" bgcolor="F2F6FB">&nbsp;播放列表</td>
					</tr>
					<tr>
					  <td height="155" valign="top" bgcolor="#fdfcf5">
							<!--根据传递过来的参数动态生成播放列表-->
							<!--播放列表需要包含文件路径，文件名称-->
                            <select name="select" size='10' class='select1' id='SongList' onclick='play()'>
                               <?php if(is_array($rsPlayTotal)): foreach($rsPlayTotal as $key=>$list): ?><option value="<?php echo ($list["field_url"]); ?>">
	                                   <?php echo ($list["v_voicefile"]); ?>
	                                </option><?php endforeach; endif; ?>
							</select>
						</td>
					</tr>
				</table>
				<br>
			</td>
		</tr>
	</table>
	<div align="right" ><span onClick="window.close();" style="cursor:pointer;">[关闭窗口]</span></div>
</form>
<script type="text/javascript">
	var TotalSongs;
	var timer=""
	var MSIE = navigator.userAgent.indexOf("MSIE");//判断浏览器类型
	var tr_last="";	//上一首播放的曲目
	//播放歌曲
	function play(){
		var SongList =$("#SongList");
		if(SongList.prop('selectedIndex') < 0){
			alert('请选择你要播放的曲目!');
		}else{
			var url = SongList.find("option:selected").val();//播放歌曲的路径
			//var mname = SongList.text;//播放歌曲的名称
			
			if(tr_last!=""){
				//如果有刚播放完的上一首，则将其相应的录音信息隐藏
				$(tr_last).css('display','none');
			}
			else{
				$("#tr_info_0").css('display',''); 
			}
			
			tr_last="#tr_info_"+SongList.prop('selectedIndex')
			$(tr_last).css('display','');
			//根据不同的浏览器控制播放器
			if(MSIE >= -1){
				var ExO = document.cm_Player1;
				ExO.style.display = "block";
				ExO.url = url;
				ExO.controls.play();
				showTLab(); 
			}
		}
	}
	//控制按钮 上一首
	function Last_OneOK(){
		var SongList =$("#SongList");
		if((SongList.prop('selectedIndex') > 0) && (SongList.prop('selectedIndex') < TotalSongs)){
			$('#SongList option').eq(SongList.prop('selectedIndex') - 1).attr('selected','selected')
			play();
		}
	}

	//控制按钮 下一首
	function Next_OneOK(){
		var SongList =$("#SongList");
		if(SongList.prop('selectedIndex') >= 0){
			if(SongList.prop('selectedIndex') < TotalSongs - 1){
				//SongList.options[SongList.prop('selectedIndex') + 1].selected = true;
				var sindex = SongList.prop('selectedIndex') + 1
				$('#SongList').find("option:eq("+sindex+")").attr('selected','selected');
				//alert($('#SongList').find("option:eq("+sindex+")").val())
				play();
			}else{
				$('#SongList option:first').attr('selected','selected')
				play();
			}
		}
	}

	//检查是否播放完毕，是则播放下一首；
	function showTLab(){
		//1:播放结束;3:正在播放;9:加载文件;10:文件没找到
		if(document.cm_Player1.playState == 1){
			//播放结束(当前歌曲)
			//document.getElementById("spMusicName").innerText="Loading..."
			Next_OneOK();
		}
		if(document.cm_Player1.playState==10){
			//文件没找到，继续下一条。
			Next_OneOK();
		}
		window.clearTimeout(timer);
		timer=setTimeout("showTLab()", 1000);
	}
	

</script>
<script type="text/javascript">
	var myTo =$("#SongList");
	var TotalSongs = $('#SongList option').length;
	if(TotalSongs > 0){
		//播放列表大于0
		if(TotalSongs == 1){	
			//只有一首歌，不显示上一首下一首按钮
			$("#imgLast").css('display','none');
			$("#imgNext").css('display','none');
		}
		myTo.css('display','block');
		$('#SongList option:first').attr('selected','selected')
	}else{
		myTo.css('display','none');
	}
	
	//试听单条录音时，页面加载完毕后，直接选中用户的父页面点击的记录。并显示录音相关信息
	function t(){
		if($("playFirst").value!="" && $("#SongList option").length>0){
			for(var i=0;i<$('#SongList option').length;i++){
				if($("#playFirst").value==$('#SongList option').get(i).text){
					myTo.val($("#playFirst").val());
				}	
			}
			try{
			}catch(e){alert(e.description)}
		}	
	}
	t();
	play();//页面加载完毕，自动开始播放
</script>
	</body>
</html>