                        <div class="container-fluid">
                              <div class="row">
                               <div class="col-12">
                                 <div class="card">
                                     <div class="card-header">
                                         <h3 class="card-title"><i class="fas fa-edit"></i> Change Password</h3>
                                         </div>
                                           <div class="card-body">
                                             <form method="post" action="">  
                                             <input type="hidden" name="admin_id"  value="<?php echo $id; ?>" class="form-control" readonly="" required=""/>  
                                             <label>New Password</label>  
                                             <input type="password" name="newUserPass" minlength="8" value="" class="form-control" required=""/>
                                             <br/>
                                             <input type="submit" name="chnagePassByAdminForAdmin"  value="Change" class="btn btn-success pull-right"/>  
                                             </form>  
                                       </div>
                                        <!--end card body -->
                                     </div>
                                   <!--end card -->
                                  </div>
                                  <!--end col-12 -->
                                 </div>
                                <!--end row -->
                                </div>
                               <!--end container-fluid --> 
                               
                               
                               
                               
   