<script src="/application/views/global/custom/js/esl.js"></script>
<div id="chart0" style="width:370px;height:250px;border:1px solid #ccc;float:left"></div>
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
                var myChart = ec.init(document.getElementById('chart0'));
                var option = {
                    tooltip : {
                        trigger: 'axis'
                    },
                    legend: {
                        data:['".$movie_0_name."','".$movie_1_name."','".$movie_2_name."','".$movie_3_name."','".$movie_4_name."']
                    },

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
                            name:'".$movie_0_name."',
                            type:'line',
                            data:[".$movie_0_pv_six_days_ago.", ".$movie_0_pv_five_days_ago.", ".$movie_0_pv_four_days_ago.", ".$movie_0_pv_three_days_ago.", ".$movie_0_pv_two_days_ago.", ".$movie_0_pv_yesterday.", ".$movie_0_pv_today."]
                        },
                        {
                            name:'".$movie_1_name."',
                            type:'line',
                            data:[".$movie_1_pv_six_days_ago.", ".$movie_1_pv_five_days_ago.", ".$movie_1_pv_four_days_ago.", ".$movie_1_pv_three_days_ago.", ".$movie_1_pv_two_days_ago.", ".$movie_1_pv_yesterday.", ".$movie_1_pv_today."]
                        },
                        {
                            name:'".$movie_2_name."',
                            type:'line',
                            data:[".$movie_2_pv_six_days_ago.", ".$movie_2_pv_five_days_ago.", ".$movie_2_pv_four_days_ago.", ".$movie_2_pv_three_days_ago.", ".$movie_2_pv_two_days_ago.", ".$movie_2_pv_yesterday.", ".$movie_2_pv_today."]
                        },
                        {
                            name:'".$movie_3_name."',
                            type:'line',
                            data:[".$movie_3_pv_six_days_ago.", ".$movie_3_pv_five_days_ago.", ".$movie_3_pv_four_days_ago.", ".$movie_3_pv_three_days_ago.", ".$movie_3_pv_two_days_ago.", ".$movie_3_pv_yesterday.", ".$movie_3_pv_today."]
                        },
                        {
                            name:'".$movie_4_name."',
                            type:'line',
                            data:[".$movie_4_pv_six_days_ago.", ".$movie_4_pv_five_days_ago.", ".$movie_4_pv_four_days_ago.", ".$movie_4_pv_three_days_ago.", ".$movie_4_pv_two_days_ago.", ".$movie_4_pv_yesterday.", ".$movie_4_pv_today."]
                        }

                    ]
                };
                
                myChart.setOption(option);
            }
        );
        </script>";
?>
