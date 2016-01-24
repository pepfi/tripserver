<!DOCTYPE htm>
<html>
    <head>
        <title>数据</title>
    </head>
	<body>
        <div id="container">
            <table>
                <tr>
                    <td width="15%">总Pv</td>
                    <td width="15%">总Uv</td>
                    <td width="15%">今天Pv</td>
                    <td width="15%">今天Uv</td>
                    <td width="15%">昨天Pv</td>
                    <td width="15%">昨天Uv</td>
                </tr>
                <tr>
                    <td width="15%"><?php echo $totalpv;?></td>
                    <td width="15%"><?php echo $totaluv;?></td>
                    <td width="15%"><?php echo $todaypv;?></td>
                    <td width="15%"><?php echo $todayuv;?></td>
                    <td width="15%"><?php echo $yesterdaypv;?></td>
                    <td width="15%"><?php echo $yesterdayuv;?></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td width="%">详情</td>
                </tr>
                <tr>
                    <td width="10%">mac</td>
                    <td width="10%">time</td>
                    <td width="10%">pv</td>
                    <td width="20%">download_app_times</td>
                    <td width="10%">uv</td>
                    <td width="10%">uv_andriod</td>
                    <td width="10%">uv_ios</td>
                    <td width="20%">uv_windows</td>
                    <td width="10%">uv_others</td>
                </tr>
                <?php foreach($detail as $row):?>
                    <tr> 
                        <td width="10%"><?php echo $row['mac'];?></td>
                        <td width="10%"><?php echo $row['time'];?></td>
                        <td width="10%"><?php echo $row['pv'];?></td>
                        <td width="10%"><?php echo $row['download_app_times'];?></td>
                        <td width="10%"><?php echo $row['uv'];?></td>
                        <td width="10%"><?php echo $row['uv_android'];?></td>
                        <td width="10%"><?php echo $row['uv_ios'];?></td>
                        <td width="20%"><?php echo $row['uv_windows'];?></td>
                        <td width="10%"><?php echo $row['uv_others'];?></td>             
                    </tr>
                <?php endforeach?>
            </table>
        </div>
    </body>
</html>