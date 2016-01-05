<div class="row"><?php echo $_SESSION['username'];?>>>查看管理员</div>
<div class="row" style="background:#337ab7;color:white">
    <div class="col-md-2"></div>
    <div class="col-md-2">账号</div>
    <div class="col-md-2">邮箱</div>
    <div class="col-md-2">角色</div>
    <div class="col-md-1">授权</div>
    <div class="col-md-1">修改</div>
    <div class="col-md-1">删除</div>
</div>
<?php
    foreach($userslist->result() as $row){
        echo "<div class='row' style='margin-top:2px'>";
        echo "<div class='col-md-2'></div>";
        echo "<div class='col-md-2'>".$row->username."</div>";
        echo "<div class='col-md-2'>".$row->email."</div>";
        if ($row->role == 0){
            $rank = "超级管理员";
        }elseif ($row->role == 1) {
            $rank = "管理员";
        }else {
            $rank = "用户";
        }
        echo "<div class='col-md-2'>".$rank."</div>";
        $authorization = ($row->blocked == 0)?"是":"否";
        echo "<div class='col-md-1'>".$authorization."</div>";
        echo "<div class='col-md-1'><a type='button' href='modify_admin/".$row->id."' class='btn btn-primary btn-xs'>执行</a></div>";       
?>
<div class='col-md-1'><button type='button' onclick="del_admin(<?php echo $row->id;?>)" class='btn btn-primary btn-xs'>执行</button></div>
<?php echo "</div>";
    }
?>
<script type="text/javascript">
	function del_admin(id){
		if (window.confirm("你确定要删除吗？删除之后不可以恢复！")) {
			window.location="del_admin/"+id;
		}
	}
</script>