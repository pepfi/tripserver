<div class="row"><?php echo $_SESSION['username'];?>>>修改管理员</div>
<div class="row">&nbsp;</div>
<?php echo form_open('admin/modify_admin');?>
<div class='row'>
    <div class="col-md-2"></div>
    <div class="col-md-2"></div>
    <div class="col-md-3">
        <div class="input-group">
          <input type="hidden" name="id" value="<?php echo $modify_info->id;?>" />
          <span class="input-group-addon" id="basic-addon1">账号</span>
          <input type="text" class="form-control" name='username' value="<?php echo $modify_info->username;?>" aria-describedby="basic-addon1" placeholder="请输入管理员账号" readonly>
        </div>
    </div>
    <div class="col-md-2"></div>
    <div class="col-md-2"></div>
</div>
<div class="row">&nbsp;</div>
<div class='row'>
    <div class="col-md-2"></div>
    <div class="col-md-2"></div>
    <div class="col-md-3">
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">密码</span>
          <input type="password" class="form-control" name='password' value="<?php echo $modify_info->password;?>" aria-describedby="basic-addon1" placeholder="请输入管理员密码">
        </div>
    </div>
    <div class="col-md-2"></div>
    <div class="col-md-2"></div>
</div>
<div class="row">&nbsp;</div>
<div class='row'>
    <div class="col-md-2"></div>
    <div class="col-md-2"></div>
    <div class="col-md-3">
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">邮箱</span>
          <input type="text" class="form-control" name='email' value="<?php echo $modify_info->email;?>" aria-describedby="basic-addon1" placeholder="请输入管理员邮箱">
        </div>
    </div> 
    <div class="col-md-2"></div>
    <div class="col-md-2"></div>
</div>
<div class='row'>
    <div class="col-md-2"></div>
    <div class="col-md-2"></div>
    <div class="col-md-1">
        <div class="radio">权限&nbsp;&nbsp;
          <label>
            <input type="radio" name="role" id="optionsRadios1" value="2" <?php if ($modify_info->role == 2) echo "checked";?>>用户
          </label>
        </div>
    </div> 
    <div class="col-md-1">
        <div class="radio">
          <label>
            <input type="radio" name="role" id="optionsRadios1" value="1" <?php if ($modify_info->role == 1) echo "checked";?>>普通管理员
          </label>
        </div>        
    </div>      
    <div class="col-md-1">
        <div class="radio">
          <label>
            <input type="radio" name="role" id="optionsRadios1" value="0" <?php if ($modify_info->role == 0) echo "checked";?>>超级管理员
          </label>
        </div>
    </div>        
    <div class="col-md-2"></div>
    <div class="col-md-2"></div>
</div>
<div class='row'>
    <div class="col-md-2"></div>
    <div class="col-md-2"></div>
    <div class="col-md-2">
<div class="checkbox">
  <label>
    <input type="checkbox" value="0" name='blocked'  <?php if ($modify_info->blocked == 0) echo "checked";?>>授权
  </label>
</div>
    </div>
    <div class="col-md-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="submit" class="btn btn-default">提&nbsp;&nbsp;交</button>
    </div>
    <div class="col-md-2"></div>
    <div class="col-md-2"></div>
</div>
</form>