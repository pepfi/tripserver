<div class="row">AP查询</div>
<form action='/device/search' method="post">
<div class="row" style='margin-top:3px'>
    <div class='col-md-1' style="padding-top:6px;padding-left:11px">MAC</div>
    <div class='col-md-2'><input type="text" name='mac' class="form-control" id="" placeholder="MAC"></div>
    <div class='col-md-1' style="padding-top:6px;padding-left:11px">热点名称</div>
    <div class='col-md-2'>
        <select class="form-control">
          <option></option>
          <option>未分配</option>
        </select>    
    </div>
    <div class='col-md-1' style="padding-top:6px;padding-left:11px">设备状态</div>
    <div class='col-md-2'>
        <select class="form-control" name='state'>
          <option value=""></option>
          <option value='1'>在线</option>
          <option value="0">离线</option>
        </select>
    </div>
    <div class='col-md-1' style="padding-top:6px;padding-left:11px">IpAddress</div>
    <div class='col-md-2'><input type="text" name='ip_address' class="form-control" id="" placeholder="IpAddress"></div>
</div>
<div class="row" style='margin-top:3px'>
    <div class='col-md-1' style="padding-top:6px;padding-left:11px">固件版本</div>
    <div class='col-md-2'><input type="text" name='firmware_version' class="form-control" id="" placeholder="固件版本"></div>
    <div class='col-md-1' style="padding-top:6px;padding-left:11px">时长类型</div>
    <div class='col-md-2'>
        <select class="form-control">
          <option></option>
          <option>在线时长(h)</option>
          <option>离线时长(h)</option>
          <option>注册时长(h)</option>
        </select>    
    </div>
    <div class='col-md-1' style="padding-top:6px;padding-left:11px">起始</div>
    <div class='col-md-2'><input type="text" class="form-control" id="" placeholder="起始"></div>
    <div class='col-md-1' style="padding-top:6px;padding-left:11px">结束</div>
    <div class='col-md-2'><input type="text" class="form-control" id="" placeholder="结束"></div>
</div>
<div class="row" style='margin-top:3px'>
    <div class='col-md-1' style="padding-left:11px"><h6>首次注册时间</h6></div>
    <div class='col-md-2'><input type="text" class="sang_Calender" id="" placeholder="time_start" name='first_registration_time_start'></div>
    <div class='col-md-1' style="padding-top:6px;padding-left:11px"><-----------></div>
    <div class='col-md-2'><input type="text" class="sang_Calender" id="" placeholder="time_end" name='first_registration_time_end'></div>
    <div class='col-md-1' style="padding-left:11px"><h6>最后注册时间</h6></div>
    <div class='col-md-2'><input type="text" class="sang_Calender" id="" placeholder="time_start" name='last_registration_time_start'></div>
    <div class='col-md-1' style="padding-top:6px;padding-left:11px"><-----------></div>
    <div class='col-md-2'><input type="text" class="sang_Calender" id="" placeholder="time_end" name='last_registration_time_end'></div>
</div>
<div class="row" style='margin-top:3px'>
    <div class='col-md-1' style="padding-top:6px;padding-left:11px">设备编号</div>
    <div class='col-md-2'><input type="text" class="form-control" id="" placeholder="设备编号"></div>
    <div class='col-md-1' style="padding-top:6px;padding-left:11px">内容版本</div>
    <div class='col-md-2'><input type="text" name='content_version' class="form-control" id="" placeholder="内容版本"></div>
    <div class='col-md-1' style="padding-top:6px;padding-left:11px">IP归属地</div>
    <div class='col-md-2'><input type="text" name='ip_location' class="form-control" id="" placeholder="IP归属地"></div>
    <div class='col-md-1' style="padding-top:6px;padding-left:11px">&nbsp;</div>
    <div class='col-md-2'><input type="submit" class="btn btn-primary" value="搜索"></div>
</div>
</form>
<div class="row" style="border-bottom:1px solid black">&nbsp;</div>
<div class="row">AP分配状态列表</div>
<div class="row" style="margin-bottom:4px">
    <div class="col-md-1"><button type="button" class="btn btn-default btn-xs">批量分配设备</button></div>
    <div class="col-md-1"><button type="button" class="btn btn-default btn-xs">解除绑定</button></div>
    <div class="col-md-1">
        <button type="button" class="btn btn-default btn-xs">下载</button>
        <button type="button" class="btn btn-default btn-xs">上传</button>
    </div>
    <div class="col-md-1"><button type="button" class="btn btn-default btn-xs" onclick="openDiv('newDiv');">下发命令</button></div>
<!--    <div class="col-md-1"><button type="button" class="btn btn-default btn-xs" onclick="getMac()">下发命令</button></div>-->
    <div class="col-md-1">
        <button type="button" class="btn btn-default btn-xs">帮助</button>
        <button type="button" class="btn btn-default btn-xs">删除</button>
    </div>
    <div class="col-md-1" style="padding-left:25px">每页显示：</div>
    <div class="col-md-1">
        <?php echo "<a href='/device/".$method."/per_page/3'>3</a>"; ?>
        <?php echo "<a href='/device/".$method."/per_page/6'>6</a>"; ?>
        <?php echo "<a href='/device/".$method."/per_page/9'>9</a>"; ?>
        <?php echo "<a href='/device/".$method."/per_page/12'>12</a>"; ?>
    </div>
    <div class="col-md-3"><?php echo $page;?></div>
    <div class="col-md-2">
        跳到<input type='text' id='to_page' style='width:30px;height:20px'>页
        <input type="hidden" id="url" value="<?php echo base_url($controller.'/'.$method);?>">
        <input type="hidden" id="final_pagesize" value="<?php echo $this->session->userdata('final_pagesize');?>">
        <input type="button" value="确定" class='btn btn-default btn-xs' onclick=jump()>
    </div>
</div>
<div>
    <table width='100%'>
        <tr style='background:#337ab7;color:white'>
            <td width='5%'>&nbsp;&nbsp;<input type="checkbox" id="all_check" onclick="cli('checkedDevice')"/></td>
            <td width='13%'>MAC</td>
            <td width='11%'>IpAddress</td>
            <td width='8%'>IP归属地</td>
            <td width='8%'>所属热点</td>
            <td width='11%'>设备编号</td>
            <td width='7%'>内容版本</td>
            <td width='13%'>首次注册时间</td>
            <td width='13%'>最后注册时间</td>
            <td width='6%'>设备状态</td>
            <td width='5%'>操作</td>
        </tr>
        <?php foreach($deviceinfo->result() as $row):?>
        <tr>
            <td width='5%'>&nbsp;&nbsp;<input type="checkbox" name="checkedDevice" /></td>
            <td name='mac' width='13%'><?php echo $row->mac;?></td>
            <td width='11%'><?php echo $row->ipAddress;?></td>
            <td width='8%'><?php echo $row->ipLocation;?></td>
            <td width='8%'></td>
            <td width='11%'><?php echo $row->hostsn;?></td>
            <td width='7%'><?php echo $row->contentVersion;?></td>
            <td width='13%'><?php echo $row->firstRegistrationTime;?></td>
            <td width='13%'><?php echo $row->lastRegistrationTime;?>	</td>
            <td width='6%'><?php echo $row->state?'在线':'离线';?></td>
            <td width='5%'>操作</td>
        </tr>
        <?php endforeach;?>
    </table>
</div>
<div class="row">
    <div class='col-md-5'></div>
    <div class='col-md-1'><?php echo '共'.ceil($device_nums/$this->session->userdata('final_pagesize')).'页';?></div>
    <div class='col-md-1'><?php echo '共'.$device_nums.'条';?></div>
    <div class='col-md-3'><?php echo $page;?></div>
    <div class="col-md-2">
        跳到<input type='text' id='to_page' style='width:30px;height:20px'>页
        <input type="hidden" id="jump_url" value="<?php echo base_url($controller.'/'.$method);?>">
        <input type="hidden" id="final_pagesize" value="<?php echo $this->session->userdata('final_pagesize');?>">
        <input type="button" value="确定" class='btn btn-default btn-xs' onclick=jump()>
    </div>
</div>
<script src="<?php echo base_url('application\views\global\custom\js\datetime.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('application\views\global\custom\js\order.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('application\views\global\custom\js\checked_all.js');?>" type="text/javascript"></script>
<script language="LiveScript"> 
function jump(){
    var offset = (document.getElementById("to_page").value - 1)*document.getElementById('final_pagesize').value;
    if(offset < 0){
        offset = 0;
    }
    var url =document.getElementById("jump_url").value+'/'+ offset;        
    window.open(url, '_self');    
} 
</script>


