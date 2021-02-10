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
      <p class="login-box-msg">Password Reset</p>
      <p class="login-box-msg"><strong>Step-2</strong></p>
      
      <form action="" method="post">
        <div class="form-group">
            <label> Select Reset Password Method</label>  
            <select class="form-control" name="resetMethod" required="">
                <option value="" >Select Method</option>
                <optgroup label="Mobile">
                <option value="1" ><?php echo "***** ****".substr($_SESSION['tempUserMobile'], -3) ?></option>
                </optgroup>
                <optgroup label="Email">
                <option value="2" ><?php echo substr($_SESSION['tempUserMail'],0, 3)."*******".substr($_SESSION['tempUserMail'], strripos($_SESSION['tempUserMail'], '@')); ?></option>
                </optgroup>
            </select>
        </div>
        
        <div class="row">
          <!-- /.col -->
          <input type="hidden" class="form-control" placeholder="" name="csrf_token" value="<?php echo csrf_token();?>" required="">
          <div class="col-4">
              <button type="submit" name="ForGetStep2" class="btn btn-primary btn-block"> Reset</button>
          </div>
          <!-- /.col -->
        </div>
          
          
      </form>
     </div>
      <hr/>
      
    <!-- /.login-card-body -->
     <div class="row">
        <div class="col-sm-6">
            <a  href="<?php echo BASE_URL;?>login" class="btn-link float-left p-3"><i class="fa fa-user"></i> Login</a>
        </div>
         
        
         
     </div>
    
  </div>
</div>
<!-- /.login-box -->
</div>