<?php
if(isAdminLogin()){
    RedirectURL(BASE_URL.ADMIN_DIR."/dashboard");
    exit();
}
?>

<div class="login-page">
<div class="login-box ">
  <div class="login-logo">
    <b><?php echo $view->app_config("APP_SHORT_NAME");  ?></b><br>Admin Portal
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="userMail" required="">
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
              <button type="submit" name="adminLogin" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
     </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
</div>