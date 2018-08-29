<?php if (!defined('THINK_PATH')) exit();?>		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <div class="search_input_group" style="float: left;width: 70%">
				      <span class="search_input-group-addon">
				        	当前位置：
				      </span>
				      <input type="text" name="path" id="path" class="search_form-control" value="<?php echo ($d); ?>">
			    </div>
			    <div style="line-height: 30px;margin-left: 10px;display: block;" onclick="up()"><img src="/Public/assets/images/ico/back.gif"></div> 
		      </div>
		      <div class="modal-body">
		      	<div class="row">
		      		<div class="col-xs-3">
		      			<div class="diskWrap">
		      				
		      		<!-- 可用磁盘列表 -->
		      		<?php if(is_array($Disks)): foreach($Disks as $key=>$list): if($list == $DiskCanView || $DiskCanView == ''): ?><div class="item active" onclick="to('t=0&p=<?php echo ($list); ?>:\\','<?php echo ($list); ?>:\\')">
			      					<em class="disk-ico"></em>
			      					<div class="name"><?php echo ($list); ?></div>
			      				   </div>
		      				   	<?php else: ?>
                                   <div class="item" style="cursor:not-allowed;">
			      					<em class="disk-ico"></em>
			      					<div class="name"><?php echo ($list); ?></div>
			      				   </div><?php endif; endforeach; endif; ?>	
			 
		      			</div>
		      		</div>
		      		<div class="col-xs-9">
		      			<div class="fileWrap clearfix" style="max-height: 400px;overflow-y: scroll">
		      				 
		      			<?php echo ($FoldersHtml); ?>
 
		      			</div>
		      		</div>
		      	</div>
		      </div>
		      <div class="modal-footer">
		      	<input type="hidden" id="selectID" name="selectID" value="<?php echo ($DiskCanView); ?>">
		        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
		        <button type="button" class="btn btn-primary" onclick="selectok()">确定</button>
		      </div>
		    </div>