<div class="row" style="margin-bottom:20px">
    <div class="col-md-3">
        <span style="height:100px;background:#337ab7;color:white;font-size:200%;line-height:100px;float:left;padding-left:20px">在线设备</span>
        <span style="height:100px;width:100px;background:#337ab7;color:white;line-height:100px;float:left;padding-left:20px"><?php echo $dev_account;?></span>
    </div>
    <div class="col-md-3">
        <span style="height:100px;background:#337ab7;color:white;font-size:200%;line-height:100px;float:left;padding-left:20px">在线用户</span>
        <span style="height:100px;width:100px;background:#337ab7;color:white;line-height:100px;float:left;padding-left:20px">3</span>
    </div>
</div>
<div class="row">
           <div id="mymap" tabindex="0">
                        
                <!-- process data for map-->
                <?php
                     $n = 0;
                     $provinces_total = 35;
                     for ($i = 0; $i <$provinces_total-1; $i++) {
                         $p = "<div id='".$n."' style='visibility:hidden;width:0px;height:0px'>".$province[$i]['dev']."</div>";
                         echo $p;
                         $n++;
                     }
                    
                ?>
                <!--end process data-->

              <script src="<?php echo base_url('application/views/global/custom/js/map.js');?>"></script>
               <script src="http://webapi.amap.com/maps?v=1.3&key="></script>
               <script type="text/javascript">
                   for (var i = 0; i < provinces.length; i += 1) {
                        provinces[i].count = document.getElementById(i).innerHTML;
                   }
                    var mapObj = new AMap.Map('mymap', {
                        resizeEnable: true,
                            zoom: 5,//缩放级别
                            zooms:[4,18],//缩放级别范围
                            center: [106.485352, 34.603692]
                    });
                    var createMarker = function(data,hide) {
                        var div = document.createElement('div');
                        div.className = 'circle';//className属性
                        var r = Math.floor(data.count / 1024);//返回小于参数的最大整数
                        div.style.backgroundColor = hide?'#393':'#09f';
                        div.innerHTML = data.count || 0;//显示count值
                        var marker = new AMap.Marker({
                            content: div,//点标记显示内容，content有效时，icon属性将被覆盖
                            title:data.name,//鼠标滑过时显示的标题
                            position: data.center.split(','),//将字符分拆成字符数组
                            offset: new AMap.Pixel(-24, 5),//构造一个像素坐标对象
                            zIndex: data.count//点标记的叠加顺序
                        });
                        marker.subMarkers = [];//创建子点???????
                        if(data.name==='北京市'||data.name==='河南省'){
//                            marker.setLabel({content:'&larr;请点击',offset:new AMap.Pixel(45,0)})//将按钮的标签设置为指定的字符串
                            mapObj.setCenter(marker.getPosition());//getPosition获取点标记的位置(经纬度)；设置地图显示的中心点
                        }
                        if(!hide){
                            marker.setMap(mapObj)//为Marker指定目标显示地图
                        }
                        if(data.subDistricts&&data.subDistricts.length){
                            for(var i = 0 ; i<data.subDistricts.length;i+=1){
                                marker.subMarkers.push(createMarker(data.subDistricts[i],true));//数组中添加新元素????
                            }
                        }
                        return marker;
                    }
                    //地图缩放结束后停留的级别小于6的时候将溢出所有市一级的标记
                    var _onZoomEnd = function(e) {
                        if (mapObj.getZoom() < 6) {//获取当前地图缩放级别
                            for (var i = 0; i < markers.length; i += 1) {
                                mapObj.remove(markers[i].subMarkers)
                            }
                            mapObj.add(markers);//添加地图覆盖物数组
                        }
                    }
                    //当Marker点被点击的时候，我们将显示其下级的Marker标记
                    var _onClick = function(e) {
                        if(e.target.subMarkers.length){
                            mapObj.add(e.target.subMarkers);//添加地图覆盖物数组
                            mapObj.setFitView(e.target.subMarkers);//setFitView方法用来将地图调整到合适的范围来显示我们需要展示的markers
                            mapObj.remove(markers)//移除地图覆盖物数组
                        }
                    }
                    
                    var markers = []; //province见Demo引用的JS文件
                    for (var i = 0; i < provinces.length; i += 1) {
                        var marker = createMarker(provinces[i]);
                        markers.push(marker);//数组中添加新元素
                        AMap.event.addListener(marker, 'click', _onClick);//注册事件的对象，事件名称，事件处理函数
                    }
                    //mapObj.setFitView();
                    AMap.event.addListener(mapObj, 'zoomend', _onZoomEnd);//zoomend：缩放停止时触发
                        
                </script>               
             
              
			 
           </div>
            <!--map end by wmg-->    
</div>

		<div class="row">
               	
				<div class="col-lg-9 col-md-12">	
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2><strong>Registered Devices</strong></h2>
						</div>
						<div class="panel-body">
                            
							<table class="table bootstrap-datatable countries">
								<thead>
									<tr>
										<th>Province</th>
										<th>All Devices</th>
										<th>Online Devices</th>
										<th>Online rate</th>
									</tr>
								</thead>
                                
								<tbody>
<!--                注册用户/在线用户/perform      start              -->
                                    <?php
                                          foreach ($province as $value) {  
                                                echo "<tr>";
            
                                                    echo "<td>".$value['name']."</td>";
                                                    echo "<td>".$value['dev']."</td>";
                                                    echo "<td>".$value['online']."</td>";
                                                    echo "<td>";
                                                        echo "<div class='progress thin'>";
                                                            if ($value['dev']) {
                                                                $online_rate = round($value['online']*100/$value['dev'], 0);
                                                            }
                                                            else {
                                                                $online_rate = 0;
                                                            }
                                                            $offline_rate = 100 - $online_rate;
                                                            echo "<div class='progress-bar progress-bar-danger' style='width:".$online_rate."%'></div>";
                                                            echo "<div class='progress-bar progress-bar-warning' style='width:".$offline_rate."%'></div>";
                                                        echo "</div>";
                                                    echo "</td>";

                                                echo "</tr>";
                                        }
                                    ?>
<!--                end 注册用户/在线用户/perform                     -->
								</tbody>
							</table>
                                
						</div>
	
					</div>	

				</div><!--/col-->
				
              </div>
