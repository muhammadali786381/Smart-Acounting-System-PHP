        <!-- create new coupon model-->
  <div class="modal fade" id="AddNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header <?php echo $view->app_config("APP_MODEL_HEAD_COLOR_CLASS");?>">
            <h5 class="modal-title" id=""><i class="fas fa-file-invoice"></i> Create New</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
             <div class="modal-body">
                 <form class="" method="POST" enctype="multipart/form-data">
                  
                  <div class="form-group row">
                    <div class="col-sm-12">
                    <label class="text-primary"><i class="fa fa-calendar"></i> Date</label>
                    <input type="date" name="date" class="form-control" required="" autofocus="">
                    </div>
                 </div>  
                     
                 <div class="form-group row">
                    <div class="col-sm-12">
                    <label class="text-primary"><i class="fa fa-clipboard"></i> Note</label>
                    <input type="text" name="note" class="form-control" required="">
                    </div>
                 </div>    
                  
                 <div class="form-group row">
                    <div class="col-sm-12">
                    <label class="text-primary"><i class="fas fa-user"></i> Party</label>
                    <select class="form-control select2" name="dr_head_id" required="">
                        <option value="">Select Party</option>
                        <?php
                        echo $view->selectActiveHead(4);
                        ?>
                    </select>
                    </div>
                   </div>       
                 
                 <div class="form-group row">
                    <div class="col-sm-6">
                    <label class="text-primary"><i class="fas fa-money-bill-wave"></i> Amount</label>
                    <input type="number" step="0.01" name="amount" placeholder="0.00" class="form-control" required="">
                    </div>
                     
                    <div class="col-sm-6" style="display:none">
                    <label class="text-primary"><i class="fas fa-money-bill-wave"></i> Extra Amount</label>
                    <input type="number" step="0.01" name="extra_amount" value="0.00" class="form-control">
                    </div>
                 </div>  
                     
                     
                 <div class="form-group row">
                    <div class="col-sm-12">
                    <label class="text-primary"><i class="fas fa-paperclip"></i> Attachment (Optional)</label>
                    <input type="file"  name="file_link"  class="form-control">
                    </div>
                 </div>      
                     
                    
                     
               <button  type="submit" name="createNewCashPaymentVoucher" class="btn btn-primary btn-user btn-block">
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
 