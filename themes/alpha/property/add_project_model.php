        <!-- create new coupon model-->
  <div class="modal fade" id="AddNewProject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header alert-success">
            <h5 class="modal-title" id=""><i class="fas fa-file-invoice"></i> Add New Project</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
             <div class="modal-body">
                 <form class="" method="POST" enctype="multipart/form-data">
                  
                  <div class="form-group row">
                    <div class="col-sm-12">
                    <label class="text-primary"><i class="fas fa-city"></i> Project Name</label>
                    <input type="text" name="name" class="form-control" required="" placeholder="e.g: DHA Islamabad" autofocus="">
                    </div>
                    <div class="col-sm-12">
                    <label class="text-primary"><i class="fa fa-clipboard"></i> Description (Optional)</label>
                    <input type="text" name="description" class="form-control" placeholder="">
                   </div>
                 </div>  
                <button  type="submit" name="createNewProject" class="btn btn-primary btn-user btn-block">
                    <i class="far fa-paper-plane"></i>  Add
                </button>
                     
              </form>
          </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>

 