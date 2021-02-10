        <!-- create new coupon model-->
  <div class="modal fade" id="AddNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header alert-success">
            <h5 class="modal-title" id=""><i class="fas fa-file-invoice"></i> Create New</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
             <div class="modal-body">
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
                    <label class="text-primary"><i class="fas fa-key"></i> Password</label>
                    <input type="password" name="password"  placeholder="" class="form-control" required="">
                    </div>  
                   </div> 
                   
                     
               <button  type="submit" name="createNewMember" class="btn btn-primary btn-user btn-block">
                    <i class="far fa-paper-plane"></i>  Create
               </button>
                     
              </form>
          </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
<script>
 $(document).ready(function () {
     
    $(".toggle-password").click(function() {
         $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
      }); 
      
});
</script>
 