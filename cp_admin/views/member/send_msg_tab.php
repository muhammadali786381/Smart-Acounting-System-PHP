                        <div class="container-fluid">
                              <div class="row">
                               <div class="col-12">
                                 <div class="card">
                                     <div class="card-header">
                                         <h3 class="card-title"><i class="fas fa-edit"></i> Send SMS</h3>
                                         </div>
                                           <div class="card-body">
                                             <form method="post" action="">  
                                             <input type="hidden" name="admin_id"  value="<?php echo $id; ?>" class="form-control" readonly="" required=""/> 
                                             <input type="hidden" name="user_mobile"  value="<?php echo $data['mobile']; ?>" class="form-control" readonly="" required=""/>
                                             <label>Message</label>  
                                             <textarea type="text" name="msg" rows="5" value="" class="form-control" required="" autofocus="true"/> <?php printf("Dear %s %s, \n",$data['first_name'],$data['last_name']);?></textarea>
                                             <br/>
                                             <button type="submit" name="send_single_sms_by_admin" class="btn btn-success pull-right"/>Send</button>  
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
                               
                               
                               
                               
   