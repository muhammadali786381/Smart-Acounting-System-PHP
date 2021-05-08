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
                    <label class="text-primary"><i class="fa fa-university"></i> Company</label>
                    <input type="text" name="company_name" class="form-control" required="" autofocus="">
                    </div>
                 </div>  
                     
                 <div class="form-group row">
                    <div class="col-sm-12">
                    <label class="text-primary"><i class="fa fa-user-alt"></i> Owner</label>
                    <input type="text" name="owner_name" class="form-control" required="">
                    </div>
                 </div>    
                     
                 <div class="form-group row">
                    <div class="col-sm-6">
                    <label class="text-primary"><i class="fas fa-mobile"></i> Cell (SMS)</label>
                    <input type="text" minlength="12" placeholder="923XXXXXXXXX" maxlength="12"  name="cell_1"  class="form-control" required="">
                    </div>
                     
                    <div class="col-sm-6">
                    <label class="text-primary"><i class="fas fa-mobile"></i> Cell</label>
                    <input type="text" minlength="12" placeholder="923XXXXXXXXX" maxlength="12"  name="cell_2"  class="form-control">
                    </div>
                 </div>    
                 
                 <div class="form-group row">
                    <div class="col-sm-12">
                    <label class="text-primary"><i class="fas fa-money-bill-wave"></i> Address</label>
                    <input type="text"  name="address"  class="form-control">
                    </div>
                    
                 </div>  
                     
                 <div class="form-group row">
                    <div class="col-sm-12">
                    <label class="text-primary"><i class="fas fa-tags"></i> Type</label>
                    <select class="form-control select2" name="head_type" required="">
                        <option value="">Select Type</option>
                        <?php
                        echo $view->selectHeadType();
                        ?>
                    </select>
                    </div>
                   </div>  
                     
                  <div class="form-group row">
                    <div class="col-sm-12">
                        <label class="text-primary"><i class="fas fa-money-bill-wave"></i> Route <small>(Select in case type is Client)</small></label>
                    <select name="head_route_id" id="head_route_id" class="form-control select2">
                        <option value="">Select Route</option>
                        <?php
                        echo $view->selectHeadRoute();
                        ?>
                    </select>
                   </div>
                 </div>   
                     
                 
                    
                     
               <button  type="submit" name="createNewHead" class="btn btn-primary btn-user btn-block">
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
 