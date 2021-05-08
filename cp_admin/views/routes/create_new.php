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
                    <label class="text-primary"><i class="fas fa-clipboard"></i> Name</label>
                    <input type="text" name="route_name" class="form-control" required="" autofocus="">
                    </div>
                 </div>  
                     
                 <div class="form-group row">
                    <div class="col-sm-12">
                    <label class="text-primary"><i class="fas fa-calendar"></i> Day</label>
                    <input type="text" name="day_name" class="form-control" required="">
                    </div>
                 </div>    
                 
                 <div class="form-group row">
                    <div class="col-sm-12">
                    <label class="text-primary"><i class="fas fa-map-marked"></i> Description</label>
                    <input type="text"  name="description"  class="form-control">
                    </div>
                 </div>  
                     
               <button  type="submit" name="createNewRoute" class="btn btn-primary btn-user btn-block">
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
 