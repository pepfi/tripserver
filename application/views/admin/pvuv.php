
<script src="/application/views/global/custom/js/esl.js"></script>
<div style="width:100%;">总Pv：<?php echo $totalpv;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;总Uv：<?php echo $totaluv;?></div>
<div id="main" style="width:800px;height:400px;border:1px solid #ccc"></div>
<?php 
    date_default_timezone_set('PRC');
    $six_days_ago = "'".date('y-m-d', strtotime('-6 day'))."'";
    $five_days_ago = "'".date('y-m-d', strtotime('-5 day'))."'";
    $four_days_ago = "'".date('y-m-d', strtotime('-4 day'))."'";
    $three_days_ago = "'".date('y-m-d', strtotime('-3 day'))."'";
    $two_days_ago = "'".date('y-m-d', strtotime('-2 day'))."'";
    $yesterday = "'".date('y-m-d', strtotime('-1 day'))."'";
    $today = "'".date('y-m-d', time())."'";
    echo 
        "<script type='text/javascript'>
        require.config({
            paths:{ 
                echarts:'/application/views/global/custom/js/echarts'
            }
        });
    
        require(
            ['echarts'],
            function(ec) {
                var myChart = ec.init(document.getElementById('main'));
                var option = {
                    tooltip : {
                        trigger: 'axis'
                    },
                    legend: {
                        data:['Pv','Uv']
                    },
                    toolbox: {
                        show : true,
                        feature : {
                            mark : true,
                            dataView : {readOnly: false},
                            magicType:['line', 'bar'],
                            restore : true,
                            saveAsImage : true
                        }
                    },
                    calculable : true,
                    xAxis : [
                        {
                            type : 'category',
                            data : [".$six_days_ago.", ".$five_days_ago.", ".$four_days_ago.", ".$three_days_ago.", ".$two_days_ago.", ".$yesterday.", ".$today."]
                        }
                    ],
                    yAxis : [
                        {
                            type : 'value',
                            splitArea : {show : true}
                        }
                    ],
                    series : [
                        {
                            name:'Pv',
                            type:'line',
                            data:[".$pv['six_days_ago'].", ".$pv['five_days_ago'].", ".$pv['four_days_ago'].", ".$pv['three_days_ago'].", ".$pv['two_days_ago'].", ".$pv['yesterday'].", ".$pv['today']."]
                        },
                        {
                            name:'Uv',
                            type:'line',
                            data:[".$uv['six_days_ago'].", ".$uv['five_days_ago'].", ".$uv['four_days_ago'].", ".$uv['three_days_ago'].", ".$uv['two_days_ago'].", ".$uv['yesterday'].", ".$uv['today']."]
                        }
                    ]
                };
                
                myChart.setOption(option);
            }
        );
        </script>";
?>
<div style="width:800px;float:left;margin-top:10px">
    <table>

        <tr style="background:#337ab7;color:white;">
            <td width="20%">device_mac</td>
            <td width="15%">time</td>
            <td width="10%">pv</td>
            <td width="10%">download</td>
            <td width="10%">uv</td>
            <td width="10%">uv_andriod</td>
            <td width="10%">uv_ios</td>
            <td width="15%">uv_windows</td>
            <td width="10%">uv_others</td>
        </tr>
        <?php foreach($deviceinfo as $row):?>
            <tr> 
                <td width="20%"><?php echo $row['device_mac'];?></td>
                <td width="15%"><?php echo $row['time'];?></td>
                <td width="10%"><?php echo $row['pv'];?></td>
                <td width="10%"><?php echo $row['download_app_times'];?></td>
                <td width="10%"><?php echo $row['uv'];?></td>
                <td width="10%"><?php echo $row['uv_android'];?></td>
                <td width="10%"><?php echo $row['uv_ios'];?></td>
                <td width="15%"><?php echo $row['uv_windows'];?></td>
                <td width="10%"><?php echo $row['uv_others'];?></td>             
            </tr>
        <?php endforeach?>
        
    </table>
</div>
<div style="width:600px;float:right;margin-top:10px;">
    <span><?php echo $page;?>跳到<input type='text' id='to_page' style='width:30px;height:20px'>页</span>
    <input type="hidden" id="jump_url" value="<?php echo base_url('pvuv/index');?>">
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