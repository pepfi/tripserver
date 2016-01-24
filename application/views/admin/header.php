<!DOCTYPE html>
<html llang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>
    <link href="<?php echo base_url(); ?>application/views/global/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('application/views/global/custom/css/map_style.css');?>" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>application/views/global/custom/css/header_footer.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
        <br/>
        <div class="row">
            <div class="col-md-2"><a href='/home/index'><img src="<?php echo base_url(); ?>application/views/global/custom/img/logo.png" border='0'></a></div>
            <div class="col-md-1"></div>
            <div class="col-md-1"></div>
            <div class="col-md-1">
                <ul class="nav nav-pills">
                    <li <?php echo $home_nav_class;?>><a href="/home">首页</a></li>
                </ul>
            </div>
            <div class="col-md-1">
                <ul class="nav nav-pills">
                    <li <?php echo $device_nav_class;?>><a href="/device">设备管理</a></li>
                </ul>
            </div>
            <div class="col-md-1">
                <ul class="nav nav-pills">
                    <li <?php echo $pvuv_nav_class;?>><a href="/pvuv/">Pv/Uv</a></li>
                </ul>                
            </div>
            <div class="col-md-1">
                <ul class="nav nav-pills">
                    <li style="font-size:12px;line-height:20px" <?php echo $movie_nav_class;?>><a href="/movie/">电影播放量</a></li>
                </ul>                
            </div>            
            <div class="col-md-1">
                <ul class="nav nav-pills">
                    <li <?php echo $user_nav_class;?>><a href="/user/">用户管理</a></li>
                </ul>
            </div>
            <div class="col-md-1">
                <ul class="nav nav-pills">
                    <li <?php echo $log_nav_class;?>><a href="/log/">日志</a></li>
                </ul>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-2">
                <ul class="nav nav-pills">
                      <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['username']; ?><span class="caret"></span></a>
                          <ul class="dropdown-menu">
                              <li><a href="/admin/list_admin">查看管理员</a></li>
                            <li><a href="/admin/add_admin">添加管理员</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/admin/logout">退出</a></li>
                          </ul>
                      </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="border-bottom:2px solid #333;margin-top:7px"></div>
        </div>
        <div class="row">&nbsp;</div>
      


