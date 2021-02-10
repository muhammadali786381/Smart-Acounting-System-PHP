<?php
if(isAdminLogin()){
    RedirectURL(BASE_URL."/dashboard");
    exit();
}
?>
<div class="login-page">
<div class="login-box">
  <div class="login-logo">
       <b class="text-primary"><img src="<?php echo BASE_URL."uploads/site/".$view->app_config("APP_APP_LOGO"); ?>" width="250px" height="70px" alt="<?php echo $view->app_config("APP_SHORT_NAME"); ?>"/></b>
  </div>
  <!-- /.login-logo -->
  <div class="card" style="background-color: rgba(245, 245, 245, 0.4);">
    <div class="card-body login-card-body" style="background-color: rgba(245, 245, 245, 0.4);">
      <p class="login-box-msg">Member Portal</p>
      <form action="" method="post">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Email/Account ID" name="userMail" required="" value="<?php echo (isset($_SESSION['RegAccountId']))?$_SESSION['RegAccountId']:"";?>" autofocus="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="userPass" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <input type="hidden" class="form-control" placeholder="" name="csrf_token" value="<?php echo csrf_token();?>" required="">
          <div class="col-4">
              <button type="submit" name="userLogin" class="btn btn-primary btn-block"> Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
     </div>
      <hr/>
    <!-- /.login-card-body -->
     <div class="row">
        <div class="col-sm-6">
            <a  href="<?php echo BASE_URL;?>register/1" class="btn-link float-left p-3"><i class="fa fa-user"></i> Register</a>
        </div>
        <div class="col-sm-6">
             <a  href="<?php echo BASE_URL;?>forget-password/1" class="btn-link float-right p-3"><i class="fa fa-key"></i> Forget Password</a>
        </div>
     </div>
  </div>
</div>
<!-- /.login-box -->
</div>