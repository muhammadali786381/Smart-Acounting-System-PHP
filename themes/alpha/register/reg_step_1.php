<?php
if(isAdminLogin()){
    RedirectURL(BASE_URL."/dashboard");
    exit();
}
?>
<div class="login-page" >
<div style="width: 80%;">
  <div class="login-logo">
       <b class="text-primary"><img src="<?php echo BASE_URL."uploads/site/".$view->app_config("APP_APP_LOGO"); ?>" width="250px" height="70px" alt="<?php echo $view->app_config("APP_SHORT_NAME"); ?>"/></b>
  </div>
  <!-- /.login-logo -->
  <div class="card" style="background-color: rgba(245, 245, 245, 0.4);">
    <div class="card-body login-card-body" style="background-color: rgba(245, 245, 245, 0.4);">
      <p class="login-box-msg">Register as new Member</p>
     <form class="" method="POST" enctype="multipart/form-data">
                  
                  <div class="form-group row">
                    <div class="col-sm-6">
                    <label class="text-primary"><i class="fa fa-user"></i> First Name</label>
                    <input type="text" name="first_name" class="form-control" required="" placeholder="Muhammad" autofocus="">
                    </div>
                    <div class="col-sm-6">
                    <label class="text-primary"><i class="fas fa-user"></i> Last Name</label>
                    <input type="text" name="last_name" class="form-control" placeholder="Ali" required="">
                    </div>
                 </div>  
                 
                  <div class="form-group row">
                    <div class="col-sm-4">
                    <label class="text-primary"><i class="fa fa-mobile"></i> Mobile</label>
                    <input type="text" name="mobile" class="form-control" maxlength="12" minlength="12" placeholder="923XXXXXXXXX"  required="">
                    </div>
                    <div class="col-sm-4">
                    <label class="text-primary"><i class="fas fa-at"></i> Email</label>
                    <input type="email" name="email" class="form-control" placeholder="example@gmail.com" required="">
                    </div>
                    <div class="col-sm-4">
                    <label class="text-primary"><i class="fas fa-building"></i> Agency Name</label>
                    <input type="text" name="agency_name"  placeholder="Impace Properties" class="form-control" required="">
                    </div>  
                 </div> 
                   
                 <div class="form-group row">
                    <div class="col-sm-4">
                    <label class="text-primary"><i class="fas fa-venus-mars"></i> Gender</label>
                    <select class="form-control select2" name="gender" required="">
                        <option value="">Select Gender</option>
                        <?php
                        echo $view->selectGender();
                        ?>
                    </select>
                    </div>
                    <div class="col-sm-4">
                     <label class="text-primary"><i class="fa fa-building"></i> City</label>
                    <select class="form-control select2" name="city_id" required="">
                        <option value="">Select City</option>
                        <?php
                        echo $view->selectCity();
                        ?>
                    </select>
                    </div>  
                    <div class="col-sm-4">
                    <label class="text-primary"><i class="fas fa-key"></i> Password</label>
                    <input type="password" name="password"  placeholder="" minlength="8" class="form-control" required="">
                    </div>  
                   </div> 
                   
               <input type="hidden" class="form-control" placeholder="" name="csrf_token" value="<?php echo csrf_token();?>" required="">     
               <button  type="submit" name="createNewMember" class="btn btn-primary btn-user btn-block">
                    <i class="far fa-paper-plane"></i>  Register
               </button>
                     
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