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
                    <label class="text-primary"><i class="fas fa-money-bill-wave"></i> Route</label>
                    <select name="head_route_id" id="head_route_id" class="form-control select2" required="">
                        <option value="">Select Route</option>
                        <?php
                        echo $view->selectHeadRoute();
                        ?>
                    
                    </select>
                   
                    </div>
                 </div>      
                     
                 <input type="hidden"  name="id"  id="edit_id" class="form-control" required="">      
               <button  type="submit" name="updateHeadRoute" class="btn btn-primary btn-user btn-block">
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
           var head_route_id=$(this).attr("data-head-route-id");
           $("#edit_id").val(id);
           $("#head_route_id").val(head_route_id);
           $('#ViewDetail').modal('show');  
      });
  });
</script>       

 