<div style="width:1200px;float:left;margin-top:10px">
    <table width='100%'>

        <tr style="background:#337ab7;color:white;">
            <td width="16%">ap_mac</td>
            <td width="16%">wlan_mac</td>
            <td width="10%">wlan_rssi</td>
            <td width="10%">wlan_essid</td>
            <td width="10%">wlan_mode</td>
            <td width="11%">wlan_channel</td>
            <td width="11%">wlan_encrypt</td>
            <td width="16%">time</td>
        </tr>
        <?php foreach($ap_info as $row):?>
            <tr> 
                <td><?php echo $row['ap_mac'];?></td>
                <td><?php echo $row['wlan_src'];?></td>
                <td><?php echo $row['wlan_rssi'];?></td>
                <td><?php echo $row['wlan_essid'];?></td>
                <td><?php echo $row['wlan_mode'];?></td>
                <td><?php echo $row['wlan_channel'];?></td>
                <td><?php echo $row['wlan_encrypt'];?></td>
                <td><?php echo $row['time'];?></td>          
            </tr>
        <?php endforeach?>
        
    </table>
</div>
<div style="width:600px;float:right;margin-top:10px;">
    <span><?php echo $page;?>跳到<input type='text' id='to_page' style='width:30px;height:20px'>页</span>
    <input type="hidden" id="jump_url" value="<?php echo base_url('scanap/index');?>">
    <input type="button" value="确定" class='btn btn-default btn-xs' onClick='jump()'>
</div> 

<script type="text/javascript">
    function jump(){
        var jump_link;
        if(document.getElementById("to_page").value > 0){
            jump_link = document.getElementById("jump_url").value + "/" + (document.getElementById("to_page").value-1)*5;
        }else{
            jump_link = document.getElementById("jump_url").value+"/"+0;
        }
        window.open(jump_link, '_self');
    }
</script>