<!-- send offer model-->
  <div class="modal fade" id="update-model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Update Status</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
                   <form class="user" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label class="text-primary">User Status</label>
                      
                      <select  name="property_post_status_id" class="form-control" id="edit_status_user" value="">
                         <?php $view->selectWantedStatusUser();?> 
                      </select> 
                      
                    </div> 
                       
                    <div class="form-group">
                      <label class="text-primary">Admin Status</label>
                      <select  name="status_id" class="form-control" id="edit_status_admin" value="">
                         <?php $view->selectWantedStatusAdmin();?> 
                      </select> 
                    </div>    
                       
                 <input type="hidden" name="id" id="edit_value" value=""/>      
                <button  type="submit" name="updateWantedStatusByAdmin" class="btn btn-primary btn-user btn-block">
                <i class="fas fa-check-circle"> </i>  Update
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
      //get table row data 
        $('.update-model').on('click',function(){
        var status=$(this).attr("data-user-status"); 
        var admin_status=$(this).attr("data-admin-status"); 
        var id=$(this).attr("data-id"); 
        $('#edit_value').val(id);
        $('#edit_status_user').val(status);
        $('#edit_status_admin').val(admin_status);
        $('#update-model').modal('show');
       });
  });
 
</script>
                               
                               
   