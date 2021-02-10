
  
  
        <div class="modal fade" id="edit_profile">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header alert-success">
                <h4 class="modal-title">Edit Profile <b>[Account ID: <?php echo $data['admin_id'];?>]</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="admin_id" value="<?php echo $data['admin_id'];?>" required="">
                    
                        <div class="form-group">
                            <div class="row">
                        <div class="col-md-6">
                           <label>First Name</label>
                           <input type="text" class="form-control" name="first_name" value="<?php echo $data['first_name'];?>" required="">
                        </div>
                            <div class="col-md-6">
                           <label>Last Name</label>
                           <input type="text" class="form-control" name="last_name" value="<?php echo $data['last_name'];?>" required="">
                        </div>
                        </div>
                      </div>
                    <div class="form-group">
                            <div class="row">
                        <div class="col-md-6">
                           <label>Mobile </label>
                           <input type="text" class="form-control" name="mobile" value="<?php echo $data['mobile'];?>" required="">
                        </div>
                          <div class="col-md-6">
                           <label>Email</label>
                           <input type="text" class="form-control" name="email" value="<?php echo $data['email'];?>" required="">
                        </div>
                        </div>
                      </div>
                    <div class="form-group">
                       <div class="row">
                        
                       <div class="col-md-6">
                           <label>Account Status</label>
                           <select name="status" class="form-control select2" required="">
                               <option value="Active" <?php echo ($data['status'] == 'Active')   ? ' selected' : '';?> >Active</option>
                               <option value="Deactive" <?php echo ($data['status'] == 'Deactive')   ? ' selected' : '';?> >Deactive</option>
                           </select>
                        </div>
                        </div>
                      </div>
                    <button type="submit" class="btn btn-danger pull-right" name="editProfileByAdminForAdmin" >Save changes</button>   
                </form>
               </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->