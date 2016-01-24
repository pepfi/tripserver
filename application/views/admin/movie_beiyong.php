<script src="/application/views/global/custom/js/esl.js"></script>
<div id="main0" style="width:370px;height:250px;border:1px solid #ccc;float:left"></div>
<div id="main1" style="width:370px;height:250px;border:1px solid #ccc;float:left"></div>
<div id="main2" style="width:370px;height:250px;border:1px solid #ccc;float:left"></div>
<div id="main3" style="width:370px;height:250px;border:1px solid #ccc;float:left"></div>
<div id="main4" style="width:370px;height:250px;border:1px solid #ccc;float:left"></div>
<div id="main5" style="width:370px;height:250px;border:1px solid #ccc;float:left"></div>
<?php 
    for($i = 0; $i < 6; $i++){
        $span = $i * 5;
    $chart_head = "<script type='text/javascript'>
            require.config({
                paths:{ 
                    echarts:'/application/views/global/custom/js/echarts'
                }
            });
        
            require(
                ['echarts'],
                function(ec) {
                    var myChart = ec.init(document.getElementById('main".$i."'));
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
                        series : [";
        
        for($j = 0; $j < 5; $j++){
             ${"chart".($j+$span)."6"} = "movie_".($j+$span)."_pv_six_days_ago";
             ${"chart".($j+$span)."5"} = "movie_".($j+$span)."_pv_five_days_ago";
             ${"chart".($j+$span)."4"} = "movie_".($j+$span)."_pv_four_days_ago";
             ${"chart".($j+$span)."3"} = "movie_".($j+$span)."_pv_three_days_ago";
             ${"chart".($j+$span)."2"} = "movie_".($j+$span)."_pv_two_days_ago";
             ${"chart".($j+$span)."1"} = "movie_".($j+$span)."_pv_yesterday";
             ${"chart".($j+$span)."0"} = "movie_".($j+$span)."_pv_today";
             $chart_body = "{
                                name:'".$movie_0_name."',
                                type:'line',
                                data:[".${"chart".($j+$span)."6"}.", ".${"chart".($j+$span)."5"}.", ".${"chart".($j+$span)."4"}.", ".${"chart".($j+$span)."3"}.", ".${"chart".($j+$span)."2"}.", ".${"chart".($j+$span)."1"}.", ".${"chart".($j+$span)."0"}."]
                            },
                            {
                                name:'".$movie_1_name."',
                                type:'line',
                                data:[".$movie_1_pv['six_days_ago'].", ".$movie_1_pv['five_days_ago'].", ".$movie_1_pv['four_days_ago'].", ".$movie_1_pv['three_days_ago'].", ".$movie_1_pv['two_days_ago'].", ".$movie_1_pv['yesterday'].", ".$movie_1_pv['today']."]
                            },
                            {
                                name:'".$movie_2_name."',
                                type:'line',
                                data:[".$movie_2_pv['six_days_ago'].", ".$movie_2_pv['five_days_ago'].", ".$movie_2_pv['four_days_ago'].", ".$movie_2_pv['three_days_ago'].", ".$movie_2_pv['two_days_ago'].", ".$movie_2_pv['yesterday'].", ".$movie_2_pv['today']."]
                            },
                            {
                                name:'".$movie_3_name."',
                                type:'line',
                                data:[".$movie_3_pv['six_days_ago'].", ".$movie_3_pv['five_days_ago'].", ".$movie_3_pv['four_days_ago'].", ".$movie_3_pv['three_days_ago'].", ".$movie_3_pv['two_days_ago'].", ".$movie_3_pv['yesterday'].", ".$movie_3_pv['today']."]
                            },
                            {
                                name:'".$movie_4_name."',
                                type:'line',
                                data:[".$movie_4_pv['six_days_ago'].", ".$movie_4_pv['five_days_ago'].", ".$movie_4_pv['four_days_ago'].", ".$movie_4_pv['three_days_ago'].", ".$movie_4_pv['two_days_ago'].", ".$movie_4_pv['yesterday'].", ".$movie_4_pv['today']."]
                            }";
        }
        
      $chart_footer = "
                        ]
                    };                    
                    myChart.setOption(option);
                }
            );
            </script>";        
        }
    }
?>