<div class="row"><?php echo $_SESSION['username'];?>>>添加管理员</div>
<div class="row">&nbsp;</div>
<?php echo form_open('admin/add_admin');?>
<div class='row'>
    <div class="col-md-2"></div>
    <div class="col-md-2"></div>
    <div class="col-md-3">
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">账号</span>
          <input type="text" class="form-control" name='username' placeholder="Username" aria-describedby="basic-addon1">
        </div>
    </div>
    <div class="col-md-2"><font color='red'><h5>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $error;?></h5></font></div>
    <div class="col-md-2"></div>
</div>
<div class="row">&nbsp;</div>
<div class='row'>
    <div class="col-md-2"></div>
    <div class="col-md-2"></div>
    <div class="col-md-3">
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">密码</span>
          <input type="password" class="form-control" name='password' placeholder="Password" aria-describedby="basic-addon1">
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
          <input type="text" class="form-control" name='email' placeholder="Email" aria-describedby="basic-addon1">
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
            <input type="radio" name="role" id="optionsRadios1" value="2">用户
          </label>
        </div>
    </div> 
    <div class="col-md-1">
        <div class="radio">
          <label>
            <input type="radio" name="role" id="optionsRadios1" value="1">普通管理员
          </label>
        </div>        
    </div>      
    <div class="col-md-1">
        <div class="radio">
          <label>
            <input type="radio" name="role" id="optionsRadios1" value="0" checked>超级管理员
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
    <input type="checkbox" value="0" name='blocked' checked>授权
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