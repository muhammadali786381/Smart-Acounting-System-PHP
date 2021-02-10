        <!-- create new coupon model-->
  <div class="modal fade" id="ViewDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header <?php echo $view->app_config("APP_MODEL_HEAD_COLOR_CLASS");?>">
            <h5 class="modal-title" id=""><i class="fas fa-eye"></i> View [Invoice ID: <span id="ajax-id"></span>]</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
             <div class="modal-body">
                 <form class="" method="POST" enctype="multipart/form-data">
                     
                  <div class="form-group row">
                    <div class="col-sm-12">
                    <label class="text-primary"><i class="fa fa-calendar"></i> Date</label>
                    <input type="date" name="date" class="form-control" id="ajax-date" required="" autofocus="">
                    </div>
                 </div>  
                     
                 <div class="form-group row">
                    <div class="col-sm-12">
                    <label class="text-primary"><i class="fa fa-clipboard"></i> Note</label>
                    <input type="text" name="note" class="form-control" id="ajax-note" required="">
                    </div>
                 </div>    
                  
                 <div class="form-group row">
                    <div class="col-sm-12">
                    <label class="text-primary"><i class="fas fa-user"></i> Party (DR)</label>
                    <select class="form-control select2" name="dr_head_id" id="ajax-dr-head-id" required="">
                        <option value="">Select Party</option>
                        <?php
                        echo $view->selectAllHead();
                        ?>
                    </select>
                    </div>
                   </div>
                     
                 <div class="form-group row">
                    <div class="col-sm-12">
                    <label class="text-primary"><i class="fas fa-user"></i> Party (CR)</label>
                    <select class="form-control select2" name="cr_head_id" id="ajax-cr-head-id" required="">
                        <option value="">Select Party</option>
                        <?php
                        echo $view->selectAllHead();
                        ?>
                    </select>
                    </div>
                   </div>
                     
                 <div class="form-group row">
                    <div class="col-sm-6">
                    <label class="text-primary"><i class="fas fa-money-bill-wave"></i> Amount</label>
                    <input type="number" step="0.01" name="amount" placeholder="0.00" id="ajax-amount" class="form-control" required="">
                    </div>
                     
                    <div class="col-sm-6">
                    <label class="text-primary"><i class="fas fa-money-bill-wave"></i> Extra Amount</label>
                    <input type="number" step="0.01" name="extra_amount" value="0.00" id="ajax-extra-amount" class="form-control">
                    </div>
                 </div>  
                     
                     
<!--                 <div class="form-group row">
                    <div class="col-sm-12">
                    <label class="text-primary"><i class="fas fa-paperclip"></i> Attachment (Optional)</label>
                    <input type="file"  name="file_link"  class="form-control">
                    </div>
                 </div>      -->
                     
                    
                     
<!--               <button  type="submit" name="createNewCashVoucher" class="btn btn-primary btn-user btn-block">
                    <i class="far fa-paper-plane"></i>  Create
               </button>-->
                     
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
      $(".btn-view-model").on('click',function(){  
           var ajax_crv_id=$(this).attr("id");  
           //alert(ajax_invoice_detail_id);
           if(ajax_crv_id != '')  
           {  
                $.ajax({  
                     url:'<?php echo BASE_URL;?>ajax.php',  
                     method:"POST",  
                     data:{ajax_crv_id:ajax_crv_id},
                     dataType:"json",
                     success:function(data){ 
                         //console.log(JSON.stringify(data));
                          if(data['status']===1){
                             $("#ajax-id").html(data['id']);
                             $("#ajax-date").val(data['date']);
                             $("#ajax-note").val(data['note']);
                             $("#ajax-cr-head-id").val(data['cr_head_id']).change();
                             $("#ajax-dr-head-id").val(data['dr_head_id']).change();
                             $("#create_by_id").val(data['create_by_id']).change();
                             $("#ajax-amount").val(data['amount']);
                             $("#ajax-extra-amount").val(data['extra_amount']);
                             
                             $('#ViewDetail').modal('show');    
                          }else{
                             //use sweet alert 
                             swal(data['message']); 
                          }
                     }  
                });  
           }else{
                swal("ID Required.");
           }            
      });
  });
</script>       

 