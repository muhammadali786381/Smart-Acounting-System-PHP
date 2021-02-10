                        <div class="container-fluid">
                              <div class="row">
                               <div class="col-12">
                                 <div class="card">
                                     <div class="card-header">
                                         <h3 class="card-title"><i class="fas fa-info-circle"></i> Account Information</h3>
                                         </div>
                                        <div class="card-body">
                                             <form method="post" action="">  
                                              <label>Agency Name</label>   
                                              <input type="text" name="agency_name" placeholder=""  value="<?php echo $data['agency_name'];?>" class="form-control" disabled=""/> 
                                              <label>Mobile</label>   
                                              <input type="text" name="mobile" placeholder=""  value="<?php echo "+".$data['mobile'];?>" class="form-control" disabled=""/>
                                              <label>Email</label>   
                                              <input type="text" name="email" placeholder=""  value="<?php echo $data['email'];?>" class="form-control" disabled=""/>
                                             <label>City</label>  
                                             <select  name="city_id" class="form-control" required="" readonly>
                                               <?php
                                               if($user_city!="NO_DATA"):
                                               ?>  
                                                 <option value="<?php echo $user_city['id']?>"><?php echo $user_city['city_name']?></option>
                                             <?php
                                             endif;
                                               ?>
                                             
                                             </select>  
                                             <label>Office Phone</label>  
                                             <input type="text" name="phone" placeholder=""  value="<?php echo $data['phone'];?>" class="form-control" />
                                             <br/>
                                             <input type="submit" name="chnageAddressInfoByUser"  value="Add/Change" class="btn btn-success pull-right"/>  
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
                               
                               
                               
                               
   