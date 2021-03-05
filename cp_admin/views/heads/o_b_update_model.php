        <!-- create new coupon model-->
  <div class="modal fade" id="ViewDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header <?php echo $view->app_config("APP_MODEL_HEAD_COLOR_CLASS");?>">
            <h5 class="modal-title" id=""><i class="fas fa-edit"></i> Update</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
             <div class="modal-body">
                 <form class="" method="POST" enctype="multipart/form-data">
                     
                  
                     
                 <div class="form-group row">
                    <div class="col-sm-12">
                    <label class="text-primary"><i class="fas fa-money-bill-wave"></i> Opening Balance (DR)</label>
                    <input type="number" step="0.01" name="opening_dr_balance" placeholder="0.00" id="opening_dr_balance" class="form-control" required="">
                    </div>
                 </div>  
                     
                 <div class="form-group row">
                    <div class="col-sm-12">
                    <label class="text-primary"><i class="fas fa-money-bill-wave"></i> Opening Balance (CR)</label>
                    <input type="number" step="0.01" name="opening_cr_balance" placeholder="0.00" id="opening_cr_balance" class="form-control" required="">
                    </div>
                 </div>      
                     
                     
<!--                 <div class="form-group row">
                    <div class="col-sm-12">
                    <label class="text-primary"><i class="fas fa-paperclip"></i> Attachment (Optional)</label>
                    <input type="file"  name="file_link"  class="form-control">
                    </div>
                 </div>      -->
                     
                    
                <input type="hidden"  name="id"  id="edit_id" class="form-control" required="">      
               <button  type="submit" name="updateAccountHeadOpeningBalance" class="btn btn-primary btn-user btn-block">
                    <i class="far fa-paper-plane"></i>  Update
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
      //get detail of club
      $(".update-model").on('click',function(){  
           var id=$(this).attr("data-id"); 
           var opening_dr_balance=$(this).attr("data-open-dr-bal");
           var opening_cr_balance=$(this).attr("data-open-cr-bal");
           $("#edit_id").val(id);
           $("#opening_dr_balance").val(opening_dr_balance);
           $("#opening_cr_balance").val(opening_cr_balance);
           $('#ViewDetail').modal('show');  
                       
      });
  });
</script>       

 